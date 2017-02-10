@extends('layouts.admin.datatable')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payment Settings
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
				<div class="pull-right">
					<!--<a class="btn btn-success" href="{{ route('admin.payments.create') }}">Add New</a>-->
				</div>
				<h3 class="box-title">List of Payment Methods</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			  @if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>No</th>
					<th>Logo</th>
					<th>Payment Method</th>
					<th>Status</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
					{{--*/ $i = 0 /*--}}
					@foreach ($payment_methods as $key => $payment)
					<tr>
						<td>{{ ++$i }}</td>
						<td><img width="50px" src="{{ URL::to('/') }}/public/images/option/{{$payment->opt_image}}" alt="" /></td>
						<td>{{ $payment->opt_text }}</td>
						<td>
							@if($payment->opt_status == 1)
								<span class="btn-xs btn-success">Active</a>
							@else
								<span class="btn-xs btn-danger">In-Active</a>
							@endif
						</td>
						<td>
							<a class="btn btn-primary" href="{{ route('admin.payments.edit',$payment->id) }}">Edit</a>
						</td>
					</tr>
					@endforeach
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>Logo</th>
					<th>Payment Method</th>
					<th>Status</th>
					<th>Action</th>
                </tr>
                </tfoot>
              </table>
			  
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