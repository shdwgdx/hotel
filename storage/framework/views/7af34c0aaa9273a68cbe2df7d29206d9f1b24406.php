<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <!-- CSS only -->

    <link href="<?php echo e(asset('bootstrap/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('swiper/swiper-bundle.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('flatpickr/flatpickr.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">


</head>

<body>
    <div class="wrapper admin_wrapper">
        <div class="sidebar position-relative">
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->email == 'admin@localhost'): ?>
                    <ul class="admin_menu_list">
                        <li class="admin_menu_item <?php echo e(Request::is('admin/moderation') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin-page-moderation')); ?>">На модерации</a>
                        </li>
                        <li class="admin_menu_item <?php echo e(Request::is('admin/published') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin-page-published')); ?>">Опубликованные</a>
                        </li>

                    </ul>
                    <div class="modal_btn_wrapper position-absolute bottom-0 start-50 translate-middle d-none d-lg-block"><a
                            class="btn_modal" href=<?php echo e(route('profile-logout')); ?>>Выход</a>
                    </div>
                <?php else: ?>
                    <div class="user_name_block">👋 Привет, <?php echo e(Auth::user()->name); ?>!</div>
                    <ul class="admin_menu_list">
                        <li class="admin_menu_item <?php echo e(Request::is('admin') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('index-page-profile')); ?>">Мой профиль</a>
                        </li>
                        <div class="dropdown">
                            <button class="dropdown-toggle admin_menu_item w-100 h-100" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Мои объявления
                            </button>
                            <ul class="dropdown-menu w-100 p-0">
                                <li class="admin_menu_item <?php echo e(Request::is('admin/advertisements') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('index-page-advertisements')); ?>">Все объявления</a>
                                </li>
                                <li class="admin_menu_item <?php echo e(Request::is('admin/advertisements') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('active-page-advertisements')); ?>">Активные объявления</a>
                                </li>
                                <li class="admin_menu_item <?php echo e(Request::is('admin/advertisements') ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('inactive-page-advertisements')); ?>">В архиве</a>
                                </li>
                            </ul>
                        </div>

                        <li class="admin_menu_item <?php echo e(Request::is('admin/create') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('create-page-advertisement')); ?>">Разместить объявление</a>
                        </li>

                    </ul>
                    <div class="modal_btn_wrapper position-absolute bottom-0 start-50 translate-middle d-none d-lg-block"><a
                            class="btn_modal" href=<?php echo e(route('profile-logout')); ?>>Выход</a>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <ul class="admin_menu_list">
                    <li class="admin_menu_item <?php echo e(Request::is('login') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('profile-login-index')); ?>">Вход</a>
                    </li>
                    <li class="admin_menu_item <?php echo e(Request::is('register') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('profile-register-index')); ?>">Регистрация</a>
                    </li>
                </ul>
            <?php endif; ?>

        </div>
        <?php echo $__env->yieldContent('content'); ?>

        <footer>

        </footer>
    </div>
    <script src="<?php echo e(asset('bootstrap/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin.js')); ?>"></script>
    <script src="<?php echo e(asset('flatpickr/flatpickr.js')); ?>"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/lv.js"></script>
    <script>
        let endDateElement = document.getElementById('date_end0');
        let startDateElement = document.getElementById('date_start0');
        let calendarStatick = flatpickr("#calendar-statick", {
            mode: 'range',
            inline: true,
            disable: [{
                    from: flatpickr.parseDate(new Date(new Date().setDate(new Date().getDate() - 30))),
                    to: flatpickr.parseDate(new Date(new Date().setDate(new Date().getDate() - 1))),
                },
                <?php if(isset($reservedDate)): ?>
                    <?php $__currentLoopData = $reservedDate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dateItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        {
                            from: "<?php echo e($dateItem['start_active_adv']); ?>",
                            to: "<?php echo e($dateItem['end_active_adv']); ?>"
                        },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if(isset($bookedDate)): ?>
                    <?php $__currentLoopData = $bookedDate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dateItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        {
                            from: "<?php echo e($dateItem['start_booked']); ?>",
                            to: "<?php echo e($dateItem['end_booked']); ?>"
                        },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            ],
            dateFormat: "d.m.Y",
            static: true,
            "locale": 'ru',
            showMonths: 1,
            onChange: function(selectedDates, dateStr, instance) {
                startDate = dateStr.slice(0, 10);
                endDate = dateStr.slice(13, 23);
                endDateElement.value = endDate;
                startDateElement.value = startDate;
            },
        });

        if (document.documentElement.clientWidth >= 2200) {
            calendarStatick.set('showMonths', 2);
            let calendarStatickWrapper = document.querySelector('.calendar-statick_wrapper .flatpickr-wrapper');
            calendarStatickWrapper.style.display = 'block'
        }

        toggleHide()
    </script>
</body>

</html>
<?php /**PATH C:\Users\shdwg\Desktop\ABHAZ\resources\views/Profile/Layout/main.blade.php ENDPATH**/ ?>