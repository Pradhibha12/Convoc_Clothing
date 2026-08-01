<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Headers;

class ThirdEmail extends Mailable
{
    public function headers(): Headers
    {
        return new Headers(
            messageId: 'unique-third-id-7th@creativeitem.academy', // New unique message ID
            references: [
                'unique-first-message-id-7th@creativeitem.academy',   // First email's message ID
                'unique-followup-message-id-7th@creativeitem.academy'   // Second email's message ID
            ],
            text: [
                'X-Custom-Header' => 'Starting the Conversation (7th)',
                'In-Reply-To' => 'unique-followup-message-id-7th@creativeitem.academy',
            ],
        );
    }

    public function build()
    {
        return $this->view('emails.third_email')
                    ->subject('Starting the Conversation (7th)');
    }
}
