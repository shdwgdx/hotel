
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
                                    
                                    <div class="card_info_price_wrapper">
                                        <div class="left_block">
                                            <div class="price_value">€<?php echo e($advItem->price); ?></div>
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

<?php echo $__env->make('Admin.Layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\shdwg\Desktop\ABHAZ\resources\views/Admin/indexApartments.blade.php ENDPATH**/ ?>