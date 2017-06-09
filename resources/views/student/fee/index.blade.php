@extends('layouts.admin.datatable')

@section('content')
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Fee
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
				<h3 class="box-title">List of all Fee</h3>
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
					<th>Fee Name</th>
					<th>Amount</th>
					<th>Description</th>
                    <th>Amount Paid</th>
                    <th>Pending Amount</th>
					<th>Status</th>
                </tr>
                </thead>
                <tbody>
					{{--*/ $i = 0 /*--}}
                    @if(isset($fee_students))
                      @foreach ($fee_students as $key => $fee_student)
                          @if($fee_student->get_fee->fee_status == 1)
                              {{--*/ $amount_paid = 0 /*--}}
                              {{--*/ $pending = '' /*--}}
                              @foreach($fee_student->get_paid_fee as $paid_fee)
                                  @if($fee_student->fs_fee_id == $paid_fee->fp_fee_id)
                                      {{--*/ $amount_paid = $amount_paid + $paid_fee->fp_amount /*--}}
                                  @endif
                              @endforeach
                              {{--*/ $pending = $fee_student->get_fee->fee_amount - $amount_paid /*--}}
                              <tr>
                                  <td>{{ ++$i }}</td>
                                  <td>{{ $fee_student->get_fee->fee_name }}</td>
                                  <td>{{ $fee_student->get_fee->fee_amount }}</td>
                                  <td>{{ $fee_student->get_fee->fee_description }}</td>
                                  <td>{{ $amount_paid }}</td></td>
                                  <td>{{ $pending }}</td></td>
                                  <td>
                                      @if($amount_paid >= $fee_student->get_fee->fee_amount)
                                          <span class="btn-xs btn-success">Paid</span>
                                      @else
                                          <span class="btn-xs btn-danger">Pending</span>
                                      @endif
                                  </td>

                              </tr>
                          @endif
                      @endforeach
                    @endif
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>Fee Name</th>
					<th>Amount</th>
					<th>Description</th>
					<th>Status</th>
					<th width="150px">Action</th>
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