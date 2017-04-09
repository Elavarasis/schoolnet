<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel"><?php echo e(Auth::user()->role); ?>

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
		<li><a href="<?php echo e(route('stud.home.index')); ?>"><i class="fa fa-dashboard"></i> <span>Profile</span></a></li> 
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Leaves</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo e(route('stud.leaves.index')); ?>"><i class="fa fa-circle-o"></i> <span>Manage Leaves</span></a></li>
			<li><a href="<?php echo e(route('stud.leaves.create')); ?>"><i class="fa fa-circle-o"></i> <span>Apply For Leave</span></a></li>
          </ul>
        </li>
		
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>