<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('assets/register02.css') }}">
</head>
<body>
<div class="wrapp">
    <div class="form-container container" id="">
        <div class="contact-box">
            <form id="form2" action="{{route('register-student.store')}}" method="post"><h2>inscription</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif
                @csrf
                <input type="text" placeholder="Nom" name="first_name" class="field"
                       value="{{ old('first_name') }}">
                <input type="text" placeholder="Prénom" name="last_name" class="field" value="{{ old('last_name') }}">
                <input type="Email" placeholder="Email" name="email" class="field" value="{{ old('email') }}">
                <input type="text" placeholder="numero de la carte etudiant" class="field" name="card_number"
                       value="{{ old('card_number') }}">
                <input type="password" placeholder="mot de pass" name="password" class="field"/>
                <input type="password" placeholder="confirmer mot de pass" class="field" name="password_confirmation"/>
                <select name="formation" id="formation" class="field">
                    <option value="select">s&eacute;lectionnez votre formation</option>
                    <option value="L1">GL</option>
                    <option value="L2">SI</option>
                    <option value="L3">SCI</option>
                    <option value="M1">TI</option>


                </select>
                <select name="level" id="niveau" class="field">
                    <option value="select">sélectionnez votre niveau</option>
                    <option value="L1">Lisence 1</option>
                    <option value="L2">Lisence 2</option>
                    <option value="L3">Lisence 3</option>
                    <option value="M1">Master 1</option>
                    <option value="M2">Master 2</option>

                </select>

                <button class="btn">S'inscrire</button>
            </form>
        </div>

    </div>
</div>
<script src="login.js"></script>

</body>
</html>
