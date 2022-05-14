@extends('layouts.app')

@section('content')
    <div class="profile-container">
        <img src="images/cover.png" class="cover-img">
        <div class="profile-details">
            <div class="profile-detail-left">
                <div class="pd-row">
                    <img src="images/profile.png" class="pd-img">
                    <div>
                        <h3> utilisateur2</h3>

                    </div>
                </div>
            </div>
            <div class="profile-detail-right">
                <button type="button"><img src="images/add-friends.png" > ajouter</button>
                <button type="button"> <img src="images/message.png" > message</button>
                <br>
                <a href=""><img src="images/more.png" ></a>
            </div>
        </div>

        <div class="profile-info">
            <div class="info-col">
                <div class="profile-intro">
                    <h3>intro</h3>
                    <p class="intro-text">bio ...</p>
                    <hr>
                    <ul>
                        <li> <img src="images/profile-job.png" alt=""> text text </li>
                        <li><img src="images/profile-study.png" alt=""> text text text</li>
                        <li><img src="images/profile-location.png" alt=""> text text</li>
                    </ul>
                </div>
                <div class="profile-intro">
                    <div class="title-box">
                        <h3>Amis</h3>
                        <a href="">tous les amis</a>
                    </div>
                    <p>40</p>
                    <div class="friends-box">
                        <div><img src="images/member-1.png" ><p>user1</p></div>
                        <div><img src="images/member-2.png" ><p>user2</p></div>
                        <div><img src="images/member-3.png" ><p>user3</p></div>
                        <div><img src="images/member-4.png" ><p>user4</p></div>
                    </div>
                </div>
            </div>
            <div class="post-col">
                <div class="write-Post-container">
                    <div class="user-profile">
                        <img src="images/profile-pic.png">
                        <div><p> utilisateur1</p>
                            <small>public <i class="fas fa-caret-down"></i></small>
                        </div>
                    </div>
                    <div class="post-input-container">
                        <textarea rows="3" placeholder="exprimez vous!"></textarea>
                        <div class="add-post-links"><a href=""><img src="images/live-video.png" >video</a>
                            <a href=""><img src="images/photo.png" >photo</a>
                            <a href=""><img src="images/feeling.png" >tag</a>

                        </div>
                    </div>
                </div>
                <div class="post-container">
                    <div class="post-row">
                        <div class="user-profile">
                            <img src="images/profile.png">
                            <div><p> utilisateur2</p>
                                <span></span>
                            </div>
                        </div>
                        <a href=""><i class="fas fa-ellipsis-v"></i> </a>
                    </div>

                    <p class="post-text"> text text text</p>
                    <img src="images/feed-image-1.png" class="post-img">

                    <div class="post-row">
                        <div class="activity-icons">
                            <div><img src="images/like-blue.png" >120</div>
                            <div><img src="images/comments.png" >20</div>
                            <div><img src="images/share.png" >20</div>
                        </div>

                    </div>
                </div>
                <div class="post-container">
                    <div class="post-row">
                        <div class="user-profile">
                            <img src="images/profile-pic.png">
                            <div><p> utilisateur1</p>
                                <span></span>
                            </div>
                        </div>
                        <a href=""><i class="fas fa-ellipsis-v"></i> </a>
                    </div>

                    <p class="post-text"> text text abc </p>
                    <img src="images/feed-image-2.png" class="post-img">

                    <div class="post-row">
                        <div class="activity-icons">
                            <div><img src="images/like.png" >10</div>
                            <div><img src="images/comments.png" >20</div>
                            <div><img src="images/share.png" >20</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
