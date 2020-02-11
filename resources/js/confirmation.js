$(".vcode-inputs").keyup(function () {
    if (this.value.length == this.maxLength) {
        $(this).next('.vcode-inputs').focus();
    }
});

$('.vcode-input').children().last().keyup(function () {
    $(".vcode-inputs").blur();
});
