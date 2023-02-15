<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;
    private $data = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)   
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('zon.sensei.th@gmail.com', 'ZENZOU-SHOP') 
        ->subject($this->data['subject'])
        ->view('pages.auth.email-template')->with("data",$this->data);
    }
}

// ขอรหัสได้ที่ 
//https://www.cambotutorial.com/article/solved-gmail-smtp-less-secure-app-no-longer-support?ref=youtube.com
//เพื่อไปใส่ในหน้า .env