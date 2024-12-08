<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendToWhatsApp(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:100',
        ]);

        // Data dari form
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        $phoneNumber = '6285846428583';

        // Format pesan
        $whatsappMessage = "*Pertanyaan Mengenai Hotel TranquilHaven*\n\n" .
            "*Detail Pemesan:*\n" .
            "Nama: $name\n" .
            "Email: $email\n\n" .
            "*Pesan Anda:*\n" .
            "$message\n\n" .
            "Terima kasih telah menghubungi kami! Kami akan segera merespons pertanyaan Anda.";


        // Buat URL untuk WhatsApp
        $whatsappUrl = "https://wa.me/$phoneNumber?text=" . urlencode($whatsappMessage);

        // Redirect ke WhatsApp
        return redirect()->away($whatsappUrl);
    }
}
