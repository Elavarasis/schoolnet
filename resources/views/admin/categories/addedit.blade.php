@extends('layouts.admin.form-general')

@section('content')

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Category
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Add New Category</li>
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
					<a class="btn-sm btn-primary" href="{{ route('admin.categories.index') }}"> Back</a>
				</div>
				<h3 class="box-title">
					@if(isset($category))
						Edit Category
					@else
						Add New Category
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
            @if(isset($category))
				{!! Form::model($category, ['files'=> true, 'method' => 'PATCH','route' => ['admin.categories.update', $category->id]]) !!}
			@else
				{!! Form::open(array('files'=> true, 'route' => 'admin.categories.store','method'=>'POST')) !!}
			@endif
              <div class="box-body">
                <div class="form-group">
                  <label for=" ">Name <span>*</span></label>
                  {!! Form::text('cat_name', null, array('placeholder' => 'Category Name','class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Slug</label>
                  {!! Form::text('cat_slug', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
				  <p class="help-block">Unique identifier without space/capital letters (optional)</p>
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Parent</label>
                  {!! Form::select('cat_parent', $categories, null, array('class' => 'form-control')) !!}
                </div>
				
				<div class="form-group">
                  <label for=" ">Image</label>
				  @if(isset($category))
					<img width="100px" src="{{ URL::to('/') }}/public/images/category/medium--{{$category->cat_image}}" alt="" />
				  @endif
				  {!! Form::file('cat_image', ['class' => 'form-control']) !!}
                </div>
				
				<div class="checkbox">
                  <label style="width:100px;">Status</label>
                  {!! Form::hidden('cat_status', '0') !!} <!-- checkbox will pass this value when it's not checked -->
				  {!! Form::checkbox('cat_status', '1', null, ['class' => 'form-control-block']) !!}
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