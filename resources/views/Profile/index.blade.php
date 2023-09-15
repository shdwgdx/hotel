@extends('Profile.Layout.main')
@section('content')
    <main class="admin_main ">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="title_main">Профиль</div>
                </div>
                @if (str(auth()->user()->avatar)->startsWith('https'))
                    <div> <img src="{{ auth()->user()->avatar }}" class="img-fluid avatar" alt="..."></div>
                @else
                    <div> <img src="storage/profile/{{ auth()->user()->avatar }}" class="img-fluid avatar" alt="...">
                    </div>
                @endif

                <h1 class="name ">{{ auth()->user()->name }}</h1>
                <div class="reviews">
                    <div class="reviews_mark">{{ auth()->user()->rating }}.0</div>
                    <div class="reviews_stars">
                        @for ($i = 0; $i < auth()->user()->rating; $i++)
                            <div class="star-filled"></div>
                        @endfor
                        @for ($i = 0; $i < 5 - auth()->user()->rating; $i++)
                            <div class="star-outlined"></div>
                        @endfor
                    </div>
                    <div class="reviews_link"><a href="#" class="text-decoration-none text-reset">Смотреть
                            отзывы</a></div>
                </div>
                <div class="mail">{{ auth()->user()->email }}</div>
                @php
                    use Carbon\Carbon;
                    $date = new Carbon(auth()->user()->created_at);
                    setlocale(LC_TIME, 'Russian');
                @endphp
                <div class="registred">{{ iconv('windows-1251', 'utf-8', $date->formatLocalized('%d %B %Y')) }}
                </div>
                <div class="edit"><a href="" class="text-decoration-none text-reset">Редактировать аккаунт</a>
                </div>

            </div>
            <div class="modal_btn_wrapper position-absolute  d-block d-lg-none mx-auto"><a class="btn_modal"
                    href={{ route('profile-logout') }}>Выход</a>
            </div>

        </div>



    </main>
@endsection
