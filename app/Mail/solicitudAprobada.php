<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class solicitudAprobada extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject = "Tu solicitud ha sido ";
    public $mensaje;


    public function __construct($mensaje)
    {
        $this->mensaje=$mensaje;
        $this->subject.= $mensaje['estado'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.solicitudAprobada');
    }
}
