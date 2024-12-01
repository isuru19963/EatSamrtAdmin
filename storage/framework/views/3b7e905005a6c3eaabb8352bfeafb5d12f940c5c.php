<?php $__env->startSection('title', __('Edit user')); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h4 class="m-b-10"><?php echo e(__('Patient Details')); ?></h4>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo e(route('users.index')); ?>"><?php echo e(__('Patients')); ?></a>
                    </li>
                    <li class="breadcrumb-item"><?php echo e(__('View')); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 m-auto">
        <div class="card">
            <div class="card-header">
                <!-- Name and ID -->
                <h5 class="card-subtitle mb-3">Personal Information</h5>
                <h5 class="card-title font-weight-bold"><?php echo e($patient->patient_name); ?></h5>

                <!-- Personal Information -->

            </div>

            <div class="card-body">

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-4">
                        <p><strong>Mobile Number</strong></p>
                        <p><?php echo e($patient->patient_name); ?></p>

                        <p><strong>Smoke Category</strong></p>
                        <p><?php echo e($patient->smoke_category); ?></p>

                        <p><strong>Alcohol</strong></p>
                        <p><?php echo e($patient->alchohol); ?></p>

                        <p><strong>Other Drugs?</strong></p>
                        <p><?php echo e($patient->other_drugs); ?></p>
                    </div>
                    <!-- Center Column -->
                    <div class="col-md-4">
                        <p><strong>Alternative Number</strong></p>
                        <p><?php echo e($patient->patient_name); ?></p>

                        <p><strong>Smoke Items</strong></p>
                        <p><?php echo e(implode(', ', json_decode($patient->smoke_items, true))); ?></p>

                        <p><strong>Duration</strong></p>
                        <p><?php echo e($patient->alchohol_duration); ?></p>
                    </div>
                    <!-- Right Column -->
                    <div class="col-md-4">
                        <p><strong>Age</strong></p>
                        <p><?php echo e($patient->patient_age); ?></p>

                        <p><strong>Gender</strong></p>
                        <p><?php echo e($patient->gender); ?></p>



                        <p><strong>Medical History</strong></p>
                        <p><?php echo e($patient->medical_history); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="dropdown-item"  href="<?php echo e(route('export-sessions.download', $patient->patient_id)); ?>" >
            <i class="ti ti-download"></i><?php echo e(__(' Download All Session Data')); ?>

        </a>
        <div class="card">
            <div class="card-header">
                <!-- Name and ID -->
                <h5 class="card-subtitle">Session 1 Data</h5>


                <!-- Personal Information -->

            </div>

            <div class="card-body">
                <h6>Addicted to Tobacco</h6>
                <?php if(!empty($s1_addicted_to_tobacco_data)): ?>
                <ol>
                    <?php $__currentLoopData = json_decode($s1_addicted_to_tobacco_data, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <p><?php echo e($question['question']); ?> - <strong><?php echo e($question['answer']); ?></strong></p>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <?php else: ?>
                <p>No questions available.</p>
                <?php endif; ?>
            </div>

            <div class="card-body">
                <h6>Treatement Plan</h6>
                <?php if(!empty($s1_make_treatment_plan_data)): ?>
                <ol>
                    <?php $__currentLoopData = json_decode($s1_make_treatment_plan_data, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <p><?php echo e($question['question']); ?> - <strong><?php echo e($question['answer']); ?></strong></p>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <?php else: ?>
                <p>No questions available.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <!-- Name and ID -->
                <h5 class="card-subtitle">Session 2 Data</h5>


                <!-- Personal Information -->

            </div>

            <div class="card-body">
                <h6>Mood Assessment</h6>
                <?php if(!empty($s2_mood_assessment_data)): ?>
                <ol>
                    <?php $__currentLoopData = json_decode($s2_mood_assessment_data, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <p><?php echo e($question['question']); ?> - <strong><?php echo e($question['answer']); ?></strong></p>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <?php else: ?>
                <p>No questions available.</p>
                <?php endif; ?>
            </div>

            <div class="card-body">
                <h6>Treatement Plan</h6>
                <?php if(!empty($s2_make_treatment_plan_data)): ?>
                <ol>
                    <?php $__currentLoopData = json_decode($s2_make_treatment_plan_data, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <p><?php echo e($question['question']); ?> - <strong><?php echo e($question['answer']); ?></strong></p>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <?php else: ?>
                <p>No questions available.</p>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <h6>Tums Assessment</h6>
                <?php if(!empty($s2_tums_assessment_data)): ?>
                <ol>
                    <?php $__currentLoopData = json_decode($s2_tums_assessment_data, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <p><?php echo e($question['question']); ?> - <strong><?php echo e($question['answer']); ?></strong></p>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <?php else: ?>
                <p>No questions available.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <!-- Name and ID -->
                <h5 class="card-subtitle">Session 3 Data</h5>


                <!-- Personal Information -->

            </div>

            <div class="card-body">
                <h6>Mood Assessment</h6>
                <?php if(!empty($s3_mood_assessment_data)): ?>
                <ol>
                    <?php $__currentLoopData = json_decode($s3_mood_assessment_data, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <p><?php echo e($question['question']); ?> - <strong><?php echo e($question['answer']); ?></strong></p>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <?php else: ?>
                <p>No questions available.</p>
                <?php endif; ?>
            </div>

            <div class="card-body">
                <h6>Treatement Plan</h6>
                <?php if(!empty($s3_make_treatment_plan_data)): ?>
                <ol>
                    <?php $__currentLoopData = json_decode($s3_make_treatment_plan_data, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <p><?php echo e($question['question']); ?> - <strong><?php echo e($question['answer']); ?></strong></p>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <?php else: ?>
                <p>No questions available.</p>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <h6>Tums Assessment</h6>
                <?php if(!empty($s3_tums_assessment_data)): ?>
                <ol>
                    <?php $__currentLoopData = json_decode($s3_tums_assessment_data, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <p><?php echo e($question['question']); ?> - <strong><?php echo e($question['answer']); ?></strong></p>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <?php else: ?>
                <p>No questions available.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <!-- Name and ID -->
                <h5 class="card-subtitle">Session 4 Data</h5>


                <!-- Personal Information -->

            </div>

            <div class="card-body">
                <h6>Mood Assessment</h6>
                <?php if(!empty($s4_mood_assessment_data)): ?>
                <ol>
                    <?php $__currentLoopData = json_decode($s4_mood_assessment_data, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <p><?php echo e($question['question']); ?> - <strong><?php echo e($question['answer']); ?></strong></p>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <?php else: ?>
                <p>No questions available.</p>
                <?php endif; ?>
            </div>


            <div class="card-body">
                <h6>Tums Assessment</h6>
                <?php if(!empty($s4_tums_assessment_data)): ?>
                <ol>
                    <?php $__currentLoopData = json_decode($s4_tums_assessment_data, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <p><?php echo e($question['question']); ?> - <strong><?php echo e($question['answer']); ?></strong></p>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <?php else: ?>
                <p>No questions available.</p>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascript'); ?>
<script>
    $(document).on('change', '#role', function() {
        var roles = $(this).val();
        if (roles == 'Super Admin') {
            $('#domain').hide();
            $('#domain').val('');

        } else {
            $('#domain').show();
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STARTADMIN/resources/views/patients/details.blade.php ENDPATH**/ ?>