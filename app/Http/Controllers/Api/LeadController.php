<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $lead = new Lead();
        $lead->fill($data);

        $lead->save();

        Mail::to('info@david.it')->send(new NewContact($lead));
    }
}
