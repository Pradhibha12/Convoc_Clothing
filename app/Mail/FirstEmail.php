<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Headers;

class FirstEmail extends Mailable
{
    /**
     * Get the message headers.
     */
    public function headers(): Headers
    {
        return new Headers(
            messageId: 'unique-first-message-id-7th@creativeitem.academy',
            text: [
                'X-Custom-Header' => 'Starting the Conversation (7th)',
            ],
        );
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('emails.first_email')
                    ->subject('Starting the Conversation (7th)');
    }
}
