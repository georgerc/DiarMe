<html>
<head>

    <style type="text/css">
        html { height: 100% }
        body { height: 100%; margin: 0; padding: 0; overflow-y:hidden}
        #map_canvas { height: 100% }
        #data {float:right}
        #separator {width:100%;height:1px;background-color: black}
        #bodyContent {text-indent:10px;font-size:16px;padding-top: 10px}
    </style>
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css"/>

    <script type="text/javascript"
            src=
            "http://maps.googleapis.com/maps/api/js?key=AIzaSyCxbk5ukq-Zx6NwXr27xS2Aboz16L5cCZs&sensor=false">
    </script>
    <script src="<?php echo base_url() ?>js/oms.min.js"></script>

    <script type="text/javascript">
        window.onload = function() {

            var locations = [
                <?php foreach ($posts as $post) {
                $title = $post->journal_title;
                $text = $post->journal_text;
                $data = $post->odata;
                $text = str_replace(array("\r", "\n"), ' ', $text);
                $data = str_replace(array("\r", "\n"), ' ', $data);
                echo '["' . $title . '",' . $post->latitude . ',' . $post->longitude . ',"' . $text . '","' . $data . '"],';
            }?>

            ];


            var myOptions = {
                center: new google.maps.LatLng(42, 30),
                zoom: 4,
                mapTypeId: google.maps.MapTypeId.HYBRID,
                disableDefaultUI: true,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true

            };
            var map = new google.maps.Map(document.getElementById("default"),
                myOptions);


            var gm = google.maps;

            var oms = new OverlappingMarkerSpiderfier(map, {keepSpiderfied: true});

            var iw = new gm.InfoWindow();
            oms.addListener('click', function (marker, event) {
                iw.setContent(marker.desc);
                iw.open(map, marker);
            });
            oms.addListener('spiderfy', function (markers) {
                iw.close();
            });

            for (var i = 0; i < locations.length; i++) {

                var titlu = locations[i][0];
                var lat = locations[i][1];
                var long = locations[i][2];
                var add = locations[i][3];
                var data = locations[i][4];
                latlngset = new google.maps.LatLng(lat, long);

                var icon = {
                    url: "<?php echo base_url(); ?>img/marker.png", // url
                    scaledSize: new google.maps.Size(50, 20), // scaled size
                    origin: new google.maps.Point(0, 0), // origin
                    anchor: new google.maps.Point(25, 10) // anchor
                };

                var marker = new google.maps.Marker({
                    map: map, title: titlu, position: latlngset, icon: icon
                });

                var content = '<div id="content">' +
                    '<div id="siteNotice">' +
                    '</div>' +
                    '<h1 id="firstHeading" class="firstHeading">' + titlu + '</h1><div id="separator"></div>' +
                    '<div id="bodyContent">' + add +
                    '</div>' + '<h3 id="data">' + data + '</h3>' +
                    '</div>';
                marker.desc=content;
                oms.addMarker(marker);  // <-- here
            }

        }

    </script>
</head>
<body>

<div id="default" style="width:100%; height:100%">

</div>

<a href="<?php echo base_url() ?>"><button class="btn btn-primary" style="position:fixed;left:5px;bottom:3px;z-index:9999;width:100px;height:40px">Home</button></a>


</body>
</html>

