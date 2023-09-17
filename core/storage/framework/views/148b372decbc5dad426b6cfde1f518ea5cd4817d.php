
<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('Cron Job Setting Instruction'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 my-2">
                        <p class="cron-p-style"><?php echo app('translator')->get('To Automate service booking expired and buyer money refund result run the'); ?><code> <?php echo app('translator')->get('cron job'); ?> </code><?php echo app('translator')->get('on your server. Set the Cron time as minimum as possible. Once per'); ?><code> <?php echo app('translator')->get('5-15'); ?> </code><?php echo app('translator')->get('minutes is ideal'); ?>.</p>
                    </div>
                    <div class="col-md-12">
                        <label><?php echo app('translator')->get('Cron Command'); ?></label>
                        <div class="input-group ">
                            <input id="cron" type="text" class="form-control form-control-lg"
                                   value="curl -s <?php echo e(route('service.cron')); ?>"  readonly="">
                            <div class="input-group-append" id="copybtn">
                                <span class="input-group-text btn--success"
                                      title="" onclick="myFunction()" ><?php echo app('translator')->get('COPY'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 my-2">
                        <p class="cron-p-style"><?php echo app('translator')->get('To automate employees delivery time expired and buyer money refund result run the'); ?><code> <?php echo app('translator')->get('cron job'); ?> </code><?php echo app('translator')->get('on your server. Set the cron time as minimum as possible. Once per'); ?><code> <?php echo app('translator')->get('5-15'); ?> </code><?php echo app('translator')->get('minutes is ideal'); ?>.</p>
                    </div>
                    <div class="col-md-12">
                        <label><?php echo app('translator')->get('Cron Command'); ?></label>
                        <div class="input-group ">
                            <input id="ref" type="text" class="form-control form-control-lg"
                                   value="curl -s <?php echo e(route('job.cron')); ?>"  readonly="">
                            <div class="input-group-append" id="copybtn">
                                <span class="input-group-text btn--success"
                                      title="" onclick="myFunction2()" ><?php echo app('translator')->get('COPY'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
            </div>
        </div>
    </div>
</div>



<?php $__env->startPush('script'); ?>
    <?php if(Carbon\Carbon::parse($general->last_cron_run)->diffInSeconds()>=900): ?>
        <script>
            'use strict';
            (function($){
                $("#myModal").modal('show');
            })(jQuery)
            function myFunction() {
                var copyText = document.getElementById("cron");
                copyText.select();
                copyText.setSelectionRange(0, 99999)
                document.execCommand("copy");
                notify('success', 'Url copied successfully ' + copyText.value);
            }
            function myFunction2() {
                var copyText = document.getElementById("ref");
                copyText.select();
                copyText.setSelectionRange(0, 99999)
                document.execCommand("copy");
                notify('success', 'Url copied successfully ' + copyText.value);
            }
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/admin/partials/cron.blade.php ENDPATH**/ ?>