@extends('Layout.main')
@section('content')
    {{-- @dd($advertisement['dateList']) --}}
    {{-- <main @if (strtotime($advertisement->expired_date) - strtotime(now()->setTimezone('Europe/Moscow')) < 0) class="opacity-25" @endif> --}}
    @if (strtotime($advertisement->expired_date) - strtotime(now()) < 0)
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">

                    </div>
                    <div class="modal-body d-flex items-center justify-content-center">
                        <h1>Объявление не активно</h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="modal-close" class="btn btn-primary" data-bs-dismiss="modal"
                            aria-label="Close">Понятно</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <main @if (strtotime($advertisement->expired_date) - strtotime(now()->setTimezone('Europe/Moscow')) < 0) class="opacity-25" @endif>

        <div class="container container_breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-page') }}">Главная</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('search-page') }}">Фильтр</a></li>

                </ol>
            </nav>
        </div>

        <div class="container container_title_hotel">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="title_hotel">
                        {{ $advertisement->title }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="line"></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="swiperHotelPhoto">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            {{-- @dump($advertisement->photoUrl[0]->url) --}}
                            @foreach ($advertisement->photoUrl as $advItemImg)
                                <div class="swiper-slide"><img src="/storage/{{ $advItemImg->url }}" alt=""></div>
                            @endforeach
                        </div>
                        <!-- If we need navigation buttons -->
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="image-mini-slider_container col-9 col-md-10">
                        <div class="image-mini-slider ">
                            <!-- Additional required wrapper -->

                            <div class="image-mini-slider__wrapper swiper-wrapper">
                                <!-- Slides -->
                                @foreach ($advertisement->photoUrl as $advItemImg)
                                    <div class="image-mini-slider__slide swiper-slide"><img
                                            src="/storage/{{ $advItemImg->url }}" alt=""></div>
                                @endforeach
                            </div>

                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="image-mini-slider_btn swiper-button-prev"></div>
                        <div class="image-mini-slider_btn swiper-button-next"></div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="body_dashbord_hotel" id="dashbord_hotel">
                        <button class="star_chosen_one" onclick="addOrDelFavorite()"></button>
                        <div class="price_value">€{{ $advertisement->price }}</div>
                        <div class="wpapper_search_input date_input">
                            <div class="row_select_date">
                                <div class="select_item_date">
                                    <div class="name_input">Прибытие</div>
                                    <input type="text" id="calendar" class="input_select_date" value=""
                                        placeholder="Укажите даты">
                                </div>
                                <div class="line"></div>
                                <div class="select_item_date">
                                    <div class="name_input">Выезд</div>
                                    <input type="text" id="endDate" class="input_select_date"
                                        placeholder="Укажите даты">
                                </div>
                            </div>
                        </div>
                        <div class="wpapper_search_input guests_count_wrapper">
                            <div class="name_input">1 номер для</div>
                            <div class="input_view">{{ $advertisement->guests }} гостей</div>
                            <input type="text" style="display: none;">
                            <div class="drop_doun_body">
                                <div class="guests_item adults_counter">
                                    <div>
                                        <div class="text_drop_doun">Взрослые</div>
                                        <div class="text_drop_doun_descr">Старше 12 лет</div>
                                    </div>
                                    <div class="wrapper_counter_item_guests">
                                        <button class="btn_minus"></button>
                                        <input class="count_input_geusts" value="2">
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
                                        <input class="count_input_geusts" value="0">
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
                                        <input class="count_input_geusts" value="0">
                                        <button class="btn_plus"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row_body_dashbord_hotel">
                            <div class="txt_body_dashbord_hotel">Итого за <span id="count_day">1</span> суток:</div>
                            <div class="body_dashbord_hotel__full_price">€{{ $advertisement->price }}</div>
                        </div>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            onclick="setDates()" class="btn_filter_searh">Забронировать</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="body_block_info ">
                        <div class="title_block_info">Описание</div>
                        <div class="description_block_info block_hide">
                            @if (__('main.select_lang') == 'en')
                                {{ $advertisement->description_en }}
                            @endif
                            @if (__('main.select_lang') == 'es')
                                {{ $advertisement->description_es }}
                            @endif
                            @if (__('main.select_lang') == 'ru')
                                {{ $advertisement->description }}
                            @endif
                            {{ strlen($advertisement->description) }}
                        </div>
                        @if (__('main.select_lang') == 'en' && strlen($advertisement->description) > 300)
                            <div class="roll_up_block_info" onclick="viewAll(this)">Смотреть все</div>
                        @endif
                        @if (__('main.select_lang') == 'es' && strlen($advertisement->description) > 300)
                            <div class="roll_up_block_info" onclick="viewAll(this)">Смотреть все</div>
                        @endif
                        @if (__('main.select_lang') == 'ru' && strlen($advertisement->description) > 300)
                            <div class="roll_up_block_info" onclick="viewAll(this)">Смотреть все</div>
                        @endif

                    </div>

                    <div class="body_block_info calendar-statick_wrapper">
                        <div class="title_block_info">Дата прибытия</div>
                        <div class="description_block_info">Чтобы увидеть цену, укажите даты поездки</div>
                        <input type="text" id="calendar-statick" class="calendar-statick" value=""
                            style="display: none;">
                        <button class="reset_date_calendar" onclick="calendarStatick.clear()">Очистить даты</button>
                    </div>
                    <div class="body_block_info block_hide">
                        <div class="title_block_info">Удобства</div>
                        <div class="row row_servise_hotel block_hide">
                            <div class="col-12 col-lg-6">
                                <ul class="list_service">
                                    @if ($advertisement->wi_fi == 'on')
                                        <li class="item_service icon_wifi">Wi-Fi</li>
                                    @endif
                                    @if ($advertisement->washer == 'on')
                                        <li class="item_service icon_washing_auto">Стиральная машинка</li>
                                    @endif
                                    @if ($advertisement->conditioner == 'on')
                                        <li class="item_service icon_conditioner">Кондиционер</li>
                                    @endif
                                    @if ($advertisement->fan == 'on')
                                        <li class="item_service icon_fan">Фен</li>
                                    @endif
                                    @if ($advertisement->kitchen == 'on')
                                        <li class="item_service icon_kitchen">Кухня</li>
                                    @endif
                                    @if ($advertisement->drying_machine == 'on')
                                        <li class="item_service">Сушильная машина</li>
                                    @endif
                                    @if ($advertisement->iron == 'on')
                                        <li class="item_service">Утюг</li>
                                    @endif
                                    @if ($advertisement->pool == 'on')
                                        <li class="item_service icon_pool">Личный бассейн</li>
                                    @endif
                                    @if ($advertisement->free_parking == 'on')
                                        <li class="item_service icon_parking">Бесплатная парковка на территории</li>
                                    @endif
                                    @if ($advertisement->crib == 'on')
                                        <li class="item_service">Кроватка</li>
                                    @endif
                                    @if ($advertisement->barbecue_area == 'on')
                                        <li class="item_service">Зона барбекю</li>
                                    @endif
                                    @if ($advertisement->fireplace == 'on')
                                        <li class="item_service">Камин</li>
                                    @endif
                                    @if ($advertisement->jacuzzi == 'on')
                                        <li class="item_service">Джакузи</li>
                                    @endif
                                    @if ($advertisement->charging_electric_car == 'on')
                                        <li class="item_service">Зарядка для электромобиля</li>
                                    @endif
                                    <li class="item_service icon_beach">5 минут до пляжа</li>



                                </ul>
                            </div>
                            <div class="col-12 col-lg-6">
                                <ul class="list_service">


                                    <li class="item_service icon_working_space">Рабочее место</li>

                                    <li class="item_service icon_baby_badroom">Детская кроватка</li>
                                </ul>
                            </div>
                        </div>
                        <div class="roll_up_block_info" onclick="viewAll(this)">Смотреть все</div>
                    </div>

                    <div class="body_block_info">
                        <div class="title_block_info">Расположение</div>
                        <div id="mapGoogleCreate" class="location_iframe">
                        </div>
                    </div>
                    <div class="body_block_info">
                        <div class="title_block_info">Важная информация</div>
                        <div class="description_block_info block_hide">
                            <div class="row row_mb-7">
                                <div class="col-6 col-lg-3 grey_txt_info">Прибытие: </div>
                                <div class="col-6 col-lg-3">15:00 – 17:00</div>
                            </div>
                            <div class="row row_mb-7">
                                <div class="col-6 col-lg-3 grey_txt_info">Выезд: </div>
                                <div class="col-6 col-lg-3">11:00</div>
                            </div>
                            <div class="row row_mb-7">
                                <div class="col-12">Курение запрещено</div>
                            </div>
                            <div class="row">
                                <div class="col-12">Без вечеринок и мероприятий</div>
                            </div>
                        </div>
                        <div class="roll_up_block_info" onclick="viewAll(this)">Развернуть</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container map_container margin170" id="block_for_fixed">
            <div class="row">
                <div class="col-12">
                    <div class="title_main">Апартаменты на карте</div>
                </div>
                <div class="col-12 border-col-none">
                    <iframe class="map_iframe"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48059.71104103914!2d-8.663153231931208!3d41.1622002289431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2465abc4e153c1%3A0xa648d95640b114bc!2z0J_QvtGA0YLRgywg0J_QvtGA0YLRg9Cz0LDQu9C40Y8!5e0!3m2!1sru!2sru!4v1669410406356!5m2!1sru!2sru"
                        width="100%" height="450" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
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

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <form action="{{ route('booked-api') }}" method="POST">
                            @csrf
                            <input type="text" name="id_advertisement" style="display: none"
                                value="{{ $advertisement->id }}">
                            <input type="text" name="start_range_adv" id="start_range_adv" style="display: none"
                                value="">
                            <input type="text" name="end_range_adv" id="end_range_adv" style="display: none"
                                value="">
                            <input type="text" name="start_booked" id="start_booked" style="display: none"
                                value="">
                            <input type="text" name="end_booked" id="end_booked" style="display: none"
                                value="">

                            <div class="title_main">Бронирование апартаментов</div>
                            <div class="title_descrip">Оставьте свои контакты и мы обсудим все детали!</div>
                            <div class="wpapper_search_input">
                                <div class="name_input">Даты</div>
                                <input type="text" class="input_view" id="all_data_range_booked" disabled required
                                    placeholder="" value="">
                            </div>
                            <div class="wpapper_search_input">
                                <div class="name_input">Имя</div>
                                <input type="text" class="input_view" name="name" required placeholder="">
                            </div>
                            <div class="wpapper_search_input">
                                <div class="name_input">Фамилия</div>
                                <input type="text" class="input_view" name="surname" required placeholder="">
                            </div>
                            <div class="wpapper_search_input">
                                <div class="name_input">Почта</div>
                                <input type="text" class="input_view" name="email" required type="email">
                            </div>
                            <div class="wpapper_search_input">
                                <div class="name_input">Номер телефона</div>
                                <input type="text" class="input_view" name="phone" required type="tel">
                            </div>
                            <div class="modal_btn_wrapper">
                                <button class="btn_modal">Оставить
                                    заявку</button>
                            </div>
                        </form>

                        <div class="modal_description">
                            Нажимая на кнопку “Оставить заявку” я соглашаюсь на <a href="#">обработку
                                персональных
                                данных</a> и с <a href="">политикой конфиденциальности</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('swiper/swiper-bundle.min.js') }}"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
    {{-- <script src="https://npmcdn.com/flatpickr/dist/l10n/en.js"></script> --}}
    <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>

    <script>
        @if (strtotime($advertisement->expired_date) - strtotime(now()) < 0)
            document.addEventListener('DOMContentLoaded', function() {
                new bootstrap.Modal(document.getElementById('staticBackdrop')).show();
            });
            const main = document.querySelector('main');
            main.addEventListener('click', function(e) {

                if (e.target.id !== 'modal-close') {
                    // console.info(e.target);
                    e.preventDefault();
                    new bootstrap.Modal(document.getElementById('staticBackdrop')).show();
                }
            });
        @endif



        function addOrDelFavAdv(e) {
            let targetDiv = e.target.previousElementSibling;
            let title = targetDiv.querySelectorAll('.name_hotel')[0].innerText;
            let adress = targetDiv.querySelectorAll('.adress_hotel_txt')[0].innerHTML;
            let price = targetDiv.querySelectorAll('.price_value')[0].innerText.split(' /')[0]
            let img = e.target.parentNode.querySelectorAll('img')[1].getAttribute('src');
            let id = targetDiv.querySelectorAll('.btn_more_detailed_card')[0].getAttribute('href').split('/').pop();
            let advertisement = {
                id,
                title,
                adress,
                price,
                img
            };

            let star = e.target;
            if (getCookie('favorites')) {
                let advertisementsCookie = JSON.parse(getCookie('favorites'))
                let stars = document.querySelectorAll('.star_chosen_one');
                for (let i = 0; i < stars.length; i++) {
                    if (advertisementsCookie.find(item => item.id == id)) {
                        stars[i].style.backgroundImage =
                            `url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 18 17' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.765L9 13.3275L4.365 15.765L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z' fill='%23F2994A' stroke='%23F2994A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;
                    } else {
                        stars[i].style.backgroundImage =
                            `url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.0003 2.66663L20.1203 11.0133L29.3337 12.36L22.667 18.8533L24.2403 28.0266L16.0003 23.6933L7.76033 28.0266L9.33366 18.8533L2.66699 12.36L11.8803 11.0133L16.0003 2.66663Z' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;
                    }

                }
                if (advertisementsCookie.find(item => item.id == id)) {

                    star.style.backgroundImage =
                        `url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.0003 2.66663L20.1203 11.0133L29.3337 12.36L22.667 18.8533L24.2403 28.0266L16.0003 23.6933L7.76033 28.0266L9.33366 18.8533L2.66699 12.36L11.8803 11.0133L16.0003 2.66663Z' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;

                    advertisementsCookie = advertisementsCookie.filter(item => item.id != id);
                    setCookie('favorites', JSON.stringify(advertisementsCookie));
                    drawCookie()

                } else {

                    star.style.backgroundImage =
                        `url("data:image/svg+xml,%3Csvg width='18' height='17' viewBox='0 0 18 17' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.765L9 13.3275L4.365 15.765L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z' fill='%23F2994A' stroke='%23F2994A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;
                    advertisementsCookie.push(advertisement);
                    setCookie('favorites', JSON.stringify(advertisementsCookie));
                    let favoritesList = document.querySelectorAll('.chosen_one_star_drop_doun')[0];

                    favoritesList.innerHTML += `
                <div class="chosen_one_star_drop_doun_item">
                                        <img src="${img}" class="chosen_one_dd_image" alt="">
                                        <div class="chosen_one_dd_content">
                                            <div class="text_drop_doun"><a href="/advertisement/${id}">${title}</a></div>
                                            <div class="adress_hotel chosen_one_dd_location">
                                                <div class="adress_hotel_icon"></div>
                                                <div class="adress_hotel_txt">${adress}</div>
                                            </div>
                                            <div class="price_value">${price} <span>/ ночь</span></div>
                                        </div>
                                        <button class="btn_dell_chosen_one_dd" onclick="deleteFav(event)"></button>
                                    </div>
                                    <div class="line"></div>
                `;

                    drawCookie()
                }
            } else {
                star.style.backgroundImage =
                    `url("data:image/svg+xml,%3Csvg width='18' height='17' viewBox='0 0 18 17' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.765L9 13.3275L4.365 15.765L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z' fill='%23F2994A' stroke='%23F2994A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;
                setCookie('favorites', JSON.stringify([advertisement]))
                let favoritesList = document.querySelectorAll('.chosen_one_star_drop_doun')[0];

                favoritesList.innerHTML += `
                <div class="chosen_one_star_drop_doun_item">
                                        <img src="${img}" class="chosen_one_dd_image" alt="">
                                        <div class="chosen_one_dd_content">
                                            <div class="text_drop_doun"><a href="/advertisement/${id}">${title}</a></div>
                                            <div class="adress_hotel chosen_one_dd_location">
                                                <div class="adress_hotel_icon"></div>
                                                <div class="adress_hotel_txt">${adress}</div>
                                            </div>
                                            <div class="price_value">${price} <span>/ ночь</span></div>
                                        </div>
                                        <button class="btn_dell_chosen_one_dd" onclick="deleteFav(event)"></button>
                                    </div>
                                    <div class="line"></div>
                `;

                drawCookie()
            }


        }

        function deleteFavourite(e) {
            let id = e.target.previousElementSibling.querySelectorAll('a')[0].getAttribute('href').split('/').pop();
            advertisementsCookie = JSON.parse(getCookie('favorites')).filter(item => item.id != id);
            setCookie('favorites', JSON.stringify(advertisementsCookie));
            drawCookie();
        }

        function drawCookie() {
            if (getCookie('favorites') != undefined && JSON.parse(getCookie('favorites')).length > 0) {
                document.querySelectorAll('.chosen_one_star_drop_doun')[0].style.display = '';
            } else {
                document.querySelectorAll('.chosen_one_star_drop_doun')[0].style.display = 'none';
            }
            if (getCookie('favorites')) {
                let advertisementsCookie = JSON.parse(getCookie('favorites'))
                let favoritesList = document.querySelectorAll('.chosen_one_star_drop_doun')[0];

                favoritesList.innerHTML = "";

                advertisementsCookie.forEach((item) => {
                    favoritesList.innerHTML += `
                <div class="chosen_one_star_drop_doun_item">
                                        <img src="${item.img}" class="chosen_one_dd_image" alt="">
                                        <div class="chosen_one_dd_content">
                                            <div class="text_drop_doun"><a href="/advertisement/${item.id}">${item.title}</a></div>
                                            <div class="adress_hotel chosen_one_dd_location">
                                                <div class="adress_hotel_icon"></div>
                                                <div class="adress_hotel_txt">${item.adress}</div>
                                            </div>
                                            <div class="price_value">${item.price} <span>/ ночь</span></div>
                                        </div>
                                        <button class="btn_dell_chosen_one_dd" onclick="deleteFavourite(event)"></button>
                                    </div>
                                    <div class="line"></div>
                `;


                })
                let id = {{ $advertisement->id }};
                let star = document.querySelectorAll('.star_chosen_one')[0];
                if (advertisementsCookie.find(item => item.id == id)) {
                    star.style.backgroundImage =
                        `url("data:image/svg+xml,%3Csvg width='18' height='17' viewBox='0 0 18 17' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.765L9 13.3275L4.365 15.765L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z' fill='%23F2994A' stroke='%23F2994A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;

                } else {
                    star.style.backgroundImage =
                        `url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.0003 2.66663L20.1203 11.0133L29.3337 12.36L22.667 18.8533L24.2403 28.0266L16.0003 23.6933L7.76033 28.0266L9.33366 18.8533L2.66699 12.36L11.8803 11.0133L16.0003 2.66663Z' stroke='%23F2994A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;
                }
                let ids = document.querySelectorAll('.btn_more_detailed_card');
                let stars = document.querySelectorAll('.star_chosen_one');
                for (let i = 0; i < ids.length; i++) {
                    if (advertisementsCookie.find(item => item.id == ids[i].getAttribute('href').split('/')
                            .pop())) {
                        stars[i + 1].style.backgroundImage =
                            `url("data:image/svg+xml,%3Csvg width='18' height='17' viewBox='0 0 18 17' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.765L9 13.3275L4.365 15.765L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z' fill='%23F2994A' stroke='%23F2994A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;
                    } else {
                        stars[i + 1].style.backgroundImage =
                            `url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.0003 2.66663L20.1203 11.0133L29.3337 12.36L22.667 18.8533L24.2403 28.0266L16.0003 23.6933L7.76033 28.0266L9.33366 18.8533L2.66699 12.36L11.8803 11.0133L16.0003 2.66663Z' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;
                    }

                }
            }

        }

        // function setDates() {
        //     document.querySelectorAll('input[type="text input_view"]')[0].value =
        //         `${document.querySelectorAll('.input_select_date')[0].value}-${document.querySelectorAll('.input_select_date')[1].value}`;
        // }

        // function bookedApi() {
        //     let token = document.getElementsByName('_token')[0].value
        //     let body = {
        //         id_advertisement: {{ $advertisement->id }},
        //         start_booked: calendarStatick.selectedDates[0] ?? calendar.selectedDates[0],
        //         end_booked: calendarStatick.selectedDates[1] ?? calendar.selectedDates[1],
        //         name: document.querySelectorAll('input[type="text input_view"]')[1].value,
        //         surname: document.querySelectorAll('input[type="text input_view"]')[2].value,
        //         email: document.querySelectorAll('input[type="text input_view"]')[3].value,
        //         phone: document.querySelectorAll('input[type="text input_view"]')[4].value
        //     };
        //     fetch(`/booked-api`, {
        //             method: "POST",
        //             headers: {
        //                 'X-CSRF-TOKEN': token
        //             },
        //             body: body
        //         })
        //         .then(response => console.log(response))
        //     // .then(result => {
        //     //     if (result) {
        //     //         console.log(result)

        //     //     } else {

        //     //         alert('Ошибка сети');
        //     //     }
        //     // })
        // }

        function addOrDelFavorite() {
            let title = document.querySelectorAll('.title_hotel')[0].innerText;
            let adress = document.querySelectorAll('.adress_hotel_txt')[0].innerText;
            let price = document.querySelectorAll('.body_dashbord_hotel__full_price')[0].innerText
            let img = '/storage/{{ $advertisement->photoUrl[0]->url }}';
            let id = {{ $advertisement->id }}
            let advertisement = {
                id,
                title: "{{ $advertisement->name }}",
                adress: "{{ $advertisement->adress }}",
                price: "{{ $advertisement->price }}",
                img
            };
            let star = document.querySelectorAll('.star_chosen_one')[0];
            if (getCookie('favorites')) {
                let advertisementsCookie = JSON.parse(getCookie('favorites'))
                if (advertisementsCookie.find(item => item.id == id)) {
                    star.style.backgroundImage =
                        `url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.0003 2.66663L20.1203 11.0133L29.3337 12.36L22.667 18.8533L24.2403 28.0266L16.0003 23.6933L7.76033 28.0266L9.33366 18.8533L2.66699 12.36L11.8803 11.0133L16.0003 2.66663Z' stroke='%23F2994A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;

                    advertisementsCookie = advertisementsCookie.filter(item => item.id != id);
                    setCookie('favorites', JSON.stringify(advertisementsCookie));
                    drawCookie()

                } else {
                    star.style.backgroundImage =
                        `url("data:image/svg+xml,%3Csvg width='18' height='17' viewBox='0 0 18 17' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.765L9 13.3275L4.365 15.765L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z' fill='%23F2994A' stroke='%23F2994A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;
                    advertisementsCookie.push(advertisement);
                    setCookie('favorites', JSON.stringify(advertisementsCookie));

                    let favoritesList = document.querySelectorAll('.chosen_one_star_drop_doun')[0];
                    favoritesList.innerHTML += `
                <div class="chosen_one_star_drop_doun_item">
                                        <img src="${img}" class="chosen_one_dd_image" alt="">
                                        <div class="chosen_one_dd_content">
                                            <div class="text_drop_doun"><a href="/advertisement/${id}">${title}</a></div>
                                            <div class="adress_hotel chosen_one_dd_location">
                                                <div class="adress_hotel_icon"></div>
                                                <div class="adress_hotel_txt">${adress}</div>
                                            </div>
                                            <div class="price_value">${price} <span>/ ночь</span></div>
                                        </div>
                                        <button class="btn_dell_chosen_one_dd" onclick="deleteFavourite(event)"></button>
                                    </div>
                                    <div class="line"></div>
                `;
                    drawCookie()
                }
            } else {
                star.style.backgroundImage =
                    `url("data:image/svg+xml,%3Csvg width='18' height='17' viewBox='0 0 18 17' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.765L9 13.3275L4.365 15.765L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z' fill='%23F2994A' stroke='%23F2994A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;
                setCookie('favorites', JSON.stringify([advertisement]))

                let favoritesList = document.querySelectorAll('.chosen_one_star_drop_doun')[0];
                favoritesList.innerHTML += `
                <div class="chosen_one_star_drop_doun_item">
                                        <img src="${img}" class="chosen_one_dd_image" alt="">
                                        <div class="chosen_one_dd_content">
                                            <div class="text_drop_doun"><a href="/advertisement/${id}">${title}</a></div>
                                            <div class="adress_hotel chosen_one_dd_location">
                                                <div class="adress_hotel_icon"></div>
                                                <div class="adress_hotel_txt">${adress}</div>
                                            </div>
                                            <div class="price_value">${price} <span>/ ночь</span></div>
                                        </div>
                                        <button class="btn_dell_chosen_one_dd" onclick="deleteFavourite(event)"></button>
                                    </div>
                                    <div class="line"></div>
                `;
                drawCookie()
            }

        }


        // searchDropdounGuests();
        // counterGuests();
        fixedBlockScroll();
        const swiperInCardHotel = new Swiper('.swiper', {
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
        let all_data_range_booked = document.getElementById('all_data_range_booked');
        let start_booked = document.getElementById('start_booked');
        let end_booked = document.getElementById('end_booked');
        let start_range_adv = document.getElementById('start_range_adv');
        let end_range_adv = document.getElementById('end_range_adv');



        const swiperHotelPhoto = new Swiper('.swiperHotelPhoto', {
            direction: 'horizontal',
            loop: false,
            slidesPerView: 1,
            breakpoints: {
                200: {
                    // slidesPerView: 1.1,
                    // spaceBetween: 10
                },
                // 576: {
                //     slidesPerView: 2.2,
                //     spaceBetween: 10
                // },
                768: {
                    // slidesPerView: 2,
                    // spaceBetween: 10
                },
                992: {
                    // slidesPerView: 3,
                    // spaceBetween: 30,

                }
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            thumbs: {
                swiper: {
                    el: '.image-mini-slider',
                    slidesPerView: 5,
                    spaceBetween: 12,
                    navigation: {
                        nextEl: '.image-mini-slider_btn.swiper-button-next',
                        prevEl: '.image-mini-slider_btn.swiper-button-prev',
                    },
                    breakpoints: {
                        200: {
                            slidesPerView: 3,
                            spaceBetween: 12
                        },
                        576: {
                            slidesPerView: 5,
                            spaceBetween: 7
                        },
                        768: {
                            // slidesPerView: 2,
                            // spaceBetween: 10
                        },
                        992: {
                            slidesPerView: 5,
                            spaceBetween: 12,

                        },
                        1400: {
                            slidesPerView: 7,
                            spaceBetween: 12,

                        }
                    },
                }
            }
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYZoS9SE7yCgnjpgnU2qRHcLBQZuaaGgY"></script>
    <script>
        function initMap() {
            var coordinatesMarker = {
                lat: {{ $advertisement->lat }},
                lng: {{ $advertisement->lng }}
            }
            var coordinates = {
                    lat: {{ $advertisement->lat }},
                    lng: {{ $advertisement->lng }}
                },
                map = new google.maps.Map(document.getElementById('mapGoogleCreate'), {
                    center: coordinates,
                    zoom: 8,
                });
            marker = new google.maps.Marker({
                position: coordinatesMarker,
                map: map
            });
        }
        initMap()
    </script>
@endsection
