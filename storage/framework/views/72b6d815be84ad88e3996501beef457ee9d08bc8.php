<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

                <div style="text-align:center;" class="panel-body"><br><br>
					<img src="<?php echo e(url('/public/images/sn.png')); ?>" alt="logo" />
                </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>