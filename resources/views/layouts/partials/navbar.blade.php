<nav>
    <div class="nav-left">
        <a href="{{route('home.index')}}">
            <img src="{{ asset('assets/images/logo.png') }}" class="logo">
        </a>
        <ul>
            <li><a href=""><img src="{{ asset('assets/images/notification.png') }}"></a></li>
            <li><a href=""><img src="{{ asset('assets/images/inbox.png') }}"></a></li>
        </ul>
    </div>
    <div class="nav-right">
        <div class="search-box">
            <img src="{{ asset('assets/images/search.png') }}">
            <input type="text" placeholder="rechercher">
        </div>
        <div class="nav-user-icon" onclick="settingsMenuToggle()">
            <img src="{{ auth()->user()->image_url }}">
        </div>
    </div>

    <div class="settings-menu">

        <div id="dark-btn" class="dark-btn-on">
            <span> </span>
        </div>

        <div class="settings-menu-inner">

            <div class="user-profile">
                <img src="{{ auth()->user()->image_url }}">
                <div><p> {{ auth()->user()->name }}</p>
                    <a href="{{ route('profile.index', auth()->id()) }}">voir le profil</a>
                </div>
            </div>
            <hr>
            <div class="user-profile">
                <img src="{{ asset('assets/images/feedback.png') }}">
                <div><p> feedback</p>
                    <a href="">aidez-nous à améliorer </a>
                </div>
            </div>
            <hr>
            <div class="setting-links">
                <img src="{{ asset('assets/images/setting.png') }}" class="settings-icon">
                <a href="#"> paramètres et confidentialité <img src="{{ asset('assets/images/arrow.png') }}"
                                                                width="10px"></a>
            </div>
            <div class="setting-links">
                <img src="{{ asset('assets/images/logout.png') }}" class="settings-icon">
                <a href="#"> déconnexion <img src="{{ asset('assets/images/arrow.png') }}" width="10px"></a>
            </div>
        </div>
    </div>
</nav>
