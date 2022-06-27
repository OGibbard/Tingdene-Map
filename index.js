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
    
    // The marker, positioned at Thames and Kennet
    const marker = new google.maps.Marker({
      position: thamesandkennet,
      map: map,
      icon: marinapin,
    });
}

window.initMap = initMap;
  