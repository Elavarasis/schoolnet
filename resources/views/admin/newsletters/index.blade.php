@extends('layouts.admin.newsletter')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Newsletter
        <small>{{ count($subscribers) }} Subscribers</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Newsletter</li>
      </ol>
    </section>
	<!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-md-12">
			@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
			@endif
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
			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#subscribers" data-toggle="tab">Select Subscribers</a></li>
              <li><a href="#compose" data-toggle="tab">Compose Mail</a></li>
            </ul>
			{!! Form::open(array('files'=> true, 'url' => 'admin/newsletters/send/', 'method' => 'post')) !!}
            <div class="tab-content">
              <div class="active tab-pane" id="subscribers">
                <div class="box-body">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>
							  <div class="selectall-cvr">
								<input type="checkbox" class="select-all" id="checkall" style="display:none;">
								<label for="checkall"></label>
							  </div>			
						</th>
						<th>No</th>
						<th>Email</th>
					</tr>
					</thead>
					<tbody>
						{{--*/ $i = 0 /*--}}
						@if(count($subscribers) > 0)
						@foreach ($subscribers as $key => $subscriber)
						<tr>
							<td>
							{!! Form::checkbox('subscribers[]', $subscriber->id, old('subscribers'), ['class' => 'select-single']) !!}
							</td>
							<td>{{ ++$i }}</td>
							<td>{{ $subscriber->nl_email }}</td>
						</tr>
						@endforeach
						@endif
					</tbody>
					<tfoot>
					<tr>
						<th>No</th>
						<th>Email</th>
					</tr>
					</tfoot>
				  </table>
				  
				</div>
              </div>
              
			  <div class="tab-pane" id="compose">
				<div class="box box-primary">
					<div class="box-body">
					  <div class="form-group">
						{!! Form::text('mail_subject', old('mail_subject'), ['placeholder' => 'Subject:', 'class' => 'form-control']) !!}
					  </div>
					  <div class="form-group">
							{!! Form::textarea('mail_content', old('mail_content') ,['class'=>'form-control','id'=>'compose-textarea', 'rows' => 6]) !!}
					  </div>
					  <div class="form-group">
						<div class="btn btn-default btn-file">
						  <i class="fa fa-paperclip"></i> Attachment
						  {!! Form::file('attachment') !!}
						</div>
						<p class="help-block">Max. 32MB</p>
					  </div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
					  <div class="pull-right">
						<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
					  </div>
					  <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
					</div>
					<!-- /.box-footer -->
				  </div>
              </div>
            </div>
			{!! Form::close() !!}
            <!-- /.tab-content -->
          </div>      
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection