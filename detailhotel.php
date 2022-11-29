<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Hotel</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="leaflet/leaflet.css" type="text/css">
    <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script src="leaflet/leaflet.js" type="text/javascript"></script>

    <style>
        * {
            box-sizing: border-box;
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
    </style>
</head>

<body>
    <?php
        require("class/hotels.php");

        $hotel = new Hotels("localhost", "root", "", "local_culture");
        $id = $_GET['hotelid'];
        $res = $hotel->ShowHotelByID($id);

        if (!$row = $res->fetch_assoc()) {
            die("Error Hotel id!");
        }
    ?>
    <nav class="bar-navigation navigation-height" style="background-color: rgb(165, 91, 42);z-index:100">
        <img src="images/logo.png" alt="logo" class="logo">

        <ul class="list-navigation invisible">
            <li><a class="hover-anim" href="index.php">Home</a> </li>
            <li><a class="hover-anim" href="index.php#category">Category</a></li>
            <li><a class="hover-anim" href="index.php#events">Events</a></li>
            <li><a class="hover-anim" href="index.php#search">Search</a></li>
        </ul>

        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>

    <section style="height:fit-content">
        <div class="container" style="justify-content: left;align-items: left;margin-top:20px">
            <p class="font-title" style="color: black;font-size: 60px;margin:0"><b><?=$row['name']?></b></p>
        </div>
        <section class="section-down" style="padding: 30px 5px;object-fit:cover;height:70vh">
            <img src="<?= $row['image'] ?>" alt="" style="width: 100%; height: 100%;object-fit:cover">
        </section>
    </section>
    <br><br>

    <section class="section-up">
        <div  class="button-search" style="background-color: #C4A484;cursor:default" id="google_element"></div>
    </section>

    <section style="height:fit-content">
        <div class="container" style="margin-top: 0;">
            <div class="left-column">
                <p class="text-sm" style="text-align: left;color:black;margin-left:0;line-height:20px"><?=$row['description']?></p>
                <br>
                <p class="text-sm" style="text-align: left;color:black;margin-left:0;line-height:20px">Alamat : <?=$row['address']?></p>
                <br>
                <a href="<?=$row['link']?>" class="button-search" target="_blank" style="width:100px;text-align:center"><strong>Website &#8594</strong></a>
            </div>
            <div class="right-column" style="align-items: right;padding:0">
                <div id="tempatpeta" style="height: 300px; width:400px;z-index:0;padding:0"></div>
            </div>
        </div>
    </section>
    <br><br>

    <script>
        function loadGoogleTranslate() {
            new google.translate.TranslateElement("google_element");
        }
    </script>
    <script>
        var map = L.map('tempatpeta').setView([<?php echo $row['coordinat'] ?>], 13.5);
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
			"Google Street":googleStreets,
			"Google Satellite": googleSat,
			"Google Hybrid":googleHybrid
		};
        
        L.control.layers(baseMaps).addTo(map);

        var myIcon = L.icon({
            iconUrl: 'images/hotels.png',
            iconSize: [30, 40],
            iconAnchor: [15, 40],
        }); 
        var place= L.marker([ <?php echo $row['coordinat'] ?>],{icon:myIcon}).bindPopup("<?php echo $row['name'] ?>").addTo(map);

    </script>

    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
</body>

</html>