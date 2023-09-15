<?php if($paginator->hasPages()): ?>
    <div class="container container_pagination">
        <nav class="d-flex justify-items-center justify-content-center">
            <div>
                <ul class="pagination">
                    
                    <a class="page-item" href="<?php echo e($paginator->previousPageUrl()); ?>">
                        <button class="btn_pagination btn_previous" id="btn_previous" rel="prev" aria-label="Previous"
                            aria-label="<?php echo app('translator')->get('pagination.previous'); ?>"></button>
                    </a>

                    
                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if(is_array($element)): ?>
                            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $paginator->currentPage()): ?>
                                    <li class="page-item mlr20 " aria-current="page"><button
                                            class="page_btn active"><?php echo e($page); ?></button></li>
                                <?php else: ?>
                                    <li class="page-item mlr20">
                                        <a class="page_btn" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    <a class="page-item" href="<?php echo e($paginator->nextPageUrl()); ?>">
                        <button class="btn_pagination btn_next" id="btn_next" rel="next"
                            aria-label="<?php echo app('translator')->get('pagination.next'); ?>" aria-label="Next"></button>
                    </a>
                </ul>
            </div>
        </nav>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\shdwg\Desktop\ABHAZ\resources\views/vendor/pagination/default.blade.php ENDPATH**/ ?>