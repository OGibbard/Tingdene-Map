let map;

function initMap() {
    // The location of Thames and Kennet
    const thamesandkennet = { lat: 51.4623018, lng: -0.9519213 };
    // The map, centered at Thames and Kennet
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: thamesandkennet,
    });
    
    const parkicon = "TingdenePark.png";
    const marinaicon = "TingdeneMarina.png";

    // The marker, positioned at Thames and Kennet
    var marker = new google.maps.Marker({
      position: thamesandkennet,
      map: map,
      icon: marinaicon,
    });
}

window.initMap = initMap;
  