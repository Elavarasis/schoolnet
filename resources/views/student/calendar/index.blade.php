@extends('layouts.tenant.calendar')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Calendar
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Current Month Events</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
				@if(count($cur_month_events) > 0 )
					@foreach($cur_month_events as $event)
						<?php
						if($event->event_endDate >= date('Y-m-d')){
							$bg_color 		= 'green';
						} else {
							$bg_color 		= 'red';
						}
						?>
						<div class="external-event bg-<?=$bg_color?>">{{ $event->event_name }}</div>
					@endforeach
				@endif
                <!--<div class="external-event bg-green">Lunch</div>
                <div class="external-event bg-yellow">Go home</div>
                <div class="external-event bg-aqua">Do homework</div>
                <div class="external-event bg-light-blue">Work on UI design</div>
                <div class="external-event bg-red">Sleep tight</div>-->
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  
  @endsection