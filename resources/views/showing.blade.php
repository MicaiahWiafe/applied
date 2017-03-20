@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Showing Now</div>

                <div class="panel-body">
                    <img src="img/Logan_small.jpg">
                    {{ HTML::image('img/Logan_small.jpg') }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
