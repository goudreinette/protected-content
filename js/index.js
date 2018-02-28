window.onload = function (_) {
    window.$ = window.jQuery;
    $('.protected-content').submit(validateCode);
    if (!sessionStorage.getItem(data.page_id)) {
        show_protector(true);
    }
};

function show_protector(show = true) {
    $('.protected-content').toggleClass('show', show);
}

function validateCode(e) {
    e.preventDefault();
    var code = $('.protected-content input').val();
    $.post(window.data.ajaxurl, {
        action: 'protected_content_validate_code',
        code: code,
        page_id: data.page_id
    }, function (res) {
        if (JSON.parse(res) == true) {
            show_protector(false);
            sessionStorage.setItem(data.page_id, code);
        }
        else {
            var className_1 = 'animated wobble';
            $('.protected-content .lock').addClass(className_1);
            setTimeout(function () { return $('.protected-content .lock').removeClass(className_1); }, 1000);
        }
    });
}
