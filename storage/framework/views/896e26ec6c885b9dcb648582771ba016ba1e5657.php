
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
                    <div class="row row_mt40">
                        <div class="col-12">
                            <div class="photo_wrapper" id="photo_wrapper">
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
                        <div class="col-12 col-lg-6 ">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Название</div>
                                    <input type="text" form="data" name="name" class="input_view" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input"></div>
                                    <select class="input_view select_input_body" form="data" name="type_house" required>
                                        <option value="">Тип жилья</option>
                                        <option value="flat">Квартира</option>
                                        <option value="villa">Вилла</option>
                                        <option value="penthouse">Пентхаус</option>
                                        <option value="townhouse">Таунхаус</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input"></div>
                                    <select class="input_view select_input_body" form="data" name="part_island_id"
                                        required id="part_island_id" onchange="selectPartIsland()">
                                        <option value="">Часть острова</option>
                                        <option value="1">North Tenerife</option>
                                        <option value="2">South Tenerife</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input"></div>
                                    <select class="input_view select_input_body" form="data" name="district_id" required
                                        id="district_id">
                                        <option value="">Район</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Адрес</div>
                                    <input type="text" form="data" name="adress" class="input_view" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input"></div>
                                    <select class="input_view select_input_body" form="data" name="type_home" required>
                                        <option value="">Тип дома</option>
                                        <option value="secondary">Вторичка</option>
                                        <option value="new">Новостройка</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3 ">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Этажей</div>
                                    <input type="text" form="data" name="floors" class="input_view" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Год постройки</div>
                                    <input type="text" form="data" name="built" class="input_view" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 ">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Общая площадь</div>
                                    <input type="text" form="data" name="total_area" class="input_view" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12  col-md-6 col-lg-3">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Жилая площадь</div>
                                    <input type="text" form="data" name="living_area" class="input_view" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3 ">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Цена</div>
                                    <input type="text" form="data" name="price" class="input_view" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 ">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Кол-во комнат</div>
                                    <input type="text" form="data" name="rooms" class="input_view" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-12  col-md-6 col-lg-3">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Кол-во спален</div>
                                    <input type="text" form="data" name="bedrooms" class="input_view" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Кол-во ванных комнат</div>
                                    <input type="text" form="data" name="bathroom" class="input_view" required>
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
                                        <input type="text" form="data" id="lat" name="lat" required
                                            class="input_view">
                                    </div>
                                    <div class="wpapper_search_input">
                                        <div class="name_input">Lng</div>
                                        <input type="text" form="data" id="lng" name="lng" required
                                            class="input_view">
                                    </div>
                                </div>
                                <div id="mapGoogleCreate"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Описание</div>
                                    <textarea form="data" name="description" type="text" class="input_view" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    


                    <div class="row">
                        <div class="col-12">
                            <div class="descrip_search_block" style="text-align: left">Удобства</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="modal-body create-hotel-body-checkbox">
                                <ul class="list_conveniences">
                                    <li><input class="checkbox_conveniences" type="checkbox" form='data'
                                            name="balcony" id="balcony"><label for="balcony">Балкон</label>
                                    </li>
                                    <li><input class="checkbox_conveniences" type="checkbox" form='data'
                                            name="terrace" id="terrace"><label for="terrace">Терасса</label></li>
                                    <li><input class="checkbox_conveniences" type="checkbox" form='data'
                                            name="storeroom" id="storeroom"><label for="storeroom">Подсобное
                                            помещение</label></li>
                                    <li><input class="checkbox_conveniences" type="checkbox" form='data'
                                            name="parking_area" id="parking_area"><label for="parking_area">Парковочное
                                            место
                                            в гараже</label>
                                    </li>
                                    <li><input class="checkbox_conveniences" type="checkbox" form='data'
                                            name="wardrobe" id="wardrobe"><label for="wardrobe">Встроенный шкаф</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>

            <!-- EN -->
            <div class="wrapper_en_lang wrapper_lang wrapper_lang_hide">
                <div class="row row_mt40">
                    <div class="col-12 col-lg-6 ">
                        <div class="modal-body create-hotel-body">
                            <div class="wpapper_search_input">
                                <div class="name_input">Название EN</div>
                                <input type="text" form="data" name="name_en" class="input_view" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="modal-body create-hotel-body">
                            <div class="wpapper_search_input">
                                <div class="name_input">Адрес EN</div>
                                <input type="text" form="data" name="adress_en" class="input_view" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="modal-body create-hotel-body">
                            <div class="wpapper_search_input">
                                <div class="name_input">Описание EN</div>
                                <textarea form="data" name="description_en" type="text" class="input_view" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ES -->
            <div class="wrapper_es_lang wrapper_lang wrapper_lang_hide">
                <div class="row row_mt40">
                    <div class="col-12 col-lg-6 ">
                        <div class="modal-body create-hotel-body">
                            <div class="wpapper_search_input">
                                <div class="name_input">Название ES</div>
                                <input type="text" form="data" name="name_es" class="input_view" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="modal-body create-hotel-body">
                            <div class="wpapper_search_input">
                                <div class="name_input">Адрес ES</div>
                                <input type="text" form="data" name="adress_es" class="input_view" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="modal-body create-hotel-body">
                            <div class="wpapper_search_input">
                                <div class="name_input">Описание ES</div>
                                <textarea form="data" name="description_es" type="text" class="input_view" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="modal_btn_wrapper add_hotel_btn_wrapper">
                            <button class="btn_modal" onclick="uploadAdvertisementImages()">Добавить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const uploadAdvertisementImages = () => {
                let formData = new FormData(form);

                for (let key in PhotoFiles) {
                    formData.append(key, PhotoFiles[key]);
                }

                fetch("/advertisement", {
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
                            window.location.replace("/admin/apartments");
                        } else {
                            alert("Ошибка");
                        }
                    });
            };

            function drawDistrictList(json) {
                let districtHtml = document.getElementById('district_id')
                districtHtml.innerHTML = '';
                for (let i = 0; i < json.length; i++) {
                    districtHtml.innerHTML += `<option value="` + json[i].id + `">` + json[i].name + `</option>`
                }
            }

            function selectPartIsland() {
                let token = document.getElementsByName('_token')[0].value
                let idPartIslandc = document.getElementById('part_island_id').value
                let districtList = document.getElementById('district_id')
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
                                drawDistrictList(result)
                            } else {
                                alert('Ошибка сети');
                            }
                        })
                }
            }
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

<?php echo $__env->make('Admin.Layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\shdwg\Desktop\ABHAZ\resources\views/Admin/createApartments.blade.php ENDPATH**/ ?>