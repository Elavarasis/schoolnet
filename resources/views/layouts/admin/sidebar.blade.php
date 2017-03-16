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
		<li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Settings</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="{{ route('admin.countries.index') }}"><i class="fa fa-circle-o"></i> <span>Countries & States</span></a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i>Manage Cities
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('admin.cities.index') }}"><i class="fa fa-circle-o"></i>Manage Cities</a></li>
				<li><a href="{{ route('admin.cities.create') }}"><i class="fa fa-circle-o"></i>New City</a></li>
              </ul>
            </li>
			<li><a href="{{ route('admin.payments.index') }}"><i class="fa fa-circle-o"></i> <span>Payment Modes</span></a></li>
			<li>
              <a href="#"><i class="fa fa-circle-o"></i> Ad Management
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('admin.adverts.index') }}"><i class="fa fa-circle-o"></i>Manage Ads</a></li>
				<li><a href="{{ route('admin.adverts.create') }}"><i class="fa fa-circle-o"></i>New Ad</a></li>
              </ul>
            </li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>User Management</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Manage School admins
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('admin.school_admins.index') }}"><i class="fa fa-circle-o"></i>Manage School admins</a></li>
				<li><a href="{{ route('admin.school_admins.create') }}"><i class="fa fa-circle-o"></i>New School admin</a></li>
              </ul>
            </li>
          </ul>
		  <ul class="treeview-menu">
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Manage Students
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('admin.students.index') }}"><i class="fa fa-circle-o"></i>Manage Students</a></li>
				<li><a href="{{ route('admin.students.create') }}"><i class="fa fa-circle-o"></i>New Student</a></li>
              </ul>
            </li>
			<li>
              <a href="#"><i class="fa fa-circle-o"></i> Manage Normal Users
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('admin.normal_users.index') }}"><i class="fa fa-circle-o"></i>Manage Normal users</a></li>
				<li><a href="{{ route('admin.normal_users.create') }}"><i class="fa fa-circle-o"></i>New Normal user</a></li>
              </ul>
            </li>
          </ul>
        </li>
		
		<li><a href="{{ route('admin.widgets.index') }}"><i class="fa fa-circle-o"></i> <span>Widget Management</span></a></li>
		
		<li><a href="{{ url('admin/newsletters/') }}"><i class="fa fa-circle-o"></i> <span>Newsletters</span></a></li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Categories</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-circle-o"></i> <span>Manage Categories</span></a></li>
			<li><a href="{{ route('admin.categories.create') }}"><i class="fa fa-circle-o"></i> <span>New Category</span></a></li>
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
			<li><a href="{{ route('admin.courses.index') }}"><i class="fa fa-circle-o"></i> <span>Manage Courses</span></a></li>
			<li><a href="{{ route('admin.courses.create') }}"><i class="fa fa-circle-o"></i> <span>New Course</span></a></li>
          </ul>
        </li>
		
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>-->
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>