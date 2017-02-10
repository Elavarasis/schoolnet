@extends('layouts.admin.form-general')

@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ad Management
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
					<a class="btn-sm btn-primary" href="{{ route('admin.adverts.index') }}"> Back</a>
				</div>
				<h3 class="box-title">
					@if(isset($advert))
						Edit Ad
					@else
						Add New Ad
					@endif
				</h3>
            </div>
            <!-- /.box-header -->
			
			@if (count($errors) > 0)

				<div class="alert alert-danger">

					<strong>Whoops!</strong> There were some problems with your input.<br><br>

					<ul>

						@foreach ($errors->all() as $error)

							<li>{{ $error }}</li>

						@endforeach

					</ul>

				</div>

			@endif
			
            <!-- form start -->
            @if(isset($advert))
				{!! Form::model($advert, ['files'=> true, 'method' => 'PATCH','route' => ['admin.adverts.update', $advert->id]]) !!}
			@else
				{!! Form::open(array('files'=> true, 'route' => 'admin.adverts.store','method'=>'POST')) !!}
			@endif
              <div class="box-body">                
                <div class="form-group">
                  <label for=" ">Image</label>
				  @if(isset($advert))
					<img width="100px" src="{{ URL::to('/') }}/public/images/option/{{$advert->opt_image}}" alt="" />
				  @endif
				  {!! Form::file('opt_image', ['class' => 'form-control']) !!}
				  <p class="help-block">Max 2MB, please compress the image before you upload for better site performance</p>
                </div>
				
				<div class="checkbox">
                  <label style="width:100px;">Status</label>
                  {!! Form::hidden('opt_status', '0') !!} <!-- checkbox will pass this value when it's not checked -->
				  {!! Form::checkbox('opt_status', '1', null, ['class' => 'form-control-block']) !!}
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            {!! Form::close() !!}
          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection