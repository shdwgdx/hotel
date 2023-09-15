
<?php $__env->startSection('content'); ?>
    <main class="admin_main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title_main">Мои объявления</div>
                </div>
            </div>
        </div>
        <div class="container_best_hotel">
            <div class="container">
                <div class="row row_mt40">
                    <div class="col-12">
                        <?php $__currentLoopData = $advertisemens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="body_hotel_card admin_card">
                                <div class="img_wrapper">
                                    

                                    <?php if(isset($advItem->photoUrl[0]->url)): ?>
                                        <img src="/storage/<?php echo e($advItem->photoUrl[0]->url); ?>" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="content_wrapper">
                                    <div class="name_hotel">
                                        <?php echo e($advItem->title); ?>

                                    </div>
                                    
                                    <div class="row_info_hotel ">
                                        <?php if($advItem->moderated == 1 && $advItem->published == 0): ?>
                                            <div class="item_info_hotel exclamation_mark_danger_icon">
                                                Объявление было отклонено. Причина: <?php echo e($advItem->reject_message); ?>

                                            </div>
                                        <?php elseif($advItem->moderated == 0 && $advItem->published == 0): ?>
                                            <div class="item_info_hotel exclamation_mark_info_icon">
                                                На модерации
                                            </div>
                                        <?php else: ?>
                                            <div class="item_info_hotel check_mark_icon">
                                                Опубликовано
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row_info_hotel ">
                                        <div class="item_info_hotel  eye_icon ">
                                            <?php echo e($advItem->view_count); ?> Просмотров
                                        </div>
                                    </div>
                                    <div class="card_info_price_wrapper">
                                        <div class="left_block">
                                            <div class="price_value">€<?php echo e($advItem->price); ?></div>
                                        </div>
                                        <div class="left_block">
                                            <div class="price_value">
                                                
                                                <?php if($advItem->published && strtotime($advItem->expired_date) - strtotime(now()) < 0): ?>
                                                    <div class="modal_btn_wrapper add_hotel_btn_wrapper m-0">
                                                        <form action="<?php echo e(route('profile-republish')); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="text" name="id" id="id"
                                                                value="<?php echo e($advItem->id); ?>" class="d-none">
                                                            <button class="btn_modal bg-warning" type="submit">Опубликовать
                                                                заново</button>
                                                        </form>
                                                    </div>
                                                <?php else: ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo e(route('edit-advertisement-profile', $advItem->id)); ?>"
                                    class="change_btn_admin"></a>
                                <a href="/profile/delete/<?php echo e($advItem->id); ?>" class="change_btn_admin delete_btn_admin"></a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <?php echo e($advertisemens->links('vendor.pagination.default')); ?>

                        </div>


                    </div>
                </div>
            </div>
        </div>


    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Profile.Layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\shdwg\Desktop\ABHAZ\resources\views/Profile/advertisements.blade.php ENDPATH**/ ?>