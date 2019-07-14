@extends('layouts.app')

@section('content')
   
  <div class="row">
	<div class="col-md-3">

	</div> 
	<div class="col-md-6">
            <h3>SMESTERS</h3>
            <hr>
            <table class="table table-borderless table-sm">
                <?php foreach ($semester as $v_semester) { ?>
                
               <tr>
                <td ><a href="{{URL::to('/type/'.$v_semester->semester_id)}}"><h3>{{$v_semester->semester_name}}</h3></a></td>
                   
                </tr>
              <?php } ?>
             
           </table>
        


    </div>         
         
@endsection