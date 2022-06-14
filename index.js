// Initialize and add the map
const icons = {
  park: {
    icon: "TingdenePark.png",
  },
  marina: {
    icon: "TingdeneMarina.png",
  },
};

const thamesandkennet = { lat: 51.4623018, lng: -0.9519213 };

function initMap() {
    // The location of Thames and Kennet
    // The map, centered at Thames and Kennet
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: thamesandkennet,
    });
    // The marker, positioned at Thames and Kennet
    const marker = new google.maps.Marker({
      position: thamesandkennet,
      map: map,
      icon: marina,
    });
}

window.initMap = initMap;
  