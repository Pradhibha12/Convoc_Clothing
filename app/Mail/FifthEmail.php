<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Headers;

class FifthEmail extends Mailable
{
    public function headers(): Headers
    {
        return new Headers(
            messageId: 'unique-fifth-id-6th@creativeitem.academy', // New unique message ID
            references: [
                'unique-first-message-id-6th@creativeitem.academy',   // First email's message ID
                'unique-followup-message-id-6th@creativeitem.academy',   // Second email's message ID
                'unique-third-id-6th@creativeitem.academy',   // Third email's message ID
                'unique-fourth-id-6th@creativeitem.academy'
            ],
            text: [
                'X-Custom-Header' => 'Starting the Conversation (6th)',
                'In-Reply-To' => 'unique-fourth-id-6th@creativeitem.academy',
            ],
        );
    }

    public function build()
    {
        return $this->view('emails.fourth_email')
                    ->subject('Starting the Conversation (6th)');
    }
}
