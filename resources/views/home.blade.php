@extends('layouts.app')
@section('container')


    <h1>Enter your text</h1>
    {{--    <h2 class="results"></h2>--}}
    <form method="post">
        @csrf
        <div contenteditable="true" name="inputtext" id="inputtext" cols="30" rows="10"
             style="border: 1px solid; width: 300px; height: 200px"></div>
        <input type="submit" id="submit" value="click">
    </form>

    {{--@dd($newarr);--}}


    <select id="results">

    </select>



    {{--    @foreach ($trueWord as $key => $value )--}}
    {{--        <optgroup label="{{$key}}">--}}
    {{--            @foreach ( $narr as $values )--}}
    {{--                <option value="{{$value}}">{{$value}}</option>--}}
    {{--            @endforeach--}}
    {{--        </optgroup>--}}
    {{--    @endforeach--}}


    {{--    <select class="form-control rating results">--}}
    {{--        @for($i = 0; $i <??;$i++)--}}

    {{--            {{count('newarr')}}--}}
    {{--            {--}}
    {{--            <option  value="1"></option>--}}
    {{--            }--}}
    {{--        @endfor--}}
    {{--    </select>--}}


    <script>

        $(document).ready(function () {
            $('#submit').click(function (e) {
                let myword = $("#inputtext").html();
                // console.log(myword);
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/home',
                    type: 'POST',
                    data: 'myword=' + myword,
                    success: function (data) {
                        $("results").html(data);
                        let truearr = data.trueWord;
                        for (let i = 0; i < truearr.length; i++) {
                            var x = document.getElementById("results");
                            var option = document.createElement("option");
                            option.text = data.trueWord[i];
                            x.add(option);
                        }
                    }
                });
            });

        })

        // function myFunction() {
        //     var x = document.getElementById("results");
        //     var option = document.createElement("option");
        //     option.text = truearr;
        //     x.add(option);
        // }

        // $(document).ready(function () {
        //     $('#submit').click(function (e) {
        //         let myword = $("#inputtext").html();
        //         // console.log(myword);
        //         e.preventDefault();
        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });
        //         $.ajax({
        //             url: '/home',
        //             type: 'POST',
        //             data: 'myword=' + myword,
        //             success: function (data) {
        //                 // alert(data);
        //                 $('.results').html(data);
        //
        //                 // console.log(data);
        //             }
        //         });
        //     });
        //
        // })
    </script>
@endsection
