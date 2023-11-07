<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ValidUntilMail extends Mailable
{
    use Queueable, SerializesModels;

    public $client;

    public $vehicle;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $vehicle)
    {
        $this->client = $client;
        $this->vehicle = $vehicle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.valid-until')
            ->subject(__('Értesítés műszaki érvényesség lejártáról'))
            ->from(config('mail.from.address'), config('mail.from.name'));
    }


}
