@extends('layouts.app')

@section('content')
   
  <div class="row">
	<div class="col-md-3">

	</div> 
	<div class="col-md-4">
            <h3>DEPARTMENTS</h3>
            <hr>
            <table class="table table-borderless table-sm">
              
               <?php

                 $department=DB::table('tbl_department')
                          
                           ->get();
               foreach($department as $v_department){?>
                 <tr>
               <td ><a href="{{URL::to('/session/'.$v_department->department_id)}}"><h3>{{$v_department->department_name}}</h3></a></td>
                   
                </tr>

        <?php } ?>

           </table>

    </div>         
         
@endsection