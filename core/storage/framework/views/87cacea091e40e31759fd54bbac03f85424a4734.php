 <div class="item-bottom-area">
                                <div class="row justify-content-center mb-30-none">
                                    <div class="col-xl-9 col-lg-9 mb-30">
                                        <div class="item-card-wrapper list-view">
                                            <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php
                                            $path = match($service['type']){
                                                'service'=>'assets/images/service/',
                                                'product'=>'assets/images/software/',
                                                'job'=>'assets/images/job/'
                                            };
                                             $rpath = match($service['type']){
                                                'service'=>'service.details',
                                                'product'=>'software.details',
                                                'job'=>'job.details'
                                            }
                                            ?>
                                            <?php if($service['type']=='service'): ?>
                                                <div class="item-card">
                                                    <div class="item-card-thumb">
                                                        <img src="<?php echo e(getImage($path.$service['image'],imagePath()['service']['size'])); ?>" alt="<?php echo app('translator')->get('Service Image'); ?>">
                                                        <?php if(isset($service['featured']) && $service['featured'] == 1): ?>
                                                            <div class="item-level"><?php echo app('translator')->get('Featured'); ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="item-card-content">
                                                        <div class="item-card-content-top">
                                                            <div class="left">
                                                                <div class="author-thumb">
                                                                    <img src="<?php echo e(userDefaultImage(imagePath()['profile']['user']['path'].'/'. $service['user']['image'], 'profile_image')); ?>" alt="<?php echo e(__($service['user']['username'])); ?>">
                                                                </div>
                                                                <div class="author-content">
                                                                    <h5 class="name"><a href="<?php echo e(route('profile', $service['user']['username'])); ?>"><?php echo e(__($service['user']['username'])); ?></a> <span class="level-text"> <?php echo e(__(@$service['user']['rank']['level'])); ?></span></h5>
                                                                    <div class="ratings">
                                                                        <i class="fas fa-star"></i>
                                                                        <span class="rating me-2"><?php echo e(__(getAmount(data_get($service,'rating'), 2))); ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="right">
                                                                <div class="item-amount"><?php echo e(__($general->cur_sym)); ?><?php echo e(__(showAmount(data_get($service,'price',0)))); ?></div>
                                                            </div>
                                                        </div>
                                                        <h3 class="item-card-title"><a href="<?php echo e(route($rpath, [slug($service['title']), encrypt($service['id'])])); ?>"><?php echo e(__($service['title'])); ?></a></h3>
                                                    </div>
                                                    <div class="item-card-footer">
                                                        <div class="left">
                                                            <a href="javascript:void(0)" class="item-love me-2 loveHeartAction" data-serviceid="<?php echo e($service['id']); ?>"><i class="fas fa-heart"></i> <span class="give-love-amount">(<?php echo e(__(data_get($service,'favorite'))); ?>)</span></a>
                                                            <a href="javascript:void(0)" class="item-like"><i class="las la-thumbs-up"></i> (<?php echo e(data_get($service,'likes')); ?>)</a>
                                                        </div>
                                                        <div class="right">
                                                            <div class="order-btn">
                                                                <a href="<?php echo e(route('user.service.booking', [slug($service['title']), encrypt($service['id'])])); ?>" class="btn--base"><i class="las la-shopping-cart"></i> <?php echo app('translator')->get('Order Now'); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php elseif($service['type']=='job'): ?>
                                            <?php
                                           $job = $service
                                            ?>
<div class="item-card">
                                                <div class="item-card-thumb">
                                                    <img src="<?php echo e(getImage('assets/images/job/'.$job['image'],'590x300')); ?>" alt="<?php echo app('translator')->get('Job Image'); ?>">
                                                </div>
                                                <div class="item-card-content">
                                                    <div class="item-card-content-top">
                                                        <div class="left">
                                                            <div class="author-thumb">
                                                                <img src="<?php echo e(userDefaultImage(imagePath()['profile']['user']['path'].'/'. $job['user']['image'],'profile_image')); ?>" alt="<?php echo app('translator')->get('author'); ?>">
                                                            </div>
                                                            <div class="author-content">
                                                                <h5 class="name"><a href="<?php echo e(route('profile', $job['user']['username'])); ?>"><?php echo e($job['user']['username']); ?></a> <span class="level-text"><?php echo e(__(@$job['user']['rank']['level'])); ?></span></h5>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="right">
                                                            <div class="item-amount"><?php echo e($general->cur_sym); ?><?php echo e(showAmount($job['amount'])); ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="item-tags order-3">
                                                        <?php $__currentLoopData = $job['skill']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a href="javascript:void(0)"><?php echo e(__($skill)); ?></a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <h3 class="item-card-title"><a href="<?php echo e(route('job.details', [slug($job['title']), encrypt($job['id'])])); ?>"><?php echo e(__($job['title'])); ?></a></h3>
                                                </div>
                                                <div class="item-card-footer mb-10-none">
                                                    <div class="left mb-10">
                                                        <a href="javascript:void(0)" class="btn--base active date-btn"><?php echo e($job['delivery_time']); ?> <?php echo app('translator')->get('Days'); ?></a>
                                                        <!--<a href="javascript:void(0)" class="btn--base bid-btn"><?php echo app('translator')->get('Total Bids'); ?>(<?php echo e(count(data_get($job,'jobBiding',[]))); ?>)</a>-->
                                                        <a href="javascript:void(0)" class="btn--base bid-btn"><?php echo app('translator')->get('Total Bids'); ?>(<?php echo e(count($job['job_biding'])); ?>)</a>
                                                    </div>
                                                    <div class="right mb-10">
                                                        <div class="order-btn">
                                                            <a href="<?php echo e(route('job.details', [slug($job['title']), encrypt($job['id'])])); ?>" class="btn--base"><i class="las la-shopping-cart"></i> <?php echo app('translator')->get('Bid Now'); ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php elseif($service['type']=='product'): ?>
                                            <?php
                                            $software = $service;
                                            ?>
                                             <div class="item-card">
                                                <div class="item-card-thumb">
                                                    <img src="<?php echo e(getImage('assets/images/software/'.$software['image'],imagePath()['software']['size'])); ?>" alt="<?php echo app('translator')->get('product image'); ?>">
                                                </div>
                                                <div class="item-card-content">
                                                    <div class="item-card-content-top">
                                                        <div class="left">
                                                            <div class="author-thumb">
                                                                <img src="<?php echo e(userDefaultImage(imagePath()['profile']['user']['path'].'/'. $software['user']['image'],'profile_image')); ?>" alt="<?php echo e(__($software['user']['username'])); ?>">
                                                            </div>
                                                            <div class="author-content">
                                                                <h5 class="name"><a href="<?php echo e(route('profile', $software['user']['username'])); ?>"><?php echo e(__($software['user']['username'])); ?></a> <span class="level-text"><?php echo e(__(@$software['user']['rank']['level'])); ?></span></h5>
                                                                <div class="ratings">
                                                                    <i class="fas fa-star"></i>
                                                                    <span class="rating me-2"><?php echo e(showAmount($software['rating'])); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="right">
                                                            <div class="item-amount"><?php echo e($general->cur_sym); ?><?php echo e(showAmount($software['amount'])); ?></div>
                                                        </div>
                                                    </div>
                                                    <h3 class="item-card-title"><a href="<?php echo e(route('software.details', [slug($software['title']), encrypt($software['id'])])); ?>"><?php echo e(__($software['title'])); ?></a></h3>
                                                </div>
                                                <div class="item-card-footer">
                                                    <div class="left">
                                                        <a href="javascript:void(0)" class="item-love me-2 loveHeartActionSoftware" data-softwareid="<?php echo e($software['id']); ?>"><i class="fas fa-heart"></i> <span class="give-love-amount">(<?php echo e(__($software['favorite'])); ?>)</span></a>
                                                        <a href="javascript:void(0)" class="item-like"><i class="las la-thumbs-up"></i> (<?php echo e(__($software['likes'])); ?>)</a>
                                                        <a href="<?php echo e(route('user.software.buy',[slug($software['title']), encrypt($software['id'])])); ?>" class="btn--base active buy-btn"><i class="las la-shopping-cart"></i> <?php echo app('translator')->get('Buy Now'); ?></a>
                                                    </div>
                                                    <div class="right">
                                                        <?php if($software['product_type'] > 2): ?>
                                                        <div class="order-btn">
                                                            <a href="<?php echo e($software['demo_url']); ?>" target="__blank" class="btn--base"><i class="las la-desktop"></i> <?php echo app('translator')->get('Preview'); ?></a>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <div class="empty-message-box bg--gray">
                                                    <div class="icon"><i class="las la-frown"></i></div>
                                                    <p class="caption"><?php echo e(__($emptyMessage)); ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/partials/load_data.blade.php ENDPATH**/ ?>