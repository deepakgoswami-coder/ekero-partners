<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $user;

    public function __construct($otp)
    {
        $this->otp = $otp;
        // $this->user = null;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your OTP Code'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'otpMail'
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
