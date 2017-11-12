<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AbuseReported extends Mailable
{
    use Queueable, SerializesModels;
    protected $abuseReport;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\AbuseReport $abuseReport)
    {
        //
        $this->abuseReport = $abuseReport;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.abuse_reported')
          ->with([
            'abuseReport'=>$this->abuseReport
          ]);
    }
}
