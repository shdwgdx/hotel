<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <!-- CSS only -->
    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('swiper/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="wrapper admin_wrapper">
        <div class="sidebar position-relative">
            @auth
                <div class="user_name_block">👋 Привет, {{ Auth::user()->name }}!</div>
                <ul class="admin_menu_list">
                    <li class="admin_menu_item {{ Request::is('admin/moderation') ? 'active' : '' }}">
                        <a href="{{ route('admin-page-moderation') }}">На модерации</a>
                    </li>
                    <li class="admin_menu_item {{ Request::is('admin/published') ? 'active' : '' }}">
                        <a href="{{ route('admin-page-published') }}">Опубликованные</a>
                    </li>

                </ul>
                <div class="modal_btn_wrapper position-absolute bottom-0 start-50 translate-middle d-none d-lg-block"><a
                        class="btn_modal" href={{ route('admin-logout') }}>Выход</a>
                </div>
            @else
                <ul class="admin_menu_list">
                    <li class="admin_menu_item {{ Request::is('login') ? 'active' : '' }}">
                        <a href="{{ route('admin-login-index') }}">Вход</a>
                    </li>
                @endauth

        </div>
        @yield('content')

        <footer>

        </footer>
    </div>
    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('flatpickr/flatpickr.js') }}"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/lv.js"></script>
    <script>
        let endDateElement = document.getElementById('date_end0');
        let startDateElement = document.getElementById('date_start0');
        let calendarStatick = flatpickr("#calendar-statick", {
            mode: 'range',
            inline: true,
            disable: [{
                    from: flatpickr.parseDate(new Date(new Date().setDate(new Date().getDate() - 30))),
                    to: flatpickr.parseDate(new Date(new Date().setDate(new Date().getDate() - 1))),
                },
                @isset($reservedDate)
                    @foreach ($reservedDate as $dateItem)
                        {
                            from: "{{ $dateItem['start_active_adv'] }}",
                            to: "{{ $dateItem['end_active_adv'] }}"
                        },
                    @endforeach
                @endisset
                @isset($bookedDate)
                    @foreach ($bookedDate as $dateItem)
                        {
                            from: "{{ $dateItem['start_booked'] }}",
                            to: "{{ $dateItem['end_booked'] }}"
                        },
                    @endforeach
                @endisset

            ],
            dateFormat: "d.m.Y",
            static: true,
            "locale": 'ru',
            showMonths: 1,
            onChange: function(selectedDates, dateStr, instance) {
                startDate = dateStr.slice(0, 10);
                endDate = dateStr.slice(13, 23);
                endDateElement.value = endDate;
                startDateElement.value = startDate;
            },
        });

        if (document.documentElement.clientWidth >= 2200) {
            calendarStatick.set('showMonths', 2);
            let calendarStatickWrapper = document.querySelector('.calendar-statick_wrapper .flatpickr-wrapper');
            calendarStatickWrapper.style.display = 'block'
        }

        toggleHide()
    </script>
</body>

</html>
