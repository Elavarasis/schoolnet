<?php $__env->startSection('content'); ?>

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        School Details
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
					<a class="btn-sm btn-primary" href="<?php echo e(route('admin.school_admins.index')); ?>"> Back</a>
				</div>
				<h3 class="box-title">
					School Details
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
            <?php if(isset($school)): ?>
				<?php echo Form::model($school, ['files'=> true, 'method' => 'post', 'url' => "admin/school_admins/save_school/"]); ?>

			<?php else: ?>
				<?php echo Form::open(array('files'=> true, 'url' => 'admin/school_admins/save_school/', 'method' => 'post')); ?>

			<?php endif; ?>
				
				<!-- school id in hidden field -->
				<?php echo Form::hidden('id', (isset($school->id)) ? $school->id : null); ?>

				
				<!-- admin id in hidden field -->
				<?php echo Form::hidden('admin_id', $admin_id); ?>

              <div class="box-body">
                <div class="form-group">
                  <label for=" ">School Name</label>
                  <?php echo Form::text('schl_name', null, array('placeholder' => 'School Name','class' => 'form-control')); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Country</label>
                  <?php echo Form::select('schl_country_id', $countries, null, array('class' => 'form-control', 'id' => 'country_id')); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">State</label>
                  <?php echo Form::select('schl_state_id', $states, null, array('class' => 'form-control', 'id' => 'state_id')); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  <?php echo Form::select('schl_city_id', $cities, null, array('class' => 'form-control', 'id' => 'city_id')); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">Address</label>
				  <?php echo Form::textarea('schl_address',null,['placeholder' => 'School Adress','class'=>'form-control', 'rows' => 3]); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">Contact Number</label>
                  <?php echo Form::text('schl_contact_no', null, array('placeholder' => 'Contact Number','class' => 'form-control')); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">Email</label>
                  <?php echo Form::email('schl_email', null, array('placeholder' => 'Email','class' => 'form-control')); ?>

                </div>
                
				<div class="form-group">
                  <label for=" ">School Level</label>
                  <?php echo Form::text('schl_level', null, array('placeholder' => 'School Level','class' => 'form-control')); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">Features</label>
				  <?php echo Form::textarea('schl_features',null,['placeholder' => 'School Features','class'=>'form-control', 'rows' => 8]); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">Logo</label>
				  <?php if(isset($school)): ?>
					<img width="100px" src="<?php echo e(URL::to('/')); ?>/public/images/school/<?php echo e($school->schl_logo); ?>" alt="" />
				  <?php endif; ?>
				  <?php echo Form::file('schl_logo', ['class' => 'form-control']); ?>

                </div>  
				
				<div class="checkbox">
                  <label style="width:100px;">Status</label>
                  <?php echo Form::hidden('schl_status', '0'); ?> <!-- checkbox will pass this value when it's not checked -->
				  <?php echo Form::checkbox('schl_status', '1', null, ['class' => 'form-control-block']); ?>

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