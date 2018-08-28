<?php

namespace App\Mail;

use App\Models\fptk;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class fptkMail extends Mailable
{
    use Queueable, SerializesModels;
    public $fptkMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(App\Models\fptk $fptkMail)
    {
        $this->fptkMail = $fptkMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.fptk');
    }
}
