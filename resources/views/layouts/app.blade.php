<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

@yield('container')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {

        $('#contact-form').on('submit',function(event){
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let myword = $("#inputtext").text();
            $.ajax({
                url: '/home',
                type: 'POST',
                data: 'myword=' + myword,
                success: function (data) {
                    console.log(data.trueWord);
                    $('#inputtext').html(data.trueWord);

                    $('.wrong').on('click',function(e){
                        e.preventDefault();
                        $(this).next('.select').css("display","inline-block");
                        let name = $(this).attr("id");
                        });

                    $('.options').change(function () {
                     let newWord = $(this).val();
                        $(this).parents('.select').prev('span').text(newWord);
                        $(this).parents('.select').prev('span').removeClass('wrong');
                        $(this).parents('.select').css("display", "none");
                    })

                    $('.wrong').on('click', function (e) {
                        e.preventDefault();
                        $(this).find('․select').css("display", "none");
                    });
                }
            });
        });
    })
</script>
</body>
</html>
