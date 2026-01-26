<?php

namespace App\Http\Controllers;

use App\Rules\ReCaptcha;
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
        $existingUser = Participant::where('phone', $request->phone)->first();

        if ($existingUser) {
            return view('already-registered', ['participant' => $existingUser]);
        }

        $maxParticipants = 700;
        $lastSequence = Participant::max('sequence') ?? 0;

        if ($lastSequence >= $maxParticipants) {
            return back()->withErrors(['quota' => 'Mohon maaf, kuota pendaftaran sudah penuh. Nomor tiket telah mencapai batas maksimal.']);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric', 
            'g-recaptcha-response' => ['required', new ReCaptcha],
        ],[
            'name.required' => 'Nama lengkap wajib diisi.',
            'phone.required' => 'Nomor WhatsApp wajib diisi.',
            'g-recaptcha-response.required' => 'Mohon centang kotak "Saya bukan robot".', 
        ]);

        $participant = DB::transaction(function () use ($request) {
            $currentMax = Participant::lockForUpdate()->max('sequence');
            $newSequence = $currentMax ? $currentMax + 1 : 1;
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