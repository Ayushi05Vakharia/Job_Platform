<?php $__env->startSection('content'); ?>
<div class="container">
    <h1><?php echo e($job->title); ?></h1>
    <p><?php echo e($job->description); ?></p>
    <?php if(auth()->guard()->check()): ?>
        <form method="POST" action="<?php echo e(route('jobs.interest', $job)); ?>">
            <?php echo csrf_field(); ?>
            <button class="btn btn-info">I'm Interested</button>
        </form>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\vakha\job-booking-platform\resources\views/jobs/show.blade.php ENDPATH**/ ?>