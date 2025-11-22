<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SellerStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $seller;
    public $status;
    public $password;
    public $reason;

    public function __construct($seller, $status, $password = null, $reason = null)
    {
        $this->seller = $seller;
        $this->status = $status;
        $this->password = $password;
        $this->reason = $reason;
    }

    public function build()
    {
        return $this->subject('Status Pengajuan Penjual')
                    ->view('emails.seller-status');
    }
}
