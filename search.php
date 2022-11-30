<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="leaflet/leaflet.css" type="text/css">
    <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script src="leaflet/leaflet.js" type="text/javascript"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        .carousel-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .lbl {
            transition: transform 400ms ease-out;
            display: inline-block;
            min-height: 100%;
            width: 100vw;
            height: 80vh;
            position: relative;
            z-index: 1;
            text-align: center;
            line-height: 100vh;
        }

        .carousel {
            position: absolute;
            top: 0;
            left: 0;
            /* bottom: 0; */
            right: 0;
            white-space: nowrap !important;
        }

        /* input {
            position: absolute;
        } */
    </style>
</head>

<body>
    <?php
    require("class/categories.php");
    require("class/places.php");
    require("class/events.php");
    $category = new Categories("localhost", "root", "", "local_culture");
    $place = new Places("localhost", "root", "", "local_culture");
    $event = new Events("localhost", "root", "", "local_culture");
    ?>
    <nav class="bar-navigation navigation-height" style="background-color: rgb(165, 91, 42);">
        <img style="height: 60px;width:auto;margin:0" src="images/presure.png" alt="logo" class="logo">

        <ul class="list-navigation invisible" style="margin-top: 0;margin-bottom:0">
            <li><a class="hover-anim" href="index.php">Home</a> </li>
            <li><a class="hover-anim" href="index.php#category">Category</a></li>
            <li><a class="hover-anim" href="index.php#events">Events</a></li>
            <li><a class="hover-anim" href="#">Search</a></li>
        </ul>
        <!-- <div class="right-navigation invisible">
            <input type="text" name="search" id="search">
            <button class="button button-search"> Search</button>
        </div> -->
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>

    <section id="search">
        <section class="section-up" style="margin:10px 10px;">
            <p class="text-bg">Search</p>
            <form action="" class="button-search" style="cursor: default;background-color: #C4A484;" method="get">
                <input class="button-search" type="text" name="inputText" style="color: white;cursor:auto;box-shadow:none !important;">
                <input class="button-search" type="submit" name="search" value="Search" style="box-shadow:none !important;">
            </form>
            <br>
            <div class="button-search" style="background-color: #C4A484;cursor:default" id="google_element"></div>
        </section>
        <section>
            <?php
            echo "<div style='display:grid; grid-template-columns: 1fr 1fr 1fr; column-gap:10px;'>";
            if (isset($_GET['search'])) {
                $showplaces = $place->ShowPlaceBySearch($_GET['inputText']);
                while ($row = $showplaces->fetch_assoc()) {
                    $placeid = $row['id'];
                    echo "<div class='cardEvents' style='margin:10px;height:fit-content;width: 100%;'>";
                    echo "<a href='detail.php?placeid=$placeid'><img src='" . $row['image_url'] . "' style='width:100%;height:180px;object-fit:cover;'></a>";
                    echo "";
                    echo "";
                    echo "<div class='containerEvents'>";
                    echo "<h3 style='margin-top:0'><b>" . $row['name'] . "</b></h3>";
                    echo "<p>" . substr($row['description'], 0, 150) . "..." . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                $showplaces = $place->ShowPlaceBySearch("");
                while ($row = $showplaces->fetch_assoc()) {
                    $placeid = $row['id'];
                    echo "<div class='cardEvents' style='margin:10px;height:fit-content;width: 100%;'>";
                    echo "<a href='detail.php?placeid=$placeid'><img src='" . $row['image_url'] . "' style='width:100%;height:180px;object-fit:cover;'></a>";
                    echo "<div class='containerEvents'>";
                    echo "<h3 style='margin-top:0'><b>" . $row['name'] . "</b></h3>";
                    echo "<p>" . substr($row['description'], 0, 150) . "..." . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            echo "</div>";
            ?>
        </section>
    </section>


    <br><br>
    <script>
        function loadGoogleTranslate() {
            new google.translate.TranslateElement("google_element");
        }
    </script>
    <script>
        var map = L.map('tempatpeta').setView([-1.6112196714063403, 116.26282356033973], 5); //menampilkan koordinat peta pada web, angka 13 menunjukkan seberapa besar zoomnya
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {});
        osm.addTo(map);

        var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });

        var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });

        var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });

        var baseMaps = {
            "OpenStreetMap": osm,
            "Google Street": googleStreets,
            "Google Satellite": googleSat,
            "Google Hybrid": googleHybrid
        };

        L.control.layers(baseMaps).addTo(map);

        var myIcon = L.icon({
            iconUrl: 'images/places.png',
            iconSize: [30, 40],
            iconAnchor: [15, 40],
        });
        var place1 = L.marker([<?php echo $arrayCoordinat[0] ?>], {
            icon: myIcon
        }).bindPopup("<?php echo $arrayPlace[0] ?>").addTo(map);
        var place2 = L.marker([<?php echo $arrayCoordinat[1] ?>], {
            icon: myIcon
        }).bindPopup("<?php echo $arrayPlace[1] ?>").addTo(map);
        var place3 = L.marker([<?php echo $arrayCoordinat[2] ?>], {
            icon: myIcon
        }).bindPopup("<?php echo $arrayPlace[2] ?>").addTo(map);
        var place4 = L.marker([<?php echo $arrayCoordinat[3] ?>], {
            icon: myIcon
        }).bindPopup("<?php echo $arrayPlace[3] ?>").addTo(map);
    </script>

    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
</body>

</html>