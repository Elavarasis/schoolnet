@extends('layouts.tenant.datatable')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Assign Fee
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
				<h3 class="box-title">Assign Fee</h3>
				<p class="alert alert-success" id="success" style="display:none;"></p>
				<p class="alert alert-danger" id="error" style="display:none;"></p>
				<div class="filter">
					{!! Form::open(array('files'=> true, 'url' => 'tenant/fee/assign_fee', 'method' => 'get')) !!}
						<?php
						$register_number 	= (isset($data['register_number'])) ? $data['register_number'] : '';
						$class			 	= (isset($data['class'])) ? $data['class'] : '';					
						?>
						<div class="form-group col-md-2">
						  <label for=" ">Register Number</label>
						  {!! Form::text('register_number', $register_number, array('class' => 'form-control','id' => 'register_number')) !!}
						</div>
						
						<div class="form-group col-md-2">
						  <label for=" ">Class/Division</label>
						  {!! Form::select('class', [null=>'All'] + $divisions, $class, array('class' => 'form-control','id' => 'class')) !!}
						</div>
						
						<div class="form-group col-md-1">
							<button type="submit" class="btn btn-primary" style="margin-top:24px;">Filter</button>
						</div>
					
					{!! Form::close() !!}
					
					
					@if(count($students) > 0)
					<div class="form-group col-md-4">
					  <label for=" ">Fee</label>
					  {!! Form::select('fee_id', [null=>'Select'] + $all_fee, null, array('class' => 'form-control','id' => 'fee_id')) !!}
					</div>
						
					<div class="form-group col-md-1">
						<a href="javascript:void(0)" class="btn btn-primary add_batch" style="margin-top:24px;">Add to All</a>
					</div>
					
					<div class="form-group col-md-1">
						<a href="javascript:void(0)" class="btn btn-primary remove_batch" style="margin-top:24px;">Remove from All</a>
					</div>
					@endif
					
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
			  
			  @if(count($students) > 0)
              <table id="example1" class="table table-bordered table-striped" style="table-layout:fixed;width:100%;">
                <thead>
                <tr>
					<th>No</th>
					<th>Reg No</th>
					<th>Name</th>
					<th>Class</th>
					<th width="280px">Assign Fee</th>
                </tr>
                </thead>
                <tbody>
					{{--*/ $count = 0 /*--}}	
					@foreach($students as $key => $stud)
						<tr>
							<td>{{ ++$count }}</td>
							<td>{{ $stud->st_reg_no }}</td>
							<td>{{ $stud->first_name }} {{ $stud->last_name }}</td>
							<td>{{ $stud->st_class }}</td>
							<td>
							{!! Form::select('single_fee_val', [null=>'Select'] + $all_fee, null, array('class' => 'form-control', 'id' => "single_fee_$stud->id")) !!}
							<a href="javascript:void(0)" class="btn-sm btn-primary single_fee_id" id="btn_{{ $stud->id }}" data-u="{{ $stud->id }}">Assign</a>
							</td>
						</tr>
					@endforeach
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>Reg No</th>
					<th>Name</th>
					<th>Class</th>
					<th>Assign Fee</th>
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