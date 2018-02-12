<section id="contacts">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h2 class="centered">Наши Контакты</h2>
                <p class="centered">Как нам удаётся доставлять еду в срок и горячей? Мы специально выбрали офис с учетом територи в которую осуществляем доставку блюд, наши курьеры очень пунктуальны!Ознакомтесь с расположением на карте.</p>
            </div>
        </div>
    </div>
</section>
<section id="map">
    <div id="map_wrap">

    </div>
</section>
<script>
    function initMap() {
        var kotovka = {lat: 46.563939, lng: 30.715848};
        var kryzhanovka = {lat: 46.561253, lng: 30.796915};
        var fontanka = {lat: 46.561489, lng: 30.862778};
        var vapnirka = {lat: 46.570933, lng: 30.889765};
        var chernomorskoye = {lat: 46.585063, lng: 30.945040};
        var gvardeyskoe = {lat: 46.602374, lng: 30.957099};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: kryzhanovka,
            scrollwheel: false,
            styles: [
                {
                    "featureType": "administrative.land_parcel",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.neighborhood",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.business",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ecfaf0"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#f7aca9"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#f4aaaa"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#f8fafa"
                        },
                        {
                            "weight": 1.5
                        }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "stylers": [
                        {
                            "color": "#f4f4f4"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#b8e8f8"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                }
            ],
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });


        var overlay;
        USGSOverlay.prototype = new google.maps.OverlayView();
        var bounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(46.507801,30.679951),
            new google.maps.LatLng(46.626111,  31.013313));


        var srcImage = './striped_area.png';

        // The custom USGSOverlay object contains the USGS image,
        // the bounds of the image, and a reference to the map.
        overlay = new USGSOverlay(bounds, srcImage, map);



        var contentString = '<div id="content">Тут всё то про что должно быть рассказано</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        var marker = new google.maps.Marker({
            position: kotovka,
            map: map,
            title: 'Котовка',
            icon: {
                url: "img/marker.svg",
                scaledSize: new google.maps.Size(64, 58)
            }
        });
        google.maps.event.addListener(marker, 'mouseover', function() {
            infowindow.open(map,marker);
        });

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        var marker2 = new google.maps.Marker({
            position: kryzhanovka,
            map: map,
            title: 'Крыжановка',
            icon: {
                url: "img/marker.svg",
                scaledSize: new google.maps.Size(64, 58)
            }


        });
        google.maps.event.addListener(marker2, 'click', function() {
            infowindow.open(map,marker2);
        });

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        var marker3 = new google.maps.Marker({
            position: fontanka,
            map: map,
            title: 'Фонтанка',
            icon: {
                url: "img/marker.svg",
                scaledSize: new google.maps.Size(64, 58)
            }

        });
        google.maps.event.addListener(marker3, 'click', function() {
            infowindow.open(map,marker3);
        });

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        var marker4 = new google.maps.Marker({
            position: vapnirka,
            map: map,
            title: 'Вапнярка',
            icon: {
                url: "img/marker.svg",
                scaledSize: new google.maps.Size(64, 58)
            }

        });
        google.maps.event.addListener(marker4, 'click', function() {
            infowindow.open(map,marker4);
        });

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        var marker5 = new google.maps.Marker({
            position: chernomorskoye,
            map: map,
            title: 'Черноморское',
            icon: {
                url: "img/marker.svg",
                scaledSize: new google.maps.Size(64, 58)
            }

        });
        google.maps.event.addListener(marker5, 'click', function() {
            infowindow.open(map,marker5);
        });

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        var marker6 = new google.maps.Marker({
            position: gvardeyskoe,
            map: map,
            title: 'Гвардейское',
            icon: {
                url: "img/marker.svg",
                scaledSize: new google.maps.Size(64, 58)
            }

        });
        google.maps.event.addListener(marker6, 'click', function() {
            infowindow.open(map,marker6);
        });

        USGSOverlay.prototype.onAdd = function() {

            var div = document.createElement('div');
            div.style.borderStyle = 'none';
            div.style.borderWidth = '0px';
            div.style.position = 'absolute';

            // Create the img element and attach it to the div.
            var img = document.createElement('img');
            img.src = this.image_;
            img.style.width = '100%';
            img.style.height = '100%';
            img.style.position = 'absolute';
            div.appendChild(img);

            this.div_ = div;

            // Add the element to the "overlayLayer" pane.
            var panes = this.getPanes();
            panes.overlayLayer.appendChild(div);
        };

        USGSOverlay.prototype.draw = function() {

            // We use the south-west and north-east
            // coordinates of the overlay to peg it to the correct position and size.
            // To do this, we need to retrieve the projection from the overlay.
            var overlayProjection = this.getProjection();

            // Retrieve the south-west and north-east coordinates of this overlay
            // in LatLngs and convert them to pixel coordinates.
            // We'll use these coordinates to resize the div.
            var sw = overlayProjection.fromLatLngToDivPixel(this.bounds_.getSouthWest());
            var ne = overlayProjection.fromLatLngToDivPixel(this.bounds_.getNorthEast());

            // Resize the image's div to fit the indicated dimensions.
            var div = this.div_;
            div.style.left = sw.x + 'px';
            div.style.top = ne.y + 'px';
            div.style.width = (ne.x - sw.x) + 'px';
            div.style.height = (sw.y - ne.y) + 'px';
        };

        // The onRemove() method will be called automatically from the API if
        // we ever set the overlay's map property to 'null'.
        USGSOverlay.prototype.onRemove = function() {
            this.div_.parentNode.removeChild(this.div_);
            this.div_ = null;
        };
    }

    function USGSOverlay(bounds, image, map) {

        // Initialize all properties.
        this.bounds_ = bounds;
        this.image_ = image;
        this.map_ = map;

        // Define a property to hold the image's div. We'll
        // actually create this div upon receipt of the onAdd()
        // method so we'll leave it null for now.
        this.div_ = null;

        // Explicitly call setMap on this overlay.
        this.setMap(map);
    }

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZPVdAppT5m8saoS-WP0usdRn1JCDUJus&callback=initMap">
</script>