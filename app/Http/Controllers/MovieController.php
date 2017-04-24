<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('showing', ['movies' => Movie::all() ] );
    }

    /**
     * Create a new movie instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the request...

        $movie = new Movie;

        $movie->name = $request->name;

        $movie->save();
    }

    public function newMovie()
    {
        return View('newMovie');
    }

    public function addMovie(Request $request)
    {
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->genre_id = $request->genre_id;
        $movie->year = $request->year;
        $movie->trailer_url = $request->trailer_url;
        $movie->image_url = $request->image_url;
        $movie->description = nl2br($request->description);
        $movie->show_date = $request->show_date;
        $movie->show_time = $request->show_time;

        $target_dir = public_path(). "/img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        $movie->save();
        return Redirect::route('viewMovie', array('id'=> $movie->id));
    }

    public function viewMovie($id)
    {
        $movie = Movie::findOrFail($id);

        return View('viewMovie', ['movie' => $movie]);
    }

}