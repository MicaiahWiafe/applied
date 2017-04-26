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

class TicketController extends Controller
{

    /**
    * Testing functions 
    **/
    public function test(Request $request){
        //

        echo "Preparing your ticket";

        $user = Auth::user();
        $id = Auth::id();
        echo $id;
        echo $request->user();

        echo $movie_title = $request->movie_title;


        $this->create($request,$user);


        //create svg formated qr code
        $qrcode = new BaconQrCodeGenerator;
        $qrcode->size(500)->generate('Make a qrcode without Laravel!', public_path().'/qrcode.svg');



        //write png qr file to public folder
        // $renderer = new \BaconQrCode\Renderer\Image\Png();
        // $renderer->setHeight(256);
        // $renderer->setWidth(256);
        // $writer = new \BaconQrCode\Writer($renderer);
        // $writer->writeFile('Name:'.$user->name.', Movie:'.$movie_title, 'qrcode.png');
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

        // {{ csrf_token()}};
         // $user = User::findOrFail($user_id);
        // $this->create($user);
         $this->send($request);
        echo "Preparing your ticket";
        // return Redirect::to('https://www.dropbox.com');
         // header('Location : https://www.dropbox.com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $user)
    {
        // build raw content - QRCode to send email, basic 
         
        // $tempDir = EXAMPLE_TMP_SERVERPATH; 
         
        // // here our data 
        // // $email = $user->email; 
        // $email='micaiahwiafe@gmail.com';
        // $subject = 'Movie Ticket'; 
        // $body = 'Here is your Ticket'; 
         
        // // we building raw data 
        // $codeContents = 'mailto:'.$email; 
         
        // // generating 
        // QRcode::png($codeContents, $tempDir.'022.png', QR_ECLEVEL_L, 3); 
        
        // // displaying 
        // echo '<img src="'.EXAMPLE_TMP_URLRELPATH.'022.png" />'; 




        // Configuring SVG 
     
        // $dataText   = 'PHP QR Code :)'; 
        // $svgTagId   = 'id-of-svg'; 
        // $saveToFile = false; 
        // $imageWidth = 250; // px 
         
        // // SVG file format support 
        // $svgCode = QRcode::svg($dataText, $svgTagId, $saveToFile, QR_ECLEVEL_L, $imageWidth); 
         
        // echo $svgCode; 





        // outputs image directly into browser, as PNG stream 
        // $qr = {!! QrCode::size(100)->generate(Request::url()); !!}

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
        Mail::send('buy', ['user' => $user], function ($m) use ($user) {
            $m->from('silverbirdticketing@gmail.com', 'Silverbird Ticketing');

            $m->to($user->email, $user->name)->subject('Your Ticket');
        });
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
