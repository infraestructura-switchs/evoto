<?php

namespace diser\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailNewUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sub;  
    public $ema;
    public $pas;
    public $nom;

    public function __construct( $subject, $email, $pass, $nombre )
    {
        $this->sub = $subject;      
        $this->ema = $email;
        $this->pas = $pass;
        $this->nom = $nombre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject = $this->sub;      
        $email     = $this->ema;
        $pas       = $this->pas;
        $nom       = $this->nom;

        return $this->view('mails.sendnewuser', compact('email','pas','nom'))->subject($e_subject);
    }
}
