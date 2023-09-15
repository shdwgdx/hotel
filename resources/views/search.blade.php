@extends('Layout.main')
@section('content')
    <form action="/search" id="search" style="display: none" method="get">
    </form>
    {{-- @dd($data['district_id']) --}}
    {{-- @dd($guestsAdults); --}}
    <main>
        <div class="search_block">
            <div class="container">
                <div class="body_search_block">
                    <div class="title_search_block">Аренда квартир и апартаментов на Тенерифе</div>
                    <div class="descrip_search_block">Аренда квартир и апартаментов на Тенерифе</div>
                    <div class="row_search_input">
                        <div class="row_search_input_double">
                            <div class="wpapper_search_input select_city_wrapper select_city_wrapper_first">
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
                                <input type="text" form="search" name="district_id" id="district_id"
                                    style="display: none;">
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
                                        <input type="checkbox" class="custom-checkbox" form="search" name="flat"
                                            value="flat" id="flat">
                                        <label class="text_drop_doun" for="flat">Квартира</label>
                                    </div>
                                    <div class="item_checkbox">
                                        <input type="checkbox" class="custom-checkbox" form="search" value="villa"
                                            name="villa" id="villa">
                                        <label class="text_drop_doun" for="villa">Вилла</label>
                                    </div>
                                    <div class="item_checkbox">
                                        <input type="checkbox" class="custom-checkbox" form="search" value="penthouse"
                                            name="penthouse" id="penthouse">
                                        <label class="text_drop_doun" for="penthouse">Пентхаус</label>
                                    </div>
                                    <div class="item_checkbox">
                                        <input type="checkbox" class="custom-checkbox" form="search" value="townhouse"
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
                            <div class="wpapper_search_input guests_count_wrapper">
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
                                            <input class="count_input_geusts" name="guestsAdults" id="guestsAdults"
                                                form="search" value="2">
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
                                            <input class="count_input_geusts" name="guestsChildren" id="guestsChildren"
                                                form="search" value="0">
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
                                            <input class="count_input_geusts" name="guestsBaby" id="guestsBaby"
                                                form="search" value="0">
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
                                        <input type="text" name="part_island_id_2" form="search-sale"
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
                                <div class="filter_item guests_count_wrapper_filter">
                                    <div class="filter_name">Количество гостей</div>
                                    <div class="guests_item adults_counter">
                                        <div>
                                            <div class="text_drop_doun">Взрослые</div>
                                            <div class="text_drop_doun_descr">Старше 12 лет</div>
                                        </div>
                                        <div class="wrapper_counter_item_guests">
                                            <button class="btn_minus"></button>
                                            <input class="count_input_geusts" value="{{ $guestsAdults }}">
                                            <button class="btn_plus"></button>
                                        </div>
                                    </div>
                                    <div class="guests_item children_counter">
                                        <div>
                                            <div class="text_drop_doun">Дети</div>
                                            <div class="text_drop_doun_descr">От двух до 12 лет</div>
                                        </div>
                                        <div class="wrapper_counter_item_guests">
                                            <button class="btn_minus" disabled></button>
                                            <input class="count_input_geusts" value="{{ $guestsChildren }}">
                                            <button class="btn_plus"></button>
                                        </div>
                                    </div>
                                    <div class="guests_item baby_counter">
                                        <div>
                                            <div class="text_drop_doun">Младенцы</div>
                                            <div class="text_drop_doun_descr">До 2х лет, без места</div>
                                        </div>
                                        <div class="wrapper_counter_item_guests">
                                            <button class="btn_minus" disabled></button>
                                            <input class="count_input_geusts" value="{{ $guestsBaby }}">
                                            <button class="btn_plus"></button>
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
                                <div class="filter_item">
                                    <div class="row_filter_item">
                                        <div>
                                            <div class="filter_name mb10">Прибытие</div>
                                            <input type="text" id="calendarFilter" class="input_select_date"
                                                value="" placeholder="Укажите даты">
                                        </div>
                                        <div class="dash">
                                        </div>
                                        <div>
                                            <div class="filter_name mb10">Выезд</div>
                                            <input type="text" id="calendarFilterEnd" class="input_select_date"
                                                value="" placeholder="Укажите даты">
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

                            {{-- @foreach ($searchResult as $advItem)
                            <div class="col-12 col-md-6 col-lg-6 horizontal_advertisement">
                                <div class="body_hotel_card">
                                        <div class="img_wrapper">
                                            <div class="swiper">
                                                <!-- Additional required wrapper -->
                                                <div class="swiper-wrapper">
                                                    <!-- Slides -->
                                                    @foreach ($advItem->photoUrl as $advItemImg)
                                                        <div class="swiper-slide"><img class="obg-f-cover" src="/storage/{{ $advItemImg->url }}" alt="">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- If we need pagination -->
                                                <div class="swiper-pagination"></div>
                                            </div>
                                        </div>
                                        <div class="content_wrapper">
                                            <div class="name_hotel">
                                                {{ $advItem->name }}
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
                                                    <div class="price_value">€{{ $advItem->price }} <span>/ ночь</span></div>
                                                    <div class="price_description"><span>*Цена варьируется</span>
                                                    </div>
                                                </div>
                                                <a href="{{ route('advertisement-page', $advItem->id) }}" class="btn_more_detailed_card">Подробнее</a>
                                            </div>
                                        </div>
                                        <button class="star_chosen_one"></button>
                                    </div>
                            </div>
                        @endforeach --}}
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
                    <iframe class="map_iframe"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48059.71104103914!2d-8.663153231931208!3d41.1622002289431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2465abc4e153c1%3A0xa648d95640b114bc!2z0J_QvtGA0YLRgywg0J_QvtGA0YLRg9Cz0LDQu9C40Y8!5e0!3m2!1sru!2sru!4v1669410406356!5m2!1sru!2sru"
                        width="100%" height="450" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>


        <div class="hotel_carusel_block margin170">
            <div class="container">
                <div class="title_main">Популярные места</div>
                <div class="title_main_descrip subtitle_hotel_carusel">Наши предложение, которые могут быть вам
                    интересны</div>
            </div>
            <div class="container_best_hotel">
                <div class="container">
                    <div class="row row_mt40">
                        <div class="swiper_best_hotel">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                @foreach ($advertisemensPopular as $advItem)
                                    <div class="swiper-slide">
                                        <div class="body_hotel_card">
                                            <div class="img_wrapper">
                                                <div class="swiper">
                                                    <!-- Additional required wrapper -->
                                                    <div class="swiper-wrapper">
                                                        <!-- Slides -->
                                                        @foreach ($advItem->photoUrl as $advItemImg)
                                                            <div class="swiper-slide"><img class="obg-f-cover"
                                                                    src="/storage/{{ $advItemImg->url }}" alt="">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <!-- If we need pagination -->
                                                    <div class="swiper-pagination"></div>
                                                </div>

                                            </div>
                                            <div class="content_wrapper">
                                                <div class="name_hotel">
                                                    {{ $advItem->name }}
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
                                                        <div class="price_value">€{{ $advItem->price }} <span>/ ночь</span>
                                                        </div>
                                                        <div class="price_description"><span>*Цена варьируется</span>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('advertisement-page', $advItem->id) }}"
                                                        class="btn_more_detailed_card">Подробнее</a>
                                                </div>
                                            </div>
                                            <button class="star_chosen_one"></button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                        </div>
                    </div>
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


    <script>
        // Page state
        let pageState = {
            "current_page": 1,
            "last_page": 1,
        }

        // ----------
        // Filter parametr
        let filterState = {
            "part_island_id": @if (isset($data['part_island_id']))
                {{ $data['part_island_id'] }}
            @else
                ''
            @endif ,
            "district_id": @if (isset($data['district_id']))
                {{ $data['district_id'] }}
            @else
                ''
            @endif ,
            "flat": @if (isset($typeHouse['flat']))
                "{{ $typeHouse['flat'] }}"
            @else
                0
            @endif ,
            "villa": @if (isset($typeHouse['villa']))
                "{{ $typeHouse['villa'] }}"
            @else
                0
            @endif ,
            "penthouse": @if (isset($typeHouse['penthouse']))
                "{{ $typeHouse['penthouse'] }}"
            @else
                0
            @endif ,
            "townhouse": @if (isset($typeHouse['townhouse']))
                "{{ $typeHouse['townhouse'] }}"
            @else
                0
            @endif ,
            "start_active_adv": @if (isset($data['start_active_adv']))
                "{{ $data['start_active_adv'] }}"
            @else
                ''
            @endif ,
            "end_active_adv": @if (isset($data['end_active_adv']))
                "{{ $data['end_active_adv'] }}"
            @else
                ''
            @endif ,
            "guestsAdults": @if (isset($guestsAdults))
                {{ $guestsAdults }}
            @else
                2
            @endif ,
            "guestsChildren": @if (isset($guestsChildren))
                {{ $guestsChildren }}
            @else
                0
            @endif ,
            "guestsBaby": @if (isset($guestsBaby))
                {{ $guestsBaby }}
            @else
                0
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
            let guestsBabyInput = document.getElementById('guestsBaby');
            let guestsChildrenInput = document.getElementById('guestsChildren');
            let guestsAdultsInput = document.getElementById('guestsAdults');

            vievFullName.textContent = filterState.guestsAdults + filterState.guestsBaby + filterState.guestsChildren +
                " гостей"
            if (filterState.guestsBaby != 0) {
                guestsBabyInput.value = filterState.guestsBaby
            }
            if (filterState.guestsChildren != 0) {
                guestsChildrenInput.value = filterState.guestsChildren
            }
            if (filterState.guestsAdults != 0) {
                guestsAdultsInput.value = filterState.guestsAdults
            }
            // guestsAdults.nextElementSibling.setAttribute('disabled', 'disabled')
            // console.log(guestsAdults.nextElementSibling)

        }
        setVievGuests()

        function setVievDate() {
            let startDate = document.getElementById('calendar');
            let endDate = document.getElementById('endDate');

            if (filterState.start_active_adv != 0) {
                startDate.value = filterState.start_active_adv
            }
            if (filterState.end_active_adv != 0) {
                endDate.value = filterState.end_active_adv
            }
        }

        setVievDate();
        //+======Filter State========== 
        setVievDateFilter()
        setVievTypeHouseFilter()

        function setVievDateFilter() {
            let startDate = document.getElementById('calendarFilter');
            let endDate = document.getElementById('calendarFilterEnd');

            if (filterState.start_active_adv != 0) {
                startDate.value = filterState.start_active_adv
            }
            if (filterState.end_active_adv != 0) {
                endDate.value = filterState.end_active_adv
            }
        }

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
            filterState.flat = 'flat';
            filterState.villa = 'villa';
            filterState.penthouse = 'penthouse';
            filterState.townhouse = 'townhouse';
            filterState.start_active_adv = '';
            filterState.end_active_adv = '';
            filterState.guestsAdults = '';
            filterState.guestsChildren = '';
            filterState.guestsBaby = '';
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

    <script>
        getAdvertisement();


        function getListDistrictApartment() {
            filterState.district_id = '';
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
        searchDropdounCityApartment();
        searchDropdounGuests();
        counterGuests();
        drawTypeHouse();
        searchDropdounSort();
        openFilter();
        closeFilter();
        counterGuestsFilter();


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

        const swiperBestHotel = new Swiper('.swiper_best_hotel', {
            // Optional parameters
            direction: 'horizontal',
            loop: false,
            // Default parameters
            slidesPerView: 1,
            spaceBetween: 10,
            // Responsive breakpoints
            breakpoints: {
                200: {
                    slidesPerView: 1.1,
                    spaceBetween: 10
                },
                // 576: {
                //     slidesPerView: 2.2,
                //     spaceBetween: 10
                // },
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

            // And if we need scrollbar
            // scrollbar: {
            //     el: '.swiper-scrollbar',
            // },
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

        let calendar = flatpickr("#calendar", {
            mode: 'range',
            // altInput: true,
            // altFormat: "j F",
            // altInputClass: 'search-input',
            dateFormat: "d.m.Y",
            // defaultDate: "12-12-2022",
            minDate: "today",
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
                filterState.start_active_adv = startDate
                filterState.end_active_adv = endDate
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


        let calendarFilter = flatpickr("#calendarFilter", {
            mode: 'range',
            // altInput: true,
            // altFormat: "j F",
            // altInputClass: 'search-input',
            dateFormat: "d.m.Y",
            // defaultDate: "12-12-2022",
            minDate: "today",
            static: true,
            "locale": 'ru',
            showMonths: 1,
            onChange: function(selectedDates, dateStr, instance) {
                startDate = dateStr.slice(0, 10);
                endDate = dateStr.slice(13, 23);
                endDateElement = document.getElementById('calendarFilterEnd');
                StartDateElement = document.getElementById('calendarFilter');
                endDateElement.value = endDate;
                StartDateElement.value = startDate;
                filterState.start_active_adv = startDate
                filterState.end_active_adv = endDate
            },
        });
        let wrapperCalendarFilter = document.getElementById('calendarFilterEnd');
        wrapperCalendarFilter.addEventListener('click', () => {
            calendarFilter.open()
        })


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
            fetch('/search-api?' + urlParametrs, {
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
                    if (json[i].free_parking_street == 'on') {
                        serviceElement += `<div class="price_include_icon icon_parking"></div><div class="line"></div>`
                    }
                    if (json[i].beach_access_view == 'on' || json[i].relaxing_nearby_beach == 'on') {
                        serviceElement += `<div class="price_include_icon icon_bech"></div><div class="line"></div>`
                    }
                    if (json[i].conditioner == 'on') {
                        serviceElement += `<div class="price_include_icon icon_conditioner"></div><div class="line"></div>`
                    }
                    if (json[i].washer == 'on') {
                        serviceElement +=
                            `<div class="price_include_icon icon_washing_machine"></div><div class="line"></div>`
                    }
                    if (json[i].pool == 'on') {
                        serviceElement +=
                            `<div class="price_include_icon icon_swimming_pool"></div><div class="line"></div>`
                    }
                    if (json[i].wi_fi == 'on') {
                        serviceElement += `<div class="price_include_icon icon_wifi"></div><div class="line"></div>`
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
                                                <div class="item_info_hotel guests_icon">
                                                    ` + json[i].guests + ` Guests
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
                                                <a href="/advertisement/` + json[i].id + `" class="btn_more_detailed_card">Подробнее</a>
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
    </script>
@endsection
