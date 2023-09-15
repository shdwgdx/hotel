
<?php $__env->startSection('content'); ?>
    <main class="admin_main">
        <div class="container">
            <div class="row title_lang_row">
                <div class="col-12 col-lg-9">
                    <div class="title_main">Добавление квартиры</div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="wrap_lang_select">
                        <a class="select_lang ru active" href="#">
                            <div>ru</div>
                        </a>
                        <a class="select_lang en" href="#">en</a>
                        <a class="select_lang es" href="#">es</a>
                    </div>
                </div>
            </div>
        </div>

        <form action="#" id="data" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <!-- <?php echo e(csrf_field()); ?> -->
        </form>

        <div class="container_best_hotel">
            <!-- ru -->
            <div class="wrapper_ru_lang wrapper_lang ">
                <div class="container">
                    <input type="text" form="data" name="user_id" value="<?php echo e(rand(1, 100)); ?>" style="display: none"
                        class="input_view">
                    <div class="row row_mt40">
                        <div class="col-12">
                            <div class="photo_wrapper" id="photo_wrapper">
                                <?php $__currentLoopData = $advertisemens->photoUrl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advItemImg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="prev_img_wrapper" onclick="delApiImg('<?php echo e($advItemImg->id); ?>')"
                                        id="<?php echo e($advItemImg->id); ?>">
                                        <div class="prev_img_hover"></div>
                                        <img class="prev_img" src="/storage/<?php echo e($advItemImg->url); ?>">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="add_img">
                                    <label for="img_input">
                                        <div class="add_img_description">Добавить<br>изображения</div>
                                    </label>
                                    <input id="img_input" accept="image/*" name="photo[]" type="file" multiple required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="text" form="data" name="id" value="<?php echo e($advertisemens->id); ?>"
                            style="display: none" class="input_view">
                        <div class="col-12 col-lg-6 ">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Название</div>
                                    <input type="text" form="data" name="title" class="input_view" required
                                        value="<?php echo e($advertisemens->title); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input"></div>
                                    <select class="input_view select_input_body" form="data" name="category_id" required
                                        id="category_id" onchange="selectPartIsland()">
                                        <option value="">Категория</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($advertisemens->category_id == $category->id): ?> selected="selected" <?php endif; ?>
                                                value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input"></div>
                                    <select class="input_view select_input_body" form="data" name="subcategory_id"
                                        required id="subcategory_id">
                                        <option value="">Подкатегория</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 ">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Цена</div>
                                    <input type="text" form="data" name="price" value="<?php echo e($advertisemens->price); ?>"
                                        class="input_view" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Описание</div>
                                    <textarea form="data" name="description" type="text" class="input_view" required><?php echo e($advertisemens->description); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="modal-body create-hotel-body-checkbox">
                            <div class="name_input">Выберите расположение жилья на карте</div>
                            <div style="display:flex;">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Lat</div>
                                    <input type="text" form="data" id="lat" name="lat"
                                        value="<?php echo e($advertisemens->lat); ?>" required class="input_view">
                                </div>
                                <div class="wpapper_search_input">
                                    <div class="name_input">Lng</div>
                                    <input type="text" form="data" id="lng" name="lng"
                                        value="<?php echo e($advertisemens->lng); ?>" required class="input_view">
                                </div>
                            </div>
                            <div id="mapGoogleCreate"></div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="modal_btn_wrapper add_hotel_btn_wrapper">
                            <button class="btn_modal" onclick="editUploadAdvertisementImages()">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const editUploadAdvertisementImages = () => {
                let formData = new FormData(form);

                for (let key in PhotoFiles) {
                    formData.append(key, PhotoFiles[key]);
                }

                fetch("/edit/advertisement", {
                        method: "POST",
                        body: formData,
                    })
                    .then((response) => response.json())
                    .then((result) => {
                        if (result.status) {
                            PhotoFiles = [];
                            let last_img = document.querySelectorAll(".prev_img_wrapper");
                            for (let i = 0; i < last_img.length; i++) {
                                last_img[i].remove();
                            }
                            alert("Файлы успешно загружены");
                            window.location.replace("");
                        } else {
                            alert("Ошибка");
                        }
                    });
            };

            function delApiImg(id) {
                let token = document.getElementsByName('_token')[0].value
                fetch('/del-img/' + id, {
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.status) {
                            document.getElementById(id).remove()
                        } else {
                            alert('Ошибка сети');
                        }
                    })
            }




            function drawDistrictList(json, category_id) {
                let districtHtml = document.getElementById('subcategory_id')
                districtHtml.innerHTML = '';

                for (let i = 0; i < json.length; i++) {
                    if (<?php echo e($advertisemens->subcategory_id); ?> == json[i].id) {
                        districtHtml.innerHTML += `<option value="` + json[i].id + `" selected="selected">` + json[i].title +
                            `</option>`
                    } else {
                        districtHtml.innerHTML += `<option value="` + json[i].id + `">` + json[i].title + `</option>`
                    }
                }
            }

            function selectPartIsland() {
                let token = document.getElementsByName('_token')[0].value
                let idPartIslandc = document.getElementById('category_id').value
                let districtList = document.getElementById('subcategory_id')
                if (idPartIslandc > 0) {
                    fetch('/get-district/' + idPartIslandc, {
                            method: "GET",
                            headers: {
                                'X-CSRF-TOKEN': token
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result) {
                                drawDistrictList(result, category_id)
                            } else {
                                alert('Ошибка сети');
                            }
                        })
                }
            }
            selectPartIsland(<?php echo e($advertisemens->category_id); ?>)
        </script>
        <script src="<?php echo e(asset('js/calendar-switch.js')); ?>"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJgh9I_sfFXFOd_SyCKrOZMA2aGxJjOmM"></script>
        <script>
            function initMap() {
                var coordinatesMarker = {
                    lat: 47.212325,
                    lng: 38.933663
                }
                var coordinates = {
                        lat: 47.212325,
                        lng: 38.933663
                    },
                    map = new google.maps.Map(document.getElementById('mapGoogleCreate'), {
                        center: coordinates,
                        zoom: 8,
                    });
                google.maps.event.addListener(map, "rightclick", function(event) {
                    var lat = event.latLng.lat();
                    var lng = event.latLng.lng();
                    document.getElementById('lat').value = lat
                    document.getElementById('lng').value = lng

                    coordinatesMarker.lat = lat
                    coordinatesMarker.lng = lng
                    marker.setPosition(coordinatesMarker);
                });
                marker = new google.maps.Marker({
                    position: coordinatesMarker,
                    map: map
                });
            }
            initMap()
        </script>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.Layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\shdwg\Desktop\ABHAZ\resources\views/Admin/editApartments.blade.php ENDPATH**/ ?>