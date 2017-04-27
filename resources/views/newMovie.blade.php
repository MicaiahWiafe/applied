@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">	
		<h3>Add new movie</h3>
		<form action="{{ URL::route('addMovie') }}" method="post" enctype="multipart/form-data">

			<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<!-- Movie Title -->
				<div class="form-group">
					<input name="title" type="text" class="form-control" placeholder="Title"/>
				</div>
				
				<!-- Release Year -->
				<div class="form-group">
					<input name="year" type="number" class="form-control" placeholder="Year"/>
				</div>

				<!-- Genre dropdown -->
				<div class="form-group">Genre:  
					<select name="genre_id">
						<option value='' selected></option>
						<option value='1'>Action</option>
		    			<option value='2'>Adventure</option>
		   				<option value='3'>Comedy</option>
		    			<option value='4'>Nollywood</option>
		    			<option value='5'>Sci-Fi</option>
		    			<option value='6'>Family</option>
		    			<option value='7'>Animation</option>
		    			<option value='8'>Romance</option>
		    			<option value='9'>Thriller</option>
		    		</select>
				</div>

				<!-- Description -->
				<div class="form-group">
					<textarea name="description" class="form-control" placeholder="Write movie synopsis here"></textarea>
				</div>

				<!-- Trailer URL -->
				<div class="form-group">
					<input name="trailer_url" type="text" class="form-control" placeholder="Trailer URL"/>
				</div>

				<!-- Movie poster url -->
				<div class="form-group">
					<input name="image_url" type="text" class="form-control" placeholder="Movie Poster URL"/>
					<!-- Select image to upload:
				    <input type="file" name="fileToUpload" id="fileToUpload"> -->
				    <!-- <input type="submit" value="Upload Image" name="submit"> -->
				</div>

				<!-- Show date -->
				<div class="form-group">
					Date:  <input type="date" name="show_date" id="date" class="hasdatepicker">
				</div>

				<!-- Show time -->
				<div class="form-group">
					Time:  <input type="time" name="show_time">
				</div>

				<!-- submit button -->
				<input type="submit" class="btn btn-primary" />

		</form>
	</div>
@stop