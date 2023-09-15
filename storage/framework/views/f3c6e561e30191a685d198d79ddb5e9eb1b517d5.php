<?php $__env->startSection('content'); ?>
    <main class="admin_main ">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="title_main">Профиль</div>
                </div>
                <?php if(str(auth()->user()->avatar)->startsWith('https')): ?>
                    <div> <img src="<?php echo e(auth()->user()->avatar); ?>" class="img-fluid avatar" alt="..."></div>
                <?php else: ?>
                    <div> <img src="storage/profile/<?php echo e(auth()->user()->avatar); ?>" class="img-fluid avatar" alt="...">
                    </div>
                <?php endif; ?>

                <h1 class="name "><?php echo e(auth()->user()->name); ?></h1>
                <div class="reviews">
                    <div class="reviews_mark"><?php echo e(auth()->user()->rating); ?>.0</div>
                    <div class="reviews_stars">
                        <?php for($i = 0; $i < auth()->user()->rating; $i++): ?>
                            <div class="star-filled"></div>
                        <?php endfor; ?>
                        <?php for($i = 0; $i < 5 - auth()->user()->rating; $i++): ?>
                            <div class="star-outlined"></div>
                        <?php endfor; ?>
                    </div>
                    <div class="reviews_link"><a href="#" class="text-decoration-none text-reset">Смотреть
                            отзывы</a></div>
                </div>
                <div class="mail"><?php echo e(auth()->user()->email); ?></div>
                <?php
                    use Carbon\Carbon;
                    $date = new Carbon(auth()->user()->created_at);
                    setlocale(LC_TIME, 'Russian');
                ?>
                <div class="registred"><?php echo e(iconv('windows-1251', 'utf-8', $date->formatLocalized('%d %B %Y'))); ?>

                </div>
                <div class="edit"><a href="" class="text-decoration-none text-reset">Редактировать аккаунт</a>
                </div>

            </div>
            <div class="modal_btn_wrapper position-absolute  d-block d-lg-none mx-auto"><a class="btn_modal"
                    href=<?php echo e(route('profile-logout')); ?>>Выход</a>
            </div>

        </div>



    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Profile.Layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\shdwg\Desktop\ABHAZ\resources\views/Profile/index.blade.php ENDPATH**/ ?>