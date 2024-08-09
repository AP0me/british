<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $first_name;
    public $last_name;
    public $email;
    public $mobile;
    public $branch;

    /**
     * Create a new user_message instance.
     *
     * @return void
     */
    public function __construct( $first_name, $last_name, $email, $mobile, $branch )
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->branch = $branch;
    }

    /**
     * Build the user_message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact')
        ->with([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'branch' => $this->branch,
        ]);
    }
}
