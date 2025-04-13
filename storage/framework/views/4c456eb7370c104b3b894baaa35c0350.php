
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Job Listings</h1>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Job::class)): ?>
        <a href="<?php echo e(route('jobs.create')); ?>" class="btn btn-primary mb-3">Post a Job</a>
    <?php endif; ?>
    <ul class="list-group">
        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item">
                <a href="<?php echo e(route('jobs.show', $job)); ?>"><?php echo e($job->title); ?></a>
            </li>
            <?php if($job->user_id === auth()->id()): ?>
                    <form action="<?php echo e(route('jobs.destroy', $job->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\vakha\job-booking-platform\resources\views/jobs/index.blade.php ENDPATH**/ ?>