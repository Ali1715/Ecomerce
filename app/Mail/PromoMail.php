<?php

namespace App\Mail;

use App\Models\Promocion;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PromoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $dataF = [];

    public function __construct($data)
    {
        $promocion = Promocion::findOrFail($data['idpromocion']);
        $cliente = User::findOrFail($data['idcliente']);
        $this->dataF = [
            'name' => $cliente->name,
            'email' => $cliente->email,
            'mensaje' => $data['mensaje'],
            'desc' => $promocion->descuento,
            'desde' => $promocion->fhiniciada,
            'hasta' => $promocion->fhfinalizada,
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('administrador.mail.mensaje')->with($this->dataF);
    }
}
