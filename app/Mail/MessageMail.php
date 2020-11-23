<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->name = $data->name;
        $this->email = $data->email;
        $this->mobile = $data->mobile;
        $this->reason = $data->reason;
        $this->bot = $data->bot;
        $this->communicate = $data->communicate;
        $this->message = $data->message;
        $this->time = Carbon::now();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.send_message')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'mobile' => $this->mobile,
                'reason' => $this->reason,
                'bot' => $this->bot,
                'communicate' => $this->communicate,
                'message' => $this->message,
                'time' => $this->time,
            ]);
    }
}
