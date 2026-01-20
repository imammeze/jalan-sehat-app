<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        return view('register');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:participants,phone',
        ],[
            'phone.unique' => 'Nomor WhatsApp ini sudah pernah didaftarkan sebelumnya. Silakan gunakan nomor lain.',
        ]);

        $participant = DB::transaction(function () use ($request) {
            $lastSequence = Participant::lockForUpdate()->max('sequence');
            $newSequence = $lastSequence ? $lastSequence + 1 : 1;
            $ticketNumber = str_pad($newSequence, 4, '0', STR_PAD_LEFT);

            return Participant::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'sequence' => $newSequence,    
                'ticket_number' => $ticketNumber 
            ]);
        });

        return redirect()->route('ticket.success', ['phone' => $participant->phone]);
    }

    public function success($phone)
    {
        $participant = Participant::where('phone', $phone)->firstOrFail();
        
        return view('success', compact('participant'));
    }

    public function downloadPdf($phone)
    {
        $participant = Participant::where('phone', $phone)->firstOrFail();

        $pdf = Pdf::loadView('pdf.ticket', [
            'participant' => $participant
        ]);
        
        $customPaper = array(0,0,600,250); 
    
        $pdf->setPaper($customPaper);

        return $pdf->download('Tiket-' . $participant->ticket_number . '.pdf');
    }
}