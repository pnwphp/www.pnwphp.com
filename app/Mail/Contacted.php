<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contacted extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $name;
    public $subject;
    public $content;

    /**
     * Create a new message instance.
     *
     * @param array $contactForm
     */
    public function __construct(array $contactForm)
    {
        $this->name = $contactForm['name'];
        $this->email = $contactForm['email'];
        $this->subject = $contactForm['subject'];
        $this->content = $contactForm['content'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        \Log::debug(config('app.email'));
        return $this->from($this->email)
            ->to(config('app.email'))
            ->subject($this->name . ': ' . $this->subject)
            ->view('emails.contact')->with([
                'content' => $this->content
            ]);
    }
}
