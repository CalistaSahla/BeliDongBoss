<?php

namespace App\Mail;

use App\Models\Seller;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SellerRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $seller;

    public function __construct(Seller $seller)
    {
        $this->seller = $seller;
    }

    public function build()
    {
        return $this->subject('Pendaftaran Penjual Baru')
                    ->view('emails.seller-registered');
    }
}
