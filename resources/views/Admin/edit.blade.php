@extends('Admin.Layout.main')
@section('content')
    <main class="admin_main">
        <div class="container">
            <div class="row title_lang_row">
                <div class="col-12 col-lg-9">
                    <div class="title_main">Опубликовать объявление</div>
                </div>
            </div>
        </div>

        {{-- <form action="#" id="data" method="post" enctype="multipart/form-data">
            @csrf
            <!-- {{ csrf_field() }} -->
        </form> --}}

        <div class="container_best_hotel">
            <!-- ru -->
            <div class="wrapper_ru_lang wrapper_lang ">
                <div class="container">
                    <input type="text" form="data" name="user_id" value="{{ auth()->id() }}" style="display: none"
                        class="input_view">
                    <div class="row row_mt40">
                        <div class="col-12">
                            <div class="photo_wrapper" id="photo_wrapper">
                                @foreach ($advertisemens->photoUrl as $advItemImg)
                                    <div class="prev_img_wrapper" onclick="delApiImg('{{ $advItemImg->id }}')"
                                        id="{{ $advItemImg->id }}">
                                        <div class="prev_img_hover"></div>
                                        <img class="prev_img" src="/storage/{{ $advItemImg->url }}">
                                    </div>
                                @endforeach
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
                        <input type="text" form="data" name="id" value="{{ $advertisemens->id }}"
                            style="display: none" class="input_view">
                        <div class="col-12 col-lg-6 ">
                            <div class="modal-body create-hotel-body">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Название</div>
                                    <input type="text" form="data" name="title" class="input_view" required
                                        value="{{ $advertisemens->title }}">
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
                                        @foreach ($categories as $category)
                                            <option @if ($advertisemens->category_id == $category->id) selected="selected" @endif
                                                value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
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
                                    <input type="text" form="data" name="price" value="{{ $advertisemens->price }}"
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
                                    <textarea form="data" name="description" type="text" class="input_view" required>{{ $advertisemens->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="modal-body create-hotel-body-checkbox">
                            <div class="name_input">Выберите расположение жилья на карте</div>
                            <div style="display:none;">
                                <div class="wpapper_search_input">
                                    <div class="name_input">Lat</div>
                                    <input type="text" form="data" id="lat" name="lat"
                                        value="{{ $advertisemens->lat }}" required class="input_view">
                                </div>
                                <div class="wpapper_search_input">
                                    <div class="name_input">Lng</div>
                                    <input type="text" form="data" id="lng" name="lng"
                                        value="{{ $advertisemens->lng }}" required class="input_view">
                                </div>
                            </div>
                            <div id="mapGoogleCreate"></div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container">
                <div class="row">
                    <div class="modal_btn_wrapper add_hotel_btn_wrapper me-4">
                        <a href="/admin/delete/{{ $advertisemens->id }}"><button
                                class="btn_modal bg-danger">Удалить</button></a>
                    </div>
                    <div class="col col-auto ms-auto d-flex">
                        <div class="modal_btn_wrapper add_hotel_btn_wrapper">
                            <form action="{{ route('publicate-advertisement-admin') }}" method="POST">
                                @csrf
                                <input type="text" name="id" id="id" value="{{ $advertisemens->id }}"
                                    class="d-none">
                                <button class="btn_modal bg-success" type="submit">Опубликовать</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <form action="{{ route('reject-advertisement-admin') }}" method="POST" class="d-flex">
                        @csrf
                        <input type="text" name="id" id="id" value="{{ $advertisemens->id }}"
                            class="d-none">
                        <button class="btn_modal bg-warning" type="submit">Отклонить</button>
                        <input name="reject_message" id="reject_message" class="form-control w-25 ms-4"
                            placeholder="Укажите причину отклонения">

                    </form>
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
                    if ({{ $advertisemens->subcategory_id }} == json[i].id) {
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
            selectPartIsland({{ $advertisemens->category_id }})
        </script>
        <script src="{{ asset('js/calendar-switch.js') }}"></script>
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
@endsection
