@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-3">

	</div> 
	<div class="col-md-6">
            <h3>About Me</h3>
            <hr>
            <table class="table table-borderless table-sm">
                <tr>
                    <td>Name</td>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td class="text-capitalize">{{$user->gender}}</td>
                </tr>
                <tr>
                    <td>Date Of Birth</td>
                    <td class="text-capitalize">{{date('d M Y', strtotime($user->date_of_birth))}}</td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td>{{$user->contact_number}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <td>Department</td>
                    <td>{{$user->department}}</td>
                </tr>
            </table>
        </div>	
</div>

@endsection