@extends('layouts.tenant.datatable')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pay Fee
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
				<h3 class="box-title">Pay Fee</h3>
				<p class="alert alert-success" id="success" style="display:none;"></p>
				<p class="alert alert-danger" id="error" style="display:none;"></p>
				<div class="filter">
					{!! Form::open(array('files'=> true, 'url' => 'tenant/fee/pay_fee', 'method' => 'get')) !!}
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
						<a href="javascript:void(0)" class="btn btn-success pay_batch" style="margin-top:24px;">Make All<br> as Paid</a>
					</div>
					
					<div class="form-group col-md-1">
						<a href="javascript:void(0)" class="btn btn-danger unpay_batch" style="margin-top:24px;">Make All<br> as Unpaid</a>
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
					<th width="350px">Pay Fee</th>
					<!--<th width="250px">Remove Payment</th>-->
                </tr>
                </thead>
                <tbody>
					{{--*/ $count = 0 /*--}}	
					@foreach($students as $key => $stud)
						
						<?php $paid_fee = $unpaid_fee = array(); ?>
						
						@if(count($all_fee) > 0)
							@foreach($all_fee as $key => $fee)
								<?php
								$single_fee = 	DB::table('fee')->where('id',$key)->first();								
								$total_fee	=	$single_fee->fee_amount;
								$paid 		= 	DB::table('fee_paid')->where('fp_user_id',$stud->id)->where('fp_fee_id',$single_fee->id)->sum('fp_amount');
					
								$balance_fee=	$total_fee - $paid;

								if($balance_fee > 0){
									$unpaid_fee[$key]	= $fee;
								} else {
									$paid_fee[$key]	= $fee;
								}	
								?>
							@endforeach
						@endif
						
						<tr>
							<td>{{ ++$count }}</td>
							<td>{{ $stud->st_reg_no }}</td>
							<td>{{ $stud->first_name }} {{ $stud->last_name }}</td>
							<td>{{ $stud->st_class }}</td>
							<td>
							{!! Form::select('single_fee_val', [null=>'Select Fee'] + $unpaid_fee, null, array('class' => 'form-control', 'id' => "single_pay_$stud->id")) !!}
							
							{!! Form::text('fp_amount', null, array('placeholder' => 'Amount','class' => 'form-control', 'id' => "single_amount_$stud->id")) !!}
							
							<a href="javascript:void(0)" class="btn-sm btn-primary single_pay_add" id="btn_{{ $stud->id }}" data-u="{{ $stud->id }}">Paid</a>
							
							<p class="help-block">Amount field blank means full amount paid</p>
							
							</td>
							<!--<td>
							{!! Form::select('single_fee_del', [null=>'Select Fee'] + $paid_fee, null, array('class' => 'form-control', 'id' => "single_del_$stud->id")) !!}
							<a href="javascript:void(0)" class="btn-sm btn-danger single_fee_del" id="btndel_{{ $stud->id }}" data-u="{{ $stud->id }}">Remove</a>
							</td>-->
						</tr>
					@endforeach
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>Reg No</th>
					<th>Name</th>
					<th>Class</th>
					<th>Pay Fee</th>
					<!--<th>Remove Payment</th>-->
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