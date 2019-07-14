@extends('layouts.app')

@section('content')
   
  <div class="row">
	<div class="col-md-3">

	</div> 
	<div class="col-md-6">
            <h3>SUBJECTS</h3>
            <hr>
            <table class="table table-borderless table-sm">
              <?php foreach ($course as $v_course) { ?>
               <tr>
               <td ><a href="{{URL::to('/show_file/'.$v_course->course_id)}}"><h3>{{$v_course->course_code}}</h3></a></td>
                   
                </tr>
                      
               <?php } ?>
        
           </table>
        


    </div>         
         
@endsection