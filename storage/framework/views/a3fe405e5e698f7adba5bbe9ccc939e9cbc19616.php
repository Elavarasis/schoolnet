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
					<a class="btn-sm btn-primary" href="<?php echo e(route('admin.payments.index')); ?>"> Back</a>
				</div>
				<h3 class="box-title">
					Payment Settings
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
            <?php if(isset($payment)): ?>
				<?php echo Form::model($payment, ['files'=> true, 'method' => 'PATCH','route' => ['admin.payments.update', $payment->id]]); ?>

			<?php else: ?>
				<?php echo Form::open(array('files'=> true, 'route' => 'admin.payments.store','method'=>'POST')); ?>

			<?php endif; ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Payment Name</label>
                  <?php echo Form::text('opt_text', null, array('placeholder' => 'Payment Name','class' => 'form-control')); ?>

                </div>
                
                <div class="form-group">
                  <label for=" ">Logo</label>
				  <?php if(isset($payment)): ?>
					<img width="100px" src="<?php echo e(URL::to('/')); ?>/public/images/option/<?php echo e($payment->opt_image); ?>" alt="" />
				  <?php endif; ?>
				  <?php echo Form::file('opt_image', ['class' => 'form-control']); ?>

                </div>
				
				<div class="checkbox">
                  <label style="width:100px;">Status</label>
                  <?php echo Form::hidden('opt_status', '0'); ?> <!-- checkbox will pass this value when it's not checked -->
				  <?php echo Form::checkbox('opt_status', '1', null, ['class' => 'form-control-block']); ?>

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