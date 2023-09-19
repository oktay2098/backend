<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Name'); ?></th>
                                    <th><?php echo app('translator')->get('Type'); ?></th>
                                    <th><?php echo app('translator')->get('Sub category'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                    <th><?php echo app('translator')->get('Last Update'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-label="<?php echo app('translator')->get('Name'); ?>"><span class="font-weight-bold"><?php echo e(__($category->name)); ?></span></td>
                                    <td data-label="<?php echo app('translator')->get('Sub category'); ?>">
                                        <span class="font-weight-bold">
                                            <?php echo e(($category->type == 1) ? 'Service' : (($category->type == 2) ? 'Product' : (($category->type == 3) ? 'Job' : ''))); ?>

                                        </span>
                                    </td>
                                    <td data-label="<?php echo app('translator')->get('Sub category'); ?>">
                                        <span class="font-weight-bold"><?php echo e($category->subCategory->count()); ?></span>
                                    </td>
                                 
                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                        <?php if($category->status == 1): ?>
                                            <span class="badge badge--success"><?php echo app('translator')->get('Enable'); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge--danger"><?php echo app('translator')->get('Disabled'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                  
                                    <td data-label="<?php echo app('translator')->get('Last Update'); ?>">
                                        <?php echo e(showDateTime($category->updated_at)); ?> <br> <?php echo e(diffForHumans($category->updated_at)); ?>

                                    </td>

                                    <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                        <a href="javascript:void(0)" class="icon-btn btn--primary ml-1 updateCategory"
                                            data-id="<?php echo e($category->id); ?>" 
                                            data-name="<?php echo e($category->name); ?>" 
                                            data-status="<?php echo e($category->status); ?>">
                                            <i class="las la-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                </tr>
                            <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <?php echo e(paginateLinks($categorys)); ?>

                </div>
            </div>
        </div>
    </div>


    <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Add Category'); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo e(route('admin.category.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Name'); ?></label>
                            <input type="text" class="form-control form-control-lg" name="name" placeholder="<?php echo app('translator')->get("Enter Name"); ?>"  maxlength="50" required="">
                        </div>
                         <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Type'); ?></label>
                            <select name="type" class="form-control form-control-lg" required="">
                               <option selected="" disabled=""><?php echo app('translator')->get('Select Type'); ?></option>
                                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($type['id']); ?>"><?php echo e($type['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                           
                        </div>

                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Status'); ?> </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disabled'); ?>" name="status">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn--primary"><i class="fa fa-fw fa-paper-plane"></i><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="updateCategoryModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Update Category'); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo e(route('admin.category.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Name'); ?></label>
                            <input type="text" class="form-control form-control-lg" name="name" placeholder="<?php echo app('translator')->get("Enter Name"); ?>"  maxlength="50" required="">
                        </div>
                         <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Type'); ?></label>
                            <select name="type" class="form-control form-control-lg" required="">
                               <option selected="" disabled=""><?php echo app('translator')->get('Select Type'); ?></option>
                                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($type['id']); ?>"><?php echo e($type['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                           
                        </div>

                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Status'); ?> </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disabled'); ?>" name="status">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn--primary"><i class="fa fa-fw fa-paper-plane"></i><?php echo app('translator')->get('Update'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <a href="javascript:void(0)" class="btn btn-sm btn--primary box--shadow1 text--small addCategory" ><i class="las la-plus"></i><?php echo app('translator')->get('Add Category'); ?></a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        $('.addCategory').on('click', function() {
            $('#addModal').modal('show');
        });

        $('.updateCategory').on('click', function () {
            var modal = $('#updateCategoryModal');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.find('input[name=name]').val($(this).data('name'));
            var data = $(this).data('status');
            if(data == 1){
                modal.find('input[name=status]').bootstrapToggle('on');
            }else{
                modal.find('input[name=status]').bootstrapToggle('off');
            }
            modal.modal('show');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/admin/category/index.blade.php ENDPATH**/ ?>