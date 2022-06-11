@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="left-side-bar-m">
            <div class="module-left">
                <h3> <a href="{{ route('modules.index') }}"> Vos Formations</a></h3>
                <br>
                <h4>Ajouter a votre formation...</h4>
                <br>
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'London')">Cours</button>
                    <br>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">TD</button><br>
                    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Devoirs</button>
                </div>

                <form id="London" class="tabcontent file-form" action="{{ route('modules.store.lesson', $module->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h3>Cours:</h3>
                    <a href="javascript:void(0)" onclick="clickLessonInput()">  <p>attachez un cour</p></a>
                    <input type="file" style="display: none" name="file" id="lessonInput">
                </form>

                <form id="Paris" class="tabcontent file-form" action="{{ route('modules.store.tutorial', $module->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h3>TDs:</h3>
                    <a href="javascript:void(0)" onclick="clickTutorialInput()"> <p>attachez un travail dirigé</p></a>
                    <input type="file" style="display: none" name="file" id="tutorialInput">

                </form>

                <form id="Tokyo" class="tabcontent file-form" action="{{ route('modules.store.work', $module->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h3>Devoirs:</h3>
                    <a href="javascript:void(0)" onclick="clickWorkInput()">  <p>Attachez un devoir.</p></a>
                    <input type="file" style="display: none" name="file" id="workInput">

                </form>

            </div>

        </div>
        <div class="main-content">
            <div class="cours">
                <h4>cours :</h4>
                <br>
                @foreach($module->lessons as $lesson)
                    <a href="{{ $lesson->file_url }}">{{ $lesson->name }}</a>
                @endforeach
            </div>
            <div class="traveaux">
                <h4>traveaux dirigés:</h4>
                <br>
                @foreach($module->tutorials as $tutorial)
                    <a href="{{ $tutorial->file_url }}">{{ $tutorial->name }}</a>
                @endforeach
            </div>
            <div class="devoirs">
                <h4>devoirs :</h4>
                <br>
                 @foreach($module->works as $work)
                    <a href="{{ $work->file_url }}">{{ $work->name }}</a>
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
    <script>
        function clickLessonInput() {
            $('#lessonInput').click().change(function () {
                let form = $(this).parents('.file-form').submit();
            });
        }

        function clickTutorialInput() {
            $('#tutorialInput').click().change(function () {
                let form = $(this).parents('.file-form').submit();
            });
        }

        function clickWorkInput() {
            $('#workInput').click().change(function () {
                let form = $(this).parents('.file-form').submit();
            });
        }
    </script>

@endpush
