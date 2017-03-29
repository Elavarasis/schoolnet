<?php $__env->startSection('content'); ?>

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Apply for Leave
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Add New Leave</li>
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
					<a class="btn-sm btn-primary" href="<?php echo e(route('stud.leaves.index')); ?>"> Back</a>
				</div>
				<h3 class="box-title">
					<?php if(isset($event)): ?>
						Edit Leave
					<?php else: ?>
						Apply New Leave
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
            <?php if(isset($leave)): ?>
				<?php echo Form::model($leave, ['files'=> true, 'method' => 'PATCH','route' => ['stud.leaves.update', $leave->id]]); ?>

			<?php else: ?>
				<?php echo Form::open(array('files'=> true, 'route' => 'stud.leaves.store','method'=>'POST')); ?>

			<?php endif; ?>
              <div class="box-body">
                <div class="form-group">
                  <label for=" ">Total Days/Hours</label>
                  <?php echo Form::text('lv_totaldays', null, array('placeholder' => 'Total Days/Hours','class' => 'form-control')); ?>

                </div>
				
				<div class="row">
					<div class="form-group col-md-6">
					  <label for=" ">From</label>
					  <?php echo Form::text('lv_start_date', null, array('readonly' =>'true','placeholder' => 'mm/dd/yyyy','class' => 'form-control dt_date_start')); ?>

					</div>
					
					<div class="form-group col-md-6">
					  <label for=" ">&nbsp;</label>
					  <?php echo Form::text('lv_start_time', null, array('placeholder' => 'Start Time','class' => 'form-control dt_time_start')); ?>

					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-6">
					  <label for=" ">To</label>
					  <?php echo Form::text('lv_end_date', null, array('readonly' =>'true','placeholder' => 'mm/dd/yyyy','class' => 'form-control dt_date_end')); ?>

					</div>
					
					<div class="form-group col-md-6">
					  <label for=" ">&nbsp;</label>
					  <?php echo Form::text('lv_end_time', null, array('placeholder' => 'End Time','class' => 'form-control dt_time_end')); ?>

					</div>
				</div>
				
				<div class="form-group">
                  <label for=" ">Reason</label>
				  <?php echo Form::textarea('lv_reason',null,['placeholder' => 'Reason for Leave','class'=>'form-control', 'rows' => 7]); ?>

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