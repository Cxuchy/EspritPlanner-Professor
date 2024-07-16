<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Helpers\CalendarEvent;

class PlanningMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailMessage;
    public $subject;
    public $planning;

    use Queueable, SerializesModels;

    public $events;


    /**
     * Create a new message instance.
     */
    public function __construct($message,$subject, $myfinalplanning,$events)
    {
        //
        $this->mailMessage = $message;
        $this->subject = $subject;
        $this->planning = $myfinalplanning;
        $this->events = $events;


    }
    public function build()
    {
        $icsContent = CalendarEvent::createICS($this->events);

        return $this->view('emails.event')
            ->subject('You planning is here')
            ->attachData($icsContent, 'My Planning.ics', [
                'mime' => 'text/calendar',
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from : new Address('yassinecauchy@gmail.com','Esprit Planner'),
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'frontend.schedule.email-sent',
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
