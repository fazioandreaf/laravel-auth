@extends('layouts.main_layout')
@section('content')
<form method="post" action="{{route('edit_function',$car->id)}}">
    @method('post')
    @csrf
    <div class="car_form">
        <h2>Car</h2>
        <label for="">Name</label>
        <input type="text" name="name" id="" value={{$car->name}}>
        <label for="">Model</label>
        <input type="text" name="model" id="" value={{$car->model}}>
        <label for="">Potenza</label>
        <input type="number" name="kW" id="" value={{$car->kW}}>
    </div>
    <div>
        <div>
            <h2>Brand</h2>
            <select name="brand_id" id="">
                {{-- <option value="20">Nessuno</option> --}}
                @foreach ($brand as $item)
                <option value="{{$item ->id}}">{{$item->nationality}}</option>
                @endforeach
            </select>
        </div>
        <div class="pilot_form">
            {{-- <select name="pilot_id" id=""> --}}
                {{-- <option value="">Nessuno</option> --}}
                @foreach ($pilot as $item)
                <div class="pilot_form-class">

                    <input type="checkbox" name="pilot_id[]" value="{{$item->id}}">
                    <label for="">{{$item->name}} {{$item->lastname}}</label>
                </div>
                @endforeach
            </select>

        </div>
    </div>
    <button type="submit">Add</button>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    <a href="{{route('home')}}">Ritorna alle auto</a>
</div>
@endsection
