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
                    <div class="title_search_block">Избранное</div>
                </div>
            </div>
        </div>
        {{-- @dump($cookie) --}}
        <div class="hotel_search_block margin50">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row justify-content-between" id="containerAdvertisement">
                            @isset($advertisemensCookie)
                                @foreach ($advertisemensCookie as $advItem)
                                    <div class="col-12 col-md-6 col-lg-6 horizontal_advertisement">
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
                                            <button class="star_chosen_one" onclick="addOrDelFavMob(event)"></button>
                                        </div>
                                    </div>
                                @endforeach
                            @endisset

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        {{-- <div>
            {{ $advertisemensCookie->links('vendor.pagination.default') }}
        </div> --}}




    </main>




    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('swiper/swiper-bundle.min.js') }}"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/lv.js"></script>
    <script src="{{ asset('nouislider/nouislider.js') }}"></script>

    <script>
        drawMobCookie()

        function drawMobCookie() {
            if (getCookie('favorites')) {
                let advertisementsCookie = JSON.parse(getCookie('favorites'))
                advertisementsCookie.forEach((item) => {})
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


        function addOrDelFavMob(e) {
            console.log(e.target);
            let targetDiv = e.target.previousElementSibling;
            let title = targetDiv.querySelectorAll('.name_hotel')[0].innerText;
            let adress = targetDiv.querySelectorAll('.adress_hotel_txt')[0].innerHTML;
            let price = targetDiv.querySelectorAll('.price_value')[0].innerText.split(' /')[0]
            let img = e.target.parentNode.querySelectorAll('img')[0].getAttribute('src');
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
                    console.log('delete');
                    star.style.backgroundImage =
                        `url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.0003 2.66663L20.1203 11.0133L29.3337 12.36L22.667 18.8533L24.2403 28.0266L16.0003 23.6933L7.76033 28.0266L9.33366 18.8533L2.66699 12.36L11.8803 11.0133L16.0003 2.66663Z' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;

                    advertisementsCookie = advertisementsCookie.filter(item => item.id != id);
                    setCookie('favorites', JSON.stringify(advertisementsCookie));
                    e.target.parentNode.remove()
                    drawMobCookie()
                } else {
                    star.style.backgroundImage =
                        `url("data:image/svg+xml,%3Csvg width='18' height='17' viewBox='0 0 18 17' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.765L9 13.3275L4.365 15.765L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z' fill='%23F2994A' stroke='%23F2994A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;
                    advertisementsCookie.push(advertisement);
                    setCookie('favorites', JSON.stringify(advertisementsCookie));
                    drawMobCookie()
                }
            } else {
                star.style.backgroundImage =
                    `url("data:image/svg+xml,%3Csvg width='18' height='17' viewBox='0 0 18 17' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.765L9 13.3275L4.365 15.765L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z' fill='%23F2994A' stroke='%23F2994A' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E")`;
                setCookie('favorites', JSON.stringify([advertisement]))
                drawMobCookie()
            }


        }
    </script>
@endsection
