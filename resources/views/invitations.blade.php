@extends('layouts.app')

@push('css')
    <style>#fb {
            width: 500px;
            border: 1px solid gray;
            border-radius: 5px;
            position: relative;
            height: 175px;
            display: block;

        }

        #fb p {
            font-family: sans-serif;
            margin: 0 0 0 10px;
            line-height: 30px;
        }

        #fb-top span {
            color: #4267B2;
            float: right;
            margin-right: 10px;
        }

        #fb-top {
            background-color: #efefef;
            height: 30px;
            width: 500px;
            border-radius: 5px 5px 0 0;
            position: absolute;
            top: -1px;
            left: -1px;
            border: 1px solid gray;

        }

        #fb img {
            position: absolute;
            left: 10px;
            top: 52.5px;
        }

        #info {
            position: absolute;
            left: 120px;
            top: 75px;
        }

        #info {
            color: #4267B2;
            line-height: 25px;
            font-size: 18px;
        }

        #info span {
            color: #777;
            font-size: 14px;
        }

        #button-block {
            position: absolute;
            right: 10px;
            top: 85px;
        }

        #button-block div {
            display: inline-block;
        }


        #confirm, #delete {
            background-color: #4267B2;
            color: white;
            padding: 7px;
            border-radius: 2px;
            margin-right: 10px;
            font-family: sans-serif;
        }

        #delete {
            color: #222;
            background-color: #bbb;
            border: 1px solid #999;
            padding: 6px;
            margin-right: 0;
        }

        #button-block div:hover {
            opacity: .8;
            cursor: pointer;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="left-side-bar">
            <div class="imp-links">
                <a href="#"> <img src="{{ asset('assets/images/news.png') }}">Dernières nouvelles</a>
                <a href="#"> <img src="{{ asset('assets/images/friends.png') }}">amis</a>
                <a href="{{ route('invitations.index') }}"><img src="{{ asset('assets/images/plus.png') }}">invitations</a>
                <a href="#"> <img src="{{ asset('assets/images/group.png') }}">groupes</a>
                <a href="{{ route('modules.index') }}"> <img src="{{ asset('assets/images/book.png') }}">modules</a>
                <a href="#"> <img src="{{ asset('assets/images/format.png') }}">formations</a>

            </div>

            <div class="shortcut">

                <p>Vos formations</p>
                <a href="#"> <img src="{{ asset('assets/images/shortcut-1.png') }}">abc abc</a>
                <a href="#"> <img src="{{ asset('assets/images/shortcut-2.png') }}">abc</a>
                <a href="#"> <img src="{{ asset('assets/images/shortcut-3.png') }}">abbcc</a>
                <a href="#"> <img src="{{ asset('assets/images/shortcut-4.png') }}">aabbcc</a>
            </div>
        </div>
        <div class="main-content">
            @foreach($invitations as $invitation)
                <div id="fb">
                    @if($loop->first)
                        <div id="fb-top">
                            <p><b>invitations</b></p>
                        </div>
                    @endif
                    <img src="{{ $invitation->requestingUser->image_url }}" height="100" width="100"
                         alt="Image of woman">
                    <p id="info"><b>{{ $invitation->requestingUser->name }}</b></p>
                    <div id="button-block">
                        <div id="confirm"><a href="{{ route('invitations.accept', $invitation->id) }}" style="text-decoration:none; color:inherit">Accepter</a></div>
                        <div id="delete"><a href="{{ route('invitations.reject', $invitation->id) }}" style="text-decoration:none; color:inherit">refuser</a></div>
                    </div>
                </div>
            @endforeach


            <button type="button" class="load-more-btn"> afficher plus</button>
        </div>


        <div class="right-side-bar">
            <div class="side-bar-title">
                <h4>Groupes</h4>
                <a href="#">voir tout</a>
            </div>
            <div class="event">
                <div class="left-event">
                    <span><img src="{{ asset('assets/images/shortcut-1.png') }}" alt=""></span>
                </div>
                <div class="right-event">
                    <h4>social media</h4>
                    <p>bio</p>
                    <a href="#">plus d'infos</a>
                </div>
            </div>
            <div class="event">
                <div class="left-event">
                    <span> <img src="{{ asset('assets/images/shortcut-4.png') }}" alt=""></span>
                </div>
                <div class="right-event">
                    <h4>mobile marketing</h4>
                    <p>text </p>
                    <a href="#">plus d'infos</a>
                </div>
            </div>
            <div class="side-bar-title">
                <h4>convertation</h4>
                <a href="#">ouvrir le chat</a>
            </div>
            @foreach(auth()->user()->friends->shuffle()->take(5) as $friend)
                <div class="online-list">
                    <div class="online">
                        <img src="{{ $friend->image_url }}"></div>
                    <a href="{{ route('profile.index', $friend->id) }}"><p>{{ $friend->name }}</p></a>
                </div>
            @endforeach


        </div>
    </div>
@endsection

@push('js')
    <script>
        function clickInput() {
            $('#imgInput').click();
        }

        let input = document.querySelector('#imgInput')
        var imagesPreview = function (input, placeToInsertImagePreview) {
            $(".preview_image_div").remove();
            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    let reader = new FileReader();

                    reader.onload = function (event) {
                        let index = $('.preview_image').length
                        $(".gallery").append(`<div class="col-lg-3 mb-3 preview_image_div">
                                <div class="d-flex justify-content-center align-items-center rounded w-100 upload-` + index + `"
                                     style=" background: #F4F6F9">

                    <img src="` + event.target.result + `" alt="image" width="100%" class="preview_image">

                                </div>
                            </div>`);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#imgInput').on('change', function () {
            imagesPreview(this, 'div.gallery');
        });


    </script>

@endpush
