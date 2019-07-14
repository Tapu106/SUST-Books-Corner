@extends('layouts.app')

@section('content')
   
  <div class="row">
	<div class="col-md-3">

	</div> 
	<div class="col-md-4">
            <h3>SUBJECTS</h3>
            <hr>
            <table class="table table-borderless table-sm">
              <?php foreach ($type as $v_type) { ?>
               <tr>
               <td ><a href="{{URL::to('/subject/'.$v_type->course_type_id)}}"><h3>{{$v_type->course_type_name}}</h3></a></td>
                   
                </tr>
              <?php } ?>       
           </table>
        


    </div>         
         
@endsection