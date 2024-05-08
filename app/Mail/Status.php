<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Status extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $candidate;
    protected $job;

    public function __construct($candidate, $job)
    {
        $this->candidate = $candidate;
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Your Job Application: ".$this->job->title)
            ->view('email.status')->with(['candidate' => $this->candidate, 'job' => $this->job])
            ->from('career@aerowisatafood.com','Career PT. Aerofood Indonesia')
            ->cc($this->job->createdBy->email, $this->job->createdBy->name);
    }
}
