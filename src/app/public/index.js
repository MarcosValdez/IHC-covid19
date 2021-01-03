
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

function App() {
  const mapboxElRef = useRef(null); // DOM element to render map

  const fetcher = (url) =>
    fetch(url)
      .then((r) => r.json())
      .then((data) =>
        data.map((point, index) => ({
          type: 'Feature',
          geometry: {
            type: 'Point',
            coordinates: [point.coordinates.longitude, point.coordinates.latitude]
          },
          properties: {
            id: index,
            country: point.country,
            province: point.province,
            cases: point.stats.confirmed,
            deaths: point.stats.deaths
          }
        }))
      );

  const { data } = useSWR('https://corona.lmao.ninja/v2/jhucsse', fetcher);

  // Initialize our map
  useEffect(() => {
    if (data) {
      const map = new mapboxgl.Map({
        container: mapboxElRef.current,
        style: 'mapbox://styles/notalemesa/ck8dqwdum09ju1ioj65e3ql3k',
        center: [-75.265152,-9.189967 ],
        zoom: 4
      });

      // Add navigation controls to the top right of the canvas
      map.addControl(new mapboxgl.NavigationControl());

      map.once('load', function () {
        // Add our SOURCE
        map.addSource('points', {
          type: 'geojson',
          data: {
            type: 'FeatureCollection',
            features: data
          }
        });

        // Add our layer
        map.addLayer({
          id: 'circles',
          source: 'points', // this should be the id of source
          type: 'circle',
          paint: {
            'circle-opacity': 0.75,
            'circle-stroke-width': ['interpolate', ['linear'], ['get', 'cases'], 1, 1, 100000, 1.75],
            'circle-radius': [
              'interpolate',
              ['linear'],
              ['get', 'cases'],
              1,
              4,
              1000,
              8,
              4000,
              10,
              8000,
              14,
              12000,
              18,
              100000,
              40
            ],
            'circle-color': [
              'interpolate',
              ['linear'],
              ['get', 'cases'],
              1,
              '#ffffb2',
              5000,
              '#fed976',
              10000,
              '#feb24c',
              25000,
              '#fd8d3c',
              50000,
              '#fc4e2a',
              75000,
              '#e31a1c',
              100000,
              '#b10026'
            ]
          }
        });

        const popup = new mapboxgl.Popup({
          closeButton: false,
          closeOnClick: false
        });

        let lastId;

        map.on('mousemove', 'circles', (e) => {
          const id = e.features[0].properties.id;

          if (id !== lastId) {
            lastId = id;
            const { cases, deaths, country, province } = e.features[0].properties;

            // Change the pointer type on mouseenter
            map.getCanvas().style.cursor = 'pointer';

            const coordinates = e.features[0].geometry.coordinates.slice();

            const countryISO = lookup.byCountry(country)?.iso2 || lookup.byInternet(country)?.iso2;
            const provinceHTML = province !== 'null' ? `<p>Province: <b>${province}</b></p>` : '';
            const mortalityRate = ((deaths / cases) * 100).toFixed(2);
            const countryFlagHTML = Boolean(countryISO)
              ? `<img src="https://www.countryflags.io/${countryISO}/flat/64.png"></img>`
              : '';

            const HTML = `<p>Country: <b>${country}</b></p>
              ${provinceHTML}
              <p>Cases: <b>${cases}</b></p>
              <p>Deaths: <b>${deaths}</b></p>
              <p>Mortality Rate: <b>${mortalityRate}%</b></p>
              ${countryFlagHTML}`;

            // Ensure that if the map is zoomed out such that multiple
            // copies of the feature are visible, the popup appears
            // over the copy being pointed to.
            while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
              coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
            }

            popup.setLngLat(coordinates).setHTML(HTML).addTo(map);
          }
        });

        map.on('mouseleave', 'circles', function () {
          lastId = undefined;
          map.getCanvas().style.cursor = '';
          popup.remove();
        });
      });
    }
  }, [data]);

  return (
    <div className="App">
      <div className="mapContainer">
        {/* Mapbox container */}
        <div className="mapBox" ref={mapboxElRef} />
      </div>
      {/* Source container - not part of the tutorial */}
      <div className="source">
        <span role="img" aria-label="computer">
          🖥️
        </span>
        <a href="https://github.com/alemesa/mapbox-covid19" target="_blank" rel="noreferrer noopener">
          Source code
        </a>
      </div>
    </div>
  );
}

export default App;