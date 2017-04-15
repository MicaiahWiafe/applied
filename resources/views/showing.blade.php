@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Showing Now
                </div>
                <div class="panel-body row">
                    <ul class="row" style="list-style: none;">
                        
                        @foreach($movies as $movie)
                            <article>
                                <li class="col-sm-3">
                                    <a href="movie/{{$movie->id}}"><img src="{{$movie->image_url}}" width="113" height="170" alt="Logan">
                                    <h5>
                                        {{$movie->title}}</a>
                                    </h5>
                                </li>
                            </article>
                        @endforeach
                
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

