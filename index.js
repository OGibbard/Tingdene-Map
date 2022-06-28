let map;

function initMap() {
    // The location of Thames and Kennet
    const thamesandkennet = { lat: 51.4623018, lng: -0.9519213 };
    // The map, centered at Thames and Kennet
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: thamesandkennet,
    });

    const marinapin = 'TingdeneMarina.png';
    const parkpin = 'TingdenePark.png';

    const thamesandkennetmarker = new google.maps.Marker({
      position: {lat: 51.4623018, lng: -0.9519213},
      map: map,
      icon: marinapin,
    });
    const osbornemarker = new google.maps.Marker({
      position: {lat: 52.679472, lng: 0.157083},
      map: map,
      icon: parkpin,
    })
}

window.initMap = initMap;
  