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
    protected $email;
    protected $id;

    public function __construct($candidate, $email, $id)
    {
        $this->candidate = $candidate;
        $this->email = $email;
        $this->id = $id;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Request ganti password ".$this->email)
        ->view('email.lupa_password')->with(['candidate' => $this->candidate, 'email' => $this->email, 'id' => $this->id])
        ->from('career@aerowisatafood.com','Career PT. Aerofood Indonesia');
        // ->cc($this->user->createdBy->user, $this->user->createdBy->email);
    }
}
