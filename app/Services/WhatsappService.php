<?php

namespace App\Services;

use GuzzleHttp\Client;

class WhatsAppService
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.fonnte.com/',
        ]);
    }

    public function kirimPesan(string $nomor, string $pesan)
    {
        try {
            $response = $this->client->post("send", [
                'headers' => [
                    'Authorization' => env('FONNTE_API_KEY'),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'target' => $nomor,
                    'message' => $pesan,
                    'device' => env('FONNTE_INSTANCE_ID')
                ],
            ]);

            return $response->getStatusCode() == 200;
        } catch (\Exception $e) {
            \Log::error('Gagal kirim WhatsApp via Fonnte: ' . $e->getMessage());
            return false;
        }
    }
}