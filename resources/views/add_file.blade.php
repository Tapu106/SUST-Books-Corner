@extends('layouts.app')
@section('content')


<!-- <ul class="breadcrumb">
				<li>
					<i class="col-md-6"></i>
					<a>Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<div class=""></i>
					<h3>Add File</h3>
				</li>
			</ul>
 -->			
 <div class="row">
	<div class="col-md-3">

	</div>

			<div class="col-md-6">
				<h2>Add File</h2>	
					
					<p class="alert-success" >
						<?php
						$message=Session::get('message');
					
						if ($message) {
							echo $message;
							Session::put('message',NULL);
						}

						?> 

					</p>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/save-file')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }} 
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">file name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="file_name" required="" >
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Department name</label>
								<div class="controls">
								  <select id="selectError3" name="department_id">
								  	<option>select department</option>
								  	<?php

                                	$all_department=DB::table('tbl_department')
                                                        ->get();
                                    
                                foreach($all_department as $v_department){?>
									<option value="{{$v_department->department_id}}">{{$v_department->department_name}}</option>
									<?php } ?>
									
								  </select>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="selectError3">semester name</label>
								<div class="controls">
								  <select id="selectError3" name="semester_id">
								  	<option>select semester</option>
								  	<?php

                                	$all_semester=DB::table('tbl_semester')
                                			
                                			
                                            ->get();
                                foreach($all_semester as $v_semester){?>
									<option value="{{$v_semester->semester_id}}">{{$v_semester->semester_name}}</option>
									<?php } ?>
									
								  </select>
								</div>
							  </div>

							   <div class="control-group">
								<label class="control-label" for="selectError3">Course code</label>
								<div class="controls">
								  <select id="selectError3" name="course_id">
								  	<option>select course code</option>
								  	<?php

                                	$all_course=DB::table('course_info')	
                                            		->get();
                                foreach($all_course as $v_course){?>
									<option value="{{$v_course->course_id}}">{{$v_course->course_code}}</option>
									<?php } ?>
									
								  </select>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="selectError3">Course type</label>
								<div class="controls">
								  <select id="selectError3" name="course_type_id">
								  	<option>select course type</option>
								  	<?php

                                	$all_course_type=DB::table('tbl_course_type')	
                                            		->get();
                                foreach($all_course_type as $v_course_type){?>
									<option value="{{$v_course_type->course_type_id}}">{{$v_course_type->course_type_name}}</option>
									<?php } ?>
									
								  </select>
								</div>
							  </div>

								<div class="control-group">
							  <label class="control-label" for="fileInput">file</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="file_any" id="fileInput" type="file" required="">
							  </div>
							</div>
          
							

							



							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add course</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				<!--/span-->

			</div><!--/row-->

@endsection