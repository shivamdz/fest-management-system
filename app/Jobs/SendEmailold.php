<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Mail\Mailer;
use App\Mail\WelcomeMail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $name;
    private $email;
    private $sub;
    private $msg;



    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($participant)
    {
        //
        $this->name = $participant['PartiName'];
        $this->email = $participant['PartiEmail'];
        $this->sub = $participant['sub'];
        $this->msg = $participant['msg'];
          //  dd($this->name);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
          //  dd($participant);
        // Mail::mail('admin.notify.mail.email', $participant, function($message) use ($participant) {
        //        $message->to($participant['PartiEmail'])->subject($participant['sub']);
        //        $message->from('shivampandeyusa15@gmail.com','Shivam');
        //
        //   });


    }
}
