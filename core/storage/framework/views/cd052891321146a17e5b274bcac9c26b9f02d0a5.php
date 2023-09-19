<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Advertisement Type'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Total Click'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Ad Size'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Total Impression'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Last Update'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('Name'); ?>">
                                    <?php if($advr->type == 1): ?>
                                        <div class="user">
                                            <div class="thumb">
                                                <a href="<?php echo e(getImage(imagePath()['advertisement']['path'].'/'. $advr->adimage,$advr->size)); ?>" target="__blank">
                                                    <img src="<?php echo e(getImage(imagePath()['advertisement']['path'].'/'. $advr->adimage,$advr->size)); ?>" alt="<?php echo app('translator')->get('image'); ?>">
                                                </a>
                                            </div>
                                            <span class="name"><?php echo e(__($advr->name)); ?></span>
                                        </div>
                                    <?php else: ?>
                                        <span class="name"><?php echo e(__($advr->name)); ?></span>
                                    <?php endif; ?>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Advertisement Type'); ?>">
                                    <?php if($advr->type == 1): ?>
                                        <span class="font-weight-normal badge badge--success"><?php echo app('translator')->get('Banner'); ?></span>
                                    <?php else: ?>
                                        <span class="font-weight-normal badge badge--primary"><?php echo app('translator')->get('Script'); ?></span>
                                    <?php endif; ?>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Total Click'); ?>">
                                    <?php echo e($advr->click); ?>

                                </td>

                                <td data-label="><?php echo app('translator')->get('Ad Size'); ?>">
                                    <span class="text--small badge font-weight-normal badge--primary"><?php echo e($advr->size); ?></span>
                                </td>

                                 <td data-label="<?php echo app('translator')->get('Total Impression'); ?>">
                                    <?php echo e($advr->impression); ?>

                                </td>
                             
                                <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                    <?php if($advr->status == 1): ?>
                                        <span class="badge badge--success"><?php echo app('translator')->get('Active'); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge--danger"><?php echo app('translator')->get('Inactive'); ?></span>
                                    <?php endif; ?>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Last Update'); ?>">
                                    <?php echo e(showDateTime($advr->updated_at)); ?><br><?php echo e(diffforhumans($advr->updated_at)); ?>

                                </td>
                                
                                <td data-label="Action">
                                    <a href="<?php echo e(route('admin.ads.edit', $advr->id)); ?>" class="icon-btn mr-2 edit" data-toggle="tooltip" title="<?php echo app('translator')->get('Edit'); ?>">
                                        <i class="las la-edit text--shadow"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-id="<?php echo e($advr->id); ?>" class="icon-btn btn--danger delete" data-toggle="tooltip" title="<?php echo app('translator')->get('Delete'); ?>">
                                        <i class="las la-trash text--shadow"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-muted text-center" colspan="100%"><?php echo e($emptyMessage); ?></td>
                                </tr>
                            <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                 <?php echo e(paginateLinks($ads)); ?>

                </div>
            </div>
        </div>
    </div>



<div class="modal fade" id="adModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
       <form action="<?php echo e(route('admin.ads.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo app('translator')->get('Add advertisement'); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="font-weight-bold"><?php echo app('translator')->get('Name'); ?></label>
                    <input type="text" class="form-control form-control-lg" name="name" placeholder="<?php echo app('translator')->get("Enter Name"); ?>" required value="<?php echo e(old('name')); ?>" id="name" maxlength="40">
                </div>


                <div class="form-group">
                    <label for="size" class="font-weight-bold"><?php echo app('translator')->get('Select Ad Size'); ?></label>
                    <select class="form-control form-control-lg" name="size" id="size">
                        <option value=""><?php echo app('translator')->get('Select Size'); ?></option>
                        <option value="300x250"><?php echo app('translator')->get('300x250'); ?></option>
                        <option value="728x90"><?php echo app('translator')->get('728x90'); ?></option>
                        <option value="841x280"><?php echo app('translator')->get('841x280'); ?></option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="type" class="font-weight-bold"><?php echo app('translator')->get('Select Type'); ?></label>
                    <select class="form-control type form-control-lg" name="type" required>
                        <option selected="" disabled="">----<?php echo app('translator')->get('Select One'); ?>----</option>
                        <option value="1"><?php echo app('translator')->get('Banner'); ?></option>
                        <option value="2"><?php echo app('translator')->get('Script'); ?></option>
                    </select>
                </div>


                <div id="bannerAdd">
                    <div class="form-group ru">
                        <label for="redirect_url" class="font-weight-bold"><?php echo app('translator')->get('Redirect Url'); ?></label>
                        <input type="text" class="form-control form-control-lg" name="redirect_url" placeholder="<?php echo app('translator')->get('http/https://example.com'); ?>" value="<?php echo e(old('redirect_url')); ?>" id="redirect_url">
                    </div>

                    <div class="form-group">
                        <label for="symbol" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Ad Image'); ?></label>
                        <div class="custom-file">
                            <input type="file" name="adimage" class="custom-file-input" id="customFileLangHTML">
                            <label class="custom-file-label" for="customFileLangHTML" data-browse="<?php echo app('translator')->get('Choose Image'); ?>"><?php echo app('translator')->get('Image'); ?></label>
                        </div>
                    </div>
                </div>

                <div id="scriptAdd">
                    <div class="form-group">
                        <label for="script" class="font-weight-bold"><?php echo app('translator')->get('Ad Script'); ?></label>
                        <textarea type="text" class="form-control" name="script" id="script"><?php echo e(old('script')); ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Status'); ?> </label>
                    <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                           data-toggle="toggle" data-on="<?php echo app('translator')->get('Active'); ?>" data-off="<?php echo app('translator')->get('Inactive'); ?>" name="status"
                          >
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                <button type="submit" class="btn btn--primary"><i class="fa fa-fw fa-paper-plane"></i><?php echo app('translator')->get('Save'); ?></button>
            </div>
        </div>
       </form>
    </div>
</div>



    <div class="modal fade" id="deleteAds" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="" lass="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('Delete Confirmation'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                
                <form action="<?php echo e(route('admin.ads.delete')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p><?php echo app('translator')->get('Are you sure to delete this ads?'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--secondary" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn--success"><?php echo app('translator')->get('Confirm'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <button type="button" data-toggle="modal" data-target="#adModal" class="btn btn-sm btn--primary box--shadow1 text--small"><i class="la la-plus"></i><?php echo app('translator')->get('Add New'); ?></button>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict';
        $("#bannerAdd").hide();
        $("#scriptAdd").hide();
        $('.type').on("change",function () {
            if($(this).val() == 1){
                $("#bannerAdd").show();
                $("#scriptAdd").hide();
            } else if($(this).val() == 2) {
                $("#bannerAdd").hide();
                $("#scriptAdd").show();
            }
        });
        $(document).on("change",".custom-file-input",function(){
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $('.delete').on('click', function () {
            var modal = $('#deleteAds');
            modal.find('input[name=id]').val($(this).data('id'))
            modal.modal('show');
        });
      
     </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/admin/ads/index.blade.php ENDPATH**/ ?>