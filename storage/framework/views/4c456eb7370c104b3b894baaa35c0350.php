<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-center align-items-center p-5"
        style="display: block;justify-content: center; align-items: center; min-height: 100vh; background: linear-gradient(to right,rgb(214, 212, 216),rgb(175, 181, 193));">
        <h2 class="mb-4 text-center text-dark fw-bold">Job Listing</h2>



        <div class="list-group" style="display:block;justify-content:center ;align-items:center; padding-left: 50px;">
            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card shadow-lg border-0 rounded-4 w-100"
                    style="display: block;max-width: 550px;width: 50%; background-color: #ffffffee; padding: 30px;">
                    <li class="list-group-item">
                        <a href="<?php echo e(route('jobs.show', $job)); ?>"><?php echo e($job->title); ?></a>
                    </li>
                    <!-- <p><?php echo e(auth()->check()); ?></p> -->
                    <?php if(auth()->check()): ?>
                        <?php if(auth()->user()->role == 'poster'): ?>
                            <div class="d-flex" style="display: flex;">

                                <form action="<?php echo e(route('jobs.destroy', $job->id)); ?>" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this job?');" style="margin-right: 8px;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-primary w-full rounded-pill py-2 mt-4 text-blue-500 fw-bold"
                                        style="background-color:rgba(164, 177, 228, 0.93); padding: 5px;">Delete</button>
                                </form>
                                <a href="<?php echo e(route('jobs.edit', $job->id)); ?>" class="btn btn-sm btn-outline-primary rounded-pill"
                                    style="background-color:rgba(164, 177, 228, 0.93); padding: 5px; height: fit-content; margin-top: auto;">
                                    Edit
                                </a>

                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(auth()->check()): ?>
                <?php if(auth()->user()->role): ?>
                    <a href="<?php echo e(route('jobs.create')); ?>" class="btn btn-primary mb-3">Post a Job</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\vakha\job-booking-platform\resources\views/jobs/index.blade.php ENDPATH**/ ?>