
@extends('layouts.app')
@section('container')

    <form method="post">
        @csrf
            <div contenteditable="true" name="inputtext" id="inputtext" cols="30" rows="10" style="border: 1px solid; width: 300px; height: 200px"></div>
            <input type="submit" id="submit" value="click">
    </form>

    <script>
        $(document).ready(function() {
            $('#submit').click(function(e) {
                let myword =  $("#inputtext").html();
               // console.log(myword);
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : '/home',
                    type : 'POST',
                    data : 'myword='+myword,
                    success : function(data) {
                            console.log(data);
                    }
                });
            });

        })
    </script>
@endsection
