@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-md-8 justify-content-center text-center">
<form class="form-group" method="post"  action="{{ route('subject_upload')}}">
	{{ csrf_field() }}
	<input type="text" class="form-control" name="course_id" placeholder="Course ID">
	<input type="text" class="form-control" name="department" placeholder="Department">
	<input type="text" class="form-control" name="semester" placeholder="Semester">
	<input type="text" class="form-control" name="extension" placeholder="Extension">
	<input type="text" class="form-control" name="type" placeholder="Type">

	<input type="file" class="form-control" name="file">
	<button class="btn btn-success">Upload</button>
</form> 
</div>
</div>
         
@endsection