require('./bootstrap');
//require('bootstrap-datepicker/dist/js/bootstrap-datepicker.min');
//require('bootstrap-datepicker/dist/locales/bootstrap-datepicker.fr.min');


$(function () {
    $('.datepicker').datepicker({
        clearBtn: true,
        autoclose: true,
    });
});
