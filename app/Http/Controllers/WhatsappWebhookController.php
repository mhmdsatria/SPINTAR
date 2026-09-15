<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WhatsappMessage;
use App\Models\Konsultasi;

class WhatsappWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $sender = $request->input('sender');   // nomor pengirim
        $message = $request->input('message'); // isi pesan

        // cari konsultasi berdasarkan nomor WA
        $konsultasi = Konsultasi::where('nomor_whatsapp', $sender)->first();

        WhatsappMessage::create([
            'konsultasi_id' => $konsultasi?->id,
            'sender' => $sender,
            'message' => $message,
            'direction' => 'in',
        ]);

        return response()->json(['status' => 'ok']);
    }
}
