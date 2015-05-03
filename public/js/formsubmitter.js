$(document).ready(function () {
    $('a[data-post]').click(formSubmit);
});

var formSubmit = function (e) {
    e.preventDefault();
    var $this = $(this);

    var antiForgeryToken = $('#anti-forgery-token input');
    var antiForgeryInput = $('<input>')
        .attr('type', 'hidden')
        .attr('name', antiForgeryToken.attr('name'))
        .val(antiForgeryToken.val());

    var form = $('<form>')
        .attr('method', 'POST')
        .attr('action', $this.attr('href'))
        .css('display', 'none')
        .append(antiForgeryInput);

    $('body').append(form);

    form.submit();
};