@extends('layouts.app')

@section('content')
	<article>
		<header>
			<h1></h1>
		</header>

			<div class="container">
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			    <div >
			            <div class="panel panel-default">
			                <div class="panel-heading" style="text-transform: uppercase;">
			                	<div class="row">
			                		<div class="col-sm-1">
			                			<!-- Title and year -->
			                			<strong>{{ $movie->title }}</strong>
			                			({{$movie->year}})
			                		</div>
			                		<div class="col-sm-9 pull-right">
			                			
			                			<!-- Purchase ticket button -->
			                			<form action="https://app.mpowerpayments.com/click2pay-redirect/a13a0fa93b00b511833395c5">
											<input type="submit" class="btn btn-primary" value="Purchase Ticket">
										</form>
										
										<form action="{{ URL::route('buy') }}" method="post" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="movie_id" value="{{ $movie->id }}">
											<input type="hidden" name="movie_title" value="{{ $movie->title }}">

											<input type="submit" class="btn btn-primary" value="qr test">
										</form>

										<form action="{{ URL::route('send') }}" method="get" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="movie_id" value="{{ $movie->id }}">
											<input type="hidden" name="movie_title" value="{{ $movie->title }}">

											<input type="submit" class="btn btn-primary" value="email">
										</form>
			                		</div>
			                	</div>
			                </div>

			                <div class="panel-body">
								<div class="row">
									<div class="col-sm-3 col-sm-offset-1">
										<img src="{{ $movie->image_url }}" alt="{{$movie->title}}" height="170" width="113">
									</div>
									<div class="col-sm-5 ">
										Showing: {{$movie->show_date}} {{$movie->show_time}}<br>
										About the film:<br>{{ $movie->description}}
									</div>

								</div>
							</div>
						</div>
				</div>
				

				<div>
					
				</div>
			</div>

		<footer>

		</footer>
	</article>
@stop