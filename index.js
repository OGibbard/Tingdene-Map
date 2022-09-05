let map;
function initMap() {
    // The map, centered at Thames and Kennet
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 6,
      center: {lat: 54.3760767, lng: -2.5588948},
    });
    const marina = 'TingdeneMarina.png';
    const park = 'TingdenePark.png';
    //console.log(properties)
    var sites = [
      // thamesandkennet
      {
        name: 'Thames and Kennet',
        position: {lat: 51.4623018, lng: -0.9519213},
        map: map,
        type: marina,
        websitelink: '/sites/thames-and-kennet/',
      },
      // osborne
      {
        name: 'Osborne',
        position: {lat: hello, lng: 0.157083},
        //position: {lat: 52.679472, lng: 0.157083},
        map: map,
        type: park,
        websitelink: '/sites/osborne/',
      },
    ];
    console.log(sites[0])
    console.log(sites)
    
    for (let i = 0; i < sites.length; i++) {
      const marker = new google.maps.Marker({
        position: sites[i].position,
        icon: sites[i].type,
        map: map,
      })
    }
}

window.initMap = initMap;
  