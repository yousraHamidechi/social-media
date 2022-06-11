@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="left-side-bar">
            <div class="imp-links">
                <a href="#"> <img src="{{ asset('assets/images/news.png') }}">Dernières nouvelles</a>
                <a href="#"> <img src="{{ asset('assets/images/friends.png') }}">amis</a>
                <a href=""><img src="{{ asset('assets/images/plus.png') }}">invitations</a>
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
            <div class="write-Post-container">
                <div class="user-profile">
                    <img src="{{ auth()->user()->image_url }}">
                    <div><p> {{ auth()->user()->name }}</p>
                        <small>public <i class="fas fa-caret-down"></i></small>
                    </div>
                </div>
                <form class="post-input-container" action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <textarea rows="3" placeholder="exprimez vous!" name="content">{{ old('content') }}</textarea>
                    <div class="form-row gallery">

                    </div>

                    <input type="file" name="image" style="display: none"
                           class="custom-file-input"
                           id="imgInput" size="2024">
                    <div class="add-post-links">
                        <a href=""><img src="{{ asset('assets/images/live-video.png') }}">video</a>
                        <a href="javascript:void(0)" onclick="clickInput()"><img
                                src="{{ asset('assets/images/photo.png') }}">photo</a>
                        <a href=""><img src="{{ asset('assets/images/feeling.png') }}">tag</a>
                        <button type="submit" class="btn">Publier</button>
                    </div>
                </form>
            </div>
            @foreach($posts as $post)
                <div class="post-container">

                    <div class="post-row">
                        <div class="user-profile">
                            <img src="{{ asset('assets/images/profile-pic.png') }}">
                            <div><a href="{{ route('profile.index', $post->user_id) }}"><p> {{ $post->user->name }}</p>
                                </a>
                                <span></span>
                            </div>
                        </div>
                        <a href=""><i class="fas fa-ellipsis-v"></i> </a>
                    </div>

                    <p class="post-text"> {{ $post->content }}</p>
                    <img src="{{ $post->image_url }}" class="post-img">

                    <div class="post-row">
                        <div class="activity-icons">
                            <div><img src="{{ asset('assets/images/like-blue.png') }}">120</div>
                            <div><img src="{{ asset('assets/images/comments.png') }}">20</div>
                            <div><img src="{{ asset('assets/images/share.png') }}">20</div>
                        </div>

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
