let map;
// Create map function
function initMap() {
    // Creating the map
    const map = new google.maps.Map(document.getElementById("map"), {
      //Zoom level
      zoom: 6,
      // Centred at Thames and Kennet
      center: {lat: 54.3760767, lng: -2.5588948},
      //No street view available
      streetViewControl: false,
    });
    
    //For every site in the database
    for (let j=0; j < properties.length; j++) {
      var temptype = properties[j].SiteType
      //Create an info window
      const infowindow = new google.maps.InfoWindow({
        content: ('<a href="'+properties[j].Company+'/'+properties[j].WebsiteLink+'.php">'+properties[j].SiteName+'</a><br><a href="'+properties[j].Company+'/'+properties[j].WebsiteLink+'.php">'+properties[j].SiteType+'</a>'),
      });
      //Create a marker
      const marker = new google.maps.Marker({
        position: {lat: parseFloat(properties[j].Latitude), lng: parseFloat(properties[j].Longitude)},
        icon: properties[j].Company + '/' + properties[j].SiteType+'.png',
        map: map,
      });
      //Add a listener so infowindow opens when marker clicked
      marker.addListener("click", () => {
        infowindow.open({
          anchor: marker,
          map,
          shouldFocus: false,
        });
      });
    }
}
//Start map
window.initMap = initMap;
