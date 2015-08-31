var markersJSONArray = [];

// forEach fix for IE8
if (!Array.prototype.forEach) {
    Array.prototype.forEach = function (callback, thisArg) {
        var T, k;
        if (this == null) {throw new TypeError(" this is null or not defined");}

        var O = Object(this);
        var len = O.length >>> 0;

        if (typeof callback !== "function") {throw new TypeError(callback + " is not a function");}

        if (thisArg) {T = thisArg;}

        k = 0;
        while (k < len) {
            var kValue;
            if (k in O) {
                kValue = O[k];
                callback.call(T, kValue, k, O);
            }
            k++;
        }
    };
}

(function () {
    var styles = [];
    var markers = {};
    var markersPool = {};
    var infoWindow = new google.maps.InfoWindow();
    var map = {};
    var infoboxHolder = $('<div class="iw_inner"></div>');

    var clearMarkers = function (map_id) {
        for (var i = 0, l = markers[map_id].length; i < l; i++) {
            markers[map_id][i].setMap(null);
            markers[map_id][i] = null;
        }
        markers[map_id] = [];
    };
    window.clearMarkers = clearMarkers;

    var centerMap = function (map_id, lat, lng) {
        if (!markers[map_id].length) return;
        if (markers[map_id].length < 2) {
            map[map_id].setCenter(markers[map_id][0].getPosition());
        } else {
            var bounds = new google.maps.LatLngBounds();
            var i;
            var l = markers[map_id].length;
            for (i = 0; i < l; i++) {
                bounds.extend(markers[map_id][i].getPosition());
            }
            map[map_id].fitBounds(bounds);
        }
    };
    var info_boxes = {};
    var clearInfoWindows = function (map_id) {
        for (var i = 0, l = info_boxes[map_id].length; i < l; i++) {
            info_boxes[map_id][i].setMap(null);
        }
    };
    window.clearInfoWindows = clearInfoWindows;

    window.centerMap = centerMap;

    var markerCluster = {};
    window.markerCluster = markerCluster;

    var gimage = new google.maps.MarkerImage('images/gmarker_default.png');

    var addMarker = function (map_id, lat, lng, html, marker_image) {
        lat = parseFloat(lat);
        lng = parseFloat(lng);
        if (isNaN(lat) || isNaN(lng)) return;

        if (typeof marker_image == 'undefined') marker_image = gimage;
        var marker_position = new google.maps.LatLng(lat, lng);

        var marker = new google.maps.Marker({
            position: marker_position,
            active: false,
            cursor: !!(html) ? 'pointer' : 'default',
            icon: marker_image
        });

        if (typeof html == 'number') {
            google.maps.event.addListener(marker, 'click', function() {
                infoboxHolder.html(markersPool[map_id][html].html_);
                var infoBox = new InfoBox({latlng: marker.getPosition(), map: map[map_id], html: markersPool[map_id][html].html_, height: infoboxHolder.outerHeight(), width: infoboxHolder.outerWidth()});
                infoBox.setMap(null);
                info_boxes[map_id].push(infoBox);
                clearInfoWindows(map_id);
                infoBox.setMap(map[map_id]);
                map[map_id].setCenter(marker.getPosition());
            });
        } else if (typeof html == 'string') {
            infoboxHolder.html(html);
            var infoBox = new InfoBox(
                {
                    latlng: marker.getPosition(),
                    map:    map[map_id],
                    html:   html,
                    height: infoboxHolder.outerHeight(),
                    width:  infoboxHolder.outerWidth()
                }
            );
            infoBox.setMap(null);
            info_boxes[map_id].push(infoBox);
            google.maps.event.addListener(marker, 'click', function() {
                var was_opened = !!infoBox.getMap();
                clearInfoWindows(map_id);
                if (!was_opened) {
                    infoBox.setMap(map[map_id]);
                    //map[map_id].setCenter(marker.getPosition());
                }
            });
        }

        marker.setMap(map[map_id]);
        markers[map_id].push(marker);

        //centerMap();
    };
    window.addMarker = addMarker;

    window.markerClusterDraw = function(map_id) {
        markerCluster[map_id].addMarkers(markers[map_id]);
    };

    function fillMarkersPool( map_id, markersJSONArray, callback ) {
        var i = 0;
        var markersArray = jQuery.parseJSON(markersJSONArray);

        markersArray.forEach(function(entry) {
            markersPool[map_id][i] = {};
            var position = new google.maps.LatLng(parseFloat(entry.lng), parseFloat(entry.lat));
            markersPool[map_id][i].getPosition = function(){ return position; };
            markersPool[map_id][i].lat = entry.lng;
            markersPool[map_id][i].lng = entry.lat;
            if (typeof entry.html == 'string') {
                markersPool[map_id][i].html_ = entry.html;
            } else {
                markersPool[map_id][i].html_ = entry.html + "<i class='iw_arrow'></i>";
            }

            if(map[map_id].getBounds().contains(position)){
                addMarker(map_id, entry.lng, entry.lat, i);
                markersPool[map_id][i].isDrawn = true;
            } else {
                markersPool[map_id][i].isDrawn = false;
            }
            i++;
        });

        updateVisibleMarkersListener = google.maps.event.addListener(map[map_id], 'bounds_changed', function() {
            updateVisibleMarkers(map_id);
        });

        if (typeof callback == 'function') {
            callback();
        }
    }

    var updateVisibleMarkersTimeout = null;
    var updateVisibleMarkersListener = null;
    function updateVisibleMarkers(map_id) {
        clearTimeout(updateVisibleMarkersTimeout);
        updateVisibleMarkersTimeout = setTimeout(function(){ updateVisibleMarkersLoop(map_id); }, 1000);
    }
    function updateVisibleMarkersLoop(map_id) {
        var i;
        var l = markersPool[map_id].length;
        for (i = 0; i < l; i++) {
            var position = markersPool[map_id][i].getPosition();
            if(!markersPool[map_id][i].isDrawn && map[map_id].getBounds().contains(position)){
                addMarker(map_id, markersPool[map_id][i].lat, markersPool[map_id][i].lng, i);
                markersPool[map_id][i].isDrawn = true;
            }
        }
        markerCluster[map_id].removeMarkers(markers[map_id]);
        markerCluster[map_id].addMarkers(markers[map_id]);
    }

    var setMapZoom = function(map_id, zoom) {
        zoom = parseInt(zoom);
        if (isNaN(zoom) || zoom < 1) return;
        map[map_id].setZoom(zoom);
    };
    window.setMapZoom = setMapZoom;

    var directionsService = new google.maps.DirectionsService();
    var directionsTravelMode = 'WALKING'; // DRIVING
    var directionsSearchMode = 'LOCATION'; // ROUTE
    var directionsSearchModePrev = 'LOCATION'; // ROUTE
    var distance = 500; // metres

    function calcRoute(map_id) {
        if ($('#map_address').val() == '') return;
        var start = 'Украина, '+$('#map_address').val();
        var startPoint = '';
        var closestMarker = -1;

        var geocoder= new google.maps.Geocoder();
        geocoder.geocode( {'address': start}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                startPoint = results[0];
                if (directionsSearchMode == 'LOCATION'){
                    // move point of view
                    map[map_id].setCenter(startPoint.geometry.location);
                    if (directionsSearchModePrev == 'ROUTE') {
                        // reset markers
                        clearMarkers(map_id);
                        markersPool[map_id].forEach(function(marker){marker.isDrawn = false;});
                        // remove routes
                        directionsDisplay.setMap(null);

                        markersPool[map_id].forEach(function(marker){
                            if(!marker.isDrawn && map[map_id].getBounds().contains(marker.getPosition())){
                                addMarker(map_id, marker.lat, marker.lng, i);
                                marker.isDrawn = true;
                            }
                        });
                        map[map_id].setZoom(8);
                        markerCluster[map_id].addMarkers(markers);
                        updateVisibleMarkersListener = google.maps.event.addListener(map[map_id], 'bounds_changed', function(){
                            updateVisibleMarkers(map_id);
                        });
                        directionsSearchModePrev = 'LOCATION';
                    }
                } else { // find ROUTE
                    closestMarker = findClosestMarker(startPoint);
                    if (closestMarker != -1) {
                        drawRoute(map_id, startPoint, markersPool[map_id][closestMarker], function(){
                            drawNeighbours(map_id, markersPool[map_id][closestMarker], distance, function(){
                                centerMap(map_id);
                            });
                        });
                    }
                    directionsSearchModePrev = 'ROUTE';
                }
            } /*else {
                console.log('Geocode was not successful for the following reason: ' + status);
            }*/
        });

        function findClosestMarker( map_id, marker ) {
            var closestMarker = -1;
            var closestDistance = Number.MAX_VALUE;
            for( i=0; i<markersPool[map_id].length; i++ ) {
                var distance = google.maps.geometry.spherical.computeDistanceBetween(markersPool[map_id][i].getPosition(),marker.geometry.location);
                if ( distance < closestDistance ) {
                    closestMarker = i;
                    closestDistance = distance;
                }
            }
            return closestMarker;
        }

        function drawRoute(map_id, routeStart, routeEnd, callback) {
            var request;
            if( directionsTravelMode == 'DRIVING' ){
                request = {
                    origin          : routeStart.geometry.location,
                    destination     : routeEnd.getPosition(),
                    travelMode      : google.maps.DirectionsTravelMode.DRIVING
                };
            } else {
                request = {
                    origin          : routeStart.geometry.location,
                    destination     : routeEnd.getPosition(),
                    travelMode      : google.maps.DirectionsTravelMode.WALKING
                };
            }

            directionsDisplay.setMap(map[map_id]);
            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                    var leg = response.routes[ 0 ].legs[ 0 ];

                    //google.maps.event.removeListener(updateVisibleMarkersListener);
                    clearTimeout(updateVisibleMarkersTimeout);
                    markerCluster[map_id].removeMarkers(markers[map_id]);
                    clearMarkers();


                    // route start point
                    addMarker( map_id, leg.start_location.lat(), leg.start_location.lng(), '<div class="iw_text">'+start+'</div><i class="iw_arrow"></i>', gimage_start);
                    // route destination point
                    addMarker( map_id, leg.end_location.lat(), leg.end_location.lng(), markersPool[map_id][closestMarker].html_);

                    if (typeof callback == 'function') {
                        callback();
                    }
                }
            });
        }

        function drawNeighbours(map_id, marker, maxDistance, callback) {
            if (typeof marker   == 'undefined') return;
            if (typeof maxDistance != 'number') return;

            for( i=0; i<markersPool[map_id].length; i++ ) {
                var distance = google.maps.geometry.spherical.computeDistanceBetween(markersPool[map_id][i].getPosition(), marker.getPosition());
                if ( distance <= maxDistance && distance != 0) {
                    addMarker(map_id, markersPool[map_id][i].lat, markersPool[map_id][i].lng, markersPool[map_id][i].html_);
                }
            }

            if (typeof callback == 'function') {
                setTimeout(callback, 10);
            }
        }
    }

    function initializeMap(map_id, options) {
        (typeof options == "undefined") && (options = {});

        // Kiev
        options.lat = options.lat || 50.450231;
        options.lng = options.lng || 30.513271;
        // Luhansk
        //options.lat = options.lat || 50.450231;
        //options.lng = options.lng || 37.504675;
        options.zoom = options.zoom || 8;

        var polylineOptions = new google.maps.Polyline({
            strokeColor: '#62b464',
            strokeOpacity: 1.0,
            strokeWeight: 2
        });
        directionsDisplay = new google.maps.DirectionsRenderer({
            polylineOptions: polylineOptions,
            suppressMarkers: true
        });

        var mapOptions = {
            scrollwheel: false,
            center: new google.maps.LatLng(options.lat, options.lng), // Luhansk
            zoom: options.zoom,
            minZoom: 8
        };

        map[map_id] = new google.maps.Map(document.getElementById(map_id), mapOptions);
        var styledMapType = new google.maps.StyledMapType(styles, { name: 'MAP' });
        map[map_id].mapTypes.set('MAP', styledMapType);

        markerCluster[map_id] = new MarkerClusterer(map[map_id], [], {
            maxZoom: 11
        });

        markers[map_id] = [];
        markersPool[map_id] = [];
        info_boxes[map_id] = [];

        //directionsDisplay.setMap(map);
        //directionsDisplay.setPanel(document.getElementById("directionsPanel"));


        // clear all infoWindows when map is zoomed
        google.maps.event.addDomListener(map[map_id], 'zoom_changed', function(){ clearInfoWindows(map_id); });
    }

    var resizeMap = function(map_id) {
        google.maps.event.trigger(map[map_id], 'resize');
    };
    window.resizeMap = resizeMap;

    function initInfoboxHelper() {
        if ( $('.info_window.helper').length ) return;
        var infoboxHolderOutter = $('<div class="info_window helper"></div>');
        infoboxHolderOutter.css({
            'position': 'fixed',
            'top': 'auto',
            'left': 'auto',
            'right': '100%',
            'bottom': '100%',
            'margin': 200,
            'overflow': 'hidden'
        });
        $('body').append(infoboxHolderOutter);
        $(infoboxHolderOutter).append(infoboxHolder);
    }

    $(document).ready(function () {
        window.initAtmMap = function() {
            if ($('#map-canvas').data('map-inited') == '1') {
                return;
            } else {
                $('#map-canvas').data('map-inited', '1');
            }

            initInfoboxHelper();

            // draw map
            if ($('#map-canvas').length) initializeMap('map-canvas', {lat:49.250231, lng:36.713675});

            // create array of addresses
            if (markersJSONArray.length) {
                $('#map-canvas').css('opacity', 0);
                setTimeout(function(){
                    fillMarkersPool('map-canvas', markersJSONArray, function(){
                        // callback
                        markerCluster['map-canvas'].addMarkers(markers['map-canvas']);
                        $('.map_loading').addClass('none');
                        $('#map-canvas').css('opacity', '');
                        resizeMap(['map-canvas']);
                    });
                }, 1000);
            }
        };

        // Oles Kashchenko
        var mapCanvas   = $('#map-onpage-canvas'),
            mapCanvasId = 'map-onpage-canvas';

        if ($('.atm_map_onpage').length) {
            initInfoboxHelper();

            if (mapCanvas.length) {
                initializeMap(mapCanvasId, {lat: 50.450231, lng: 30.513271});
            }

            if (markersJSONArray.length) {
                mapCanvas.css('opacity', 0);
                setTimeout(function() {
                    fillMarkersPool(mapCanvasId, markersJSONArray, function() {
                        markerCluster[mapCanvasId].addMarkers(markers[mapCanvasId]);
                        $('.map_loading').addClass('none');
                        mapCanvas.css('opacity', '');
                        resizeMap([mapCanvasId]);
                    });
                }, 1000);
            }
        }

        if ($('.contacts_map').length) {
            initInfoboxHelper();

            initializeMap('contacts_map', {lat:50.457379, lng:30.513271, zoom:13});
            addMarker('contacts_map', 50.457379, 30.513271, '123');
        }
    });
})();
