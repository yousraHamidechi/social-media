<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('assets/register02.css') }}">
</head>
<body>
<div class="wrapp">
    <div class="form-container container" id="">
        <div class="contact-box">
            <form method="post" action="{{ route('register-trainer.store') }}" id="form2">
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
                <h2>inscription</h2>
                <input type="text" placeholder="Nom" name="first_name" class="field">
                <input type="text" placeholder="Prénom" name="last_name" class="field">
                <input type="password" placeholder="mot de pass" name="password" class="field"/>
                <input type="password" placeholder=" confirmer mot de pass" name="password_confirmation" class="field"/>
                <input type="Email" placeholder="Email" name="email" class="field">
                <input type="tel" placeholder="numéro de téléphone" name="phone" class="field"/>
                <input type="date" name="birth_date" id="birth" class="field">
                <input type="text" class="field" placeholder="Que comptez-vous enseigner" name="objective">

                <button class="btn">S'inscrire</button>
            </form>
        </div>

    </div>
</div>


<script src="login.js"></script>
</body>
</html>
