@extends('layouts.app')

@push('css')
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <!-- Font awesome -->
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/messagerie.css') }}" />

@endpush

@section('content')
    <div class="container-fluid h-100">
        <div id="app">
            <conversation :conversations="{{ auth()->user()->friends }}" :sender-id="{{ auth()->id() ?? 1 }}"></conversation>

        </div>
    </div>
@endsection

@push('js')
    <script src="{{mix('js/app.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/homepage.js') }}"></script>

@endpush
