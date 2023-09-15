@extends('Admin.Layout.main')
@section('content')
    <main class="admin_main">
        <div class="container">
            <div class="modal-body">
                <div class="title_main">Вход</div>
                <div class="title_descrip">Введите данные учетной записи для продолжения</div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="wpapper_search_input">
                        <div class="name_input">Почта</div>
                        <input id="email" type="email"
                            class="form-control text input_view @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wpapper_search_input">
                        <div class="name_input ">Пароль</div>
                        <input id="password" type="password"
                            class="form-control text input_view @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="modal_btn_wrapper">
                        <button class="btn_modal" type="submit">Авторизация</button>

                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
