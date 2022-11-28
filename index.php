<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="leaflet/leaflet.css" type="text/css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script src="leaflet/leaflet.js" type="text/javascript"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        .carousel-content {
            position: absolute; top: 50%;
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

        input {
            position: absolute;
        }

        .keys {
            position: fixed;
            z-index: 10;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1rem;
            color: #fff;
            text-align: center;
            transition: all 300ms linear;
            opacity: 0;
        }

        input:focus~.keys {
            opacity: 0.8;
        }

        input:nth-of-type(1):checked~.lbl:nth-of-type(1),
        input:nth-of-type(2):checked~.lbl:nth-of-type(2),
        input:nth-of-type(3):checked~.lbl:nth-of-type(3),
        input:nth-of-type(4):checked~.lbl:nth-of-type(4) {
            z-index: 0;
        }

        input:nth-of-type(1):checked~.lbl {
            transform: translate3d(0, 0, 0);
        }

        input:nth-of-type(2):checked~.lbl {
            transform: translate3d(-100%, 0, 0);
        }

        input:nth-of-type(3):checked~.lbl {
            transform: translate3d(-200%, 0, 0);
        }

        input:nth-of-type(4):checked~.lbl {
            transform: translate3d(-300%, 0, 0);
        }

        .lbl {
            background-size: cover;
            font-size: 3rem;
        }

        .lbl:before,
        .lbl:after {
            color: white;
            display: block;
            background: rgba(255, 255, 255, 0.2);
            position: absolute;
            padding: 1rem;
            font-size: 3rem;
            height: 10rem;
            vertical-align: middle;
            line-height: 10rem;
            top: 50%;
            transform: translate3d(0, -50%, 0);
            cursor: pointer;
        }

        .lbl:before {
            content: "\276D";
            right: 100%;
            margin-right: 1.5%;
            border-top-left-radius: 50%;
            border-bottom-left-radius: 50%;
        }

        .lbl:after {
            content: "\276C";
            left: 99.5%;
            border-top-right-radius: 50%;
            border-bottom-right-radius: 50%;
        }
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
        <img src="images/logo.png" alt="logo" class="logo">

        <ul class="list-navigation invisible">
            <li><a class="hover-anim" href="#">Home</a> </li>
            <li><a class="hover-anim" href="#category">Category</a></li>
            <li><a class="hover-anim" href="#events">Events</a></li>
            <li><a class="hover-anim" href="#search">Search</a></li>
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
                <!-- <img src="images/lake.png" alt="Company Logo" style="width: 70%;"> -->
                <form class="carousel">
                    <input type="radio" name="fancy" autofocus value="1" id="1" />
                    <input type="radio" name="fancy" value="2" id="2" />
                    <input type="radio" name="fancy" value="3" id="3" />
                    <input type="radio" name="fancy" value="4" id="4" />
                    <?php
                        $showplaces = $place->ShowPlacesLimitFour();
                        $counter = 1;
                        $arrayCoordinat = array();
                        $arrayPlace = array();
                        while ($row = $showplaces->fetch_assoc()) {
                            array_push($arrayCoordinat, $row['setpoint']);
                            array_push($arrayPlace, $row['name']);
                            echo "<label for='". $counter ."' class='lbl'>";
                            echo "<img src='". $row['image_url'] ."' alt='' style='width:100%;height:100%;object-fit:cover;clear:both'>";
                            echo "<h3 class='carousel-content' style='text-shadow: 0 0 10px black;'>". $row['name'] ."</h3>";
                            echo "<button class='carousel-content button-search'><a href='detail.php?placeid=".$row['id']."' style='color:white;text-decoration:none;height:100%;width:100%'>Read More &#8594</a></button>";
                            echo "</label>";
                            $counter++;
                        }
                    ?>

                </form>
            </div>
        </div>
    </section>

    <section id="category">
        <section class="section-up">
            <p class="text-bg">Pick Your Category</p>
        </section>
        <section class="section-down">
            <?php
                $showcat = $category->ShowCategories();
                while ($row = $showcat->fetch_assoc()) {
                    $categoryid = $row['id'];
                    echo "<div class='thumbnail'>";
                    echo "<a href='kategori.php?categoryid=$categoryid'><img class='imgFluid' src='". $row['img'] ."' alt='logo Image'></a>";
                    echo "</div>";
                }
            ?>
        </section>
    </section>
    <br>
    <br>

    <div class="hr-end">
        <hr>
    </div>
    <br>
    <br>

    <section id="events">
        <section class="section-up">
            <p class="text-bg">Current Events</p>
        </section>
        <section class="section-down">
            <?php
                $showevent = $event->ShowEventsLimitFour();
                while ($row = $showevent->fetch_assoc()) {
                    $eventid = $row['id'];
                    
                    echo "<div class='cardEvents' style='margin:10px;height:fit-content;'>";
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
            ?>
        </section>
    </section>

    <br><br>
    <hr>
    <br><br>

    <section id="search">
        <section class="section-up">
            <p class="text-bg">Search</p>
            <form action="" method="get">
                <input type="text" name="inputText" >
                <input type="submit" name="search" value="Search">
            </form>
            <br> 
        </section>
        <section class="section-down">
            <?php
            if(isset($_GET['search'])){
                $showplaces = $place->ShowPlaceBySearch($_GET['inputText']);
                while ($row = $showplaces->fetch_assoc()) {
                    $placeid = $row['id'];
                    echo "<div class='thumbnail'>";
                    echo "<a href='detail.php?placeid=$placeid' style='text-align:center;'><img class='imgFluid' src='". $row['image_url'] ."' alt='logo Image'>".$row['name']."</a>";
                    echo "</div>";
                }
            }
          
            ?>
        </section>
    </section>

    <br><br>
    <hr>
    <br><br>

    <section>
        <section class="section-up">
            <p class="text-bg">Maps</p>
        </section>
    </section>
    <br><br>
    <div id="tempatpeta" class="section-down" style="height: 500px;"></div>

    <div class="hr-end">
        <hr>
    </div>

    <br><br>
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
        var place1= L.marker([ <?php echo $arrayCoordinat[0] ?>],{icon:myIcon}).bindPopup("<?php echo $arrayPlace[0] ?>").addTo(map);
        var place2= L.marker([ <?php echo $arrayCoordinat[1] ?>],{icon:myIcon}).bindPopup("<?php echo $arrayPlace[1] ?>").addTo(map);
        var place3= L.marker([ <?php echo $arrayCoordinat[2] ?>],{icon:myIcon}).bindPopup("<?php echo $arrayPlace[2] ?>").addTo(map);
        var place4= L.marker([ <?php echo $arrayCoordinat[3] ?>],{icon:myIcon}).bindPopup("<?php echo $arrayPlace[3] ?>").addTo(map);

    </script>

    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
</body>

</html>