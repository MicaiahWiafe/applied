<?php

namespace Silverbird\Http\Controllers;

use Silverbird\Movie;
use Illuminate\Http\Request;
use Silverbird\Http\Controllers\Controller;

class MovieController extends Controller
{
    /**
     * Create a new movie instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the request...

        $movie = new Flight;

        $movie->name = $request->name;

        $movie->save();
    }
}