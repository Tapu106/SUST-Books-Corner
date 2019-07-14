@extends('layouts.app')
@section('content')


<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Course</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Course</h2>	
					</div>
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
						<form class="form-horizontal" action="{{url('/save-course')}}" method="post">
						{{ csrf_field() }} 
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Course Code</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="course_code" required="" >
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
								<label class="control-label" for="selectError3">type name</label>
								<div class="controls">
								  <select id="selectError3" name="course_type_id">
								  	<option>select Type</option>
								  	<?php

                                	$all_type=DB::table('tbl_course_type')
                                			
                                			
                                            ->get();
                                foreach($all_type as $v_type){?>
									<option value="{{$v_type->course_type_id}}">{{$v_type->course_type_name}}</option>
									<?php } ?>
									
								  </select>
								</div>
							  </div>

          
							

							



							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add course</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection