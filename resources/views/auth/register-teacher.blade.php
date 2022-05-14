<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('assets/register.css') }}">
</head>
<body>
    <div class="header">
        <img src="photo_2022-03-25_01-00-40.jpg" alt="logo" />
        <h1>NAAME</h1> </div>


    <form class="container" id="container" action="{{ route('register-teacher.store') }}" method="post">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-container sign-in-container">
            <div>
                <h1>inscription</h1> <br><br>
                @csrf
                <input type="text" placeholder="Nom" name="first_name"> <br>
                <input type="text" placeholder="Prénom" name="last_name"> <br>
                <input type="password" placeholder="mot de pass" name="password"/> <br>
                <input type="password" placeholder=" confirmer mot de pass" name="password_confirmation" />  <br>
                <input type="Email" placeholder="Email" name="email">
            </div>
        </div>
        <div class="overlay-container">
            <div class="overlay">

                <div class="overlay-panel overlay-right"><br> <br>
                    <label for="birth"> date de naissance</label>
                    <input type="date" name="birth_date" id="birth">
                    <br>
                    <button class="ghost" id="signUp" type="submit">S'inscrire</button>
                </div>
            </div>
        </div>
    </form>
    <script src="login.js"></script>
    </body>
    </html>
