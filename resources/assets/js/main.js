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

});


//********************************************************************

