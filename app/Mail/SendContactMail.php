<?php

namespace App\Mail;

use App\Models\ContactMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public ContactMail $entity;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactMail $entity)
    {
        $this->entity = $entity;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('İletişim formu dolduruldu.')
            ->view('mails.contact_mail');
    }
}
