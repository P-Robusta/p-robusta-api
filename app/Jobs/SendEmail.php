<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $cv;
    protected $coverLetter;
    protected $template;
    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->data['email'])->send(new MailNotify($this->data, $this->cv, $this->coverLetter, $this->template));
    }
}
