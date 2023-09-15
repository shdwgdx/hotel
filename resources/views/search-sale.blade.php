@extends('Layout.main')
@section('content')
    <form action="/buy" id="search-sale" style="display: none" method="get">
    </form>
    {{-- @dd($data['district_id']) --}}
    {{-- @dd($guestsAdults); --}}
    <main>
        <div class="search_block">
            <div class="container">
                <div class="body_search_block">
                    <div class="title_search_block">Покупка квартир и апартаментов на Тенерифе</div>
                    <div class="descrip_search_block">Покупка квартир и апартаментов на Тенерифе</div>
                    <div class="row_search_input">
                        <div class="row_search_input_double">
                            <div class="wpapper_search_input select_city_wrapper select_city_wrapper_first">
                                <div class="name_input">Часть острова</div>
                                <div class="input_view">Любая</div>
                                <input type="text" name="part_island_id_apartment" onchange="getListDistrict()"
                                    form="search-sale" id="part_island_id" style="display: none;">
                                <div class="drop_doun_body">
                                    {{-- <input type="text" name="searchCity" class="searchCity"> --}}
                                    <ul class="cityOfferList">
                                        <li data-part_island_id="">Любая</li>
                                        <li data-part_island_id="1">North Tenerife</li>
                                        <li data-part_island_id="2">South Tenerife</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="wpapper_search_input select_district_wrapper">
                                <div class="name_input">Район</div>
                                <div class="input_view">Любой</div>
                                <input type="text" form="search-sale" name="district_id_apartment" id="district_id"
                                    style="display: none;">
                                <div class="drop_doun_body">
                                    {{-- <input type="text" name="searchDistrict" form="search" class="searchCity"> --}}
                                    <ul class="cityOfferList" id="district-list">
                                        <li>Выберите часть острова</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="wpapper_search_input mr-0-mob type_house_wrapper ">
                                <div class="name_input">Тип жилья</div>
                                <input class="input_view" type="text" value="Любой">
                                <input type="text" style="display: none;">
                                <div class="drop_doun_body">
                                    <div class="item_checkbox">
                                        <input type="checkbox" class="custom-checkbox" form="search-sale"
                                            name="flat_apartment" value="flat" id="flat">
                                        <label class="text_drop_doun" for="flat">Квартира</label>
                                    </div>
                                    <div class="item_checkbox">
                                        <input type="checkbox" class="custom-checkbox" form="search-sale" value="villa"
                                            name="villa_apartment" id="villa">
                                        <label class="text_drop_doun" for="villa">Вилла</label>
                                    </div>
                                    <div class="item_checkbox">
                                        <input type="checkbox" class="custom-checkbox" form="search-sale" value="penthouse"
                                            name="penthouse_apartment" id="penthouse">
                                        <label class="text_drop_doun" for="penthouse">Пентхаус</label>
                                    </div>
                                    <div class="item_checkbox">
                                        <input type="checkbox" class="custom-checkbox" form="search-sale" value="townhouse"
                                            name="townhouse_apartment" id="townhouse">
                                        <label class="text_drop_doun" for="townhouse">Таунхаус</label>
                                    </div>
                                </div>

                            </div>
                            <div class="wpapper_search_input guests_count_wrapper">
                                <div class="name_input">Кол-во комнат</div>
                                <div class="input_view">1 комната</div>
                                <input type="text" style="display: none;">
                                <div class="drop_doun_body">
                                    <div class="guests_item adults_counter">
                                        <div>
                                            <div class="text_drop_doun">Количество комнат</div>
                                            {{-- <div class="text_drop_doun_descr">Старше 12 лет</div> --}}
                                        </div>
                                        <div class="wrapper_counter_item_guests">
                                            <button class="btn_minus"></button>
                                            <input class="count_input_geusts" name="rooms" id="rooms"
                                                form="search-sale" value="1">
                                            <button class="btn_plus"></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <button type="submit" form="search-sale" class="btn_search">Искать</button>
                            {{-- <div class="wpapper_search_input mr-0-mob filter_item filterPriceRange">
                                <div class="filter_name ">Ценовой диапазон</div>
                                <div id="sliderPriceFilter" class="sliderPriceFilter"></div>
                                <div class="row_filter_item">
                                    <div class="beforeRangePrice">
                                        <input type="text" id="price_range_min" name="price_range_min"
                                            class="input_select_date" value="" placeholder="200">
                                    </div>
                                    <div class="dash">
                                    </div>
                                    <div class="beforeRangePrice">
                                        <input type="text" id="price_range_max" name="price_range_max"
                                            class="input_select_date" value="" placeholder="700">
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="body_search_rowbar">
                <div class="left">
                    <div class="body_search_rowbar_txt">Отображено <span id="count_on_page">0</span> из <span
                            id="total_count">0</span> результатов</div>
                    <button class="btn_filter" id="btn_open_filter">
                        <div class="txt">Фильтр</div>
                    </button>
                </div>
                <div class="search_rowbar_right">
                    <div class="sort_wrapper">
                        <div class="select_sort" id="view_select_sort">Дешевле</div>
                        <div class="drop_doun_body">
                            {{-- <div class="item_checkbox">
                            <input type="radio" class="custom-checkbox" form="search" name="sort" id="closer">
                            <label class="text_drop_doun" for="closer" >Ближе</label>
                        </div> --}}
                            {{-- <div class="item_checkbox">
                            <input type="radio" class="custom-checkbox" form="search" name="sort" id="further">
                            <label class="text_drop_doun" for="further">Дальше</label>
                        </div> --}}
                            {{-- <div class="item_checkbox">
                            <input type="radio" class="custom-checkbox" form="search" name="sort" id="popular">
                            <label class="text_drop_doun" for="popular">Популярные</label>
                        </div> --}}
                            <div class="item_checkbox">
                                <input type="radio" class="custom-checkbox" checked form="search" name="sort"
                                    value="priceAsc" id="low-cost">
                                <label class="text_drop_doun" for="low-cost">Дешевле</label>
                            </div>
                            <div class="item_checkbox">
                                <input type="radio" class="custom-checkbox" form="search" name="sort"
                                    value="priceDesc" id="expensive">
                                <label class="text_drop_doun" for="expensive">Дороже</label>
                            </div>
                        </div>
                    </div>
                    <div class="search_rowbar_type_card">
                        <button class="icon_card_card " onclick="cardSetGridView()"></button>
                        <button class="icon_card_list" onclick="cardSetListView()"></button>
                        <button class="icon_card_map"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="hotel_search_block margin50">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="filter_wrapper">
                            <div class="filter_body">
                                <button class="btn_close_filter" id="btn_close_filter"></button>

                                <div class="filter_item">
                                    <div class="filter_name">Часть острова</div>
                                    <div class="wpapper_search_input select_city_wrapper select_city_wrapper_apartment ">
                                        <div class="input_view">Любая</div>
                                        <input type="text" name="part_island_id_apartment2" form="search-sale"
                                            onchange="getListDistrictApartment()" id="part_island_id_apartment"
                                            style="display: none;">
                                        <div class="drop_doun_body">

                                            <ul class="cityOfferList">
                                                <li data-part_island_id_apartment="">Любая</li>
                                                <li data-part_island_id_apartment="1">North Tenerife</li>
                                                <li data-part_island_id_apartment="2">South Tenerife</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="filter_item">
                                    <div class="filter_name">Тип жилья</div>
                                    <div class="item_checkbox">
                                        <input type="checkbox" class="custom-checkbox" name="flat_filter"
                                            id="flat_filter">
                                        <label class="text_drop_doun" for="flat_filter">Квартира</label>
                                    </div>
                                    <div class="item_checkbox">
                                        <input type="checkbox" class="custom-checkbox" name="villa_filter"
                                            id="villa_filter">
                                        <label class="text_drop_doun" for="villa_filter">Вилла</label>
                                    </div>
                                    <div class="item_checkbox">
                                        <input type="checkbox" class="custom-checkbox" name="penthouse_filter"
                                            id="penthouse_filter">
                                        <label class="text_drop_doun" for="penthouse_filter">Пентхаус</label>
                                    </div>
                                    <div class="item_checkbox">
                                        <input type="checkbox" class="custom-checkbox" name="townhouse_filter"
                                            id="townhouse_filter">
                                        <label class="text_drop_doun" for="townhouse_filter">Таунхаус</label>
                                    </div>
                                    <div class="line"></div>
                                </div>
                                <div class="filter_item guests_count_wrapper_filter">
                                    <div class="filter_name">Количество комнат</div>
                                    <div class="guests_item adults_counter">
                                        <div>
                                            <div class="text_drop_doun">Количество комнат</div>
                                            {{-- <div class="text_drop_doun_descr">Старше 12 лет</div> --}}
                                        </div>
                                        <div class="wrapper_counter_item_guests">
                                            <button class="btn_minus"></button>
                                            <input class="count_input_geusts"
                                                value="@if ($rooms) {{ $rooms }} @else 1 @endif">
                                            <button class="btn_plus"></button>
                                        </div>
                                    </div>

                                    <div class="line"></div>
                                </div>
                                <div class="filter_item filterPriceRange">
                                    <div class="filter_name ">Ценовой диапазон</div>

                                    <div id="sliderPriceFilter" class="sliderPriceFilter"></div>
                                    <div class="row_filter_item">
                                        <div class="beforeRangePrice">
                                            <input type="text" id="price_range_min" name="price_range_min"
                                                class="input_select_date" value="" placeholder="200">
                                        </div>
                                        <div class="dash">
                                        </div>
                                        <div class="beforeRangePrice">
                                            <input type="text" id="price_range_max" name="price_range_max"
                                                class="input_select_date" value="" placeholder="700">
                                        </div>
                                    </div>
                                </div>

                                <button class="btn_filter_searh icon_search mt30"
                                    onclick="if (filterState.page != 1) {
                                        filterState.page = 1;
                                    };
                                    getAdvertisement()">Искать</button>
                                <button class="btn_filter_searh btn_reset mt10" onclick="resetState()">Сбросить
                                    фильтр</button>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8">
                        <div class="row" id="containerAdvertisement">


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container container_pagination">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item">
                        <button class="btn_pagination btn_previous" id="btn_previous" onclick="openPreviousPage()"
                            aria-label="Previous"></button>
                    </li>
                    <div class="wrapper-item-page">

                    </div>


                    <li class="page-item">
                        <button class="btn_pagination btn_next" id="btn_next" onclick="openNextPage()"
                            aria-label="Next"></button>
                    </li>
                </ul>
            </nav>
        </div>


        <div class="container map_container margin170">
            <div class="row">
                <div class="col-12">
                    <div class="title_main">Апартаменты на карте</div>
                </div>
                <div class="col-12">
                    <div id="mapGoogleCreate" class="location_iframe">
                    </div>
                </div>
            </div>






            <div class="container container_service margin170">
                <div class="title_main">Другие наши услуги</div>
                <div class="title_main_descrip">Наши предложение, которые могут быть вам интересны</div>
                <div class="wrapper_service_cards">
                    <div class="swiper_service">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="service_card">
                                    <img src="/img/service_turs.png" alt="">
                                    <div class="content_service_card">
                                        <div class="service_card_title">Туры</div>
                                        <div class="line"></div>
                                        <div class="service_card_txt">Увлекательные и уникальные в своем роде экскурсии
                                            по
                                            острову
                                            Тенерифе с русскоговорящим гидом, который расскажет вам о самобытном образе
                                            жизни
                                            коренных жителей острова и покажет вам самые значимые места! </div>
                                        <a href="#" class="service_card_link">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="service_card">
                                    <img src="/img/service_turs.png" alt="">
                                    <div class="content_service_card">
                                        <div class="service_card_title">Туры</div>
                                        <div class="line"></div>
                                        <div class="service_card_txt">Увлекательные и уникальные в своем роде экскурсии
                                            по
                                            острову
                                            Тенерифе с русскоговорящим гидом, который расскажет вам о самобытном образе
                                            жизни
                                            коренных жителей острова и покажет вам самые значимые места! </div>
                                        <a href="#" class="service_card_link">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="service_card">
                                    <img src="/img/service_turs.png" alt="">
                                    <div class="content_service_card">
                                        <div class="service_card_title">Туры</div>
                                        <div class="line"></div>
                                        <div class="service_card_txt">Увлекательные и уникальные в своем роде экскурсии
                                            по
                                            острову
                                            Тенерифе с русскоговорящим гидом, который расскажет вам о самобытном образе
                                            жизни
                                            коренных жителей острова и покажет вам самые значимые места! </div>
                                        <a href="#" class="service_card_link">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="service_card">
                                    <img src="/img/service_turs.png" alt="">
                                    <div class="content_service_card">
                                        <div class="service_card_title">Туры</div>
                                        <div class="line"></div>
                                        <div class="service_card_txt">Увлекательные и уникальные в своем роде экскурсии
                                            по
                                            острову
                                            Тенерифе с русскоговорящим гидом, который расскажет вам о самобытном образе
                                            жизни
                                            коренных жителей острова и покажет вам самые значимые места! </div>
                                        <a href="#" class="service_card_link">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <!-- If we need scrollbar -->
                    </div>
                </div>
            </div>


    </main>
    <style>
        .wpapper_search_input.type_house_wrapper {
            max-width: 188px;
        }


        .btn_search {
            max-width: 240px;
        }


        /* .row_search_input_double {
                                                                                        justify-content: flex-start;
                                                                                    } */

        @media (max-width: 992px) {

            .wpapper_search_input.type_house_wrapper,
            .btn_search {
                max-width: 100%;
            }
        }
    </style>

    <script>
        function searchDropdounRooms() {
            let wrapper = document.querySelector(
                ".wpapper_search_input.guests_count_wrapper"
            );
            let bodyDropdoun = document.querySelector(
                ".wpapper_search_input.guests_count_wrapper .drop_doun_body"
            );
            wrapper.addEventListener("click", () => {
                wrapper.classList.add("active");
            });
            document.addEventListener("click", function(e) {
                if (bodyDropdoun.contains(e.target) || wrapper.contains(e.target)) return;
                wrapper.classList.remove("active");
            });
        }

        function counterRooms() {
            let inputView = document.querySelector(".guests_count_wrapper .input_view");

            let counterRooms = document.querySelector(
                ".adults_counter .count_input_geusts"
            );


            let btnPlusRooms = document.querySelector(".adults_counter .btn_plus");
            let btnMinusRooms = document.querySelector(".adults_counter .btn_minus");



            let max_Rooms = 5;

            if (counterRooms.value >= max_Rooms) {
                btnPlusRooms.setAttribute("disabled", "disabled");
            }

            if (counterRooms.value == 1) {
                btnMinusRooms.setAttribute("disabled", "disabled");
            }
            if (counterRooms.value > 1) {
                btnMinusRooms.removeAttribute("disabled");
            }


            btnPlusRooms.addEventListener("click", () => {
                if (counterRooms.value >= max_Rooms - 1) {
                    btnPlusRooms.setAttribute("disabled", "disabled");
                }
                if (counterRooms.value >= 1) {
                    btnMinusRooms.removeAttribute("disabled");
                }
                counterRooms.value = Number(counterRooms.value) + 1;
                drawAllRooms();
            });
            btnMinusRooms.addEventListener("click", () => {
                if (counterRooms.value == 2) {
                    btnMinusRooms.setAttribute("disabled", "disabled");
                }
                if (counterRooms.value <= max_Rooms) {
                    btnPlusRooms.removeAttribute("disabled");
                }
                counterRooms.value = Number(counterRooms.value) - 1;
                drawAllRooms();
            });

            function drawAllRooms() {

                let countAllGuests =
                    Number(counterRooms.value);
                console.log(countAllGuests);
                if (typeof filterState !== "undefined") {
                    filterState.rooms = counterRooms.value;
                }
                if (countAllGuests > 1 && countAllGuests < 5) {
                    inputView.innerHTML = countAllGuests + " комнаты";
                } else if (countAllGuests === 5) {
                    inputView.innerHTML = countAllGuests + " комнат";
                } else {
                    inputView.innerHTML = countAllGuests + " комната";
                }
            }
        }

        function counterRoomsFilter() {
            let counterRooms = document.querySelector(
                ".guests_count_wrapper_filter .adults_counter .count_input_geusts"
            );


            let btnPlusRooms = document.querySelector(
                ".guests_count_wrapper_filter .adults_counter .btn_plus"
            );
            let btnMinusRooms = document.querySelector(
                ".guests_count_wrapper_filter .adults_counter .btn_minus"
            );



            let max_Adults = 5;

            if (counterRooms.value >= max_Adults) {
                btnPlusRooms.setAttribute("disabled", "disabled");
            }

            if (counterRooms.value == 1) {
                btnMinusRooms.setAttribute("disabled", "disabled");
            }
            if (counterRooms.value > 1) {
                btnMinusRooms.removeAttribute("disabled");
            }

            btnPlusRooms.addEventListener("click", () => {
                if (counterRooms.value >= max_Adults - 1) {
                    btnPlusRooms.setAttribute("disabled", "disabled");
                }
                if (counterRooms.value >= 1) {
                    btnMinusRooms.removeAttribute("disabled");
                }
                counterRooms.value = Number(counterRooms.value) + 1;
                setStateGuests();
            });
            btnMinusRooms.addEventListener("click", () => {
                if (counterRooms.value == 2) {
                    btnMinusRooms.setAttribute("disabled", "disabled");
                }
                if (counterRooms.value <= max_Adults) {
                    btnPlusRooms.removeAttribute("disabled");
                }
                counterRooms.value = Number(counterRooms.value) - 1;
                setStateGuests();
            });





            function setStateGuests() {
                let countAllGuests =
                    Number(counterRooms.value);
                if (typeof filterState !== "undefined") {
                    filterState.rooms = counterRooms.value;

                }
            }
        }
        // Page state
        let pageState = {
            "current_page": 1,
            "last_page": 1,
        }

        // ----------
        // Filter parametr
        let filterState = {
            "part_island_id": @if (isset($data['part_island_id_apartment']))
                {{ $data['part_island_id_apartment'] }}
            @else
                ''
            @endif ,
            "district_id": @if (isset($data['district_id_apartment']))
                {{ $data['district_id_apartment'] }}
            @else
                ''
            @endif ,
            "flat": @if (isset($typeHouse['flat_apartment']))
                "{{ $typeHouse['flat_apartment'] }}"
            @else
                0
            @endif ,
            "villa": @if (isset($typeHouse['villa_apartment']))
                "{{ $typeHouse['villa_apartment'] }}"
            @else
                0
            @endif ,
            "penthouse": @if (isset($typeHouse['penthouse_apartment']))
                "{{ $typeHouse['penthouse_apartment'] }}"
            @else
                0
            @endif ,
            "townhouse": @if (isset($typeHouse['townhouse_apartment']))
                "{{ $typeHouse['townhouse_apartment'] }}"
            @else
                0
            @endif ,
            "rooms": @if (isset($rooms))
                {{ $rooms }}
            @else
                1
            @endif ,
            "sort": '',
            "price_range_min": '',
            "price_range_max": '',
            "page": '',
        }
        // ==Viev filter parametr==
        function setVievPartIsland() {
            if (filterState.part_island_id != "") {
                let vievFullName = document.querySelector('.select_city_wrapper_first .input_view');
                let HideIslandId = document.getElementById('part_island_id');
                HideIslandId.value = filterState.part_island_id;
                if (HideIslandId.value == 1) {
                    vievFullName.textContent = 'North Tenerife'
                } else {
                    vievFullName.textContent = 'South Tenerife'
                }
            }
        }
        setVievPartIsland();






        function setVievDistrict() {
            if (filterState.district_id != 0) {
                let vievFullName = document.querySelector('.select_district_wrapper .input_view');
                let HideDistrictId = document.getElementById('district_id');
                HideDistrictId.value = filterState.district_id;
                fetch('/get-filter-district/' + HideDistrictId.value, {
                        method: "GET",
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result) {
                            vievFullName.textContent = result.name
                        } else {
                            console.log('error')
                        }
                    })
            }
        }
        setVievDistrict();

        function setVievTypeHouse() {
            let vievFullName = document.querySelector('.type_house_wrapper .input_view');
            let flatInput = document.getElementById('flat');
            let villaInput = document.getElementById('villa');
            let penthouseInput = document.getElementById('penthouse');
            let townhouseInput = document.getElementById('townhouse');
            if (filterState.flat != 0 || filterState.villa != 0 || filterState.penthouse != 0 || filterState.townhouse !=
                0) {
                vievFullName.value = ''
            }
            if (filterState.flat != 0) {
                flatInput.checked = true;
                vievFullName.value += 'Квартира;'
            }
            if (filterState.villa != 0) {
                villaInput.checked = true;
                vievFullName.value += 'Вилла;'
            }
            if (filterState.penthouse != 0) {
                penthouseInput.checked = true;
                vievFullName.value += 'Пентхаус;'
            }
            if (filterState.townhouse != 0) {
                townhouseInput.checked = true;
                vievFullName.value += 'Таунхаус;'
            }
        }
        setVievTypeHouse()

        function setVievGuests() {
            let vievFullName = document.querySelector('.guests_count_wrapper .input_view');
            let rooms = document.getElementById('rooms');

            vievFullName.textContent = filterState.rooms +
                " комнат"
            if (filterState.rooms != 0) {
                rooms.value = filterState.rooms
            }
            // guestsAdults.nextElementSibling.setAttribute('disabled', 'disabled')
            // console.log(guestsAdults.nextElementSibling)

        }
        setVievGuests()
        //+======Filter State========== 
        setVievTypeHouseFilter()



        function setVievTypeHouseFilter() {
            let flatChackbox = document.getElementById('flat_filter');
            let villaChackbox = document.getElementById('villa_filter');
            let penthouseChackbox = document.getElementById('penthouse_filter');
            let townhouseChackbox = document.getElementById('townhouse_filter');
            if (filterState.flat != 0) {
                flatChackbox.checked = true;
            }
            if (filterState.villa != 0) {
                villaChackbox.checked = true;
            }
            if (filterState.penthouse != 0) {
                penthouseChackbox.checked = true;
            }
            if (filterState.townhouse != 0) {
                townhouseChackbox.checked = true;
            }
            flatChackbox.addEventListener('change', setStateTypeHouseFilter)
            villaChackbox.addEventListener('change', setStateTypeHouseFilter)
            penthouseChackbox.addEventListener('change', setStateTypeHouseFilter)
            townhouseChackbox.addEventListener('change', setStateTypeHouseFilter)

            function setStateTypeHouseFilter() {
                filterState.flat = ""
                filterState.villa = ""
                filterState.penthouse = ""
                filterState.townhouse = ""

                if (flatChackbox.checked) {
                    filterState.flat = "flat"
                }
                if (villaChackbox.checked) {
                    filterState.villa = "villa"
                }
                if (penthouseChackbox.checked) {
                    filterState.penthouse = "penthouse"
                }
                if (townhouseChackbox.checked) {
                    filterState.townhouse = "townhouse"
                }
            }
        }


        // -==========================

        function resetState() {
            filterState.part_island_id = '';
            filterState.district_id = '';
            filterState.flat = '';
            filterState.villa = '';
            filterState.penthouse = '';
            filterState.townhouse = '';
            filterState.rooms = 1;
            filterState.price_range_min = '';
            filterState.price_range_max = '';
            filterState.page = '';
            filterState.sort = '';
            slider.noUiSlider.reset();
            calendarFilter.clear();
            setVievTypeHouseFilter();
            getAdvertisement();
        }
    </script>


    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('swiper/swiper-bundle.min.js') }}"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/lv.js"></script>
    <script src="{{ asset('nouislider/nouislider.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYZoS9SE7yCgnjpgnU2qRHcLBQZuaaGgY&callback=initMap&libraries=marker&v=beta">
    </script>
    <script>
        getAdvertisement();

        function selectParametrDistrict() {
            let listPartIsland = document.querySelectorAll('.select_district_wrapper .cityOfferList li');
            let input = document.getElementById("district_id")
            let view = document.querySelector('.select_district_wrapper .input_view');
            if (listPartIsland.length > 0) {
                for (let i = 0; i < listPartIsland.length; i++) {
                    listPartIsland[i].addEventListener('click', () => {
                        listPartIsland[i].parentNode.parentNode.parentNode.classList.remove('active');
                        input.value = listPartIsland[i].dataset.district_id
                        filterState.district_id = input.value
                        view.textContent = listPartIsland[i].textContent
                    })
                }
            }
        }

        function getListDistrictApartment() {
            filterState.district_id = '';
        }

        function getListDistrict() {
            let idPartIslandc = document.getElementById('part_island_id').value
            if (idPartIslandc > 0) {
                fetch('/get-district/' + idPartIslandc, {
                        method: "GET",
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

        function drawDistrictList(json) {
            let districtHtml = document.getElementById('district-list')
            districtHtml.innerHTML = '';
            districtHtml.innerHTML += `<li data-district_id="">Любой</li>`
            for (let i = 0; i < json.length; i++) {
                districtHtml.innerHTML += `<li data-district_id="` + json[i].id + `">` + json[i].name + `</li>`
            }
            selectParametrDistrict();
        }

        function setVievPartIslandApartment() {
            if (filterState.part_island_id != "") {
                let vievFullName = document.querySelector('.select_city_wrapper_apartment .input_view');
                let HideIslandId = document.getElementById('part_island_id_apartment');
                HideIslandId.value = filterState.part_island_id;
                if (HideIslandId.value == 1) {
                    vievFullName.textContent = 'North Tenerife'
                } else {
                    vievFullName.textContent = 'South Tenerife'
                }
            }
        }
        setVievPartIslandApartment();



        function selectParametrPartIslandApartment() {
            let listPartIsland = document.querySelectorAll('.select_city_wrapper_apartment .cityOfferList li');
            let input = document.getElementById("part_island_id_apartment")
            let view = document.querySelector('.select_city_wrapper_apartment .input_view');
            if (listPartIsland.length > 0) {
                for (let i = 0; i < listPartIsland.length; i++) {
                    listPartIsland[i].addEventListener('click', () => {
                        listPartIsland[i].parentNode.parentNode.parentNode.classList.remove('active');
                        input.value = listPartIsland[i].dataset.part_island_id_apartment
                        filterState.part_island_id = input.value
                        view.textContent = listPartIsland[i].textContent
                        input.onchange();
                    })
                }
            }
        }
        selectParametrPartIslandApartment()

        function selectParametrPartIsland() {
            let listPartIsland = document.querySelectorAll('.select_city_wrapper_first .cityOfferList li');
            let input = document.getElementById("part_island_id")
            let view = document.querySelector('.select_city_wrapper_first .input_view');
            if (listPartIsland.length > 0) {
                for (let i = 0; i < listPartIsland.length; i++) {
                    listPartIsland[i].addEventListener('click', () => {
                        // debugger
                        listPartIsland[i].parentNode.parentNode.parentNode.classList.remove('active');
                        input.value = listPartIsland[i].dataset.part_island_id
                        filterState.part_island_id = input.value
                        view.textContent = listPartIsland[i].textContent
                        input.onchange();
                    })
                }
            }
        }
        selectParametrPartIsland()






        searchDropdounTypeHouse();
        searchDropdounCity();
        searchDropdounCityApartment();
        searchDropdounDistrict();
        searchDropdounRooms();
        counterRooms();
        drawTypeHouse();
        searchDropdounSort();
        openFilter();
        closeFilter();
        counterRoomsFilter();


        function changeSort() {
            let viewSelectSort = document.getElementById('view_select_sort')
            let arrSortInput = document.getElementsByName('sort');
            for (let i = 0; i < arrSortInput.length; i++) {
                arrSortInput[i].addEventListener('change', () => {
                    filterState.sort = arrSortInput[i].value
                    viewSelectSort.textContent = arrSortInput[i].nextElementSibling.textContent
                    getAdvertisement()
                })
            }
        }
        changeSort()

        let swiperInCardHotel = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },


        });


        const swiperService = new Swiper('.swiper_service', {
            // Optional parameters
            // direction: 'horizontal',
            // loop: false,

            // slidesPerColumn: 2,
            slidesPerView: 2,
            spaceBetween: 30,
            slidesPerGroup: 1,
            centeredSlides: false,
            grid: {
                rows: 2,
            },
            breakpoints: {
                200: {
                    slidesPerView: 1.02,
                    spaceBetween: 10,
                    autoHeight: true,
                    grid: {
                        rows: 1,
                    },
                },
                576: {
                    grid: {
                        rows: 2,
                    },
                    autoHeight: false,
                }
            },
            // Default parameters
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });



        var price_range_min = document.getElementById('price_range_min'),
            price_range_max = document.getElementById('price_range_max');
        var slider = document.getElementById('sliderPriceFilter');
        noUiSlider.create(slider, {
            start: [10, 9999],
            connect: true,
            range: {
                'min': 10,
                'max': 9999
            },
            step: 10,
            format: {
                to: function(value) {
                    return parseInt(value);
                },
                from: function(value) {
                    return parseInt(value);
                }
            }
        });
        slider.noUiSlider.on('update', function(values, handle) {
            if (handle) {
                price_range_max.value = values[handle];
                filterState.price_range_max = values[handle];

            } else {
                price_range_min.value = values[handle];
                filterState.price_range_min = values[handle];
            }
        });



        function getAdvertisement() {
            console.log(filterState)
            let containerAdvertisement = document.getElementById('containerAdvertisement');
            containerAdvertisement.innerHTML = `
            <div class="d-flex justify-content-center align-items-center" style="height: 200px;" >
  <div class="spinner-border text-primary" style="width: 5rem; height: 5rem;" role="status">
    <span class="visually-hidden">Загрузка...</span>
  </div>
</div>
            `;
            let urlParametrs = JSON.stringify(filterState);
            urlParametrs = urlParametrs.replace(/"/gi, '');
            urlParametrs = urlParametrs.replace(/,/gi, '&');
            urlParametrs = urlParametrs.replace(/:/gi, '=');
            urlParametrs = urlParametrs.replace(/{/gi, '');
            urlParametrs = urlParametrs.replace(/}/gi, '');
            console.log(JSON.stringify(urlParametrs));
            fetch('/search-apartment-api?' + urlParametrs, {
                    method: "get",
                })
                .then(response => response.json())
                .then(result => {
                    if (result) {
                        console.log(result)
                        pageState.last_page = result.last_page
                        pageState.current_page = result.current_page
                        document.getElementById('count_on_page').textContent = result.data.length
                        document.getElementById('total_count').textContent = result.total
                        drawPagination(result)
                        drawAdvertisement(result.data)
                    } else {

                        alert('Ошибка сети');
                    }
                })

        }

        let btnCardCard = document.querySelector('.icon_card_card')
        let btnCardList = document.querySelector('.icon_card_list')

        function drawAdvertisement(json) {
            let containerAdvertisement = document.getElementById('containerAdvertisement');
            containerAdvertisement.innerHTML = '';
            let cardViev;
            if (document.cookie.match(/cardViev=(.+?)(;|$)/)) {
                cardViev = document.cookie.match(/cardViev=(.+?)(;|$)/);
            } else {
                document.cookie = "cardViev=Grid";
            }

            let classHorizontalAdvertisement = ''

            if (cardViev[1] == 'list') {
                btnCardCard.classList.remove('active')
                btnCardList.classList.add('active')
                classHorizontalAdvertisement = 'active'
            } else {
                btnCardCard.classList.add('active')
                btnCardList.classList.remove('active')
            }
            if (json.length > 0) {
                for (let i = 0; i < json.length; i++) {
                    let element = ''
                    let serviceElement = ''

                    for (let k = 0; k < json[i].photoUrl.length; k++) {
                        element += `<div class="swiper-slide"><img class="obg-f-cover" src="/storage/` + json[i].photoUrl[k]
                            .url + `" alt=""></div>`
                    }

                    // containerAdvertisement.appendChild(swiper)
                    containerAdvertisement.innerHTML += `
            <div class="col-12 col-md-6 col-lg-6 horizontal_advertisement ` + classHorizontalAdvertisement + `">
                                <div class="body_hotel_card">
                                        <div class="img_wrapper">
                                            <div class="swiper">
                                                <div class="swiper-wrapper">
                                                    <!-- Slides -->
                                                    ` + element + `
                                                </div>
                                                <!-- If we need pagination -->
                                                <div class="swiper-pagination"></div>
                                            </div>
                                        </div>
                                        <div class="content_wrapper">
                                            <div class="name_hotel">
                                                ` + json[i].name + `
                                            </div>
                                            <div class="adress_hotel">
                                                <div class="adress_hotel_icon"></div>
                                                <div class="adress_hotel_txt">` + json[i].adress + `</div>
                                            </div>
                                            <div class="row_info_hotel">
                                                <div class="item_info_hotel rooms_icon">
                                                    ` + json[i].rooms + ` Rooms
                                                </div>
                                                <div class="item_info_hotel bedroom_icon">
                                                    ` + json[i].bedrooms + ` Bedroom
                                                </div>
                                            </div>
                                            <div class="price_include mt30">
                                                ` + serviceElement + `
                                            </div>
                                            <div class="line_in_card"></div>
                                            <div class="card_info_price_wrapper">
                                                <div class="left_block">
                                                    <div class="price_value">€` + json[i].price + `<span> / ночь</span></div>
                                                    <div class="price_description"><span>*Цена варьируется</span>
                                                    </div>
                                                </div>
                                                <a href="/advertisement-sale/` + json[i].id + `" class="btn_more_detailed_card">Подробнее</a>
                                            </div>
                                        </div>
                                        <button class="star_chosen_one" onclick="addOrDelFav(event)"></button>
                                    </div>
                            </div>
            `
                    drawCookies()

                }
                let swiperInCardHotel = new Swiper('.swiper', {
                    direction: 'horizontal',
                    loop: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true
                    },
                });
            }
        }

        function drawPagination(result) {
            let btnNext = document.getElementById('btn_next');
            let btnPrevious = document.getElementById('btn_previous');
            let wrapperItemPage = document.querySelector('.wrapper-item-page');

            if (result.last_page > 1) {
                wrapperItemPage.innerHTML = ``;
                if (pageState.current_page > 1) {
                    btnPrevious.removeAttribute('disabled');
                }
                if (pageState.current_page == 1) {
                    btnPrevious.setAttribute('disabled', 'disabled');
                }
                if (pageState.current_page == pageState.last_page) {
                    btnNext.setAttribute('disabled', 'disabled');
                }
                if (pageState.current_page < pageState.last_page) {
                    btnNext.removeAttribute('disabled');
                }
                if (result.last_page <= 3) {
                    for (let i = 0; i < result.last_page; i++) {
                        let className = ''
                        if (pageState.current_page == i + 1) {
                            className = 'active'
                        }
                        wrapperItemPage.innerHTML += `<li class="page-item mlr20"><button class="page_btn ` + className +
                            `" onClick="openItemPage(` + (i + 1) + `)">` + (i + 1) + `</button></li>`;
                    }
                } else {
                    let maxPage = 1
                    let minPage = 1

                    if (pageState.current_page + 2 < result.last_page && pageState.current_page == 1) {
                        maxPage = pageState.current_page + 2
                    } else if (pageState.current_page + 1 < result.last_page) {
                        maxPage = pageState.current_page + 1
                    } else {
                        maxPage = result.last_page
                    }

                    if (pageState.current_page == 1) {
                        minPage = pageState.current_page - 1
                    } else if (pageState.current_page + 3 < result.last_page) {
                        minPage = pageState.current_page - 2
                    } else if (pageState.current_page == result.last_page) {
                        minPage = pageState.current_page - 3
                    } else {
                        minPage = pageState.current_page - 2
                    }

                    for (let i = minPage; i < maxPage; i++) {
                        let className = ''
                        if (pageState.current_page == i + 1) {
                            className = 'active'
                        }
                        wrapperItemPage.innerHTML += `<li class="page-item mlr20"><button class="page_btn ` + className +
                            `" onClick="openItemPage(` + (i + 1) + `)">` + (i + 1) + `</button></li>`;
                    }
                }
            } else {
                btnPrevious.setAttribute('disabled', 'disabled');
                btnNext.setAttribute('disabled', 'disabled');
                wrapperItemPage.innerHTML = ``;
                wrapperItemPage.innerHTML += `<li class="page-item mlr20"><button class="page_btn active">1</button></li>`;
            }
        }

        function openItemPage(number) {
            filterState.page = number;
            getAdvertisement();
        }

        function openNextPage() {
            let btnPrevious = document.getElementById('btn_previous');
            let btnNext = document.getElementById('btn_next');
            if (pageState.current_page < pageState.last_page) {
                btnPrevious.removeAttribute('disabled');
                pageState.current_page = pageState.current_page + 1
                filterState.page = pageState.current_page
                getAdvertisement()
            }
            if (pageState.current_page == pageState.last_page) {
                btnNext.setAttribute('disabled', 'disabled');
            }
        }

        function openPreviousPage() {
            let btnPrevious = document.getElementById('btn_previous');
            let btnNext = document.getElementById('btn_next');
            if (pageState.current_page > 1) {
                btnNext.removeAttribute('disabled');
                pageState.current_page = pageState.current_page - 1
                filterState.page = pageState.current_page
                getAdvertisement()
            }
            if (pageState.current_page == 1) {
                btnPrevious.setAttribute('disabled', 'disabled');
            }
        }



        function cardSetListView() {
            let btnCardCard = document.querySelector('.icon_card_card')
            let btnCardList = document.querySelector('.icon_card_list')
            btnCardCard.classList.remove('active')
            btnCardList.classList.add('active')
            document.cookie = "cardViev=list;max-age=2629743;path=/";
            let allCardList = document.querySelectorAll('.horizontal_advertisement');
            if (allCardList.length > 0) {
                for (let i = 0; i < allCardList.length; i++) {
                    allCardList[i].classList.add('active')
                }
            }
        }

        function cardSetGridView() {
            let btnCardCard = document.querySelector('.icon_card_card')
            let btnCardList = document.querySelector('.icon_card_list')
            btnCardCard.classList.add('active')
            btnCardList.classList.remove('active')
            document.cookie = "cardViev=grid;max-age=2629743;path=/";
            let allCardList = document.querySelectorAll('.horizontal_advertisement.active');
            if (allCardList.length > 0) {
                for (let i = 0; i < allCardList.length; i++) {
                    allCardList[i].classList.remove('active')
                }
            }
        }

        function initMap() {
            const map = new google.maps.Map(document.getElementById("mapGoogleCreate"), {
                center: {
                    lat: {{ $advertisemensMap->first()->lat }},
                    lng: {{ $advertisemensMap->first()->lng }}
                },
                zoom: 8,
                mapId: "4504f8b37365c3d0",
            });

            @foreach ($advertisemensMap as $advertisement)
                const priceTag{{ $advertisement->id }} = document.createElement("div");


                priceTag{{ $advertisement->id }}.className = "price-tag";
                priceTag{{ $advertisement->id }}.textContent = "{{ $advertisement->price }}";

                const markerView{{ $advertisement->id }} = new google.maps.marker.AdvancedMarkerView({
                    map,
                    position: {
                        lat: {{ $advertisement->lat }},
                        lng: {{ $advertisement->lng }},
                    },
                    content: priceTag{{ $advertisement->id }},

                });
                google.maps.event.addListener(markerView{{ $advertisement->id }}, 'click', function() {
                    window.location.href = '/advertisement-sale/{{ $advertisement->id }}';
                });
            @endforeach
        }
        initMap()
    </script>
@endsection
