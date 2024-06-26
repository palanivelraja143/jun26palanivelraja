

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
          <h1>Students Management</h1>
        </div>
        <div class="pull-right">
         <a class="btn btn-success" href="<?php echo e(route('students.create')); ?>">Add Student</a>
        </div>
    </div>
</div> 
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($student->id); ?></td>
                    <td><?php echo e($student->name); ?></td>
                    <td><?php echo e($student->email); ?></td>
                    <td><?php echo e($student->status ? 'Active' : 'Inactive'); ?></td>
                    <td>
                        <a class="btn btn-info" href="<?php echo e(route('students.show', $student)); ?>">View</a>
                        <a class="btn btn-primary" href="<?php echo e(route('students.edit', $student)); ?>">Edit</a>
                        <button class="btn btn-secondary toggle-status" data-id="<?php echo e($student->id); ?>"><?php echo e($student->status ? 'Disable' : 'Enable'); ?></button>
                        <form action="<?php echo e(route('students.destroy', $student)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <script>
        document.querySelectorAll('.toggle-status').forEach(button => {
            button.addEventListener('click', function() {
                const studentId = this.getAttribute('data-id');
                fetch(`/students/${studentId}/toggle-status`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    }
                }).then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        location.reload();
                    }
                });
            });
        });
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    $('.show_confirm').click(function(e) {
        if(!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\student_management\resources\views/student/index.blade.php ENDPATH**/ ?>