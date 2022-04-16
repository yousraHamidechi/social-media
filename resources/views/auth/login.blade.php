<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="container" id="container">
        <div class="header">
            <img src="photo_2022-03-25_01-00-40.jpg" alt="logo" />
            <h1>NAAME</h1>
        </div>

        <div class="form-container sign-in-container">
            <form action="{{ route('login.store') }}" method="post">
                @csrf
                <h1>Connexion</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif
                <input type="text" placeholder="Nom d'utilisateur" name="email" value="{{ old('email') }}"/> <br>
                <input type="password" placeholder="mot de pass" name="password" /> <br>
                <span>
                    <input type="checkbox" id="souvenir" >
                    <p > gardez-moi connecté </p>
                </span>
                <button type="submit">Se connecter</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Bienvenue dans notre communauté !</h1>
                    <p>Inscrivez-vous et Rejoignez vos collègues, camarades de classe et amis sur NAAAME.</p>
                    <a href="{{ route('register-student.create') }}" class="ghost" id="signUp">étudiant</a><br>
                    <a href="{{ route('register-teacher.create') }}" class="ghost" id="signUp">Enseignant</a><br>
                    <a href="{{ route('register-trainer.create') }}" class="ghost" id="signUp">Formateur</a>
                </div>
            </div>
        </div>
    </div>


    <script src="login.js"></script>
</body>
</html>
