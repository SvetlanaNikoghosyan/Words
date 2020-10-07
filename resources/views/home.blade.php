@extends('layouts.app')
@section('container')

    <h1>Enter your text</h1>
    <form id="contact-form" class="form" method="post">
        @csrf
        <div contenteditable="true" name="inputtext" class="inputtext" id="inputtext" cols="30" rows="10"></div>
        <input type="submit" class="submit" id="submit" value="Click">
    </form>

@endsection
