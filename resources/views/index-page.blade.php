@extends('Layout.main')
@section('content')
    <form action="/search" id="search" style="display: none" method="get">
    </form>


    <div class="search_block">
        <div class="container">
            <div class="body_search_block">
                <div class="title_search_block">Аренда квартир и апартаментов на Тенерифе</div>
                <div class="descrip_search_block">Аренда квартир и апартаментов на Тенерифе</div>
                <div class="row_search_input">
                    <div class="row_search_input_double">
                        <div class="wpapper_search_input select_city_wrapper">
                            <div class="name_input">Часть острова</div>
                            <div class="input_view">Любая</div>
                            <input type="text" name="part_island_id" onchange="getListDistrict()" form="search"
                                id="part_island_id" style="display: none;">
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
                            <input type="text" form="search" name="district_id" id="district_id" style="display: none;">
                            <div class="drop_doun_body">
                                {{-- <input type="text" name="searchDistrict" form="search" class="searchCity"> --}}
                                <ul class="cityOfferList" id="district-list">
                                    <li>Выберите часть острова</li>
                                </ul>
                            </div>
                        </div>
                        <div class="wpapper_search_input mr-0-mob type_house_wrapper">
                            <div class="name_input">Тип жилья</div>
                            <input class="input_view" type="text" value="Любой">
                            <input type="text" style="display: none;">
                            <div class="drop_doun_body">
                                <div class="item_checkbox">
                                    <input type="checkbox" class="custom-checkbox" checked form="search" name="flat"
                                        value="flat" id="flat">
                                    <label class="text_drop_doun" for="flat">Квартира</label>
                                </div>
                                <div class="item_checkbox">
                                    <input type="checkbox" class="custom-checkbox" checked form="search" value="villa"
                                        name="villa" id="villa">
                                    <label class="text_drop_doun" for="villa">Вилла</label>
                                </div>
                                <div class="item_checkbox">
                                    <input type="checkbox" class="custom-checkbox" checked form="search" value="penthouse"
                                        name="penthouse" id="penthouse">
                                    <label class="text_drop_doun" for="penthouse">Пентхаус</label>
                                </div>
                                <div class="item_checkbox">
                                    <input type="checkbox" class="custom-checkbox" checked form="search" value="townhouse"
                                        name="townhouse" id="townhouse">
                                    <label class="text_drop_doun" for="townhouse">Таунхаус</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row_search_input_double">
                        <div class="wpapper_search_input date_input">
                            <div class="row_select_date">
                                <div class="select_item_date">
                                    <div class="name_input">Прибытие</div>
                                    <input type="text" id="calendar" class="input_select_date" form="search"
                                        name="start_active_adv" value="" placeholder="Укажите даты">
                                </div>
                                <div class="line"></div>
                                <div class="select_item_date">
                                    <div class="name_input">Выезд</div>
                                    <input type="text" id="endDate" form="search" name="end_active_adv"
                                        class="input_select_date" placeholder="Укажите даты">
                                </div>
                            </div>
                        </div>
                        <div class="wpapper_search_input guests_count_wrapper ">
                            <div class="name_input">1 номер для</div>
                            <div class="input_view">2 гостей</div>
                            <input type="text" style="display: none;">
                            <div class="drop_doun_body">
                                <div class="guests_item adults_counter">
                                    <div>
                                        <div class="text_drop_doun">Взрослые</div>
                                        <div class="text_drop_doun_descr">Старше 12 лет</div>
                                    </div>
                                    <div class="wrapper_counter_item_guests">
                                        <button class="btn_minus"></button>
                                        <input class="count_input_geusts" name="guestsAdults" form="search"
                                            value="2">
                                        <button class="btn_plus"></button>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="guests_item children_counter">
                                    <div>
                                        <div class="text_drop_doun">Дети</div>
                                        <div class="text_drop_doun_descr">От двух до 12 лет</div>
                                    </div>
                                    <div class="wrapper_counter_item_guests">
                                        <button class="btn_minus" disabled></button>
                                        <input class="count_input_geusts" name="guestsChildren" form="search"
                                            value="0">
                                        <button class="btn_plus"></button>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="guests_item baby_counter">
                                    <div>
                                        <div class="text_drop_doun">Младенцы</div>
                                        <div class="text_drop_doun_descr">До 2х лет, без места</div>
                                    </div>
                                    <div class="wrapper_counter_item_guests">
                                        <button class="btn_minus" disabled></button>
                                        <input class="count_input_geusts" name="guestsBaby" form="search"
                                            value="0">
                                        <button class="btn_plus"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" form="search" class="btn_search">Искать</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($advertisements) > 0)
        <div class="hotel_carusel_block margin170">
            <div class="container">
                <div class="title_main">Объявления</div>
                <div class="title_main_descrip subtitle_hotel_carusel">Наши предложение, которые могут быть вам
                    интересны</div>
            </div>
            <div class="container_best_hotel">
                <div class="container">
                    <div class="row row_mt40">
                        <div class="swiper_best_hotel swiper_popular_place">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                @foreach ($advertisements as $advItem)
                                    <div class="swiper-slide">
                                        <div class="body_hotel_card">
                                            <div class="img_wrapper">
                                                <div class="swiper swiper-popular">
                                                    <!-- Additional required wrapper -->
                                                    <div class="swiper-wrapper">
                                                        <!-- Slides -->
                                                        @foreach ($advItem->photoUrl as $advItemImg)
                                                            <div class="swiper-slide"><img class="obg-f-cover"
                                                                    src="/storage/{{ $advItemImg->url }}" alt="">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="swiper-button-prev-img"></div>
                                                    <div class="swiper-button-next-img"></div>
                                                    <!-- If we need pagination -->
                                                    <div class="swiper-pagination"></div>
                                                </div>

                                            </div>
                                            <div class="content_wrapper">
                                                <div class="name_hotel">
                                                    {{ $advItem->title }}
                                                </div>
                                                <div class="adress_hotel">
                                                    <div class="adress_hotel_icon"></div>
                                                    <div class="adress_hotel_txt">{{ $advItem->adress }}</div>
                                                </div>
                                                <div class="row_info_hotel">
                                                    <div class="item_info_hotel guests_icon">
                                                        {{ $advItem->guests }} Guests
                                                    </div>
                                                    <div class="item_info_hotel bedroom_icon">
                                                        {{ $advItem->bedrooms }} Bedroom
                                                    </div>
                                                </div>
                                                <div class="price_include mt30">
                                                    @if ($advItem->free_parking_street == 'on')
                                                        <div class="price_include_icon icon_parking"></div>
                                                        <div class="line"></div>
                                                    @endif
                                                    @if ($advItem->beach_access_view == 'on' || $advItem->relaxing_nearby_beach == 'on')
                                                        <div class="price_include_icon icon_bech"></div>
                                                        <div class="line"></div>
                                                    @endif
                                                    @if ($advItem->conditioner == 'on')
                                                        <div class="price_include_icon icon_conditioner"></div>
                                                        <div class="line"></div>
                                                    @endif
                                                    @if ($advItem->washer == 'on')
                                                        <div class="price_include_icon icon_washing_machine"></div>
                                                        <div class="line"></div>
                                                    @endif
                                                    @if ($advItem->pool == 'on')
                                                        <div class="price_include_icon icon_swimming_pool"></div>
                                                        <div class="line"></div>
                                                    @endif
                                                    @if ($advItem->wi_fi == 'on')
                                                        <div class="price_include_icon icon_wifi"></div>
                                                        <div class="line"></div>
                                                    @endif
                                                </div>
                                                <div class="line_in_card"></div>
                                                <div class="card_info_price_wrapper">
                                                    <div class="left_block">
                                                        <div class="price_value">€{{ $advItem->price }} <span>/
                                                                ночь</span>
                                                        </div>
                                                        <div class="price_description"><span>*Цена варьируется</span>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('advertisement-page', $advItem->id) }}"
                                                        class="btn_more_detailed_card">Подробнее</a>
                                                </div>
                                            </div>
                                            <button class="star_chosen_one" onclick="addOrDelFav(event)"></button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-pagination pagination-swiperPopularHotel"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    @endif



    @if (count($advertisemensPopular) > 0)
        <div class="hotel_carusel_block margin170">
            <div class="container">
                <div class="title_main">Популярные места</div>
                <div class="title_main_descrip subtitle_hotel_carusel">Наши предложение, которые могут быть вам
                    интересны</div>
            </div>
            <div class="container_best_hotel">
                <div class="container">
                    <div class="row row_mt40">
                        <div class="swiper_best_hotel swiper_popular_place">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                @foreach ($advertisemensPopular as $advItem)
                                    <div class="swiper-slide">
                                        <div class="body_hotel_card">
                                            <div class="img_wrapper">
                                                <div class="swiper swiper-popular">
                                                    <!-- Additional required wrapper -->
                                                    <div class="swiper-wrapper">
                                                        <!-- Slides -->
                                                        @foreach ($advItem->photoUrl as $advItemImg)
                                                            <div class="swiper-slide"><img class="obg-f-cover"
                                                                    src="/storage/{{ $advItemImg->url }}" alt="">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="swiper-button-prev-img"></div>
                                                    <div class="swiper-button-next-img"></div>
                                                    <!-- If we need pagination -->
                                                    <div class="swiper-pagination"></div>
                                                </div>

                                            </div>
                                            <div class="content_wrapper">
                                                <div class="name_hotel">
                                                    {{ $advItem->title }}
                                                </div>
                                                <div class="adress_hotel">
                                                    <div class="adress_hotel_icon"></div>
                                                    <div class="adress_hotel_txt">{{ $advItem->adress }}</div>
                                                </div>
                                                <div class="row_info_hotel">
                                                    <div class="item_info_hotel guests_icon">
                                                        {{ $advItem->guests }} Guests
                                                    </div>
                                                    <div class="item_info_hotel bedroom_icon">
                                                        {{ $advItem->bedrooms }} Bedroom
                                                    </div>
                                                </div>
                                                <div class="price_include mt30">
                                                    @if ($advItem->free_parking_street == 'on')
                                                        <div class="price_include_icon icon_parking"></div>
                                                        <div class="line"></div>
                                                    @endif
                                                    @if ($advItem->beach_access_view == 'on' || $advItem->relaxing_nearby_beach == 'on')
                                                        <div class="price_include_icon icon_bech"></div>
                                                        <div class="line"></div>
                                                    @endif
                                                    @if ($advItem->conditioner == 'on')
                                                        <div class="price_include_icon icon_conditioner"></div>
                                                        <div class="line"></div>
                                                    @endif
                                                    @if ($advItem->washer == 'on')
                                                        <div class="price_include_icon icon_washing_machine"></div>
                                                        <div class="line"></div>
                                                    @endif
                                                    @if ($advItem->pool == 'on')
                                                        <div class="price_include_icon icon_swimming_pool"></div>
                                                        <div class="line"></div>
                                                    @endif
                                                    @if ($advItem->wi_fi == 'on')
                                                        <div class="price_include_icon icon_wifi"></div>
                                                        <div class="line"></div>
                                                    @endif
                                                </div>
                                                <div class="line_in_card"></div>
                                                <div class="card_info_price_wrapper">
                                                    <div class="left_block">
                                                        <div class="price_value">€{{ $advItem->price }} <span>/
                                                                ночь</span>
                                                        </div>
                                                        <div class="price_description"><span>*Цена варьируется</span>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('advertisement-page', $advItem->id) }}"
                                                        class="btn_more_detailed_card">Подробнее</a>
                                                </div>
                                            </div>
                                            <button class="star_chosen_one" onclick="addOrDelFav(event)"></button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-pagination pagination-swiperPopularHotel"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    @endif




    <div class="container_feed_back margin170">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <img src="/img/quotation.svg" class="feedback_quot" alt="">
                    <div class="title_main">Отзывы</div>
                    <div class="main_txt mt15 feedback_descrip">Мы ценим своих клиентов и вот, что они говорят
                        о нас:</div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="body_feed_back">
                        <div class="swiper-feed-back">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <div class="title_feedback">Ни одной заминки!</div>
                                    <div class="main_txt main_txt_feed_back">«Хочу выразить свою
                                        признательность.
                                        Мы с друзьями
                                        ездили отдыхать в новогодние праздники. Всё прошло замечательно.
                                        Отличная
                                        организация, квартира была как на фото и всё в описании соответсвовало
                                        реальности»
                                    </div>
                                    <div class="author_feed_back">
                                        <div class="name">Александра</div>
                                        <a href="#" class="link">@allipops_35</a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="title_feedback">Ни одной заминки!</div>
                                    <div class="main_txt main_txt_feed_back">«Хочу выразить свою
                                        признательность.
                                        Мы с друзьями
                                        ездили отдыхать в новогодние праздники. Всё прошло замечательно.
                                        Отличная
                                        организация, квартира была как на фото и всё в описании соответсвовало
                                        реальности»
                                    </div>
                                    <div class="author_feed_back">
                                        <div class="name">Александра</div>
                                        <a href="#" class="link">@allipops_35</a>
                                    </div>
                                </div>
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>

                            <!-- If we need navigation buttons -->
                            <div class="btn_wrapper_feed-back">
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (isset($advertisemensMap))
        {
        <div class="container map_container margin170">
            <div class="row">
                <div class="col-12">
                    <div class="title_main">Апартаменты на карте</div>
                </div>
                <div class="col-12">
                    {{-- <iframe class="map_iframe" id="map_iframe"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48059.71104103914!2d-8.663153231931208!3d41.1622002289431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2465abc4e153c1%3A0xa648d95640b114bc!2z0J_QvtGA0YLRgywg0J_QvtGA0YLRg9Cz0LDQu9C40Y8!5e0!3m2!1sru!2sru!4v1669410406356!5m2!1sru!2sru"
                    width="100%" height="450" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                    <div id="mapGoogleCreate" class="location_iframe">
                    </div>
                </div>
            </div>
        </div> }
    @endif
    <div class="container container_service container_service_overflow margin170">
        <div class="title_main">Другие наши услуги</div>
        <div class="title_main_descrip">Наши предложение, которые могут быть вам интересны</div>
        <div class="wrapper_service_cards">
            <div class="swiper_service">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="service_card">
                            <div class="swiper swiper-service-img">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->

                                    <div class="swiper-slide"><img src="/img/service_turs.png" alt="">
                                    </div>
                                    <div class="swiper-slide"><img src="/img/service_turs.png" alt="">
                                    </div>
                                    <div class="swiper-slide"><img src="/img/service_turs.png" alt="">
                                    </div>

                                </div>
                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev-img"></div>
                                <div class="swiper-button-next-img"></div>
                                <!-- If we need scrollbar -->
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>
                            </div>

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
                <div class="swiper-pagination pagination-swiperServiceHotel"></div>
                <!-- If we need scrollbar -->
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('swiper/swiper-bundle.min.js') }}"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/lv.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYZoS9SE7yCgnjpgnU2qRHcLBQZuaaGgY&callback=initMap&libraries=marker&v=beta">
    </script>
    <script>
        // Page state
        let pageState = {
            "current_page": 1,
            "last_page": 1,
        }

        // ----------
        // Filter parametr
        let filterState = {
            "part_island_id": '',
            "district_id": '',
            "flat": 0,
            "villa": 0,
            "penthouse": 0,
            "townhouse": 0,
            "start_active_adv": '',
            "end_active_adv": '',
            "guestsAdults": 2,
            "guestsChildren": 0,
            "guestsBaby": 0,
            "sort": '',
            "price_range_min": '',
            "price_range_max": '',
            "page": '',
        }

        // ==Viev filter parametr==

        // -=========================
    </script>
    <script>
        function selectParametrPartIsland() {
            let listPartIsland = document.querySelectorAll('.select_city_wrapper .cityOfferList li');
            let input = document.getElementById("part_island_id")
            let view = document.querySelector('.select_city_wrapper .input_view');
            if (listPartIsland.length > 0) {
                for (let i = 0; i < listPartIsland.length; i++) {
                    listPartIsland[i].addEventListener('click', () => {
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



        searchDropdounTypeHouse();
        searchDropdounCity();
        searchDropdounDistrict();
        searchDropdounGuests();
        counterGuests();
        drawTypeHouse();

        // const swiperInCardHotel = new Swiper('.swiper', {
        //     direction: 'horizontal',
        //     loop: true,
        //     pagination: {
        //         el: '.swiper-pagination',
        //         // type: 'bullets',
        //         clickable: true
        //     },
        //     navigation: {
        //         nextEl: '.swiper-button-next-img',
        //         prevEl: '.swiper-button-prev-img',
        //     },

        // });

        const swiperInCardHotelBest = new Swiper('.swiper-best', {
            direction: 'horizontal',
            loop: false,
            pagination: {
                el: '.swiper-pagination',
                // type: 'bullets',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next-img',
                prevEl: '.swiper-button-prev-img',
            },

        });

        const swiperInCardHotelPopular = new Swiper('.swiper-popular', {
            direction: 'horizontal',
            loop: false,
            pagination: {
                el: '.swiper-pagination',
                // type: 'bullets',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next-img',
                prevEl: '.swiper-button-prev-img',
            },

        });

        const swiperInCardHotelService = new Swiper('.swiper-service-img', {
            direction: 'horizontal',
            loop: false,
            pagination: {
                el: '.swiper-pagination',
                // type: 'bullets',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next-img',
                prevEl: '.swiper-button-prev-img',
            },

        });





        const swiperBestHotel = new Swiper('.swiper_best_hotel.swiper_BestHotel', {
            direction: 'horizontal',
            loop: false,
            slidesPerView: 1,
            spaceBetween: 10,
            // enabled: true,
            breakpoints: {
                200: {
                    slidesPerView: 1,
                    // slidesPerView: 1,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 30,

                }
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination.pagination-swiperBestHotel',
                // type: 'bullets',
                clickable: true,
                dynamicMainBullets: 2,
                dynamicBullets: true,
            },

        });

        const swiperPopularPlace = new Swiper('.swiper_best_hotel.swiper_popular_place', {
            direction: 'horizontal',
            loop: false,
            slidesPerView: 1,
            spaceBetween: 10,
            // enabled: true,
            breakpoints: {
                200: {
                    slidesPerView: 1,
                    // slidesPerView: 1,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 30,

                }
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination.pagination-swiperPopularHotel',
                // type: 'bullets',
                clickable: true,
                dynamicMainBullets: 2,
                dynamicBullets: true,
            },

        });


        const swiperFeedBack = new Swiper('.swiper-feed-back', {
            // Optional parameters
            direction: 'horizontal',
            loop: false,
            slidesPerView: 1,
            // Default parameters
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                // type: 'fraction',

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
                    slidesPerView: 1,
                    spaceBetween: 10,
                    autoHeight: false,
                    grid: {
                        rows: 1,
                    },
                },
                576: {
                    autoHeight: false,
                    grid: {
                        rows: 2,
                    },

                }
            },
            // Default parameters
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination.pagination-swiperServiceHotel',
                // type: 'bullets',
                clickable: true,
                dynamicMainBullets: 2,
                dynamicBullets: true,
            },

        });

        let calendar = flatpickr("#calendar", {
            mode: 'range',
            // altInput: true,
            // altFormat: "j F",
            // altInputClass: 'search-input',
            dateFormat: "d.m.Y",
            minDate: "today",
            // defaultDate: "12-12-2022",
            static: true,
            "locale": 'ru',
            onOpen: function() {
                wrapperDataInput = document.querySelector('.wpapper_search_input.date_input');
                wrapperDataInput.classList.add('active');
            },
            showMonths: 1,
            onChange: function(selectedDates, dateStr, instance) {
                startDate = dateStr.slice(0, 10);
                endDate = dateStr.slice(13, 23);
                endDateElement = document.getElementById('endDate');
                StartDateElement = document.getElementById('calendar');
                endDateElement.value = endDate;
                StartDateElement.value = startDate;
                // if (selectedDates.length > 0) {
                //     endDateAccomm.value = dateStr;
                //     endDateAccomm.innerHTML = dateStr;
                // }
            },
            onClose: function() {
                wrapperDataInput = document.querySelector('.wpapper_search_input.date_input');
                wrapperDataInput.classList.remove('active');
            },
        });
        let wrapperCalendar = document.querySelector('.date_input');
        wrapperCalendar.addEventListener('click', () => {
            calendar.open()
        })

        // function initMap() {
        //     const priceTag = document.createElement("div");

        //     priceTag.className = "price-tag";
        //     priceTag.textContent = "$2.5M";
        //     map = new google.maps.Map(document.getElementById('mapGoogleCreate'), {
        //         center: {
        //             lat: {{ $advertisemensMap->first()->lat }},
        //             lng: {{ $advertisemensMap->first()->lng }},
        //         },
        //         zoom: 8,
        //     });
        //     // const infoWindow = new google.maps.InfoWindow({
        //     //     content: priceTag,
        //     //     disableAutoPan: true,
        //     // });
        // @foreach ($advertisemensMap as $advertisement)
        //     const marker_{{ $advertisement->id }} = new google.maps.marker.AdvancedMarkerView({
        //         position: {
        //             lat: {{ $advertisement->lat }},
        //             lng: {{ $advertisement->lng }},
        //         },
        //         map: map,
        //         content: priceTag,
        //         // label: "{{ $advertisement->price }}",
        //         // icon: "https://pastenow.ru/4dbadae948e8d68da3511e5f443058de.png",
        //     });
        //     // marker_{{ $advertisement->id }}.addListener("click", () => {
        //     //     infoWindow.setContent("{{ $advertisement->name }}");
        //     //     infoWindow.open(map, marker_{{ $advertisement->id }});
        //     // });
        // @endforeach
        // }

        @if (isset($advertisemensMap))
            {
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
                        // const marker_{{ $advertisement->id }} = new google.maps.marker.AdvancedMarkerView({
                        //     position: {
                        //         lat: {{ $advertisement->lat }},
                        //         lng: {{ $advertisement->lng }},
                        //     },
                        //     map: map,
                        //     content: priceTag,
                        //     // label: "{{ $advertisement->price }}",
                        //     // icon: "https://pastenow.ru/4dbadae948e8d68da3511e5f443058de.png",
                        // });
                        // // marker_{{ $advertisement->id }}.addListener("click", () => {
                        // //     infoWindow.setContent("{{ $advertisement->name }}");
                        // //     infoWindow.open(map, marker_{{ $advertisement->id }});
                        // // });

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
                            window.location.href = '/advertisement/{{ $advertisement->id }}';
                        });
                    @endforeach
                }


                initMap();
            }
        @endif
    </script>
@endsection
