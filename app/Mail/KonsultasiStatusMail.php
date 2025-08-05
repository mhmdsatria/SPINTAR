<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KonsultasiStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $konsultasi;
    public $status;

    public function __construct($konsultasi, $status)
    {
        $this->konsultasi = $konsultasi;
        $this->status = $status;
    }

    public function build()
    {
        return $this->subject('Status Konsultasi Anda: ' . ucfirst($this->status))
                    ->view('emails.konsultasi-status');
    }
}
