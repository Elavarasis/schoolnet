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
              <img class="profile-user-img img-responsive img-circle" src="<?php echo e(URL::to('/')); ?>/public/images/school_admin/<?php echo e($user->image); ?>" alt="Profile picture" width="100px;">

              <h3 class="profile-username text-center"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h3>

              <p class="text-muted text-center"><?php echo e($user->designation); ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <?php echo e($user->address); ?><br>
				  <?php echo e($user->city_name); ?>,
				  <?php echo e($user->state_name); ?>,
				  <?php echo e($user->country_name); ?>		  
                </li>
				<li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php echo e($user->email); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Phone</b> <a class="pull-right"><?php echo e($user->phone); ?></a>
                </li>
                <li class="list-group-item">
                  <b>Mobile</b> <a class="pull-right"><?php echo e($user->mobile); ?></a>
                </li>
				<li class="list-group-item">
                  <b>D.O.B</b> <a class="pull-right"><?php echo e(date('d/m/Y',strtotime($user->dob))); ?></a>
                </li>
				<li class="list-group-item">
                  <b>website</b> <a class="pull-right"><?php echo e($user->website); ?></a>
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
              <li class="active"><a href="#schoolprofile" data-toggle="tab">School Profile</a></li>
              <li><a href="#editschool" data-toggle="tab">Edit School Profile</a></li>
			  <li><a href="#editprofile" data-toggle="tab">Edit My Profile</a></li>
			  <li><a href="#changepass" data-toggle="tab">Change Password</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="schoolprofile">
				<?php if(!empty($school)): ?>
				<img class="img-circle img-bordered-sm" src="<?php echo e(URL::to('/')); ?>/public/images/school/small--<?php echo e($school->schl_logo); ?>" alt="Logo not uploaded" width="100px;">
				<table width="80%" cellpadding="10">
					<tr height="30">
						<th>School Name</th><td><?php echo e($school->schl_name); ?></td>
					</tr>
					<tr height="30">
						<th>Address</th><td><?php echo e($school->schl_address); ?></td>
					</tr>
					<tr height="30">
						<th>City</th><td><?php echo e($school->get_city->city_name); ?></td>
					</tr>
					<tr height="30">
						<th>State</th><td><?php echo e($school->get_state->name); ?></td>
					</tr>
					<tr height="30">
						<th>State</th><td><?php echo e($school->get_country->country); ?></td>
					</tr>
					<tr height="30">
						<th>Email</th><td><?php echo e($school->schl_email); ?></td>
					</tr>
					<tr height="30">
						<th>Contact Number</th><td><?php echo e($school->schl_contact_no); ?></td>
					</tr>
					<tr height="30">
						<th>School Level</th><td><?php echo e($school->schl_level); ?></td>
					</tr>
					<tr height="30">
						<td colspan="2" align="justify">
							<b>Features:</b><br>
							<?php echo e($school->schl_features); ?>

						</td>
					</tr>
				</table>
				<?php endif; ?>
              </div>
			  
              <div class="tab-pane" id="editschool">
				<?php if(isset($school)): ?>
					<?php echo Form::model($school, ['files'=> true, 'method' => 'post', 'url' => "tenant/home/save_school/"]); ?>

				<?php else: ?>
					<?php echo Form::open(array('files'=> true, 'url' => 'tenant/home/save_school/', 'method' => 'post')); ?>

				<?php endif; ?>
					
					<!-- school id in hidden field -->
					<?php echo Form::hidden('id', (isset($school->id)) ? $school->id : null); ?>

					
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

              <div class="tab-pane" id="editprofile">
				<!-- form start -->
				<?php echo Form::model($user, ['files'=> true, 'method' => 'post', 'url' => "tenant/home/save_profile/"]); ?>

				
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
					  <label for=" ">Designation</label>
					  <?php echo Form::text('designation', null, array('placeholder' => 'Designation','class' => 'form-control')); ?>

					</div>

					<div class="form-group">
					  <label for=" ">Date of Birth</label>
					  <?php echo Form::text('dob', null, array('placeholder' => 'Date of Birth','class' => 'form-control dob')); ?>

					</div>  
					
					<div class="form-group">
					  <label for="exampleInputEmail1">Country</label>
					  <?php echo Form::select('country_id', $countries, null, array('class' => 'form-control', 'id' => 'country_id_2')); ?>

					</div>
					
					<div class="form-group">
					  <label for="exampleInputEmail1">State</label>
					  <?php echo Form::select('state_id', $states, null, array('class' => 'form-control', 'id' => 'state_id_2')); ?>

					</div>
					
					<div class="form-group">
					  <label for="exampleInputEmail1">City</label>
					  <?php echo Form::select('city', $cities, null, array('class' => 'form-control', 'id' => 'city_id_2')); ?>

					</div>
					
					<div class="form-group">
					  <label for=" ">Phone Number</label>
					  <?php echo Form::text('phone', null, array('placeholder' => 'Phone Number','class' => 'form-control')); ?>

					</div>
					
					<div class="form-group">
					  <label for=" ">Mobile Number</label>
					  <?php echo Form::text('mobile', null, array('placeholder' => 'Mobile Number','class' => 'form-control')); ?>

					</div>
					
					<div class="form-group">
					  <label for=" ">Website</label>
					  <?php echo Form::text('website', null, array('placeholder' => 'Website','class' => 'form-control')); ?>

					</div>
					
					<div class="form-group">
					  <label for=" ">Photo</label>
					  <?php if(isset($school_admin)): ?>
						<img width="100px" src="<?php echo e(URL::to('/')); ?>/public/images/school_admin/<?php echo e($school_admin->image); ?>" alt="" />
					  <?php endif; ?>
					  <?php echo Form::file('profile_image', ['class' => 'form-control']); ?>

					</div>  
					  <?php echo Form::hidden('user_id', null); ?>

					
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
				<?php echo Form::model($user, ['files'=> true, 'method' => 'post', 'url' => "tenant/home/reset_password/"]); ?>


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