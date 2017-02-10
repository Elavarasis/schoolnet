@extends('layouts.admin.form-general')

@section('content')
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
				<div class="pull-right">
					<a class="btn-sm btn-primary" href="{{ route('admin.cities.index') }}"> Back</a>
				</div>
				<h3 class="box-title">City Details</h3>
            </div>
            <!-- /.box-header -->

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">City Name:</label>
                  {{ $city->city_name }} 
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Country:</label>
                  {{ $city->get_country->country }}
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">State:</label>
                  {{ $city->get_state->name }}
                </div>
				
				<div class="form-group">
                  <label>Status:</label>
					@if ( $city->status == 1 )
						<span class="btn-xs btn-success">Active</a>
					@else
						<span class="btn-xs btn-danger">In-Active</a>
					@endif
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            
          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection