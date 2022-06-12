@extends('layouts.app')

@section('content')
    <div class="profile-container">
        <img src="{{ asset('assets/images/cover.png') }}" class="cover-img">
        <div class="profile-details">
            <div class="profile-detail-left">
                <div class="pd-row">
                    <img src="{{ $user->image_url }}" class="pd-img">
                    <div>
                        <h3> {{ $user->name }}</h3>

                    </div>
                </div>
            </div>
            <form action="{{ route('friend.store', $user->id) }}" method="post" id="add-friend">@csrf</form>

            @if(auth()->id() !== $user->id)
                <div class="profile-detail-right">
                    @if(!$user->friends->contains(auth()->user()))
                    <button type="submit" form="add-friend"><img src="{{ asset('assets/images/add-friends.png') }}">
                        ajouter
                    </button>
                    @endif
                    <a href="{{ route('chat') }}" type="button"><img src="{{ asset('assets/images/message.png') }}"> message</a>
                    <br>
                    <a href=""><img src="{{ asset('assets/images/more.png') }}"></a>
                </div>
            @endif
        </div>

        <div class="profile-info">
            <div class="info-col">
                <div class="profile-intro">
                    <h3>intro</h3>
                    <p class="intro-text">{{ $user->bio }}</p>
                    <hr>
                    <ul>
                        <li><img src="{{ asset('assets/images/profile-job.png') }}"
                                 alt="">{{ $user->userable->formation }}</li>
                        <li><img src="{{ asset('assets/images/profile-study.png') }}" alt="">{{ $user->birth_date }}
                        </li>
                        {{--                        <li><img src="{{ asset('assets/images/profile-location.png') }}" alt=""> text text</li>--}}
                    </ul>
                </div>
                <div class="profile-intro">
                    <div class="title-box">
                        <h3>Amis</h3>
                        <a href="">tous les amis</a>
                    </div>
                    <p>{{ $user->friends->count() }}</p>
                    <div class="friends-box">
                        @foreach($user->friends as $friend)
                            <div><img src="{{ $friend->image_url }}">
                                <p>{{ $friend->name }}</p></div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="post-col">
                @if($user->id === auth()->id())
                    <div class="write-Post-container">
                        <div class="user-profile">
                            <img src="{{ auth()->user()->image_url }}">
                            <div><p> {{ auth()->user()->name }}</p>
                                <small>public <i class="fas fa-caret-down"></i></small>
                            </div>
                        </div>
                        <form class="post-input-container" action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <textarea rows="3" placeholder="exprimez vous!"
                                      name="content">{{ old('content') }}</textarea>
                            <div class="form-row gallery">

                            </div>

                            <input type="file" name="image" style="display: none"
                                   class="custom-file-input"
                                   id="imgInput" size="2024">
                            <div class="add-post-links"><a href=""><img
                                        src="{{ asset('assets/images/live-video.png') }}">video</a>
                                <a href="javascript:void(0)" onclick="clickInput()"><img
                                        src="{{ asset('assets/images/photo.png') }}">photo</a>
                                <a href=""><img src="{{ asset('assets/images/feeling.png') }}">tag</a>
                                <button type="submit" class="btn">Publier</button>
                            </div>
                        </form>
                    </div>
                @endif
                @foreach($user->posts as $post)
                    <div class="post-container">
                        <div class="post-row">
                            <div class="user-profile">
                                <img src="{{ $user->image_url }}">
                                <div><p>{{ $user->name }}</p>
                                    <span></span>
                                </div>
                            </div>
                            <a href=""><i class="fas fa-ellipsis-v"></i> </a>
                        </div>

                        <p class="post-text">{{ $post->content }}</p>
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


            </div>
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
