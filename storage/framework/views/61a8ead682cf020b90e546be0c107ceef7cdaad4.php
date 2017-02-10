<?php $__env->startSection('content'); ?>

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
					<a class="btn-sm btn-primary" href="<?php echo e(route('admin.adverts.index')); ?>"> Back</a>
				</div>
				<h3 class="box-title">
					<?php if(isset($advert)): ?>
						Edit Ad
					<?php else: ?>
						Add New Ad
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
            <?php if(isset($advert)): ?>
				<?php echo Form::model($advert, ['files'=> true, 'method' => 'PATCH','route' => ['admin.adverts.update', $advert->id]]); ?>

			<?php else: ?>
				<?php echo Form::open(array('files'=> true, 'route' => 'admin.adverts.store','method'=>'POST')); ?>

			<?php endif; ?>
              <div class="box-body">                
                <div class="form-group">
                  <label for=" ">Image</label>
				  <?php if(isset($advert)): ?>
					<img width="100px" src="<?php echo e(URL::to('/')); ?>/public/images/option/<?php echo e($advert->opt_image); ?>" alt="" />
				  <?php endif; ?>
				  <?php echo Form::file('opt_image', ['class' => 'form-control']); ?>

				  <p class="help-block">Max 2MB, please compress the image before you upload for better site performance</p>
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