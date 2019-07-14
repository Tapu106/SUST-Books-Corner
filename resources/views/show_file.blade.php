@extends('layouts.app')

@section('content')



	<div class="col-md-6">
            <h3>Files</h3>
            <hr>
            <table class="table table-borderless table-sm">
                <?php foreach ($file as $v_file) { ?>
               <tr>
               <td ><a href="" download="{{$v_file->file}}"><h3>{{$v_file->file_name}}</h3></a></td>
                   
                </tr>
        <?php } ?>
           </table>

    </div>  
          


@endsection