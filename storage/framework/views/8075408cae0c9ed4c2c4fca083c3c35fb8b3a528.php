<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
			<?php if(isset(Auth::user()->image)): ?>
				<img src="<?php echo e(URL::to('/')); ?>/public/images/<?php echo e(Auth::user()->role); ?>/<?php echo e(Auth::user()->image); ?>" class="img-circle" alt="User Image">
			<?php else: ?>
			  <img src="<?php echo e(url('/public/images/user.png')); ?>" class="user-image" alt="User Image">
			<?php endif; ?>
        </div>
        <div class="pull-left info">
          <p><?php echo e(ucfirst(Auth::user()->first_name)); ?> <?php echo e(ucfirst(Auth::user()->last_name)); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
		<li><a href="<?php echo e(route('tenant.home.index')); ?>"><i class="fa fa-dashboard"></i> <span>Profile</span></a></li> 
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>User Management</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
		  <ul class="treeview-menu">
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Manage Teachers
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(route('tenant.teachers.index')); ?>"><i class="fa fa-circle-o"></i>Manage Teacher</a></li>
				<li><a href="<?php echo e(route('tenant.teachers.create')); ?>"><i class="fa fa-circle-o"></i>New Teacher</a></li>
              </ul>
            </li>
			
			<li>
              <a href="#"><i class="fa fa-circle-o"></i> Manage Parents
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(route('tenant.parents.index')); ?>"><i class="fa fa-circle-o"></i>Manage Parents</a></li>
				<li><a href="<?php echo e(route('tenant.parents.create')); ?>"><i class="fa fa-circle-o"></i>New Parent</a></li>
              </ul>
            </li>
			<li>
              <a href="#"><i class="fa fa-circle-o"></i> Manage Students
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(route('tenant.students.index')); ?>"><i class="fa fa-circle-o"></i>Manage Students</a></li>
				<li><a href="<?php echo e(route('tenant.students.create')); ?>"><i class="fa fa-circle-o"></i>New Student</a></li>
              </ul>
            </li>
			<li>
              <a href="#"><i class="fa fa-circle-o"></i> Manage Users
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(route('tenant.normal_users.index')); ?>"><i class="fa fa-circle-o"></i>Manage users</a></li>
				<li><a href="<?php echo e(route('tenant.normal_users.create')); ?>"><i class="fa fa-circle-o"></i>New user</a></li>
              </ul>
            </li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Courses</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo e(route('tenant.courses.index')); ?>"><i class="fa fa-circle-o"></i> <span>Manage Courses</span></a></li>
			<li><a href="<?php echo e(route('tenant.courses.create')); ?>"><i class="fa fa-circle-o"></i> <span>New Course</span></a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Events</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo e(route('tenant.events.index')); ?>"><i class="fa fa-circle-o"></i> <span>Manage Events</span></a></li>
			<li><a href="<?php echo e(route('tenant.events.create')); ?>"><i class="fa fa-circle-o"></i> <span>New Event</span></a></li>
          </ul>
        </li>
		
		<li><a href="<?php echo e(route('tenant.leaves.index')); ?>"><i class="fa fa-circle-o"></i> <span>Management Leaves</span></a></li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Manage Attendance</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo e(route('tenant.attendances.index')); ?>"><i class="fa fa-circle-o"></i> <span>Manage Attendance</span></a></li>
			<li><a href="<?php echo e(url('tenant/attendances/import')); ?>"><i class="fa fa-circle-o"></i> <span>Import</span></a></li>
          </ul>
        </li>
		
		<li><a href="<?php echo e(route('tenant.calendars.index')); ?>"><i class="fa fa-circle-o"></i> <span>My Calendar</span></a></li> 
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>