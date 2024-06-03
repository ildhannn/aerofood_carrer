<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Invite extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $candidate;
    protected $job;

    public function __construct($candidate, $job, $user, $info)
    {
        $this->candidate = $candidate;
        $this->job = $job;
        $this->user = $user;
        $this->info = $info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("You Invited for Interview: " . $this->job->title)
            ->view('email.invite')->with(['candidate' => $this->candidate, 'job' => $this->job, 'user' => $this->user, 'info' => $this->info])
            ->from('career@aerowisatafood.com', 'Career PT. Aerofood Indonesia');
        // ->cc($this->job->createdBy->email, $this->job->createdBy->name);
    }
}
