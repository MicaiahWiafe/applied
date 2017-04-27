<?php

namespace App\Http\Controllers;


use Mail;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
use Mailgun\Mailgun;

require base_path('vendor/autoload.php');


class TicketController extends Controller
{

    /**
    * Calling functions 
    **/
    public function main(Request$request){
        //
        $this->qr($request);
        $this->send($request);
        return redirect()->away('https://app.mpowerpayments.com/click2pay-redirect/a13a0fa93b00b511833395c5');

    }


    /**
    * Generate qr code 
    **/
    public function qr(Request $request){
        //

        echo "Preparing your ticket and ";

        $user = Auth::user();
        $id = Auth::id();
        
        $movie_title = $request->movie_title;


        $this->create($request,$user);


        //create svg formated qr code
        $qrcode = new BaconQrCodeGenerator;
        $qrcode->size(500)->generate($user->email.', '.$movie_title, public_path().'/qrcode.svg');

    }







    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
    }

    public function buy(Request $request)
    {

       
         $this->send($request);
        echo "Preparing your ticket";
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $user)
    {
       
        $movie = Movie::findOrFail($request->movie_id);

        $ticket = new Ticket();
        $ticket->email = $user->email;
        $ticket->user_id = $user->id;
        $ticket->active = 1;
        $ticket->movie_id = $movie->id;
        
        $ticket->save();
        // return Redirect::route('viewMovie', array('id'=> $movie->id, ));
    }

    /**
     * Send an e-mail with the ticket to the user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    // public function send(Request $request, $id)
    public function send(Request $request)
    {
        $user = Auth::user();
        

        # Instantiate the client.
        $mgClient = new Mailgun(env('MAILGUN_SECRET'));
        $domain = env('MAILGUN_DOMAIN');

        # Make the call to the client.
        $result = $mgClient->sendMessage($domain, array(
            'from'    => 'Silverbird Tickets <silverbirdticketing@gmail.com>',
            'to'      => $user->email,
            'subject' => 'Hello',
            'text'    => 'Testing some Mailgun awesomness!'
        ),array(
            'inline'  => array(public_path().'/qrcode.svg')
        ));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
