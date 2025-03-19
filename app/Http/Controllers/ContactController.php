<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function store(Request $request) {
        try {
            // return $request->all();
            if(Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ])) {
                return ['status' => true, 'message' => 'Contact details are saved!'];
            }

        } catch (\Throwable $th) {
            logger("kyo:- ".$th->getMessage());
        }
        return ['status' => false, 'message' => 'Failed to save contact details'];
    }
}
