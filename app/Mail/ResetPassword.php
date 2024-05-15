<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $candidate;
    protected $user;

    public function __construct($candidate, $user)
    {
        $this->candidate = $candidate;
        $this->user = $user;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Request ganti password ".$this->user)
        ->view('email.lupa_password')->with(['candidate' => $this->candidate, 'user' => $this->user])
        ->from('career@aerowisatafood.com','Career PT. Aerofood Indonesia');
        // ->cc($this->user->createdBy->user, $this->user->createdBy->email);
    }
}
