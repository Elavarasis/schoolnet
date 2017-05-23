@extends('layouts.admin.datatable')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Marks
        <small>Settings</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
				<h3 class="box-title">Manage Marks</h3>
				<div class="filter">
					{!! Form::open(array('files'=> true, 'url' => 'stud/marks/search', 'method' => 'get')) !!}
						<?php
						$register_number 	= (isset($data['register_number'])) ? $data['register_number'] : '';
						$month 				= (isset($data['month'])) ? $data['month'] : '';
						$year 				= (isset($data['year'])) ? $data['year'] : '';
						$class			 	= (isset($data['class'])) ? $data['class'] : '';
						$exam_name 			= (isset($data['exam_name'])) ? $data['exam_name'] : '';						
						?>
						<div class="form-group col-md-2">
						  <label for=" ">Register Number</label>
						  <datalist id="reg_numbers">
							@if(count($students) > 0)
								@foreach ($students as $key => $student)
									<option value="{{ $student->st_reg_no }}">
								@endforeach;							
							@endif
						  </datalist>
  
						  {!! Form::text('register_number', $register_number, array('placeholder' => 'Student Register Number','class' => 'form-control', 'list' => 'reg_numbers')) !!}
						</div>
						
						<div class="form-group col-md-2">
						  <label for=" ">Month</label>
						  <?php 
						  $months = array(); 
						  for($i=1;$i<13;$i++)
							$months[$i] = date('F',strtotime('01.'.$i.'.2001'));
						  ?>
						  {!! Form::select('month', [null=>'Select'] + $months, $month, array('class' => 'form-control')) !!}
						</div>
						
						<div class="form-group col-md-2">
						  <label for=" ">Year</label>
						  <?php 
						  $months = array(); 
						  for($i= date('Y')-5;$i <= date('Y'); $i++)
							$years[$i] = $i;
						  ?>
						  {!! Form::select('year', [null=>'Select'] + $years, $year, array('class' => 'form-control')) !!}
						</div>
						
						<div class="form-group col-md-2">
						  <label for=" ">Class/Division</label>
						  {!! Form::select('class', [null=>'Select'] + $divisions, $class, array('class' => 'form-control')) !!}
						</div>
						
						<div class="form-group col-md-2">
						  <label for=" ">Exam Name</label>
						  <?php $exam_name_array = array(); ?>
						  @if(count($exam_names) > 0)
								@foreach ($exam_names as $key => $exam)
									<?php $exam_name_array[$exam->mrk_exam_name] = $exam->mrk_exam_name; ?>
								@endforeach;							
						  @endif
						  {!! Form::select('exam_name', [null=>'Select'] + $exam_name_array, $exam_name, array('class' => 'form-control')) !!}
						</div>
						
						<div class="form-group col-md-1">
							<button type="submit" class="btn btn-primary" style="margin-top:24px;">Search</button>
						</div>
						
						<div class="form-group col-md-1">
							<a class="btn btn-primary" href="{{ url('stud/marks/export') }}?<?= $_SERVER['QUERY_STRING'] ?>" style="margin-top:24px;">Export</a>
						</div>
					
					{!! Form::close() !!}
				</div>
				
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			  @if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			  @endif
			  @if ($message = Session::get('error'))
				<div class="alert alert-danger">
					<p>{{ $message }}</p>
				</div>
			  @endif
			  
			  @if(count($marks) > 0)
              <table id="example1" class="table table-bordered table-striped" style="table-layout:fixed;width:100%;">
                <thead>
                <tr>
					<th>No</th>
					<th>Reg No</th>
					<th>Name</th>
					<th>Class</th>
					<th>Month & Year</th>
					<th>Exam</th>
					<th>Subject</th>
					<th>Total Mark</th>
					<th>Pass Mark</th>
					<th>Mark Got</th>
                </tr>
                </thead>
                <tbody>
					{{--*/ $count = 0 /*--}}
					@foreach($marks as $key => $mark)
						<tr>
							<td>{{ ++$count }}</td>
							<td>{{ $mark->st_reg_no }}</td>
							<td>{{ $mark->first_name }} {{ $mark->last_name }}</td>
							<td>{{ $mark->st_class }}</td>
							<td>
								<?php $date = explode('-',$mark->mrk_date); ?>
								{{ date('F',strtotime('01.'.$date[1].'.2001')) }} - {{ $date[0] }}
							</td>
							<td>{{ $mark->mrk_exam_name }}</td>
							<td>{{ $mark->mrk_subject }}</td>
							<td>{{ $mark->mrk_total_mark }}</td>
							<td>{{ $mark->mrk_pass_mark }}</td>
							<td>{{ $mark->mrk_mark_got }}</td>
						</tr>
					@endforeach
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>Reg No</th>
					<th>Name</th>
					<th>Class</th>
					<th>Month & Year</th>
					<th>Exam</th>
					<th>Subject</th>
					<th>Total Mark</th>
					<th>Pass Mark</th>
					<th>Mark Got</th>
                </tr>
                </tfoot>
              </table>
			  @endif
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

<script>
  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }
</script>