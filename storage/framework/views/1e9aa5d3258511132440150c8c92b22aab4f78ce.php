<?php $__env->startSection('content'); ?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo e(URL::to('/')); ?>/public/images/student/<?php echo e($user->image); ?>" alt="Profile picture" width="100px;">

              <h3 class="profile-username text-center"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h3>

              <p class="text-muted text-center"><?php echo e($user->st_class); ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <?php echo e($user->address); ?><br>
				  <?php echo e($user->city_name); ?>,
				  <?php echo e($user->state_name); ?>,
				  <?php echo e($user->country_name); ?>		  
                </li>
				<li class="list-group-item">
                  <b>Class</b> <a class="pull-right"><?php echo e($user->st_class); ?></a>
                </li>
				<li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php echo e($user->email); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Phone</b> <a class="pull-right"><?php echo e($user->st_contact_no); ?></a>
                </li>
				<li class="list-group-item">
                  <b>D.O.B</b> <a class="pull-right"><?php echo e(date('d/m/Y',strtotime($user->dob))); ?></a>
                </li>
				<li class="list-group-item">
                  <b>How come you know : </b><p><?php echo e($user->st_hcyknow); ?></p>
                </li>
				<li class="list-group-item">
                  <b>Profile Description : </b><p><?php echo e($user->st_description); ?></p>
                </li>
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
			<?php if($message = Session::get('success')): ?>
				<div class="alert alert-success">
					<p><?php echo e($message); ?></p>
				</div>
			<?php endif; ?>
			  
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
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
			  <li class="active"><a href="#editprofile" data-toggle="tab">Edit My Profile</a></li>
			  <li><a href="#changepass" data-toggle="tab">Change Password</a></li>
            </ul>
            <div class="tab-content">

              <div class="tab-pane active" id="editprofile">
				<!-- form start -->
				<?php echo Form::model($user, ['files'=> true, 'method' => 'post', 'url' => "stud/home/save_profile/"]); ?>

				
				  <?php echo Form::hidden('id', (isset($user->id)) ? $user->id : null); ?>

				
				  <?php /**/ $user->dob = date("d/m/Y", strtotime($user->dob) ) /**/ ?> <!-- change date format of DOB to d/m/Y -->
				  <div class="box-body">
					<div class="form-group">
					  <label for=" ">First Name</label>
					  <?php echo Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')); ?>

					</div>
					
					<div class="form-group">
					  <label for=" ">Last Name</label>
					  <?php echo Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control')); ?>

					</div>
					
					<div class="form-group">
					  <label for=" ">Address</label>
					  <?php echo Form::textarea('address',null,['placeholder' => 'Adress','class'=>'form-control', 'rows' => 3]); ?>

					</div>
					
					<div class="form-group">
					  <label for="exampleInputEmail1">Country</label>
					  <?php echo Form::select('country_id', $countries, null, array('class' => 'form-control', 'id' => 'country_id')); ?>

					</div>
					
					<div class="form-group">
					  <label for="exampleInputEmail1">State</label>
					  <?php echo Form::select('state_id', $states, null, array('class' => 'form-control', 'id' => 'state_id')); ?>

					</div>
					
					<div class="form-group">
					  <label for=" ">City</label>
					  <?php echo Form::select('city', $cities, null, array('class' => 'form-control', 'id' => 'city_id')); ?>

					</div>
					
					<div class="form-group">
					  <label for=" ">Date of Birth</label>
					  <?php echo Form::text('dob', null, array('placeholder' => 'Date of Birth','class' => 'form-control dob')); ?>

					</div>  
					
					<div class="form-group">
					  <label for=" ">Contact Number</label>
					  <?php echo Form::text('st_contact_no', null, array('placeholder' => 'Contact Number','class' => 'form-control')); ?>

					</div>
					
					<div class="form-group">
					  <label for=" ">How come you know</label>
					  <?php echo Form::textarea('st_hcyknow',null,['placeholder' => 'How come you know','class'=>'form-control', 'rows' => 3]); ?>

					</div>
					
					<div class="form-group">
					  <label for=" ">Profile Description</label>
					  <?php echo Form::textarea('st_description',null,['placeholder' => 'Profile Description','class'=>'form-control', 'rows' => 6]); ?>

					</div>
					
					<div class="form-group">
					  <label for=" ">Profile Image</label>
					  <?php if(isset($student)): ?>
						<img width="100px" src="<?php echo e(URL::to('/')); ?>/public/images/student/<?php echo e($student->image); ?>" alt="" />
					  <?php endif; ?>
					  <?php echo Form::file('st_image', ['class' => 'form-control']); ?>

					</div>
					  <?php echo Form::hidden('st_user_id', null); ?>

					
					<div class="checkbox">
					  <label style="width:100px;">Status</label>
					  <?php echo Form::hidden('status', '0'); ?> <!-- checkbox will pass this value when it's not checked -->
					  <?php echo Form::checkbox('status', '1', null, ['class' => 'form-control-block']); ?>

					</div>
					
				  </div>
				  <!-- /.box-body -->

				  <div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				  </div>
				<?php echo Form::close(); ?>

              </div>
			  
			  <div class="tab-pane" id="changepass">
				<?php echo Form::model($user, ['files'=> true, 'method' => 'post', 'url' => "stud/home/reset_password/"]); ?>


				  <div class="box-body">
					<div class="form-group">
					  <label for=" ">New Password</label>
					  <?php echo Form::text('password', null, array('placeholder' => 'New Password','class' => 'form-control')); ?>

					</div>
					
					<div class="form-group">
					  <label for=" ">Confirm Password</label>
					  <?php echo Form::text('confirm_password', null, array('placeholder' => 'Confirm Password','class' => 'form-control')); ?>

					</div>
					<?php echo Form::hidden('user_id', null); ?>

				  </div>
				  <!-- /.box-body -->

				  <div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				  </div>
				<?php echo Form::close(); ?>

			  </div>

			  
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.tabs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>