<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
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
		
		<li><a href="<?php echo e(route('tenant.calendars.index')); ?>"><i class="fa fa-circle-o"></i> <span>My Calendar</span></a></li> 
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>