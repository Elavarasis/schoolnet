<?php $__env->startSection('content'); ?>

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
					<a class="btn-sm btn-primary" href="<?php echo e(route('tenant.fee.index')); ?>"> Back</a>
				</div>
				<h3 class="box-title">
					<?php if(isset($fee)): ?>
						Edit Fee
					<?php else: ?>
						Add New Fee
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
            <?php if(isset($fee)): ?>
				<?php echo Form::model($fee, ['method' => 'PATCH','route' => ['tenant.fee.update', $fee->id]]); ?>

			<?php else: ?>
				<?php echo Form::open(array('route' => 'tenant.fee.store','method'=>'POST')); ?>

			<?php endif; ?>
              <div class="box-body">
				<input type="hidden" name="fee_school_id" value="<?= (isset($school->id)) ? $school->id : 0 ?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Fee Name</label>
                  <?php echo Form::text('fee_name', null, array('placeholder' => 'Fee Name','class' => 'form-control')); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Fee Amount</label>
                  <?php echo Form::text('fee_amount', null, array('placeholder' => 'Fee Amount','class' => 'form-control')); ?>

                </div>
                
                <div class="form-group">
                  <label for=" ">Description</label>
				  <?php echo Form::textarea('fee_description',null,['placeholder' => 'Fee Description','class'=>'form-control', 'rows' => 5]); ?>

                </div>
				
				<div class="checkbox">
                  <label style="width:100px;">Status</label>
                  <?php echo Form::hidden('fee_status', '0'); ?> <!-- checkbox will pass this value when it's not checked -->
				  <?php echo Form::checkbox('fee_status', '1', null, ['class' => 'form-control-block']); ?>

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
<?php echo $__env->make('layouts.tenant.form-general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>