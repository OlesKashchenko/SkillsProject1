'use strict';

var Map =
{

    maps: [],

    center_latitude: 50.450231,
    center_longitude: 30.513271,
    zoom: 10,
    zoom_close: 15,
    cluster_grid_size: 50,

    type: 'office',
    infobox_holder: jQuery('<div class="iw_inner"></div>'),


    /*
    Initialize maps scripts
     */
    init: function()
    {
        Map.initChangeOfficeType();
        Map.initChangeAtmType();
        Map.initChangeAtmSubtype();
        Map.initFilterOfficesFormValidation();
    }, // end init

    /*
    Initialize map by identifier
     */
    initialize: function(idMap, options)
    {
        if (jQuery('#' + idMap).length) {
            google.maps.event.addDomListener(window, 'load', function() {
                Map.setOptions(idMap, options);
                Map.render(idMap);
            });
        }
    }, // end initialize

    checkExists: function(idMap)
    {
        if (Map.maps[idMap] == undefined) {
            Map.maps[idMap] = [];
        }
    }, // end checkExists

    setLocations: function(idMap, locations)
    {
        Map.checkExists(idMap);

        if (locations != undefined) {
            Map.maps[idMap]['locations'] = locations;
        } else {
            Map.maps[idMap]['locations'] = [];
        }
    }, // end setLocations

    setCenterLatitude: function(idMap, latitude)
    {
        Map.checkExists(idMap);

        if (latitude != undefined) {
            Map.maps[idMap]['center_latitude'] = latitude;
        } else {
            Map.maps[idMap]['center_latitude'] = Map.center_latitude;
        }
    }, // end setCenterLatitude

    setCenterLongitude: function(idMap, longitude)
    {
        Map.checkExists(idMap);

        if (longitude != undefined) {
            Map.maps[idMap]['center_longitude'] = longitude;
        } else {
            Map.maps[idMap]['center_longitude'] = Map.center_longitude;
        }
    }, // end setCenterLongitude

    setZoom: function(idMap, zoom)
    {
        Map.checkExists(idMap);

        if (zoom != undefined) {
            Map.maps[idMap]['zoom'] = zoom;
        } else {
            Map.maps[idMap]['zoom'] = Map.zoom;
        }

        var map = Map.maps[idMap]['map'];

        if (Map.maps[idMap]['map'] != undefined) {
            Map.maps[idMap]['map'].setZoom(zoom);
        }
    }, // end setZoom

    setClusterGridSize: function(idMap, clusterGridSize)
    {
        Map.checkExists(idMap);

        if (latitude != undefined) {
            Map.maps[idMap]['cluster_grid_size'] = zoom;
        } else {
            Map.maps[idMap]['cluster_grid_size'] = Map.zoom;
        }
    }, // end setClusterGridSize

    setOptions: function(idMap, options)
    {
        Map.maps[idMap] = {
            locations:          options['locations'] != undefined ? options['locations'] : [],
            center_latitude:    options['latitude'] != undefined ? options['latitude'] : Map.center_latitude,
            center_longitude:   options['longitude'] != undefined ? options['longitude'] : Map.center_longitude,
            zoom:               options['zoom'] != undefined ? options['zoom'] : Map.zoom,
            cluster_grid_size:  options['cluster_grid_size'] != undefined ? options['cluster_grid_size'] : Map.cluster_grid_size,
            scrollwheel:        false
        };
    }, // end setOptions

    /*
    Prepare data for map rendering
     */
    render: function(idMap)
    {
        if (Map.maps[idMap] == undefined) {
            Map.setOptions(idMap);
        }

        var mapCenter = new google.maps.LatLng(Map.maps[idMap]['center_latitude'], Map.maps[idMap]['center_longitude']),
            mapOptions = {
                center:         mapCenter,
                zoom:           Map.maps[idMap]['zoom'],
                mapTypeId:      google.maps.MapTypeId.ROADMAP,
                scrollwheel:    false
            },
            marker,
            infoBox,
            i;

        Map.maps[idMap]['map'] = new google.maps.Map(document.getElementById(idMap), mapOptions);

        for (i = 0; i < Map.maps[idMap]['locations'].length; i++) {
            marker = new google.maps.Marker({
                position:   new google.maps.LatLng(Map.maps[idMap]['locations'][i].latitude, Map.maps[idMap]['locations'][i].longitude),
                map:        Map.maps[idMap]['map'],
                icon:       Map.maps[idMap]['locations'][i].icon
            });

            infoBox = new InfoBox(
                {
                    latlng: marker.getPosition(),
                    map:    Map.maps[idMap]['map'],
                    html:   jQuery('.test_marker[data-id=' + Map.maps[idMap]['locations'][i].id + ']').html(),
                    height: Map.infobox_holder.outerHeight(),
                    width:  Map.infobox_holder.outerWidth()
                }
            );

            infoBox.setMap(null);

            if (Map.maps[idMap]['info_boxes'] == undefined) {
                Map.maps[idMap]['info_boxes'] = [];
            }

            Map.maps[idMap]['info_boxes'].push(infoBox);

            google.maps.event.addListener(marker, 'click', (function (marker, i, infoBox) {
                return function() {
                    var was_opened = !!infoBox.getMap();

                    for (var m = 0, n = Map.maps[idMap]['info_boxes'].length; m < n; m++) {
                        Map.maps[idMap]['info_boxes'][m].setMap(null);
                    }

                    if (!was_opened) {
                        infoBox.setMap(Map.maps[idMap]['map']);
                    }
                }
            })(marker, i, infoBox));

            if (Map.maps[idMap]['markers'] == undefined) {
                Map.maps[idMap]['markers'] = [];
            }

            marker.setMap(Map.maps[idMap]['map']);
            Map.maps[idMap]['markers'].push(marker);
        }

        // fix for map centering
        setTimeout(function() {
            Map.maps[idMap]['map'].setCenter(mapCenter);
        }, 200);

        var markerCluster = new MarkerClusterer(Map.maps[idMap]['map'], Map.maps[idMap]['markers']);
        markerCluster.setGridSize(Map.maps[idMap]['cluster_grid_size']);
    }, // end render

    /*
    Clear all info windows for map by identifier
     */
    clearInfoWindows: function(idMap)
    {
        if (Map.maps[idMap]['info_boxes'] != undefined) {
            Map.maps[idMap]['info_boxes'] = [];
        }
    }, // end clearInfoWindows

    /*
     Clear all markers for map by identifier
     */
    clearMarkers: function(idMap)
    {
        if (Map.maps[idMap]['markers'] != undefined) {
            Map.maps[idMap]['markers'] = [];
        }
    }, // end clearMarkers

    resize: function(idMap)
    {
        google.maps.event.trigger(Map.maps[idMap]['map'], "resize");
    }, // end resizeMap

    setCenter: function(idMap, latitude, longitude)
    {
        if (Map.maps[idMap]['map'] == undefined) {
            return false;
        }

        if (latitude == undefined) {
            latitude = Map.center_latitude;
        }

        if (longitude == undefined) {
            longitude = Map.center_longitude;
        }

        Map.maps[idMap]['map'].setCenter(new google.maps.LatLng(latitude, longitude));
    }, // end setCenter

    showOffice: function(context)
    {
        var latitude = jQuery(context).data('latitude'),
            longitude = jQuery(context).data('longitude');

        Map.changeMapShowType('map');
        Map.setCenter('map-onpage-canvas', latitude, longitude);
        Map.setZoom('map-onpage-canvas', Map.zoom_close);
        Map.scrollToMap();
    },

    filter: function()
    {
        var data = jQuery('#filter_offices_form').serializeArray();
        data.push({name: 'type', value: Map.type});

        jQuery.ajax({
            url:        '/map/filter',
            type:       'POST',
            dataType:   'json',
            cache:      false,
            data:       data,
            success:    function(response) {
                if (!response.status) {
                    showSuccessMessage(Translator.t('Что-то пошло не так'));
                }

                var idMap = 'map-onpage-canvas',
                    offices = jQuery.parseJSON(response.offices);

                jQuery('#map-offices-popups').html(response.html);
                jQuery('.atm_map_list_holder .atm_map_list').html(response.html_list);

                Map.clearMarkers(idMap);
                Map.clearInfoWindows(idMap);

	            Map.setLocations(idMap, offices);
                Map.setZoom(idMap, Map.zoom);

                if (offices.length) {
                    Map.setCenterLatitude(idMap, offices[0]['latitude']);
                    Map.setCenterLongitude(idMap, offices[0]['longitude']);
                } else {
                    Map.setCenterLatitude(idMap, Map.center_latitude);
                    Map.setCenterLongitude(idMap, Map.center_longitude);
                }

	            Map.render(idMap);
            }
        });
    }, // end filter

    initFilterOfficesFormValidation: function()
    {
        var $validator = jQuery('#filter_offices_form').validate({
            rules: {
                'search' : { required : true }
            },

            messages: {
                'search' : { required : '' }
            },

            submitHandler : function(form) {
                Map.filter();
            },

            errorPlacement : function(error, element) {

            }
        });
    }, // end initFilterOfficesFormValidation

    /*
     Bind change office type event
     */
    initChangeOfficeType: function()
    {
        jQuery('.atms_filters_tabs_head .tab').click(function() {
            if (jQuery(this).hasClass('act')) {
                Map.type = jQuery('.atms_filters_tabs_head .tab.act').data('office-type');
            }

            Map.filter();
        });
    }, // end initChangeOfficeType

    initChangeAtmType: function()
    {
        jQuery('input[name="atm_types[]"]').parent().click(function() {
            var subTypesContainer = jQuery('input[name="atm_subtypes[]"]').parent().parent().parent(),
                atmTypes = [];

            jQuery.each($("input[name='atm_types[]']:checked"), function() {
                atmTypes.push(jQuery(this).val());
            });

            if (jQuery.inArray('alfa', atmTypes) != -1) {
                subTypesContainer.show();
            } else {
                subTypesContainer.hide();
            }

            Map.filter();
        });
    }, // end initChangeAtmType

    initChangeAtmSubtype: function()
    {
        jQuery('input[name="atm_subtypes[]"]').parent().click(function() {
            Map.filter();
        });
    }, // end initChangeAtmSubtype

    changeMapShowType: function(type)
    {
        if (type == 'map') {
            jQuery('.type_map').addClass('act');
            jQuery('.type_list').removeClass('act');

            jQuery('.atm_map_holder').show();
            jQuery('.atm_map_list_holder').hide();

            Map.resize('map-onpage-canvas');
            Map.setCenter('map-onpage-canvas');

        } else if (type == 'list') {
            jQuery('.type_map').removeClass('act');
            jQuery('.type_list').addClass('act');

            jQuery('.atm_map_holder').hide();
            jQuery('.atm_map_list_holder').show();
        }
    }, // end changeShowType

    scrollToMap: function()
    {
        jQuery('html, body').animate({
            scrollTop: jQuery("#map-onpage-canvas").offset().top - 100
        }, 100);
    } // end scrollToMap
};

jQuery(document).ready(function() {
    Map.init();
});
