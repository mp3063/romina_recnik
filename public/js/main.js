/**
 * Created by SrdjanSin on 6/11/2015.
 */
/*====================================
 FILTER FUNCTIONALITY SCRIPTS
 ======================================*/
$(document).ready(function () {
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


    $(".update-modal").on('click', function () {
        var idVal = $(this).attr('id-value');
        var url = "/plata-baza-edit/" + idVal;
        $.ajax({
            url: url,
            type: "GET",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function (plata) {
                $("form").attr('action', '/plata-baza-update/' + plata.id)
                $("input[name='datum_od']").val(plata.datum_od);
                $("input[name='datum_do']").val(plata.datum_do);
                $("input[name='plata_iznos']").val(plata.plata_iznos);
                $("input[name='odmor']").val(plata.odmor);
                $("input[name='predato_karaktera']").val(plata.predato_karaktera);
                $("input[name='datum_kursa']").val(plata.datum_kursa);
            }
        });
    });

    $(".proracun tr").on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('highlight');
        var norma = $(".highlight .norma");
        var razlika = $(".highlight .razlika");
        var normaSum = 0;
        var razlikaSum = 0;
        norma.each(function () {
            normaSum += Number($(this).text());
        });
        razlika.each(function () {
            razlikaSum += Number($(this).text());
        });
        var sum = $(".sum");

        sum.children().remove();
        sum.append("<h2>Ukupna norma za izabrane mesece je " + normaSum + "</h2>");
        sum.append("<h2>Ukupna razlika u karakterima je " + razlikaSum + "</h2>");
        if (normaSum == 0 || razlikaSum == 0) {
            sum.children().remove();
        }
    });
});


//********************************************************************


$(function () {
    $(document).on('click', '.btn-add', function (e) {
        e.preventDefault();

        var controlForm = $('.form-inline'),
            currentEntry = $(this).parent(),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        $('.entry > input').each(function (i) {
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

$(function () {
    $('[data-toggle="popover"]').popover();
});
