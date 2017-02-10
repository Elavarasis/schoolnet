@extends('layouts.admin.form-general')

@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Widget Management
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Widget Settings</li>
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
					<a class="btn-sm btn-primary" href="{{ route('admin.widgets.index') }}"> Back</a>
				</div>
				<h3 class="box-title">
					Widget Settings
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
            @if(isset($widget))
				{!! Form::model($widget, ['files'=> true, 'method' => 'PATCH','route' => ['admin.widgets.update', $widget->id]]) !!}
			@else
				{!! Form::open(array('files'=> true, 'route' => 'admin.widgets.store','method'=>'POST')) !!}
			@endif
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Text / Script</label>
				  {!! Form::textarea('opt_text',null,['placeholder' => 'Place Text or Script Here','class'=>'form-control', 'rows' => 4]) !!}
                </div>
                
                <div class="form-group">
                  <label for=" ">Image</label>
				  @if(isset($widget))
					<img width="100px" src="{{ URL::to('/') }}/public/images/option/{{$widget->opt_image}}" alt="" />
				  @endif
				  {!! Form::file('opt_image', ['class' => 'form-control']) !!}
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