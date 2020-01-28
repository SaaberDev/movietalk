<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;
    public $data;


    /**
     * Create a new message instance.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @param Request $request
     * @return $this
     */
    public function build(Request $request)
    {
        return
            $this->from('no-reply@movietalk.com', 'Information')
                ->subject('Contact Us')
                ->markdown('emails.contact.contact-Form');
    }
}
