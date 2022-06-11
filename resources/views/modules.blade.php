@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="left-side-bar-m">
            <div class="module-left">
                <h3> <a href="modulesTeacher.html"> Vos modules</a></h3>
                <br>
                <a href="">Ajouter cour </a>
                <a href="">Ajouter td </a>
                <a href="">Ajouter devoir </a>
            </div>

        </div>
        <div class="main-content">
            <div class="modules">
                @foreach($modules as $module)
                    <a href="{{ route('modules.show', $module->id) }}"><img src="{{ $module->image_url }}"> {{ $module->name }}</a>
                @endforeach

            </div>


        </div>


        <div class="right-side-bar">
            <div class="side-bar-title">
                <h4>solutions devoirs</h4>
                <a href="#">voir tout</a>
            </div>
            <div class="event">
                <div class="left-event">
                    <span><img src="images/shortcut-1.png" alt=""></span>
                </div>
                <div class="right-event">
                    <h4>etudiant 1</h4>

                    <a href="#">afficher solution</a><br>
                    <a href="#">noter</a>
                </div>
            </div>
            <div class="event">
                <div class="left-event">
                    <span> <img src="images/shortcut-4.png" alt=""></span>
                </div>
                <div class="right-event">
                    <h4>etudiant 2</h4>

                    <a href="#">afficher solution</a><br>
                    <a href="#">noter</a>
                </div>
            </div>
            <div class="event">
                <div class="left-event">
                    <span> <img src="images/shortcut-4.png" alt=""></span>
                </div>
                <div class="right-event">
                    <h4>etudiant 3</h4>

                    <a href="#">afficher solution</a><br>
                    <a href="#">noter</a>
                </div>
            </div>
            <div class="event">
                <div class="left-event">
                    <span> <img src="images/shortcut-4.png" alt=""></span>
                </div>
                <div class="right-event">
                    <h4>etudiant 4</h4>

                    <a href="#">afficher solution</a><br>
                    <a href="#">noter</a>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')

@endpush
