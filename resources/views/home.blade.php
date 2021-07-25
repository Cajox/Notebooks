@extends('layouts.app')
@section('content')

    <div id="app">
        <notebooks></notebooks>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>

@endsection
