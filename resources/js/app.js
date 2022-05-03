require('./bootstrap');
//require('bootstrap-datepicker/dist/js/bootstrap-datepicker.min');
//require('bootstrap-datepicker/dist/locales/bootstrap-datepicker.fr.min');


$(function () {
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        clearBtn: true,
        autoclose: true,
    });
});

window.onload = function () {

    var map = L.map('map').setView([50.987242, 2.128793], 16);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoicGlrYWRhYSIsImEiOiJjbDJrOGkwa2gwMHlpM2NtdW5zeDNuOG81In0.sCA9Fv3WUC25GWLJcZxTvw'
    }).addTo(map);


    fetch("http://capturs.test/api/locations").then(response => response.json()).then(response => {
        for (var i = 0; i < response['length']; i++) {
            var marker = L.marker([response[i]["latitude"], response[i]["longitude"]]).addTo(map);
        }
    }).catch(error => alert("Erreur : " + error));

}
