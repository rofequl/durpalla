// Initialize and add the map
function initMap() {
    var uluru = {lat: 23.777, lng: 90.399};
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 6.5, center: uluru});
    var marker = new google.maps.Marker({position: uluru, map: map});
}
