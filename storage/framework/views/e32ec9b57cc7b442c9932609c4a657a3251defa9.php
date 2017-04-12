<?php $__env->startSection('content'); ?>

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Event
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Add New Event</li>
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
					<a class="btn-sm btn-primary" href="<?php echo e(route('admin.events.index')); ?>"> Back</a>
				</div>
				<h3 class="box-title">
					<?php if(isset($event)): ?>
						Edit Event
					<?php else: ?>
						Add New Event
					<?php endif; ?>
				</h3>
            </div>
            <!-- /.box-header -->
			
			<?php if(count($errors) > 0): ?>
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						<?php foreach($errors->all() as $error): ?>
							<li><?php echo e($error); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
			
            <!-- form start -->
            <?php if(isset($event)): ?>
				<?php echo Form::model($event, ['files'=> true, 'method' => 'PATCH','route' => ['admin.events.update', $event->id]]); ?>

				<?php /**/ $event->event_startDate = date("d/m/Y", strtotime($event->event_startDate) ) /**/ ?>
				<?php /**/ $event->event_endDate = date("d/m/Y", strtotime($event->event_endDate) ) /**/ ?>
			<?php else: ?>
				<?php echo Form::open(array('files'=> true, 'route' => 'admin.events.store','method'=>'POST')); ?>

			<?php endif; ?>
              <div class="box-body">
                <div class="form-group">
                  <label for=" ">Name <span>*</span></label>
                  <?php echo Form::text('event_name', null, array('placeholder' => 'Event Name','class' => 'form-control')); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">Description</label>
				  <?php echo Form::textarea('event_description',null,['placeholder' => 'Event Description','class'=>'form-control', 'rows' => 5]); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">School</label>
                  <?php echo Form::select('event_school_id', $schools, null, array('class' => 'form-control', 'id' => 'school_id')); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">Venue</label>
                  <?php echo Form::text('event_venue', null, array('placeholder' => 'Event Venue','class' => 'form-control')); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">Start Date</label>
                  <?php echo Form::text('event_startDate', null, array('placeholder' => 'Event Start Date','class' => 'form-control','id' => 'start_date')); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">End Date</label>
                  <?php echo Form::text('event_endDate', null, array('placeholder' => 'Event End Date','class' => 'form-control','id' => 'end_date')); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">Image</label>
				  <?php if(isset($event)): ?>
					<img width="100px" src="<?php echo e(URL::to('/')); ?>/public/images/event/medium--<?php echo e($event->event_image); ?>" alt="" />
				  <?php endif; ?>
				  <?php echo Form::file('event_image', ['class' => 'form-control']); ?>

                </div>
				
				<div class="checkbox">
                  <label style="width:100px;">Status</label>
                  <?php echo Form::hidden('event_status', '0'); ?> <!-- checkbox will pass this value when it's not checked -->
				  <?php echo Form::checkbox('event_status', '1', null, ['class' => 'form-control-block']); ?>

                </div>
				
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            <?php echo Form::close(); ?>

          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.form-general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>