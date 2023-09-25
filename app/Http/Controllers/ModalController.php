<?php

namespace App\Http\Controllers;

use App\Mail\ModalEmail;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ModalController extends Controller
{
    //
    public function showModal()
    {
        $emails = Permission::all();
        return view('modal', compact('emails'));
    }

    public function sendEmail(Request $request)
    {
        $text = $request->input('text');
        $emailId = $request->input('email_id');

        // Récupérer l'adresse e-mail à partir de la base de données
        $email = Permission::findOrFail($emailId);

        // Envoyer l'e-mail
        $emailContent = new ModalEmail($text);
        Mail::to($email->email)->send($emailContent);

        return redirect()->back()->with('success', 'E-mail envoyé avec succès !');
    }

}
