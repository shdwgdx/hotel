<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->

    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('swiper/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('nouislider/nouislider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">




</head>

<body>
    <div class="wrapper">
        <div class="mob_menu_active"></div>
        <header>
            <div class="top_header">
                <div class="container">
                    <div class="wrapper_flex_row">
                        <div class="change_lang_wrapper">
                            <a href="{{ route('locale', 'ru') }}"
                                class="item_lang @if (__('main.select_lang') == 'ru') active @endif">RU</a>
                            <div class="line"></div>
                            <a href="{{ route('locale', 'en') }}"
                                class="item_lang @if (__('main.select_lang') == 'en') active @endif">EN</a>
                            <div class="line"></div>
                            <a href="{{ route('locale', 'es') }}"
                                class="item_lang @if (__('main.select_lang') == 'es') active @endif">ES</a>
                        </div>
                        <div class="right_top_header_wrapper">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="txt_create_new_obj">Зарегистрировать свой объект</button>
                            <div class="chosen_one_star_wrapper">
                                <a href="{{ route('favorites-page') }}"
                                    class="chosen_one_star ml-chosen_one_star">Избранное</a>
                                <div class="chosen_one_star_drop_doun">
                                    {{-- <div class="chosen_one_star_drop_doun_item">
                                        <img src="img/Photo.png" class="chosen_one_dd_image" alt="">
                                        <div class="chosen_one_dd_content">
                                            <div class="text_drop_doun">Вилла Matahari в 2 строки</div>
                                            <div class="adress_hotel chosen_one_dd_location">
                                                <div class="adress_hotel_icon"></div>
                                                <div class="adress_hotel_txt">TORREVIEJA длинный адрес адреc</div>
                                            </div>
                                            <div class="price_value">$352 <span>/ ночь</span></div>
                                        </div>
                                        <button class="btn_dell_chosen_one_dd"></button>
                                    </div>
                                    <div class="line"></div> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="main_header">
                <div class="container">
                    <div class="wrapper_row_header">
                        <a href="{{ route('index-page') }}" class="logo_header">Logo</a>
                        <ul class="menu_list">
                            <li class="item_double_menu_list"><a href="#" class="double_menu_list">Услуги</a>
                                <ul class="menu_list_double">
                                    <li class="menu_item @if (request()->route()->uri == '/') active @endif"><a
                                            href="{{ route('index-page') }}">Аренда</a>
                                    </li>
                                    <li class="menu_item @if (request()->route()->uri == 'buy') active @endif"><a
                                            href="{{ route('search-sale-page') }}">Продажа</a></li>
                                    <li class="menu_item @if (request()->route()->uri == 'service') active @endif"><a
                                            href="{{ route('service-page') }}">Экскурсии</a></li>
                                    <li class="menu_item @if (request()->route()->uri == 'transfer') active @endif"><a
                                            href="{{ route('transfer-page') }}">Трансфер</a></li>
                                    <li class="menu_item @if (request()->route()->uri == 'contacts') active @endif"><a
                                            href="{{ route('contact-page') }}">{{ __('main.Contacts') }}</a></li>
                                </ul>
                            </li>
                            <li class="menu_item desctop mob change_lang_mob">
                                <div class="change_lang_wrapper">
                                    <a href="{{ route('locale', 'ru') }}"
                                        class="item_lang @if (__('main.select_lang') == 'ru') active @endif">RU</a>
                                    <div class="line"></div>
                                    <a href="{{ route('locale', 'en') }}"
                                        class="item_lang @if (__('main.select_lang') == 'en') active @endif">EN</a>
                                    <div class="line"></div>
                                    <a href="{{ route('locale', 'es') }}"
                                        class="item_lang @if (__('main.select_lang') == 'es') active @endif">ES</a>
                                </div>
                            </li>
                            <li class="menu_item desctop mob">
                                <a href="{{ route('favorites-page') }}" class="chosen_one_star">
                                    Избранное
                                </a>
                            </li>
                            <li class="menu_item desctop @if (request()->route()->uri == '/') active @endif"><a
                                    href="{{ route('index-page') }}">Аренда</a>
                            </li>
                            <li class="menu_item desctop @if (request()->route()->uri == 'buy') active @endif"><a
                                    href="{{ route('search-sale-page') }}">Продажа</a></li>
                            <li class="menu_item desctop @if (request()->route()->uri == 'service') active @endif"><a
                                    href="{{ route('service-page') }}">Экскурсии</a></li>
                            <li class="menu_item desctop @if (request()->route()->uri == 'transfer') active @endif"><a
                                    href="{{ route('transfer-page') }}">Трансфер</a></li>
                            <li class="menu_item desctop @if (request()->route()->uri == 'contacts') active @endif"><a
                                    href="{{ route('contact-page') }}">{{ __('main.Contacts') }}</a>
                            </li>
                            <li class="menu_item desctop mob create_new_obg_wrapper "><button type="button"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="link_create_new_obg_wrapper">Зарегистрировать свой
                                    объект</button></li>
                            <li class="menu_item desctop mob soc_link">
                                <div class="wrapper_soc_link">
                                    <a href="#"><img src="/img/inst.png" class="img_soc_net" alt=""></a>
                                    <a href="#"><img src="/img/facebook.png" class="img_soc_net"
                                            alt=""></a>
                                    <a href="#"><img src="/img/telega.png" class="img_soc_net"
                                            alt=""></a>
                                    <a href="#"><img src="/img/whats.png" class="img_soc_net"
                                            alt=""></a>
                                </div>
                            </li>

                        </ul>
                        <button class="burger_btn">
                            <span class="burger_span top"></span>
                            <span class="burger_span middle"></span>
                            <span class="burger_span bottom"></span>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

        <footer>
            <div class="decore_wrapper">
                <div class="line_footer_decore white"></div>
                <div class="line_footer_decore blue"></div>
                <div class="line_footer_decore yellow"></div>
            </div>
            <div class="wrapper_offer_footer">
                <div class="container">
                    <div class="row_offer_footer">
                        <div class="txt_offer_footer">
                            Вы собственник? Оставьте заявку на размещение вашего предложения!
                        </div>
                        {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            class="create_new_obg_footer">Зарегистрировать свой объект</button> --}}
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            class="create_new_obg_footer">Зарегистрировать свой
                            объект</button>
                    </div>
                </div>
            </div>
            <div class="footer_main">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-3">
                            <a href="#" class="logo_header">Logo</a>
                            <div class="footer_txt_logo_desc">Наша компания помогает людям забронировать и снять
                                жильё
                                у проверенных арендодателей</div>
                            <div class="wrapper_soc_link">
                                <a href="#"><img src="/img/inst.png" class="img_soc_net" alt=""></a>
                                <a href="#"><img src="/img/facebook.png" class="img_soc_net"
                                        alt=""></a>
                                <a href="#"><img src="/img/telega.png" class="img_soc_net" alt=""></a>
                                <a href="#"><img src="/img/whats.png" class="img_soc_net" alt=""></a>
                            </div>
                            <div class="change_lang_wrapper d_mob_none">
                                <a href="#" class="item_lang active">RU</a>
                                <div class="line"></div>
                                <a href="#" class="item_lang">EN</a>
                                <div class="line"></div>
                                <a href="#" class="item_lang">ES</a>
                            </div>

                        </div>
                        <div class="col-12 col-md-4 col-lg-3">
                            <ul class="footer_menu_list">
                                <li class="footer_menu_item title"><a href="{{ route('service-page') }}">Услуги</a>
                                </li>
                                <li class="footer_menu_item"><a href="{{ route('service-page') }}">Аренда
                                    </a></li>
                                <li class="footer_menu_item"><a href="{{ route('service-page') }}">Продажа
                                    </a></li>
                                <li class="footer_menu_item"><a href="{{ route('service-page') }}">Экскурсии</a>
                                </li>
                                <li class="footer_menu_item"><a href="{{ route('transfer-page') }}">Трансфер</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3">
                            <ul class="footer_menu_list">
                                <li class="footer_menu_item title"><a href="#">Клиентам</a></li>
                                <li class="footer_menu_item"><a
                                        href="{{ route('contact-page') }}">{{ __('main.Contacts') }}</a></li>
                                <li class="footer_menu_item"><a href="{{ route('terms-page') }}">Политика
                                        возврата</a>
                                </li>
                                <li class="footer_menu_item"><a href="{{ route('privacy-policy-page') }}">Политика
                                        безопасности</a></li>
                                <li class="footer_menu_item"><a href="{{ route('return-policy-page') }}">Политика
                                        файлов cookie</a></li>
                                <li class="footer_menu_item"><a href="{{ route('cookies-page') }}">Условия
                                        предоставления услуг
                                    </a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 wrapper_type_house">
                            <ul class="footer_menu_list">
                                <li class="footer_menu_item title"><a href="#">Тип жилья</a></li>
                                <li class="footer_menu_item"><a href="#">Квартира</a></li>
                                <li class="footer_menu_item"><a href="#">Вилла</a></li>
                                <li class="footer_menu_item"><a href="#">Пентхаус</a></li>
                                <li class="footer_menu_item"><a href="#">Таунхаус</a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <div class="change_lang_wrapper d_desc_none">
                                <a href="#" class="item_lang active">RU</a>
                                <div class="line"></div>
                                <a href="#" class="item_lang">EN</a>
                                <div class="line"></div>
                                <a href="#" class="item_lang">ES</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_end">
                <div class="container">
                    <div class="footer_end_row">
                        <div class="footer_end_txt">© 2022</div>
                        <img class="img_paymentsupport" src="/img/paymentsupport.png" alt="">
                    </div>
                </div>
            </div>
        </footer>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="title_main">Давайте сотрудничать!</div>
                        <div class="title_descrip">Оставьте свои контакты и мы обсудим все детали!</div>
                        <div class="wpapper_search_input">
                            <div class="name_input">Имя</div>
                            <input type="text input_view" placeholder="Иван">
                        </div>
                        <div class="wpapper_search_input">
                            <div class="name_input">Почта</div>
                            <input type="text input_view">
                        </div>
                        <div class="wpapper_search_input">
                            <div class="name_input">Номер телефона</div>
                            <input type="text input_view">
                        </div>
                        <div class="modal_btn_wrapper">
                            <button class="btn_modal">Оставить заявку</button>
                        </div>
                        <div class="modal_description">
                            Нажимая на кнопку “Оставить заявку” я соглашаюсь на <a href="#">обработку
                                персональных
                                данных</a> и с <a href="">политикой конфиденциальности</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--/ Modal -->

    </div>

    <script>
        if (document.querySelectorAll('.title_hotel').length > 0) {
            drawCookie()
        } else {
            drawCookies()
        }

        function drawCookies() {
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
                                        <button class="btn_dell_chosen_one_dd" onclick="deleteFav(event)"></button>
                                    </div>
                                    <div class="line"></div>
                `;


                })
                let ids = document.querySelectorAll('.btn_more_detailed_card');
                let star = document.querySelectorAll('.star_chosen_one');
                for (let i = 0; i < star.length; i++) {
                    if (advertisementsCookie.find(item => item.id == ids[i].getAttribute('href').split('/').pop())) {
                        star[i].style.backgroundImage =
                            `url("data:image/svg+xml,%3Csvg width='18' height='17' viewBox='0 0 18 17' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.765L9 13.3275L4.365 15.765L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z' fill='%23F2994A' stroke='%23F2994A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;
                    } else {
                        star[i].style.backgroundImage =
                            `url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.0003 2.66663L20.1203 11.0133L29.3337 12.36L22.667 18.8533L24.2403 28.0266L16.0003 23.6933L7.76033 28.0266L9.33366 18.8533L2.66699 12.36L11.8803 11.0133L16.0003 2.66663Z' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;
                    }

                }

            }

        }

        function getCookie(name) {
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }

        function setCookie(name, value, options = {}) {

            options = {
                path: '/',
                // при необходимости добавьте другие значения по умолчанию
                ...options
            };

            if (options.expires instanceof Date) {
                options.expires = options.expires.toUTCString();
            }

            let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

            for (let optionKey in options) {
                updatedCookie += "; " + optionKey;
                let optionValue = options[optionKey];
                if (optionValue !== true) {
                    updatedCookie += "=" + optionValue;
                }
            }

            document.cookie = updatedCookie;
        }

        function deleteFav(e) {
            let id = e.target.previousElementSibling.querySelectorAll('a')[0].getAttribute('href').split('/').pop();
            advertisementsCookie = JSON.parse(getCookie('favorites')).filter(item => item.id != id);
            setCookie(
                'favorites', JSON.stringify(advertisementsCookie));
            drawCookies();
        }

        function addOrDelFav(e) {
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
                    drawCookies()

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


                    drawCookies()
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

                drawCookies()
            }


        }
    </script>
</body>

</html>
<script>
