$(function () {
    $(document).on('click', '.btn-add', function (e) {
        e.preventDefault();

        var controlForm = $('.form-inline'),
            currentEntry = $(this).parent(),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        $('.change > input').each(function (i) {
            $(this).attr('name', +i);
        });
        currentEntry.find('.btn-primary:first').remove();
        newEntry.find('input').val('');
        controlForm.find('.btn-add').not(':last')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function (e) {
        $(this).parent().remove();

        e.preventDefault();
        return false;
    });
});
