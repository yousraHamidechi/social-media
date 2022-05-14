@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="left-side-bar">
            <div class="imp-links">
                <a href="#"> <img src="{{ asset('assets/images/news.png') }}">Dernières nouvelles</a>
                <a href="#"> <img src="{{ asset('assets/images/friends.png') }}">amis</a>
                <a href=""><img src="{{ asset('assets/images/plus.png') }}">invitations</a>
                <a href="#"> <img src="{{ asset('assets/images/group.png') }}">groupes</a>
                <a href="#"> <img src="{{ asset('assets/images/book.png') }}">modules</a>
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
                <form class="post-input-container" action="{{ route('posts.store')}}" method="post">
                    @csrf
                    <textarea rows="3" placeholder="exprimez vous!"></textarea>
                    <div class="add-post-links"><a href=""><img src="{{ asset('assets/images/live-video.png') }}">video</a>
                        <a href=""><img src="{{ asset('assets/images/photo.png') }}">photo</a>
                        <a href=""><img src="{{ asset('assets/images/feeling.png') }}">tag</a>

                    </div>
                </form>
            </div>

            <div class="post-container">
                <div class="post-row">
                    <div class="user-profile">
                        <img src="{{ asset('assets/images/profile-pic.png') }}">
                        <div><p> utilisateur1</p>
                            <span></span>
                        </div>
                    </div>
                    <a href=""><i class="fas fa-ellipsis-v"></i> </a>
                </div>

                <p class="post-text"> text text text</p>
                <img src="{{ asset('assets/images/feed-image-1.png') }}" class="post-img">

                <div class="post-row">
                    <div class="activity-icons">
                        <div><img src="{{ asset('assets/images/like-blue.png') }}">120</div>
                        <div><img src="{{ asset('assets/images/comments.png') }}">20</div>
                        <div><img src="{{ asset('assets/images/share.png') }}">20</div>
                    </div>

                </div>
            </div>

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
            <div class="online-list">
                <div class="online">
                    <img src="{{ asset('assets/images/member-1.png') }}"></div>
                <p> ami 1</p>
            </div>
            <div class="online-list">
                <div class="online">
                    <img src="{{ asset('assets/images/member-2.png') }}"></div>
                <p> ami 2</p>
            </div>
        </div>
    </div>
@endsection
