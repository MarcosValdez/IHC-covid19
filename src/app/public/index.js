$(document).ready(function() {
    $('#data').DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
        },
        "lengthChange": false,
        "order": [],
        "pageLength": 10
    });
});
/* sticky menu */

window.addEventListener("scroll", () => {
    let header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
})

mapboxgl.accessToken = 'pk.eyJ1IjoibWFyY29zdiIsImEiOiJja2liNHF2bWkwNjlyMnFsYWVtbXo3cGI5In0.oTCXFk1EXHOjTjMSdu6ZzQ';

var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/dark-v10',
    center: [-77.02824, -12.04318],
    zoom: 4
});


var mapHospitales = new mapboxgl.Map({
    container: 'mapHospitales',
    style: 'mapbox://styles/marcosv/ckj84ql372nsn19pcz0ovvygv', // replace this with your style URL
    center: [-74.99304, -8.37915],
    zoom: 4
  });
  // code from the next step will go here
  mapHospitales.on('click', function(e) {
  var features = mapHospitales.queryRenderedFeatures(e.point, {
  layers: ['hospitales (1)'] // replace this with the name of the layer
  });
  
  if (!features.length) {
  return;
  }
  
  var feature = features[0];
  
  var popup = new mapboxgl.Popup({ offset: [0, -15] })
  .setLngLat(feature.geometry.coordinates)
  .setHTML('<h3>' + feature.properties.title + '</h3><p>' + feature.properties.description + '</p>')
  .addTo(mapHospitales);
  });