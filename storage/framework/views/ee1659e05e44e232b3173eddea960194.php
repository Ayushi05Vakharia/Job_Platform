<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-center align-items-center p-5"
        style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background: linear-gradient(to right,rgb(214, 212, 216),rgb(175, 181, 193));">
        <div class="card shadow-lg border-0 rounded-4 w-100"
            style="max-width: 550px;width: 50%; background-color: #ffffffee; padding: 30px;">
            <div class="d-flex" style="display: flex; justify-content:space-between">
                <h2 class="mb-4 text-center text-dark fw-bold">Selected Job View</h2>
                <a href="<?php echo e(route('jobs.index')); ?>" class="btn btn-sm btn-outline-primary rounded-pill"
                    style="background-color:rgba(164, 177, 228, 0.93); padding: 5px; height: fit-content; margin-top: auto;">
                    Back to Job List
                </a>
            </div>
            <h1><?php echo e($job->title); ?></h1>
            <p><?php echo e($job->description); ?></p>
            <?php if(auth()->guard()->check()): ?>
                <form method="POST" action="<?php echo e(route('jobs.interest')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="job_id" value="<?php echo e($job->id); ?>">
                    <?php if(auth()->user()->interestedJobs->contains($job->id)): ?>
                        <button type="submit" disabled>Interested</button>
                    <?php else: ?>
                        <button type="submit" class="btn btn-primary w-full rounded-pill py-2 mt-4 mb-4 text-blue-500 fw-bold"
                            style="background-color:rgba(164, 177, 228, 0.93);">I'm Interested</button>
                    <?php endif; ?>

                </form>


            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\vakha\job-booking-platform\resources\views/jobs/show.blade.php ENDPATH**/ ?>