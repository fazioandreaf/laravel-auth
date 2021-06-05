@extends('layouts.main_layout')
@section('content')
<div >

    <span class="pilot_detail">
        Nome:
    </span>
    {{$pilot->name}}
    <span class="pilot_detail">
        Lastname:
    </span>
    {{$pilot->lastname}}
    <span class="pilot_detail">
        Nationality:
    </span>
    {{$pilot->nationality}}
    <span  class="pilot_detail">
        Date of birth:
    </span>
    {{$pilot->date_of_birth}}
</div>
<div>
    <h1>Car</h1>
    @foreach ($pilot -> cars as $item)
    <div class="p_c">
        <span class="pilot_detail">
            Name:
        </span>
        {{$item-> name}}
        <span class="pilot_detail">
            Model:
        </span>
        {{$item-> model}}
        <span class="pilot_detail">
            Potenza:
        </span>
        {{$item-> kW}}
    </div>
        @endforeach
</div>
<div>
    <a href="{{route('home')}}">Ritorna alle auto</a>
</div>
@endsection
