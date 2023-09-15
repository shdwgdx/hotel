<?php $__env->startSection('content'); ?>
    <main class="admin_main">
        <div class="container">
            <div class="modal-body">
                <div class="title_main">Регистрация</div>
                <div class="title_descrip">Введите данные учетной записи для продолжения</div>
                <form action="<?php echo e(route('profile-register')); ?>" name="profile-login" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="wpapper_search_input">
                        <div class="name_input">Имя</div>
                        <input class="text input_view" type="text" name="name" placeholder=""
                            value="<?php echo e(old('name')); ?>">
                    </div>
                    <div class="wpapper_search_input">
                        <div class="name_input">Почта</div>
                        <input class="text input_view" type="email" name="email" placeholder=""
                            value="<?php echo e(old('email')); ?>">
                    </div>
                    <div class="wpapper_search_input">
                        <div class="name_input">Телефон</div>
                        <input class="text input_view" type="tel" name="phone" placeholder=""
                            value="<?php echo e(old('phone')); ?>">
                    </div>
                    <div class="wpapper_search_input">
                        <div class="name_input">Пароль</div>
                        <input class="text input_view" name="password" type="password">
                    </div>
                    <div class="wpapper_search_input">
                        <div class="name_input">Подтвердите пароль</div>
                        <input type="password" class="text input_view" id="password_confirmation"
                            name="password_confirmation">
                    </div>

                    <div class="modal_btn_wrapper">
                        <button class="btn_modal" type="submit">Регистрация</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.Layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\shdwg\Desktop\ABHAZ\resources\views/Admin/register.blade.php ENDPATH**/ ?>