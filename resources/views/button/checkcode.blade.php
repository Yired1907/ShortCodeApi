<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/templates/default/CloudTheme/css/styles.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <link href="{{ asset('public/templates/css/checkcode.css') }}" rel="stylesheet" type="text/css" />

    <title>1001 Link</title>
</head>

<body class="captcha-page">
    <nav id="mainNav" class="navbar navbar-default ">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Menu điều hướng</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo-image" href="#">
                    <img src="{{ asset('public/templates/images/img/logo-trang-v2.png') }}">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">Tin tức</a>
                    </li>
                    <li>
                        <a class="go-to-123link get-started" href="#">Đăng nhập<img
                                src="{{ asset('public/templates/images/img/started.svg') }}"
                                class="hidden-xs p-started"></a>
                    </li>
                    <li>
                        <a href="#">Trang chủ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box-main">
                    <div class="box-body text-center">
                        <div class="clearfix"></div>
                        <div id="captcha-html-wrapper">
                            <h4>Vui lòng nhập mã để tiếp tục tới trang đích</h4>
                            <div style="margin-bottom: 10px;">
                                <form id="main-form" method="POST" action="{{ route('test_code') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" id="code" name="code" value=""
                                            class="form-control input-lg password" placeholder="Nhập mã"
                                            oninput="checkInput()">
                                        <input type="hidden" name="alias" value="#" id="alias">
                                        <input type="hidden" name="campaign_id" value="#" id="campaign_id">
                                        <input type="hidden" name="display_id" value="#" id="display_id">
                                        <input type="hidden" name="prefix" value="#" id="prefix">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" id="submitButton" class="btn btn-success" disabled>
                                            Click vào đây để tiếp tục
                                        </button>
                                    </div>
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger mt-3">
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif
                                </form>

                                <script>
                                    function checkInput() {
                                        var codeInput = document.getElementById('code');
                                        var submitButton = document.getElementById('submitButton');
                                        if (codeInput.value === '') {
                                            submitButton.disabled = true;
                                        } else {
                                            submitButton.disabled = false;
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                        <div id="advertise-html-wrapper">
                            <div style="margin-bottom: 10px;font-size: 18px;" class="text-left">
                                <h4>Hướng dẫn cách lấy mã</h4>
                                <p style="color: red; font-style: italic;">(<strong>Lưu ý:</strong> Vui lòng làm theo
                                    đúng hướng dẫn để không bị sai MÃ)</p>
                                <p style="color: blue; ">KHÔNG Click vào quảng cáo <strong style="color: black; ">Được
                                        tài trợ</strong></p>
                                <p><strong>Bước 1:</strong> Mở tab mới, truy cập <strong><span
                                            class="red">google.com</span></strong></p>
                                <p><strong>Bước 2:</strong> Gõ tìm từ khóa <strong><span
                                            class="red">w88</span></strong>
                                </p>
                                <p><strong>Bước 3:</strong> Bấm vào website <strong><span
                                            class="red">w8***.bio</span></strong> ở <strong><span
                                            class="red">trang
                                            1</span></strong></p>
                                <p class="text-center" style="padding-bottom:30px">
                                    <img src="https://img.link4m.com/uploads/advertiser/worigin/2023/07/15/1_16.jpg"
                                        style="border:1px solid #ccc;">
                                </p>
                                <p><strong>Bước 4:</strong> Kéo xuống cuối bài viết, click vào nút
                                    <img src="{{ asset('public/templates/images/img/icon/button-lay-ma.png') }}"
                                        height="30px">
                                    như hình dưới đây để lấy mã
                                </p>
                                <p class="text-center" style="text-align: center;">
                                    <img src="https://img.link4m.com/uploads/advertiser/worigin/2023/07/15/3_7.jpg"
                                        width="600">
                                </p>
                                <p><strong>Bước 5:</strong> Dán mã vào đây để tới trang đích</p>
                                <div style="margin-bottom: 10px;" class="text-center">
                                    <form id="main-form-2" method="POST" action="{{ route('test_code') }}">
                                        @csrf
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input type="text" id="code2" name="code" value=""
                                                    class="form-control input-lg" placeholder="Nhập mã"
                                                    oninput="checkInput2()">
                                                <input type="hidden" name="alias" value="#" id="alias">
                                                <input type="hidden" name="campaign_id" value="#"
                                                    id="campaign_id"><input type="hidden" name="display_id"
                                                    value="#" id="display_id"><input type="hidden"
                                                    name="prefix" value="#" id="prefix">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" id="submitButton2" class="btn btn-success"
                                                    disabled>
                                                    Click vào đây để tiếp tục
                                                </button>
                                            </div>
                                            <script>
                                                function checkInput2() {
                                                    var codeInput = document.getElementById('code2');
                                                    var submitButton = document.getElementById('submitButton2');
                                                    if (codeInput.value === '') {
                                                        submitButton.disabled = true;
                                                    } else {
                                                        submitButton.disabled = false;
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </form>
                                </div>
                                <div id="report-wrapper" class="text-center">
                                    <p>
                                        Bạn không lấy được mã?
                                    </p>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#modal-report"
                                        data-advertise_id="#">Báo lỗi</a>
                                </div>
                            </div>

                            {{-- Phần chèn video hướng dẫn vào --}}
                            <div style="margin-bottom: 10px;font-size: 18px;text-transform: uppercase;"
                                class="text-left">
                                <h4>Video hướng dẫn cách lấy mã</h4>
                                <div class="text-center">
                                    <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/7b1qBE_Icbw" title="YouTube video player"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script> --}}

    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/templates/default/CloudTheme/js/bootstrap.min.js') }}">

    <script>
        window.appUrl = "{{ env('APP_URL') }}";
    </script>

    <script src="{{ asset('/js/main.js') }}"></script>
</body>

</html>
