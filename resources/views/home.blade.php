
@extends('layouts.app')
@section('container')

    <form method="post" action="{{route('text')}}">
        @csrf
            <textarea name="inputtext" id="inputtext" cols="30" rows="10">
            </textarea>
            <input type="submit" >
    </form>


@endsection
