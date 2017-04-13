@extends('layouts.app')

@section('content')
	<article>
		<header>
			<h1></h1>
		</header>

			<div class="container">
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
			                			<!-- Buy ticket button -->
										<input type="submit" class="btn btn-primary" value="Purchase Ticket">
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