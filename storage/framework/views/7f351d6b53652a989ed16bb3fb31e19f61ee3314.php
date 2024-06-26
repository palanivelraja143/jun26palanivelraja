

<?php $__env->startSection('content'); ?>
    <h1>Student Details</h1>
    <p><strong>Name:</strong> <?php echo e($student->name); ?></p>
    <p><strong>Email:</strong> <?php echo e($student->email); ?></p>
    <p><strong>Phone:</strong> <?php echo e($student->phone); ?></p>
    <p><strong>Address:</strong> <?php echo e($student->address); ?></p>
    <p><strong>City:</strong> <?php echo e($student->city); ?></p>
    <p><strong>State:</strong> <?php echo e($student->state); ?></p>
    <p><strong>Country:</strong> <?php echo e($student->country); ?></p>
    <p><strong>Status:</strong> <?php echo e($student->status ? 'Active' : 'Inactive'); ?></p>

    <h3>Subjects</h3>
    <table>
        <thead>
            <tr>
                <th>Subject Name</th>
                <th>Marks Scored</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $student->subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($subject->name); ?></td>
                    <td><?php echo e($subject->marks_scored); ?></td>
                    <td><?php echo e($subject->grade); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="<?php echo e(route('students.index')); ?>">Back to Students</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\student_management\resources\views/student/show.blade.php ENDPATH**/ ?>