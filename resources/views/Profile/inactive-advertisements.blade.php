@extends('Profile.Layout.main')
@section('content')
    <main class="admin_main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title_main">В архиве</div>
                </div>
            </div>
        </div>
        <div class="container_best_hotel">
            <div class="container">
                <div class="row row_mt40">
                    <div class="col-12">
                        @foreach ($advertisemens as $advItem)
                            <div class="body_hotel_card admin_card">
                                <div class="img_wrapper">
                                    {{-- @foreach ($advItem->photoUrl as $advItemImg)
                                <img src="/storage/{{ $advItemImg->url }}" alt="">
                            @endforeach --}}

                                    @isset($advItem->photoUrl[0]->url)
                                        <img src="/storage/{{ $advItem->photoUrl[0]->url }}" alt="">
                                    @endisset
                                </div>
                                <div class="content_wrapper">
                                    <div class="name_hotel">
                                        {{ $advItem->title }}
                                    </div>
                                    {{-- <div class="adress_hotel">
                                        <div class="adress_hotel_icon"></div>
                                        <div class="adress_hotel_txt">{{ $advItem->adress }}</div>
                                    </div> --}}

                                    <div class="row_info_hotel ">
                                        @if ($advItem->moderated == 1 && $advItem->published == 0)
                                            <div class="item_info_hotel exclamation_mark_danger_icon">
                                                Не соответствует требованиям
                                            </div>
                                        @elseif($advItem->moderated == 0 && $advItem->published == 0)
                                            <div class="item_info_hotel exclamation_mark_info_icon">
                                                На модерации
                                            </div>
                                        @else
                                            <div class="item_info_hotel check_mark_icon">
                                                Опубликовано
                                            </div>
                                        @endif
                                        <div class="item_info_hotel  eye_icon ">
                                            {{ $advItem->view_count }} Просмотров
                                        </div>



                                    </div>
                                    <div class="card_info_price_wrapper">
                                        <div class="left_block">
                                            <div class="price_value">€{{ $advItem->price }}</div>
                                        </div>
                                        <div class="left_block">
                                            <div class="price_value">
                                                @if (strtotime($advItem->expired_date) - strtotime(now()) > 0)
                                                @else
                                                    <div class="modal_btn_wrapper add_hotel_btn_wrapper m-0">
                                                        <form action="{{ route('profile-republish') }}" method="POST">
                                                            @csrf
                                                            <input type="text" name="id" id="id"
                                                                value="{{ $advItem->id }}" class="d-none">
                                                            <button class="btn_modal bg-warning" type="submit">Опубликовать
                                                                заново</button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('edit-advertisement-profile', $advItem->id) }}"
                                    class="change_btn_admin"></a>
                                <a href="/profile/delete/{{ $advItem->id }}" class="change_btn_admin delete_btn_admin"></a>
                            </div>
                        @endforeach
                        <div>
                            {{ $advertisemens->links('vendor.pagination.default') }}
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </main>
@endsection
