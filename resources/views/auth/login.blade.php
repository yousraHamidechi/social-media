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
            <form action="#">
                <h1>Connexion</h1> 
                <input type="text" placeholder="Nom d'utilisateur" /> <br>
                <input type="password" placeholder="mot de pass" /> <br>
                <span>
                    <input type="checkbox" id="souvenir" >
                    <p for="souvenir"> gardez-moi connecté </p>
                </span>
                <button type="submit">Se connecter</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Bienvenue dans notre communauté !</h1>
                    <p>Inscrivez-vous et Rejoignez vos collègues, camarades de classe et amis sur NAAAME.</p>
                    <button  type ="submit"class="ghost" id="signUp">étudiant</button><br>
                    <button type="submit" class="ghost" id="signUp">Enseignant</button><br>
                    <button  type="submit" class="ghost" id="signUp">Formateur</button>
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="login.js"></script>
</body>
</html>