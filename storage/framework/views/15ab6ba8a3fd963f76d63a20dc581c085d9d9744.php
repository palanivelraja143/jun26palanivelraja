

<?php $__env->startSection('content'); ?>
<div class="container" style="border: 1px solid black;">
    <h1 style="text-align:center;"><?php echo e(isset($student) ? 'Edit Student' : 'Add Student'); ?></h1>
    <form action="<?php echo e(isset($student) ? route('students.update', $student) : route('students.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php if(isset($student)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <div class="form-group col-md-6">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="<?php echo e(old('name', $student->name ?? '')); ?>">
            <?php if($errors->has('name')): ?>
                    <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <label>Email</label>
            <input class="form-control" type="email" name="email" value="<?php echo e(old('email', $student->email ?? '')); ?>">
            <?php if($errors->has('email')): ?>
                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <label>Phone</label>
            <input class="form-control" type="text" name="phone" value="<?php echo e(old('phone', $student->phone ?? '')); ?>">
            <?php if($errors->has('phone')): ?>
                    <span class="text-danger"><?php echo e($errors->first('phone')); ?></span>
                <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <label>Address</label>
            <input class="form-control" type="text" name="address" value="<?php echo e(old('address', $student->address ?? '')); ?>">
            <?php if($errors->has('address')): ?>
                    <span class="text-danger"><?php echo e($errors->first('address')); ?></span>
                <?php endif; ?>
        </div>
       
        <div class="form-group col-md-6">
            <label>City</label>
            <input class="form-control" type="text" name="city" value="<?php echo e(old('city', $student->city ?? '')); ?>">
            <?php if($errors->has('city')): ?>
                    <span class="text-danger"><?php echo e($errors->first('city')); ?></span>
                <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <label>State</label>
            <input class="form-control" type="text" name="state" value="<?php echo e(old('state', $student->state ?? '')); ?>">
            <?php if($errors->has('state')): ?>
                    <span class="text-danger"><?php echo e($errors->first('state')); ?></span>
                <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <label>Country</label>
            <input class="form-control" type="text" name="country" value="<?php echo e(old('country', $student->country ?? '')); ?>">
            <?php if($errors->has('country')): ?>
                    <span class="text-danger"><?php echo e($errors->first('country')); ?></span>
                <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <label>Status</label>
            <select class="form-control" name="status">
                <option value="1" <?php echo e(old('status', $student->status ?? '1') == '1' ? 'selected' : ''); ?>>Active</option>
                <option value="0" <?php echo e(old('status', $student->status ?? '1') == '0' ? 'selected' : ''); ?>>Inactive</option>
            </select>
            <?php if($errors->has('status')): ?>
                    <span class="text-danger"><?php echo e($errors->first('status')); ?></span>
                <?php endif; ?>
        </div>

        <div>
            <h3>Subjects</h3>
            <div id="subjects-container">
                <?php if(isset($student)): ?>
                    <?php $__currentLoopData = $student->subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="subject">
                            <input type="hidden" name="subjects[<?php echo e($loop->index); ?>][id]" value="<?php echo e($subject->id); ?>">
                            <label>Subject Name</label>
                            <input type="text" name="subjects[<?php echo e($loop->index); ?>][name]" value="<?php echo e($subject->name); ?>">
                            <label>Marks Scored</label>
                            <input type="number" name="subjects[<?php echo e($loop->index); ?>][marks_scored]" value="<?php echo e($subject->marks_scored); ?>">
                            <label>Grade</label>
                            <input type="text" name="subjects[<?php echo e($loop->index); ?>][grade]" value="<?php echo e($subject->grade); ?>">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="subject">
                        <label>Subject Name</label>
                        <input type="text" name="subjects[0][name]">
                        <label>Marks Scored</label>
                        <input type="number" name="subjects[0][marks_scored]">
                        <label>Grade</label>
                        <input type="text" name="subjects[0][grade]">
                    </div>
                <?php endif; ?>
            </div>
            <div class="pull-right">
              <button  class="btn btn-success" type="button" id="add-subject">Add Subject</button>
            </div>
        </div>
        <div class="pull-left">
         <button class="btn btn-success" type="submit"><?php echo e(isset($student) ? 'Update' : 'Add'); ?> Student</button>
        </div>
    </form>
</div>
    <script>
        document.getElementById('add-subject').addEventListener('click', function() {
            const container = document.getElementById('subjects-container');
            const index = container.children.length;
            const newSubject = document.createElement('div');
            newSubject.classList.add('subject');
            newSubject.innerHTML = `
                <label>Subject Name</label>
                <input type="text" name="subjects[${index}][name]">
                <label>Marks Scored</label>
                <input type="number" name="subjects[${index}][marks_scored]">
                <label>Grade</label>
                <input type="text" name="subjects[${index}][grade]">
            `;
            container.appendChild(newSubject);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\student_management\resources\views/student/edit.blade.php ENDPATH**/ ?>