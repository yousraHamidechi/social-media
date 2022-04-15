<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <section class="post">
          <header>Nouvelle publication</header>
          <form action="{{ route('posts.store')}}" method="post">
              @csrf
            <div class="content">
              <img src="{{ asset('icons/logo.png') }}" alt="logo">
              <div class="details">
                <p>Username</p>
                <div class="privacy">
                  <i class="fas fa-user-friends"></i>
                  <span>amis</span>
                  <i class="fas fa-caret-down"></i>
                </div>
              </div>
            </div>
            <textarea placeholder="Exprimez-vous..." name="content" spellcheck="false" required>{{old('content')}}</textarea>
            
            <div class="options">
              <p>ajouter à votre message</p>
              <ul class="list">
                <li><img src="{{ asset('icons/gallery.svg') }}" alt="gallery"></li>
                <li><img src="{{ asset('icons/tag.svg') }}" alt="gallery"></li>
                <li><img src="{{ asset('icons/more.svg') }}" alt="gallery"></li>
              </ul>
            </div>
            <button type="submit">Publier</button>
          </form>
        </section>
        <section class="audience">
          <header>
            <div class="arrow-back"><i class="fas fa-arrow-left"></i></div>
            <p>Sélectionnez le public</p>
          </header>
          <div class="content">
            <p>Qui peut voir votre publication ?</p>
            <span>votre message apparaîtra dans le fil d'actualité et sur votre profil.</span>
          </div>
          <ul class="list">
            <li>
              <div class="column">
                <div class="icon"><i class="fas fa-globe-asia"></i></div>
                <div class="details">
                  <p>Public</p>
                 
                </div>
              </div>
              <div class="radio"></div>
            </li>
            <li class="active">
              <div class="column">
                <div class="icon"><i class="fas fa-user-friends"></i></div>
                <div class="details">
                  <p>Friends</p>
                  <span>Vos amis sur naamme</span>
                </div>
              </div>
              <div class="radio"></div>
            </li>
           
            <li>
              <div class="column">
                <div class="icon"><i class="fas fa-lock"></i></div>
                <div class="details">
                  <p> moi seulement</p>
                  <span>Vous seul pouvez voir votre message</span>
                </div>
              </div>
              <div class="radio"></div>
            </li>
           
          </ul>
        </section>
      </div>
    </div>

    <script>
      const container = document.querySelector(".container"),
      privacy = container.querySelector(".post .privacy"),
      arrowBack = container.querySelector(".audience .arrow-back");

      privacy.addEventListener("click", () => {
        container.classList.add("active");
      });

      arrowBack.addEventListener("click", () => {
        container.classList.remove("active");
      });
    </script>
    
  </body>
</html>
