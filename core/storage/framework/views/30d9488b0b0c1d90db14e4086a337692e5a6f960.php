<?php
    $staffAccess = Auth::guard('admin')->user()->staff_access;
?>
<div class="sidebar <?php echo e(sidebarVariation()['selector']); ?> <?php echo e(sidebarVariation()['sidebar']); ?> <?php echo e(@sidebarVariation()['overlay']); ?> <?php echo e(@sidebarVariation()['opacity']); ?>"
    data-background="<?php echo e(getImage('assets/admin/images/sidebar/1.jpg', '400x800')); ?>">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar__main-logo"><img
                    src="<?php echo e(getImage(imagePath()['logoIcon']['path'] . '/logo.png')); ?>" alt="<?php echo app('translator')->get('image'); ?>"></a>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar__logo-shape"><img
                    src="<?php echo e(getImage(imagePath()['logoIcon']['path'] . '/favicon.png')); ?>" alt="<?php echo app('translator')->get('image'); ?>"></a>
            <button type="button" class="navbar__expand"></button>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <?php if(in_array('1', $staffAccess)): ?>
                    <li class="sidebar-menu-item <?php echo e(menuActive('admin.dashboard')); ?>">
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link ">
                            <i class="menu-icon las la-home"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Dashboard'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(in_array('9', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.users*', 3)); ?>">
                            <i class="menu-icon las la-users"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Manage Users'); ?></span>

                            <?php if($banned_users_count > 0 || $email_unverified_users_count > 0 || $sms_unverified_users_count > 0): ?>
                                <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                            <?php endif; ?>
                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.users*', 2)); ?> ">
                            <ul>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.all')); ?> ">
                                    <a href="<?php echo e(route('admin.users.all')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('All Users'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.active')); ?> ">
                                    <a href="<?php echo e(route('admin.users.active')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Active Users'); ?></span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.banned')); ?> ">
                                    <a href="<?php echo e(route('admin.users.banned')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Banned Users'); ?></span>
                                        <?php if($banned_users_count): ?>
                                            <span
                                                class="menu-badge pill bg--primary ml-auto"><?php echo e($banned_users_count); ?></span>
                                        <?php endif; ?>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item  <?php echo e(menuActive('admin.users.email.unverified')); ?>">
                                    <a href="<?php echo e(route('admin.users.email.unverified')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Email Unverified'); ?></span>

                                        <?php if($email_unverified_users_count): ?>
                                            <span
                                                class="menu-badge pill bg--primary ml-auto"><?php echo e($email_unverified_users_count); ?></span>
                                        <?php endif; ?>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.sms.unverified')); ?>">
                                    <a href="<?php echo e(route('admin.users.sms.unverified')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('SMS Unverified'); ?></span>
                                        <?php if($sms_unverified_users_count): ?>
                                            <span
                                                class="menu-badge pill bg--primary ml-auto"><?php echo e($sms_unverified_users_count); ?></span>
                                        <?php endif; ?>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.with.balance')); ?>">
                                    <a href="<?php echo e(route('admin.users.with.balance')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('With Balance'); ?></span>
                                    </a>
                                </li>


                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.users.email.all')); ?>">
                                    <a href="<?php echo e(route('admin.users.email.all')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Email to All'); ?></span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                <?php endif; ?>


                <?php if(in_array('2', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.booking.service*', 3)); ?>">
                            <i class="menu-icon las la-shopping-bag"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Service Booking'); ?></span>
                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.booking.service*', 2)); ?> ">
                            <ul>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.booking.service.index')); ?> ">
                                    <a href="<?php echo e(route('admin.booking.service.index')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('All'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.booking.service.pending')); ?> ">
                                    <a href="<?php echo e(route('admin.booking.service.pending')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Pending'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.booking.service.completed')); ?> ">
                                    <a href="<?php echo e(route('admin.booking.service.completed')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Completed'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.booking.service.delivered')); ?> ">
                                    <a href="<?php echo e(route('admin.booking.service.delivered')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Delivered'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.booking.service.inProgress')); ?> ">
                                    <a href="<?php echo e(route('admin.booking.service.inProgress')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('In-progress'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.booking.service.dispute')); ?> ">
                                    <a href="<?php echo e(route('admin.booking.service.dispute')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Dispute'); ?></span>
                                    </a>
                                </li>


                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.booking.service.expired')); ?> ">
                                    <a href="<?php echo e(route('admin.booking.service.expired')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Expired'); ?></span>
                                    </a>
                                </li>


                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.booking.service.cacnel')); ?> ">
                                    <a href="<?php echo e(route('admin.booking.service.cacnel')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Cancel'); ?></span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(in_array('3', $staffAccess)): ?>
                    <li class="sidebar-menu-item  <?php echo e(menuActive('admin.sales.software.index')); ?>">
                        <a href="<?php echo e(route('admin.sales.software.index')); ?>" class="nav-link"
                            data-default-url="<?php echo e(route('admin.sales.software.index')); ?>">
                            <i class="menu-icon las la-shopping-cart"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Sales Software'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>


                <?php if(in_array('4', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.hire*', 3)); ?>">
                            <i class="menu-icon las la-user-secret"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Hire Employees'); ?></span>
                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.hire*', 2)); ?> ">
                            <ul>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.hire.index')); ?> ">
                                    <a href="<?php echo e(route('admin.hire.index')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('All'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.hire.completed')); ?> ">
                                    <a href="<?php echo e(route('admin.hire.completed')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Completed'); ?></span>
                                    </a>
                                </li>


                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.hire.delivered')); ?> ">
                                    <a href="<?php echo e(route('admin.hire.delivered')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Delivered'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.hire.inprogress')); ?> ">
                                    <a href="<?php echo e(route('admin.hire.inprogress')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('In-progress'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.hire.expired')); ?> ">
                                    <a href="<?php echo e(route('admin.hire.expired')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Expired'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.hire.dispute')); ?> ">
                                    <a href="<?php echo e(route('admin.hire.dispute')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Dispute'); ?></span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                <?php endif; ?>



                <?php if(in_array('5', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.service*', 3)); ?>">
                            <i class="menu-icon lab la-servicestack"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Manage Service'); ?></span>
                            <?php if($servicePending > 0): ?>
                                <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                            <?php endif; ?>
                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.service*', 2)); ?> ">
                            <ul>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.service.index')); ?> ">
                                    <a href="<?php echo e(route('admin.service.index')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('All'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.service.pending')); ?> ">
                                    <a href="<?php echo e(route('admin.service.pending')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Pending'); ?></span>
                                        <?php if($servicePending): ?>
                                            <span
                                                class="menu-badge pill bg--primary ml-auto"><?php echo e($servicePending); ?></span>
                                        <?php endif; ?>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.service.approved')); ?> ">
                                    <a href="<?php echo e(route('admin.service.approved')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Approved'); ?></span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.service.cancel')); ?> ">
                                    <a href="<?php echo e(route('admin.service.cancel')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Cancel'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(in_array('6', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.software*', 3)); ?>">
                            <i class="menu-icon  lab la-gitlab"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Manage Software'); ?></span>
                            <?php if($softwarePending > 0): ?>
                                <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                            <?php endif; ?>
                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.software*', 2)); ?> ">
                            <ul>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.software.index')); ?> ">
                                    <a href="<?php echo e(route('admin.software.index')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('All'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.software.pending')); ?> ">
                                    <a href="<?php echo e(route('admin.software.pending')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Pending'); ?></span>
                                        <?php if($softwarePending): ?>
                                            <span
                                                class="menu-badge pill bg--primary ml-auto"><?php echo e($softwarePending); ?></span>
                                        <?php endif; ?>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.software.approved')); ?> ">
                                    <a href="<?php echo e(route('admin.software.approved')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Approved'); ?></span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.software.cancel')); ?> ">
                                    <a href="<?php echo e(route('admin.software.cancel')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Cancel'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(in_array('7', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.job*', 3)); ?>">
                            <i class="menu-icon las la-tasks"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Manage Job'); ?></span>
                            <?php if($jobPending > 0): ?>
                                <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                            <?php endif; ?>
                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.job*', 2)); ?> ">
                            <ul>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.job.index')); ?> ">
                                    <a href="<?php echo e(route('admin.job.index')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('All'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.job.pending')); ?> ">
                                    <a href="<?php echo e(route('admin.job.pending')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Pending'); ?></span>
                                        <?php if($jobPending): ?>
                                            <span
                                                class="menu-badge pill bg--primary ml-auto"><?php echo e($jobPending); ?></span>
                                        <?php endif; ?>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.job.approved')); ?> ">
                                    <a href="<?php echo e(route('admin.job.approved')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Approved'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.job.closed')); ?> ">
                                    <a href="<?php echo e(route('admin.job.closed')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Closed'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.job.cancel')); ?> ">
                                    <a href="<?php echo e(route('admin.job.cancel')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Cancel'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(in_array('34', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.staff*', 3)); ?>">
                            <i class="menu-icon las la-user-lock"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Manage Staff'); ?></span>
                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.staff*', 2)); ?> ">
                            <ul>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.staff.index')); ?> ">
                                    <a href="<?php echo e(route('admin.staff.index')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('All'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.staff.create')); ?> ">
                                    <a href="<?php echo e(route('admin.staff.create')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Create'); ?></span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(in_array('8', $staffAccess)): ?>
                    <li class="sidebar-menu-item  <?php echo e(menuActive('admin.ads.index')); ?>">
                        <a href="<?php echo e(route('admin.ads.index')); ?>" class="nav-link"
                            data-default-url="<?php echo e(route('admin.ads.index')); ?>">
                            <i class="menu-icon las la-tags"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Manage Advertises'); ?> </span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(in_array('33', $staffAccess)): ?>
                    <li class="sidebar-menu-item  <?php echo e(menuActive('admin.rank.index')); ?>">
                        <a href="<?php echo e(route('admin.rank.index')); ?>" class="nav-link"
                            data-default-url="<?php echo e(route('admin.rank.index')); ?>">
                            <i class="menu-icon las la-level-up-alt"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Manage Rank'); ?> </span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(in_array('10', $staffAccess)): ?>
                    <li class="sidebar-menu-item  <?php echo e(menuActive('admin.coupon.index')); ?>">
                        <a href="<?php echo e(route('admin.coupon.index')); ?>" class="nav-link"
                            data-default-url="<?php echo e(route('admin.coupon.index')); ?>">
                            <i class="menu-icon lab la-discourse"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Setup Coupon'); ?> </span>
                        </a>
                    </li>
                <?php endif; ?>
 <?php if(in_array('35', $staffAccess)): ?>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.staff*', 3)); ?>">
                    <i class="menu-icon fas fa-gift"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Reward'); ?></span>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.staff*', 2)); ?> ">
                        <ul>
                            <li class="sidebar-menu-item  <?php echo e(menuActive('admin.reward.index')); ?>">
                                <a href="<?php echo e(route('admin.reward.index')); ?>" class="nav-link" data-default-url="<?php echo e(route('admin.reward.index')); ?>">
                                    <i class="menu-icon fas fa-wrench"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Setup Reward'); ?> </span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.reward.review')); ?> ">
                                <a href="<?php echo e(route('admin.reward.review')); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Review'); ?></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <?php endif; ?>
                <?php if(in_array('11', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.category*', 3)); ?>">
                            <i class="menu-icon las la-bible"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Manage Category'); ?></span>

                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.category*', 2)); ?> ">
                            <ul>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.category.index')); ?> ">
                                    <a href="<?php echo e(route('admin.category.index')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Category'); ?></span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.category.subcategory.index')); ?> ">
                                    <a href="<?php echo e(route('admin.category.subcategory.index')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Sub Category'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(in_array('12', $staffAccess)): ?>
                    <li class="sidebar-menu-item  <?php echo e(menuActive('admin.features.index')); ?>">
                        <a href="<?php echo e(route('admin.features.index')); ?>" class="nav-link"
                            data-default-url="<?php echo e(route('admin.features.index')); ?>">
                            <i class="menu-icon las la-exchange-alt"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Features'); ?> </span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(in_array('13', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.gateway*', 3)); ?>">
                            <i class="menu-icon las la-credit-card"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Payment Gateways'); ?></span>

                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.gateway*', 2)); ?> ">
                            <ul>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.gateway.automatic.index')); ?> ">
                                    <a href="<?php echo e(route('admin.gateway.automatic.index')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Automatic Gateways'); ?></span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.gateway.manual.index')); ?> ">
                                    <a href="<?php echo e(route('admin.gateway.manual.index')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Manual Gateways'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(in_array('14', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.deposit*', 3)); ?>">
                            <i class="menu-icon las la-credit-card"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Deposits'); ?></span>
                            <?php if(0 < $pending_deposits_count): ?>
                                <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                            <?php endif; ?>
                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.deposit*', 2)); ?> ">
                            <ul>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.deposit.pending')); ?> ">
                                    <a href="<?php echo e(route('admin.deposit.pending')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Pending Deposits'); ?></span>
                                        <?php if($pending_deposits_count): ?>
                                            <span
                                                class="menu-badge pill bg--primary ml-auto"><?php echo e($pending_deposits_count); ?></span>
                                        <?php endif; ?>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.deposit.approved')); ?> ">
                                    <a href="<?php echo e(route('admin.deposit.approved')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Approved Deposits'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.deposit.successful')); ?> ">
                                    <a href="<?php echo e(route('admin.deposit.successful')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Successful Deposits'); ?></span>
                                    </a>
                                </li>


                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.deposit.rejected')); ?> ">
                                    <a href="<?php echo e(route('admin.deposit.rejected')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Rejected Deposits'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.deposit.list')); ?> ">
                                    <a href="<?php echo e(route('admin.deposit.list')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('All Deposits'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(in_array('15', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.withdraw*', 3)); ?>">
                            <i class="menu-icon la la-bank"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Withdrawals'); ?> </span>
                            <?php if(0 < $pending_withdraw_count): ?>
                                <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                            <?php endif; ?>
                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.withdraw*', 2)); ?> ">
                            <ul>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.withdraw.method.index')); ?>">
                                    <a href="<?php echo e(route('admin.withdraw.method.index')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Withdrawal Methods'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.withdraw.pending')); ?> ">
                                    <a href="<?php echo e(route('admin.withdraw.pending')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Pending Log'); ?></span>

                                        <?php if($pending_withdraw_count): ?>
                                            <span
                                                class="menu-badge pill bg--primary ml-auto"><?php echo e($pending_withdraw_count); ?></span>
                                        <?php endif; ?>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.withdraw.approved')); ?> ">
                                    <a href="<?php echo e(route('admin.withdraw.approved')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Approved Log'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.withdraw.rejected')); ?> ">
                                    <a href="<?php echo e(route('admin.withdraw.rejected')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Rejected Log'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.withdraw.log')); ?> ">
                                    <a href="<?php echo e(route('admin.withdraw.log')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Withdrawals Log'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>


                <?php if(in_array('16', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.ticket*', 3)); ?>">
                            <i class="menu-icon la la-ticket"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Support Ticket'); ?> </span>
                            <?php if(0 < $pending_ticket_count): ?>
                                <span class="menu-badge pill bg--primary ml-auto">
                                    <i class="fa fa-exclamation"></i>
                                </span>
                            <?php endif; ?>
                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.ticket*', 2)); ?> ">
                            <ul>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket')); ?> ">
                                    <a href="<?php echo e(route('admin.ticket')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('All Ticket'); ?></span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket.pending')); ?> ">
                                    <a href="<?php echo e(route('admin.ticket.pending')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Pending Ticket'); ?></span>
                                        <?php if($pending_ticket_count): ?>
                                            <span
                                                class="menu-badge pill bg--primary ml-auto"><?php echo e($pending_ticket_count); ?></span>
                                        <?php endif; ?>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket.closed')); ?> ">
                                    <a href="<?php echo e(route('admin.ticket.closed')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Closed Ticket'); ?></span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.ticket.answered')); ?> ">
                                    <a href="<?php echo e(route('admin.ticket.answered')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Answered Ticket'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>


                <?php if(in_array('17', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.report*', 3)); ?>">
                            <i class="menu-icon la la-list"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Report'); ?> </span>
                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.report*', 2)); ?> ">
                            <ul>
                                <li
                                    class="sidebar-menu-item <?php echo e(menuActive(['admin.report.transaction', 'admin.report.transaction.search'])); ?>">
                                    <a href="<?php echo e(route('admin.report.transaction')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Transaction Log'); ?></span>
                                    </a>
                                </li>

                                <li
                                    class="sidebar-menu-item <?php echo e(menuActive(['admin.report.login.history', 'admin.report.login.ipHistory'])); ?>">
                                    <a href="<?php echo e(route('admin.report.login.history')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Login History'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.report.email.history')); ?>">
                                    <a href="<?php echo e(route('admin.report.email.history')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Email History'); ?></span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                <?php endif; ?>


                <?php if(in_array('18', $staffAccess)): ?>
                    <li class="sidebar-menu-item  <?php echo e(menuActive('admin.subscriber.index')); ?>">
                        <a href="<?php echo e(route('admin.subscriber.index')); ?>" class="nav-link"
                            data-default-url="<?php echo e(route('admin.subscriber.index')); ?>">
                            <i class="menu-icon las la-thumbs-up"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Subscribers'); ?> </span>
                        </a>
                    </li>
                <?php endif; ?>


                <li class="sidebar__menu-header"><?php echo app('translator')->get('Settings'); ?></li>

                <?php if(in_array('19', $staffAccess)): ?>
                    <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.index')); ?>">
                        <a href="<?php echo e(route('admin.setting.index')); ?>" class="nav-link">
                            <i class="menu-icon las la-life-ring"></i>
                            <span class="menu-title"><?php echo app('translator')->get('General Setting'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(in_array('20', $staffAccess)): ?>
                    <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.logo.icon')); ?>">
                        <a href="<?php echo e(route('admin.setting.logo.icon')); ?>" class="nav-link">
                            <i class="menu-icon las la-images"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Logo & Favicon'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(in_array('21', $staffAccess)): ?>
                    <li class="sidebar-menu-item <?php echo e(menuActive('admin.extensions.index')); ?>">
                        <a href="<?php echo e(route('admin.extensions.index')); ?>" class="nav-link">
                            <i class="menu-icon las la-cogs"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Extensions'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(in_array('22', $staffAccess)): ?>
                    <li class="sidebar-menu-item  <?php echo e(menuActive(['admin.language.manage', 'admin.language.key'])); ?>">
                        <a href="<?php echo e(route('admin.language.manage')); ?>" class="nav-link"
                            data-default-url="<?php echo e(route('admin.language.manage')); ?>">
                            <i class="menu-icon las la-language"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Language'); ?> </span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(in_array('23', $staffAccess)): ?>
                    <li class="sidebar-menu-item <?php echo e(menuActive('admin.seo')); ?>">
                        <a href="<?php echo e(route('admin.seo')); ?>" class="nav-link">
                            <i class="menu-icon las la-globe"></i>
                            <span class="menu-title"><?php echo app('translator')->get('SEO Manager'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(in_array('24', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.email.template*', 3)); ?>">
                            <i class="menu-icon la la-envelope-o"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Email Manager'); ?></span>
                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.email.template*', 2)); ?> ">
                            <ul>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.email.template.global')); ?> ">
                                    <a href="<?php echo e(route('admin.email.template.global')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Global Template'); ?></span>
                                    </a>
                                </li>
                                <li
                                    class="sidebar-menu-item <?php echo e(menuActive(['admin.email.template.index', 'admin.email.template.edit'])); ?> ">
                                    <a href="<?php echo e(route('admin.email.template.index')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Email Templates'); ?></span>
                                    </a>
                                </li>

                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.email.template.setting')); ?> ">
                                    <a href="<?php echo e(route('admin.email.template.setting')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Email Configure'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(in_array('25', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.sms.template*', 3)); ?>">
                            <i class="menu-icon la la-mobile"></i>
                            <span class="menu-title"><?php echo app('translator')->get('SMS Manager'); ?></span>
                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.sms.template*', 2)); ?> ">
                            <ul>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.sms.template.global')); ?> ">
                                    <a href="<?php echo e(route('admin.sms.template.global')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('Global Setting'); ?></span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item <?php echo e(menuActive('admin.sms.templates.setting')); ?> ">
                                    <a href="<?php echo e(route('admin.sms.templates.setting')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('SMS Gateways'); ?></span>
                                    </a>
                                </li>
                                <li
                                    class="sidebar-menu-item <?php echo e(menuActive(['admin.sms.template.index', 'admin.sms.template.edit'])); ?> ">
                                    <a href="<?php echo e(route('admin.sms.template.index')); ?>" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title"><?php echo app('translator')->get('SMS Templates'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(in_array('26', $staffAccess)): ?>
                    <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.cookie')); ?>">
                        <a href="<?php echo e(route('admin.setting.cookie')); ?>" class="nav-link">
                            <i class="menu-icon las la-cookie-bite"></i>
                            <span class="menu-title"><?php echo app('translator')->get('GDPR Cookie'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="sidebar__menu-header"><?php echo app('translator')->get('Frontend Manager'); ?></li>

                <?php if(in_array('27', $staffAccess)): ?>
                    <li class="sidebar-menu-item <?php echo e(menuActive('admin.frontend.templates')); ?>">
                        <a href="<?php echo e(route('admin.frontend.templates')); ?>" class="nav-link ">
                            <i class="menu-icon la la-html5"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Manage Templates'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>


                <?php if(in_array('28', $staffAccess)): ?>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="<?php echo e(menuActive('admin.frontend.sections*', 3)); ?>">
                            <i class="menu-icon la la-html5"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Manage Section'); ?></span>
                        </a>
                        <div class="sidebar-submenu <?php echo e(menuActive('admin.frontend.sections*', 2)); ?> ">
                            <ul>
                                <?php
                                    $lastSegment = collect(request()->segments())->last();
                                ?>
                                <?php $__currentLoopData = getPageSections(true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $secs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($secs['builder']): ?>
                                        <li
                                            class="sidebar-menu-item  <?php if($lastSegment == $k): ?> active <?php endif; ?> ">
                                            <a href="<?php echo e(route('admin.frontend.sections', [$k,"*"])); ?>" class="nav-link">
                                                <i class="menu-icon las la-dot-circle"></i>
                                                <span class="menu-title"><?php echo e(__($secs['name'])); ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="">
                        <i class="menu-icon la la-html5"></i>
                        <span class="menu-title"><?php echo app('translator')->get('Manage Blog'); ?></span>
                    </a>
                    <div class="sidebar-submenu <?php echo e(menuActive('admin.frontend.sections', ['blog','all'])); ?>">
                        <ul>
                            <li class="sidebar-menu-item <?php echo e(menuActive('admin.frontend.sections', ['blog','all'])); ?>">
                                <a href="<?php echo e(route('admin.frontend.sections', ['blog','all'])); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('All'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item ">
                                <a href="<?php echo e(route('admin.frontend.sections', ['blog','published'])); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Published'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item ">
                                <a href="<?php echo e(route('admin.frontend.sections', ['blog','pending'])); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Pending'); ?></span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item ">
                                <a href="<?php echo e(route('admin.frontend.sections', ['blog','rejected'])); ?>" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title"><?php echo app('translator')->get('Rejected'); ?></span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

                <li class="sidebar__menu-header"><?php echo app('translator')->get('Extra'); ?></li>

                <?php if(in_array('29', $staffAccess)): ?>
                    <li class="sidebar-menu-item  <?php echo e(menuActive('admin.system.info')); ?>">
                        <a href="<?php echo e(route('admin.system.info')); ?>" class="nav-link"
                            data-default-url="<?php echo e(route('admin.system.info')); ?>">
                            <i class="menu-icon las la-server"></i>
                            <span class="menu-title"><?php echo app('translator')->get('System Information'); ?> </span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(in_array('30', $staffAccess)): ?>
                    <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.custom.css')); ?>">
                        <a href="<?php echo e(route('admin.setting.custom.css')); ?>" class="nav-link">
                            <i class="menu-icon lab la-css3-alt"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Custom CSS'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(in_array('31', $staffAccess)): ?>
                    <li class="sidebar-menu-item <?php echo e(menuActive('admin.setting.optimize')); ?>">
                        <a href="<?php echo e(route('admin.setting.optimize')); ?>" class="nav-link">
                            <i class="menu-icon las la-broom"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Clear Cache'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(in_array('32', $staffAccess)): ?>
                    <li class="sidebar-menu-item  <?php echo e(menuActive('admin.request.report')); ?>">
                        <a href="<?php echo e(route('admin.request.report')); ?>" class="nav-link"
                            data-default-url="<?php echo e(route('admin.request.report')); ?>">
                            <i class="menu-icon las la-bug"></i>
                            <span class="menu-title"><?php echo app('translator')->get('Report & Request'); ?> </span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="text-center mb-3 text-uppercase">
                <span class="text--primary"><?php echo e(__(systemDetails()['name'])); ?></span>
                <span class="text--success"><?php echo app('translator')->get('V'); ?><?php echo e(systemDetails()['version']); ?> </span>
            </div>
        </div>
    </div>
</div>
<!-- sidebar end -->
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/admin/partials/sidenav.blade.php ENDPATH**/ ?>