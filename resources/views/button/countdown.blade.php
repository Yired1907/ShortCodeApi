<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy Mã Captcha</title>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/css/button.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>

    <form method="POST" action="{{ asset('/post-code') }}">
        @csrf
        <div id="lay-ma">
            <button type="button" id="save-keycode" style="font-weight: bold;" class="btn-grad">Lấy Mã Captcha</button>
        </div>
    </form>
</body>

<script>
    window.appUrl = "{{ env('APP_URL') }}";
</script>

<!-- ... -->
<script src="{{ asset('/js/main.js') }}"></script>

</html>
