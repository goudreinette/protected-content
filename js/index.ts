declare const $, jQuery

window.onload = _ => {
    window.$ = window.jQuery
    $('.protected-content').submit(validateCode)
    if (!sessionStorage.getItem(data.page_id)) {
        show_protector(true)
    }
}


function show_protector(show = true) {
    $('.protected-content').toggleClass('show', show)
}

function validateCode(e) {
    e.preventDefault()
    const code = $('.protected-content input').val()
    $.post(window.data.ajaxurl, {
        action: 'protected_content_validate_code',
        code,
        page_id: data.page_id

    }, (res) => {

        if (JSON.parse(res) == true) {
            show_protector(false)
            sessionStorage.setItem(data.page_id, code)
        }

        else {
            const className = 'animated wobble'
            $('.protected-content .lock').addClass(className)
            setTimeout(() => $('.protected-content .lock').removeClass(className), 1000)
        }
    })
}