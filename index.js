let map;
function initMap() {
    // The map, centered at Thames and Kennet
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 6,
      center: {lat: 54.3760767, lng: -2.5588948},
      streetViewControl: false,
    });
    

    for (let j=0; j < properties.length; j++) {
      var temptype = properties[j].SiteType
      const infowindow = new google.maps.InfoWindow({
        content: (properties[j].SiteName + '<a href="'+properties[j].Company+'/'+properties[j].WebsiteLink+'.php">'+properties[j].SiteName+'</a>'),
      });
      const marker = new google.maps.Marker({
        position: {lat: parseFloat(properties[j].Latitude), lng: parseFloat(properties[j].Longitude)},
        icon: properties[j].Company + '/' + properties[j].SiteType+'.png',
        map: map,
      });
      marker.addListener("click", () => {
        infowindow.open({
          anchor: marker,
          map,
          shouldFocus: false,
        });
      });
    }
}

window.initMap = initMap;
