<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Applied extends Mailable
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
        return $this->subject("You've Applied Job: ".$this->job->title)
            ->view('email.applied')->with(['candidate' => $this->candidate, 'job' => $this->job])
            ->from('career@aerowisatafood.com','Career PT. Aerofood Indonesia')
            ->cc($this->job->createdBy->email, $this->job->createdBy->name);
    }
}
