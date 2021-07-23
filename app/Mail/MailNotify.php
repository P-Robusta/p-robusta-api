<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $cv;
    public $coverLetter;
    public $template;
    /**
     * Create a new data instance.
     *
     * @return void
     */

    public function __construct($data, $cv, $coverLetter, $template)
    {
        $this->data = $data;
        $this->cv = $cv;
        $this->coverLetter = $coverLetter;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->cv != null) {
            return $this->from('ero.vietnam@passerellesnumeriques.org')
                ->view('mails.' . $this->template)
                ->subject($this->data['subject'])
                ->cc('huy.nguyen22@student.passerellesnumeriques.org')
                ->attach($this->cv)
                ->attach($this->coverLetter);
        } else {
            return $this->from('ero.vietnam@passerellesnumeriques.org')
                ->view('mails.' . $this->template)
                ->cc('huy.nguyen22@student.passerellesnumeriques.org')
                ->subject($this->data['subject']);
        }
    }
}
