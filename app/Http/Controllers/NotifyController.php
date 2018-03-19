<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Session;


class NotifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.notify.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.notify.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $sub = $request->get('subject');
        $msg = $request->get('msg');
        $participants = \App\Admin\participants::select('PartiName','PartiEmail')->get();
        $participants = $participants->toArray();
        // $email ;
        // $name ;
        // $i=0;
        //
        // foreach($participants as $participant)
        //   {
        //     $email[$i] = $participant->PartiEmail;
        //     $name[$i] = $participant->PartiName;
        //     $i++;
        //   }

          // dd($email,$name);
          foreach($participants as $participant)
            {
              $participant['msg'] = $msg;
              $participant['sub'] = $sub;
          //  $data = array('name' => $participant->PartiName,'email' => $participant->PartiEmail);

          // Log::info("Request Cycle with Queues Begins");
        // dispatch(new SendWelcomeEmail());

          // $this->dispatch(new SendEmail($participant));

           Mail::to($participant['PartiEmail'])->queue(new WelcomeMail($participant['PartiName'],$participant['msg'],$participant['sub']));

          // Log::info("Request Cycle with Queues Ends");



  //         Mail::mail('admin.notify.mail.email', $participant, function($message) use ($participant) {
  //    $message->to($participant['PartiEmail'])->subject($participant['sub']);
  //    $message->from('shivampandeyusa15@gmail.com','Shivam');
  //
  // });
          // dd($s);
        }

          // dd("Mail Sent successfully");
          Session::flash('success_msg','Emails added to the queue. Will be sent Shortly');
           return redirect('/admin/notify');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
