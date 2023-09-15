@extends('Profile.Layout.main')
@section('content')
    <main class="admin_main">
        <div class="container">
            <div class="modal-body">
                <div class="title_main">Регистрация</div>
                <div class="title_descrip">Введите данные учетной записи для продолжения</div>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="wpapper_search_input">
                        <div class="name_input">Имя</div>
                        <input id="name" type="text"
                            class="form-control text input_view @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="wpapper_search_input">
                        <div class="name_input">Почта</div>
                        <input id="email" type="email"
                            class="form-control text input_view @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="wpapper_search_input">
                        <div class="name_input">Телефон</div>
                        <input id="phone" type="phone"
                            class="form-control text input_view @error('phone') is-invalid @enderror" name="phone"
                            value="{{ old('phone') }}" required autocomplete="phone">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="wpapper_search_input">
                        <div class="name_input">Фото</div>
                        <input id="avatar" type="file"
                            class=" text input_view form-control  @error('avatar') is-invalid @enderror" name="avatar"
                            value="{{ old('avatar') }}" autocomplete="avatar">

                        @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="wpapper_search_input">
                        <div class="name_input">Пароль</div>
                        <input id="password" type="password"
                            class="form-control text input_view @error('password') is-invalid @enderror" name="password"
                            required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="wpapper_search_input">
                        <div class="name_input">Подтвердите пароль</div>
                        <input id="password-confirm" type="password" class="form-control text input_view"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="modal_btn_wrapper">
                        <button class="btn_modal" type="submit">Регистрация</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
