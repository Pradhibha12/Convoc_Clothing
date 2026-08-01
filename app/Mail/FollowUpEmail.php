<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Headers;

class FollowUpEmail extends Mailable
{
    public function headers(): Headers
    {
        return new Headers(
            messageId: 'unique-followup-message-id-7th@creativeitem.academy', // New message ID for the follow-up email
            references: ['unique-first-message-id-7th@creativeitem.academy'], // Reference to the first email's message ID
            text: [
                'X-Custom-Header' => 'Starting the Conversation (7th)',
                'In-Reply-To' => 'unique-first-message-id-7th@creativeitem.academy',
            ],
        );
    }

    public function build()
    {
        return $this->view('emails.follow_up_email')
                    ->subject('Starting the Conversation (7th)');
    }
}
