<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\UserAddress;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;


class PlaceOrderMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $cartItems;
    public $userAddress;
    public $total;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $cartItems , UserAddress $userAddress  , $total)
    {
        $this->cartItems = $cartItems;
        $this->userAddress = $userAddress;
        $this->total = $total;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('mohammedmahmmoud05@gmail.com', 'MohamedMahmoud'),
            subject: 'HR Interview scheduled',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.order'
        );

    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
