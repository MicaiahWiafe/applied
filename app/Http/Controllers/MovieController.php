<?php

namespace App\Http\Controllers;

use App\Movie;
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
        return View('showing', ['movies' => Movie::all()]);
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

        $movie->save();
        return Redirect::route('viewMovie', array('id'=> $movie->id));
    }

    public function viewMovie($id)
    {
        $movie = Movie::findOrFail($id);

        return View('viewMovie', ['movie' => $movie]);
    }

}