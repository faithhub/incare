<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->time = Carbon::now();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.registration')
            ->with([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'time' => $this->time,
            ]);
    }
}
