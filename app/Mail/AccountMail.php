<?php

namespace App\Mail;

use App\Models\Tcompte;
use App\Models\Utilisateur;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user = null;
    public $compte = null;
    public $rib = null;

    /**
     * Create a new message instance.
     */
    public function __construct(Utilisateur $user, String $compte, $rib)
    {
        //
        $this->user = $user;
        $this->compte = $compte;
        $this->rib = $rib;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Création de compte',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.create_account',
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
    public function build(){
        return $this->from('djigo@jgotechmaker.com')
        ->subject('Création de compte')
        ->view('emails.create_account');
    }
}
