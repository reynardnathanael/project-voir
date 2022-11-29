<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tempat</title>
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
        require("class/categories.php");
        require("class/places.php");
        require("class/funfacts.php");
        require("class/events.php");
        require("class/hotels.php");

        $category = new Categories("localhost", "root", "", "local_culture");
        $place = new Places("localhost", "root", "", "local_culture");
        $funfact = new Funfacts("localhost", "root", "", "local_culture");
        $event = new Events("localhost", "root", "", "local_culture");
        $hotel = new Hotels("localhost", "root", "", "local_culture");

        $id = $_GET['placeid'];
        $placeData = $place->ShowPlaceByID($id);

        if (!$rowPlace = $placeData->fetch_assoc()) {
            die("Error Category id!");
        }
    ?>
    <nav class="bar-navigation navigation-height" style="background-color: rgb(165, 91, 42);z-index:100">
        <img style="height: 60px;width:auto;margin:0" src="images/presure.png" alt="logo" class="logo">

        <ul class="list-navigation invisible" style="margin-top: 0;margin-bottom:0">
            <li><a class="hover-anim" href="index.php">Home</a> </li>
            <li><a class="hover-anim" href="index.php#category">Category</a></li>
            <li><a class="hover-anim" href="index.php#events">Events</a></li>
            <li><a class="hover-anim" href="index.php#search">Search</a></li>
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

    <section class="theme" id="home" style="height: 80vh;">
        <div class="container">
            <div class="right-column">
                <form class="carousel">
                    <label for="img" class="lbl">
                        <img src="<?=$rowPlace['image_url']?>" style="width:100%;height:100%;object-fit:cover;box-shadow: 0 0 80px grey;">
                    </label>
                </form>
            </div>
        </div>
    </section>

    <section class="section-up">
        <div class="button-search" style="background-color: #C4A484;cursor:default" id="google_element"></div>
    </section>

    <section style="height:fit-content">
        <div class="container" style="padding: 0;justify-content: left;align-items: left;margin-top:0">
            <p class="font-title" style="color: black;font-size: 70px;margin:0"><b><?=$rowPlace['name']?></b></p>
        </div>
        <div class="container" style="margin-top: 0;">
            <div class="left-column">
                <p class="text-sm" style="text-align: left;color:black;margin-left:0;line-height:20px"><?=$rowPlace['description']?></p>
                <br>
                <?php
                    $cekhotel = $hotel->ShowHotelsLimit5($id);
                    if (mysqli_num_rows($cekhotel)==0) {
                        echo "<a id='failed' href='javascript:void(0)' class='button-search' style='width:210px;text-align:center'><strong>Looking for accomodation? &#8594</strong></a>";
                    }
                    else {
                        echo "<a href='hotel.php?placeid=$id' class='button-search' style='width:210px;text-align:center'><strong>Looking for accomodation? &#8594</strong></a>";
                    }
                ?>
            </div>
            <div class="right-column" style="align-items: right;padding:0">
                <div id="tempatpeta" style="height: 300px; width:400px;z-index:0;padding:0"></div>
            </div>
        </div>
    </section>
    <br><br>
    <section>
        <section class="section-down" style="padding: 30px 10px;object-fit:cover;height:70vh">
            <img src="<?= $rowPlace['image_url2'] ?>" alt="" style="width: 100%; height: 100%;object-fit:cover">
        </section>
    </section>

    <?php
        $funfacts = $funfact->ShowFunfact($id);
        while ($row = $funfacts->fetch_assoc()) {
            echo "<section>";
            echo "<section class='section-up'>";
            echo "<p class='text-bg'>".$row['title']."</p>";
            echo "</section>";
            echo "<section class='section-down' style='padding: 30px 10px;margin-top:0;padding-top:10px'>";
            echo "<p class='text-sm' style='text-align: justify;color:black;margin-left:0;margin-top:0;line-height:20px'>".$row['article']."</p>";
            echo "</section>";
            echo "<section class='section-down' style='padding: 10px;height:70vh;object-fit:cover;margin-top:0;padding-top:0'>";
            echo "<img src='".$row['image_url']."' alt='' style='width: 100%; height: 100%;object-fit:cover'>";
            echo "</section>";
            echo "</section>";
            echo"<br><br>";
        }
    ?>

    <section>
        <section class="section-up">
            <p class="text-bg">Events</p>
        </section>
        <section class="section-down">
            <?php
                $showevent = $event->ShowEventsByID($id);
                if (mysqli_num_rows($showevent)==0) {
                    echo "<span>Belum ada event yang berlangsung</span>";
                }
                else {
                    while ($row = $showevent->fetch_assoc()) {
                        $eventid = $row['id'];
                        
                        echo "<div class='cardEvents' style='margin:10px;height:fit-content;max-width:250px;'>";
                        echo "<a href='event.php?eventid=$eventid'>";
                        echo "<img src='". $row['image'] ."' style='width:100%;height:180px;object-fit:cover;'>";
                        echo "</a>";
                        echo "<div class='containerEvents'>";
                        echo "<p style='font-size:13px;color:grey;margin-bottom:0'>". date("M Y", strtotime($row['date'])) ."<p>";
                        echo "<h3 style='margin-top:0'><b>". $row['name'] ."</b></h3>";
                        echo "<p>". substr($row['description'], 0, 100) . "..." ."</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                
            ?>
        </section>
    </section>

    <script>
        function loadGoogleTranslate() {
            new google.translate.TranslateElement("google_element");
        }
    </script>
    <script>
        $(document).on("click", "#failed", function() {
            alert( "Maaf, belum ada hotel yang tersedia" );
        });
    </script>

    <script>
        var map = L.map('tempatpeta').setView([<?php echo $rowPlace['setpoint'] ?>], 13.5);
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
            iconUrl: 'images/places.png',
            iconSize: [30, 40],
            iconAnchor: [15, 40],
        }); 
        var place= L.marker([ <?php echo $rowPlace['setpoint'] ?>],{icon:myIcon}).bindPopup("<?php echo $rowPlace['name'] ?>").addTo(map);
    </script>

    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
</body>

</html>