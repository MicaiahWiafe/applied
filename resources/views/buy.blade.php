@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">	
		<h3>Generating ticket</h3>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<form action="{{ URL::route('buy') }}" method="post" enctype="multipart/form-data">
		</form>
	</div>
@stop