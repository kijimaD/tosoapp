<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Sample_GoogleMap</title>

    <script src="http://maps.google.com/maps/api/js?key=AIzaSyC-OEDO1DrhAeJqpYyPFg0NHJlVU_z-7t0&language=ja"></script>

    <style>
        html {
            height: 100%
        }

        body {
            height: 100%
        }

        #map {
            height: 100%;
            width: 100%
        }
    </style>
    <script>
        function testmap() {
            var MyLatLng = new google.maps.LatLng(35.6811673, 139.7670516);
            var Options = {
                zoom: 15, //地図の縮尺値
                center: MyLatLng, //地図の中心座標
                mapTypeId: 'roadmap' //地図の種類
            };
            var map = new google.maps.Map(document.getElementById('map'), Options);
        }

        function startGmap() {
            var ns = google.maps,
                sw = new ns.LatLng(35.658871, 139.701238),
                ne = new ns.LatLng(35.71379, 139.777043),
                bounds = new ns.LatLngBounds(sw, ne),
                myLatlng = new ns.LatLng(35.687168, 139.757412),
                mapElement = document.getElementById("mapDiv"),
                mapOptions = {
                    zoom: 12,
                    center: myLatlng
                },
                map = new ns.Map(mapElement, mapOptions),
                rect = new ns.Rectangle({
                    map: map,
                    bounds: bouds
                });
        }
    </script>
</head>

<body>
    <div id="map"></div>
    <script>
        startGmap();
    </script>


</body>

</html>