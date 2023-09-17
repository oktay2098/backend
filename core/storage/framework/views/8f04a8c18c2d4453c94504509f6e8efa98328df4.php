<div class="col-xl-3 col-lg-3 mb-30">
    <div class="dashboard-sidebar">
        <button type="button" class="dashboard-sidebar-close"><i class="fas fa-times"></i></button>

        <div class="dashboard-sidebar-inner">
            <div class="dashboard-sidebar-wrapper-inner">
                <div>
                    <div class="d-flex justify-content-center">
                        <a href="<?php echo e(route('profile', auth()->user()->username)); ?>">
                            <img class="sidebar-profile"
                                src="<?php echo e(getImage('assets/images/user/profile/' . auth()->user()->image, '400x400')); ?>"
                                alt="client" style="height: 60px; width: 60px; border-radius: 50%;">
                        </a>
                    </div>
                    <div class="text-center">
                        <strong class="title"><?php echo e('@' . auth()->user()->username); ?></strong>
                        <label
                            class="sub-title"><?php echo e(auth()->user()->firstname . ' ' . auth()->user()->lastname); ?></label>
                    </div>
                </div>
                <ul id="sidebar-main-menu" class="sidebar-main-menu">
                    <li class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.home') ? 'open' : ''); ?> ">
                        <a href="<?php echo e(route('user.home')); ?>">
                            <i class="lab la-buffer"></i> <span class="title"><?php echo app('translator')->get('Dashboard'); ?></span>
                        </a>
                    </li>
                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.service.index') || request()->routeIs('user.service.edit') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.service.index')); ?>">
                            <i class="las la-list"></i> <span class="title"><?php echo app('translator')->get('Manage Services'); ?></span>
                        </a>
                    </li>
                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.software.index') || request()->routeIs('user.software.edit') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.software.index')); ?>">
                            <i class="lab la-microsoft"></i> <span class="title"><?php echo app('translator')->get('Manage Product'); ?></span>
                        </a>
                    </li>
                    <li class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.blog') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.blog')); ?>">
                            <i class="las la-blog"></i> <span class="title"><?php echo app('translator')->get('Manage Blogs'); ?></span>
                        </a>
                    </li>
                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.job.index') || request()->routeIs('user.job.edit') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.job.index')); ?>">
                            <i class="las la-list"></i> <span class="title"><?php echo app('translator')->get('Manage Job'); ?></span>
                        </a>
                    </li>
                </ul>

                <h5 class="menu-header-title"><?php echo app('translator')->get('Tools'); ?></h5>
                <ul id="sidebar-main-menu" class="sidebar-main-menu">
                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.conversation.inbox') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.conversation.inbox')); ?>">
                            <i class="las la-exchange-alt"></i> <span class="title"><?php echo app('translator')->get('Messages'); ?></span>
                        </a>
                    </li>
                    <li class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.rewards') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.rewards')); ?>">
                            <i class="las la-gift"></i> <span class="title"><?php echo app('translator')->get('Rewards'); ?></span>
                        </a>
                    </li>
                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.service.favorite') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.service.favorite')); ?>">
                            <i class="las la-crown"></i> <span class="title"><?php echo app('translator')->get('Favorite Service'); ?></span>
                        </a>
                    </li>
                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.software.favorite') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.software.favorite')); ?>">
                            <i class="las la-heart"></i> <span class="title"><?php echo app('translator')->get('Favorite Product'); ?></span>
                        </a>
                    </li>

                </ul>

                <h5 class="menu-header-title"><?php echo app('translator')->get('Sales'); ?></h5>
                <ul id="sidebar-main-menu" class="sidebar-main-menu">
                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.booking.service') || request()->routeIs('user.booking.service.details') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.booking.service')); ?>">
                            <i class="las la-exchange-alt"></i> <span class="title"><?php echo app('translator')->get('Service Booking'); ?></span>
                        </a>
                    </li>
                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.software.sales') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.software.sales')); ?>">
                            <i class="las la-history"></i> <span class="title"><?php echo app('translator')->get('Product Sales'); ?></span>
                        </a>
                    </li>
                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.job.vacancy') || request()->routeIs('user.seller.job.list.details') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.job.vacancy')); ?>">
                            <i class="las la-caret-square-up"></i> <span class="title"><?php echo app('translator')->get('Job List'); ?></span>
                        </a>
                    </li>


                </ul>

                <h5 class="menu-header-title"><?php echo app('translator')->get('PURCHASES'); ?></h5>
                <ul id="sidebar-main-menu" class="sidebar-main-menu">

                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.buyer.hire.employ') || request()->routeIs('user.buyer.hire.employ.details') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.buyer.hire.employ')); ?>">
                            <i class="lab la-hire-a-helper"></i> <span class="title"><?php echo app('translator')->get('Employees List'); ?></span>
                        </a>
                    </li>

                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.buyer.service.booked') || request()->routeIs('booked.service.details') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.buyer.service.booked')); ?>">
                            <i class="las la-exchange-alt"></i> <span class="title"><?php echo app('translator')->get('Service Booked'); ?></span>
                        </a>
                    </li>
                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.software.purchases') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.software.purchases')); ?>">
                            <i class="las la-history"></i> <span class="title"><?php echo app('translator')->get('Product Purchases'); ?></span>
                        </a>
                    </li>
                </ul>

                <h5 class="menu-header-title"><?php echo app('translator')->get('Money'); ?></h5>
                <ul id="sidebar-main-menu" class="sidebar-main-menu">
                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.buyer.transactions') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.buyer.transactions')); ?>">
                            <i class="las la-money-check-alt"></i> <span class="title"><?php echo app('translator')->get('Transaction Log'); ?></span>
                        </a>
                    </li>
                    <li class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.withdraw') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.withdraw')); ?>">
                            <i class="las la-money-check-alt"></i> <span class="title"><?php echo app('translator')->get('Withdraw Money'); ?></span>
                        </a>
                    </li>
                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.withdraw.history') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.withdraw.history')); ?>">
                            <i class="las la-history"></i> <span class="title"><?php echo app('translator')->get('Withdraw History'); ?></span>
                        </a>
                    </li>
                    <li class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.deposit') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.deposit')); ?>">
                            <i class="las la-money-check-alt"></i> <span class="title"><?php echo app('translator')->get('Deposit Money'); ?></span>
                        </a>
                    </li>
                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('user.deposit.history') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('user.deposit.history')); ?>">
                            <i class="las la-history"></i> <span class="title"><?php echo app('translator')->get('Deposit History'); ?></span>
                        </a>
                    </li>
                    <li
                        class="sidebar-single-menu nav-item <?php echo e(request()->routeIs('ticket') || request()->routeIs('ticket.view') ? 'open' : ''); ?>">
                        <a href="<?php echo e(route('ticket')); ?>">
                            <i class="las la-ticket-alt"></i> <span class="title"><?php echo app('translator')->get('Support Ticket'); ?></span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

    </div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/partials/seller_sidebar.blade.php ENDPATH**/ ?>