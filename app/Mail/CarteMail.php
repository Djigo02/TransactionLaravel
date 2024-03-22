<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CarteMail extends Mailable
{
    use Queueable, SerializesModels;
    public $numero;
    public $solde;
    public $cvv;
    public $dateexp;
    public $info;

    /**
     * Create a new message instance.
     */
    public function __construct($auth, $num, $montant, $cvv, $date)
    {
        //
        $this->numero = $num;
        $this->solde = $montant;
        $this->dateexp = $date;
        $this->cvv = $cvv;
        $this->info = $auth;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Creation d\'une carte virtuelle',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.carte',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
