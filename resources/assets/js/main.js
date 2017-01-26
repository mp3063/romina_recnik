/**
 * Created by SrdjanSin on 6/11/2015.
 */
/*====================================
 FILTER FUNCTIONALITY SCRIPTS
 ======================================*/
$(window).load(function () {
    var $container = $('#work-div');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
    $('.categories a').click(function () {
        $('.categories .active').removeClass('active');
        $(this).addClass('active');
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        return false;
    });

    $(".delete").click(function (e) {
        var url = $(this).attr("href");
        e.preventDefault();
        swal({
            title: "Sigurno???",
            text: "Izbrisaćeš me... Šmrc....",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Da, briši ćoro!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (confirmed) {
            if (confirmed == true) {
                $(location).attr('href', url);
            }
            else {
                swal("Cancelled", "Unos nije izbrisan!", "error");
            }
        });
    });

    /**
     * Dynamic Form
     */
    $(".btn-add").on('click', function () {
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


//********************************************************************

