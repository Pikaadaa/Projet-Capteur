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

    var mapv_auth = document.getElementById('mapv');
    var map_auth = document.getElementById('map');

    // Map du véhicule 

    if (mapv_auth != null) {
        var chemin = window.location.pathname;
        car = chemin.charAt(chemin.length - 1);

        fetch("http://capturs.test/api/vehicles/" + car).then(response => response.json()).then(response => {
            var mapv = L.map('mapv').setView([response['locations'][0]["latitude"], response['locations'][0]["longitude"]], 16);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoicGlrYWRhYSIsImEiOiJjbDJrOGkwa2gwMHlpM2NtdW5zeDNuOG81In0.sCA9Fv3WUC25GWLJcZxTvw'
            }).addTo(mapv);

            for (var i = 0; i < response['locations']['length']; i++) {
                if (response['locations'][i] != null) {
                    var marker = L.marker([response['locations'][i]["latitude"], response['locations'][i]["longitude"]]).addTo(mapv);
                    marker.bindPopup("<b>" + response['vehicles'][i]['device'] + "</b>").openPopup();
                }
            }
            $('.balise').click(function (event) {
                var id = event.target.id;
                for (var i = 0; i < response['locations']['length']; i++) {
                    if (id == response['locations'][i]['captur_id']) {
                        mapv.setView([response['locations'][i]['latitude'], response['locations'][i]['longitude']], 19);
                    }
                }
            });
        }).catch(error => alert("Aucune localisation trouvée"));

    }


    // Map de la carte général

    if (map_auth != null) {

        fetch("http://capturs.test/api/locations").then(response => response.json()).then(response => {
            var map = L.map('map').setView([response['locations'][0]["latitude"], response['locations'][0]["longitude"]], 16);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoicGlrYWRhYSIsImEiOiJjbDJrOGkwa2gwMHlpM2NtdW5zeDNuOG81In0.sCA9Fv3WUC25GWLJcZxTvw'
            }).addTo(map);

            for (var i = 0; i < response['locations']['length']; i++) {
                var marker = L.marker([response['locations'][i]["latitude"], response['locations'][i]["longitude"]]).addTo(map);
                marker.bindPopup("<b>" + response['capturs'][i]['device'] + "</b>").openPopup();
            }
            $('.balise').click(function (event) {
                var id = event.target.id;
                for (var i = 0; i < response['locations']['length']; i++) {
                    if (id == response['locations'][i]['captur_id']) {
                        map.setView([response['locations'][i]['latitude'], response['locations'][i]['longitude']], 19);
                    }
                }
            });
        }).catch(error => alert("Aucune localisation trouvée"));
    }
}


