@extends('Layout.main')
@section('content')

<main>
    <div class="row_contact_wrapper">
        <div class="map_conntact_block">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-lg-6 wrapper_body_contact_block">
                        <div class="body_contact_block modal-body">
                            <div class="title_main">Напишите нам</div>
                            <div class="title_descrip">Оставьте свои контакты и мы обсудим все детали!</div>
                            <div class="wpapper_search_input">
                                <div class="name_input">Имя</div>
                                <input class="text input_view" type="text" placeholder="Иван">
                            </div>
                            <div class="wpapper_search_input">
                                <div class="name_input">Почта</div>
                                <input class="text input_view" type="email">
                            </div>
                            <div class="wpapper_search_input">
                                <div class="name_input">Номер телефона</div>
                                <input class="text input_view" type="tel">
                            </div>
                            <div class="wpapper_search_input">
                                <div class="name_input">Сообщение</div>
                                <textarea class="text input_view" type="text"></textarea>
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
        </div>
        <div class="container mt50">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="title_main">Контакты</div>
                    <div class="wrapper_contact_info">
                        <div class="item_contact_wrapper row_contact">
                            <div class="left">
                                <div class="title_grey">Телефон</div>
                                <a href="tel:89455465433" class="link_contact_info">8 (945) 546 54 33</a>
                            </div>
                            <div class="right">
                                <div class="title_grey">WhatsApp / Viber</div>
                                <a href="tel:89455465433" class="link_contact_info">8 (945) 546 54 33</a>
                            </div>
                        </div>
                        <div class="item_contact_wrapper">
                            <div class="title_grey">Электронная почта</div>
                            <a href="mailto:tentrife_booking@gmail.pro"
                                class="link_contact_info email">tentrife_booking@gmail.pro</a>
                        </div>
                        <div class="item_contact_wrapper">
                            <div class="title_grey">Адрес</div>
                            <a href="#" class="link_contact_info">C. Gran Bretaña, S/N, 38660 Adeje, Santa Cruz
                                de Tenerife, Испания</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container_about margin170">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="shadow_img">
                        <img src="./img/about_us_img.png" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="title_main">О нас</div>
                    <div class="txt">На юго-западе Тенерифе расположен один из самых популярных и престижных
                        курортов Европы
                        – Коста-Адехе. Именно здесь сосредоточены самые современные гостиничные комплексы.
                        Туристы, стремящиеся отдохнуть у моря в комфортной и спокойной обстановке, без сомнения,
                        оценят развитую инфраструктуру и высокий уровень сервиса</div>
                    <ul class="list_about">
                        <li>Коста-Адехе. Именно здесь сосредоточены самые </li>
                        <li>Cовременные гостиничные комплексы. </li>
                        <li>Туристы, стремящиеся отдохнуть у моря в комфортной и спокойной обстановке</li>
                        <li>Без сомнения, оценят развитую инфраструктуру.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container_partner margin170">
        <div class="container">
            <div class="body_partner">
                <div class="row_body_partner">
                    <div class="left">
                        <div class="title_main">По вопросам сотрудничества</div>
                        <div class="title_main_descrip">У вас есть услуги которые мы можем продвигать вместе?
                            Оставьте заявку и мы обсудим все детали!</div>

                    </div>
                    <div><button class="btn_modal">Оставить заявку</button></div>
                </div>
            </div>
        </div>
    </div>






</main>
<script src="{{ asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('js/main.js')}}"></script>
<script src="{{ asset('flatpickr/flatpickr.js')}}"></script>
<script src="{{ asset('swiper/swiper-bundle.min.js')}}"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/lv.js"></script>
@endsection