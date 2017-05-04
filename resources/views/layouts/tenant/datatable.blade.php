<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>School Network | Data Listing</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  {!! Html::style('assets/admin/bootstrap/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  {!! Html::style('assets/admin/plugins/datatables/dataTables.bootstrap.css') !!}
  <!-- Theme style -->
  {!! Html::style('assets/admin/dist/css/AdminLTE.min.css') !!}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  {!! Html::style('assets/admin/dist/css/skins/_all-skins.min.css') !!}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	@include('layouts.tenant.header')

  
  @include('layouts.tenant.sidebar')

  @yield('content')
  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.11
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
{!! Html::script('assets/admin/plugins/jQuery/jquery-2.2.3.min.js'); !!}
<!-- Bootstrap 3.3.6 -->
{!! Html::script('assets/admin/bootstrap/js/bootstrap.min.js'); !!}
<!-- DataTables -->
{!! Html::script('assets/admin/plugins/datatables/jquery.dataTables.min.js'); !!}
{!! Html::script('assets/admin/plugins/datatables/dataTables.bootstrap.min.js'); !!}
<!-- SlimScroll -->
{!! Html::script('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js'); !!}
<!-- FastClick -->
{!! Html::script('assets/admin/plugins/fastclick/fastclick.js'); !!}
<!-- AdminLTE App -->
{!! Html::script('assets/admin/dist/js/app.min.js'); !!}
<!-- AdminLTE for demo purposes -->
{!! Html::script('assets/admin/dist/js/demo.js'); !!}
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<script>
    $(document).ready(function(){		

		$(document).on('click','.add_batch',function(e){
			
			var fee_id 		= $('#fee_id').val();
            var fee_reg_no 	= $('#register_number').val();
			var fee_class 	= $('#class').val();
			var token = "{{ csrf_token() }}";
			url = '<?php echo url('/tenant/fee/add_batch'); ?>';
            data = {rno:fee_reg_no, c:fee_class, f:fee_id};
			if(fee_id == null || fee_id == ''){
				$('#error').html('Please select Fee');
				$('#error').show();
			} else {
				if (confirm('Are you sure you want to add this fee for All selected students?')) {
					$.ajax({
						url: url,
						headers: {'X-CSRF-TOKEN': token},
						data: data,
						type: 'POST',
						datatype: 'JSON',
						success: function (resp) {
							var res = $.parseJSON(resp);
							if(res.status == 'success'){
								$('#error').hide();
								$('#success').html(res.message);
								$('#success').show();
							} else {
								$('#success').hide();
								$('#error').html(res.message);
								$('#error').show();
							}
						}
					});
				}
			}
			
        });
		
		
		$(document).on('click','.remove_batch',function(e){
			var fee_id 		= $('#fee_id').val();
            var fee_reg_no 	= $('#register_number').val();
			var fee_class 	= $('#class').val();
			var token = "{{ csrf_token() }}";
			url = '<?php echo url('/tenant/fee/remove_batch'); ?>';
            data = {rno:fee_reg_no, c:fee_class, f:fee_id};
			if(fee_id == null || fee_id == ''){
				$('#error').html('Please select Fee');
				$('#error').show();
			} else {
				if (confirm('Are you sure you want to remove this fee from All selected students?')) {
					$.ajax({
						url: url,
						headers: {'X-CSRF-TOKEN': token},
						data: data,
						type: 'POST',
						datatype: 'JSON',
						success: function (resp) {
							var res = $.parseJSON(resp);
							if(res.status == 'success'){
								$('#error').hide();
								$('#success').html(res.message);
								$('#success').show();
							} else {
								$('#success').hide();
								$('#error').html(res.message);
								$('#error').show();
							}
						}
					});
				}
			}
        });
		
		
		$(document).on('click','.single_fee_id',function(e){
			var user_id 	= $(this).data('u');
			var fee_id 		= $('#single_fee_'+user_id).val();
			var token 		= "{{ csrf_token() }}";
			url = '<?php echo url('/tenant/fee/add_single'); ?>';
            data = {u:user_id, f:fee_id};
			if(fee_id == null || fee_id == '' || user_id == null || user_id == ''){
				$('#msg_'+user_id).remove();
				$('#btn_'+user_id).after( "<p id='msg_"+user_id+"'>Please select Fee</p>" );
			} else {
				$.ajax({
					url: url,
					headers: {'X-CSRF-TOKEN': token},
					data: data,
					type: 'POST',
					datatype: 'JSON',
					success: function (resp) {
						var res = $.parseJSON(resp);
						$('#msg_'+user_id).remove();
						$('#btn_'+user_id).after( "<p id='msg_"+user_id+"'>"+res.message+"</p>" );
					}
				});
			}
        });
		
    });
</script>

</body>
</html>






