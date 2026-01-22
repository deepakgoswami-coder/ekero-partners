<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CoachCredentialsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $coach;
    public $password;
    public $webUrl;

    /**
     * Create a new message instance.
     */
    public function __construct($coach, $password)
    {
        $this->coach = $coach;
        $this->password = $password;
        $this->webUrl = url('https://ekeropartnersempowerwealth.com/');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Coach Login Credentials'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.coach.coachcredentialemail'
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
