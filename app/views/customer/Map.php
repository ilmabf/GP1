<script type="text/javascript">
    var infowindow;
    var map;
    var red_icon = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png';
    var myOptions = {
        zoom: 7,
        center: new google.maps.LatLng(46.87916, -3.32910),
        mapTypeId: 'roadmap'
    };
    map = new google.maps.Map(document.getElementById('map'), myOptions);

    var markers = {};

    var getMarkerUniqueId = function(lat, lng) {
        return lat + '_' + lng;
    };

    var getLatLng = function(lat, lng) {
        return new google.maps.LatLng(lat, lng);
    };

    var addMarker = google.maps.event.addListener(map, 'click', function(e) {
        var lat = e.latLng.lat(); // lat of clicked point
        var lng = e.latLng.lng(); // lng of clicked point
        var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
        var marker = new google.maps.Marker({
            position: getLatLng(lat, lng),
            map: map,
            animation: google.maps.Animation.DROP,
            id: 'marker_' + markerId,
            html: "    <div id='info_" + markerId + "'>\n" +
                "        <table class=\"map1\">\n" +
                "            <tr><td></td><td><input type='button' value='Save' <a href = '/account/addLocation/" + lat + "/" + lng + "'</a>/></td></tr>\n" +
                "        </table>\n" +
                "    </div>"
        });
        markers[markerId] = marker; // cache marker in markers object
        bindMarkerEvents(marker); // bind right click event to marker
        bindMarkerinfo(marker); // bind infowindow with click event to marker
    });

    /**
     * Binds  click event to given marker and invokes a callback function that will remove the marker from map.
     * @param {!google.maps.Marker} marker A google.maps.Marker instance that the handler will binded.
     */

    var bindMarkerinfo = function(marker) {
        google.maps.event.addListener(marker, "click", function(point) {
            var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
            var marker = markers[markerId]; // find marker
            infowindow = new google.maps.InfoWindow();
            infowindow.setContent(marker.html);
            infowindow.open(map, marker);
            // removeMarker(marker, markerId); // remove it
        });
    };

    /**
     * Binds right click event to given marker and invokes a callback function that will remove the marker from map.
     * @param {!google.maps.Marker} marker A google.maps.Marker instance that the handler will binded.
     */

    var bindMarkerEvents = function(marker) {
        google.maps.event.addListener(marker, "rightclick", function(point) {
            var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
            var marker = markers[markerId]; // find marker
            removeMarker(marker, markerId); // remove it
        });
    };

    /**
     * Removes given marker from map.
     * @param {!google.maps.Marker} marker A google.maps.Marker instance that will be removed.
     * @param {!string} markerId Id of marker.
     */
    var removeMarker = function(marker, markerId) {
        marker.setMap(null); // set markers setMap to null to remove it from map
        delete markers[markerId]; // delete marker instance from markers object
    };
</script>