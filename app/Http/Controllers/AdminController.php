<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $participants = Participant::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('ticket_number', 'like', "%{$search}%");
            })
            ->orderBy('sequence', 'desc') 
            ->paginate(20); 

        return view('admin.dashboard', compact('participants'));
    }
}