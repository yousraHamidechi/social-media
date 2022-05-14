<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('assets/register.css') }}">
</head>
<body>
    <div class="header">
        <img src="photo_2022-03-25_01-00-40.jpg" alt="logo" />
        <h1>NAAME</h1> </div>


    <form class="container" id="container" action="{{route('register-student.store')}}" method="post">
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
            <div >
                @csrf
                <h1>inscription</h1> <br><br>

                <input type="text" placeholder="Nom" name="first_name" value="{{ old('first_name') }}"><br>
                <input type="text" placeholder="Prénom" name="last_name" value="{{ old('last_name') }}"> <br>
                <input type="Email" placeholder="Email" name="email" value="{{ old('email') }}"> <br>
                <input type="password" placeholder="mot de pass" name="password"/> <br>
                <input type="password" placeholder="confirmer mot de pass"  name="password_confirmation"/>

            </div>
        </div>
        <div class="overlay-container">
            <div class="overlay">

                <div class="overlay-panel overlay-right"><br> <br> <br>
                   <input type="text" placeholder="numero de la carte etudiant" name="card_number" value="{{ old('card_number') }}"> <br>
                   <label for="formation">formation:</label>
                <select name="formation" id="formation">
                    <option value="select">s&eacute;lectionnez votre formation</option>
                   <option value="L1">GL </option>
                     <option value="L2">SI</option>
                     <option value="L3">SCI</option>
                     <option value="M1">TI </option>


                   </select>
                </select> <br><br><label for="niveau">Niveau:</label>
                <select name="level" id="niveau">
                    <option value="select">s&eacute;lectionnez votre niveau</option>
                   <option value="L1">Lisence 1 </option>
                     <option value="L2">Lisence 2 </option>
                     <option value="L3">Lisence 3</option>
                     <option value="M1">Master 1 </option>
                     <option value="M2">Master 2</option>

                   </select><br>
                    <button class="ghost" id="signUp" type="submit">S'inscrire</button>
                </div>
            </div>
        </div>
    </form>
    <script src="login.js"></script>
</body>
</html>
