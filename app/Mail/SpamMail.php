<?php

namespace App\Mail;

use App\Models\Persona;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SpamMail extends Mailable
{
    use Queueable, SerializesModels;

    public $dataF = [];

    public function __construct($data)
    {
        $cliente = Persona::findOrFail($data['id']);
        $this->dataF = [
            'name' => $cliente->name,
            'email' => $cliente->email,
            'mensaje' => $data['mensaje'],
        ];
    }

    public function build()
    {
        return $this->view('administrador.mail.content')->with($this->dataF);
    }
}
