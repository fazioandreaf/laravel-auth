@extends('layouts/main_layout')
@section('content')
    <div class="add">
        <a href="{{route('add')}}">
            add car
        </a>
    </div>
    <ul>
        @foreach ($car as $item)
        @if ($item->delete ==0)

        @else
        <li>
            <div class="car">
                <span>
                    Name
                </span>
                {{$item -> name}}
                <span>
                    Model
                </span>
                {{$item -> model}}
                <span>
                    Potenza
                </span>
                {{$item -> kW}}
            </div>
            <div class="brand">
                <span>
                    Nationality
                </span>
                {{$item -> brand -> nationality}}
            </div>
            <div class="pilot">
                <span>
                    pilot/s:
                </span>
                @foreach ($item -> pilots as $pilot)
                <a href="{{route('pilot',$pilot->id)}}">
                    {{$pilot -> name}}
                </a>
                <span>
                    ,
                </span>
                @endforeach
            </div>
            <div>
                <a href="{{route('delete',$item->id)}}">
                    &#10060;
                </a>
                <a href="{{route('edit',$item->id)}}">
                    &#128394;
                </a>
            </div>
        </li>
        @endif
        @endforeach

    </ul>

@endsection
