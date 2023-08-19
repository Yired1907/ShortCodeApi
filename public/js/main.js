// // Đính kèm mã CSRF token vào các request AJAX
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var APP_URL = window.appUrl;

function getdomain(e, r, f) {
    return e + "?w=" + r + "&v=" + f;
}



var lchref = location.href;
ifm_website_id = lchref.replace("?m=1", "");
var secound = 10;
let _btn = $('#save-keycode');

_btn.on('click', (e) => {
    e.preventDefault();
    _btn.prop('disabled', true);
    _btn.html(`Còn Lại : ${secound}s Nữa`);

    let countdownInterval = setInterval(() => {
        secound--;
        _btn.html(`Còn Lại : ${secound}s Nữa`);
        if (secound < 1) {
            clearInterval(countdownInterval);

            var sendform = {
                action: "traffic_jobs",
                domain: ifm_website_id
            }

            $.ajax({
                type: "post",
                dataType: "json",
                url: APP_URL + `/post-code`,
                data: JSON.stringify(sendform),
                beforeSend: function () {
                    _btn.html('Đang Lấy Mã ...');
                },
                success: function (rps) {
                    if (rps.success === false) {
                        _btn.addClass('btn-error');
                        _btn.html(rps.code);
                        return;
                    }
                    // console.log(rps.code)
                    $('#lay-ma').html(`<button type="button" style="font-weight: bold;" onclick="StringCopy('${rps.code}')" class="btn-grad">${rps.code} <i class="far fa-copy"></i></button>`);
                },
                error: function (textStatus, errorThrown) {
                    //Làm gì đó khi có lỗi xảy ra
                    console.log('The following error occurred: ' + textStatus, errorThrown);
                }
            });
        }
    }, 1000);

    document.addEventListener("visibilitychange", function () {
        if (document.visibilityState === "hidden") {
            clearInterval(countdownInterval);
        } else if (document.visibilityState === "visible" && secound >= 1) {
            countdownInterval = setInterval(() => {
                secound--;
                _btn.html(`Còn Lại : ${secound}s Nữa`);
                if (secound < 1) {
                    clearInterval(countdownInterval);

                    var sendform = {
                        action: "traffic_jobs",
                        domain: ifm_website_id
                    }

                    $.ajax({
                        type: "post",
                        dataType: "json",
                        url: APP_URL + `/post-code`,
                        data: JSON.stringify(sendform),
                        beforeSend: function () {
                            _btn.html('Đang Lấy Mã ...');
                        },
                        success: function (rps) {
                            if (rps.success === false) {
                                _btn.addClass('btn-error');
                                _btn.html(rps.code);
                                return;
                            }
                            // console.log(rps.code)
                            $('#lay-ma').html(`<button type="button" style="font-weight: bold;" onclick="StringCopy('${rps.code}')" class="btn-grad">${rps.code} <i class="far fa-copy"></i></button>`);
                        },
                        error: function (textStatus, errorThrown) {
                            //Làm gì đó khi có lỗi xảy ra
                            console.log('The following error occurred: ' + textStatus, errorThrown);
                        }
                    });
                }
            }, 1000);
        }
    });

    window.addEventListener("blur", function () {
        clearInterval(countdownInterval);
    });
});

function StringCopy(str) {
    // // Create new element
    var el = document.createElement('textarea');
    // Set value (string to be copied)
    el.value = str;
    // Set non-editable to avoid focus and move outside of view
    el.setAttribute('readonly', '');
    el.style = {
        position: 'absolute',
        left: '-9999px'
    };
    document.body.appendChild(el);
    // Select text inside element
    el.select();
    // Copy text to clipboard
    document.execCommand('copy');
    // Remove temporary element
    document.body.removeChild(el);

    toastr.success('Đã sao chép mã!');
}
