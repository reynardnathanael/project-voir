<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="leaflet/leaflet.css" type="text/css">
    <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script src="leaflet/leaflet.js" type="text/javascript"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        .popular1 {
            max-width: 100%;
            max-height: 100%;
            height: 60vh;
            background-size: cover;
            position: relative;
            display: flex;
        }

        .popular2 {
            max-width: 100%;
            max-height: 100%;
            height: 60vh;
            background-size: cover;
            position: relative;
            display: flex;
        }

        .link-wrap {
            width: 100%;
            height: 100%;
            align-self:flex-end;
            padding-top: 10px;
            padding-left: 10px;
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <?php
        require("class/places.php");
        require("class/hotels.php");
        $place = new Places("localhost", "root", "", "local_culture");
        $hotel = new Hotels("localhost", "root", "", "local_culture");
        $id = $_GET['placeid'];
        $res = $hotel->ShowSingleHotel($id);

        if (!$row = $res->fetch_assoc()) {
            die("Error Category id!");
        }
    ?>
    <nav class="bar-navigation navigation-height" style="background-color: rgb(165, 91, 42);">
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

    <section class="theme" id="home" style="height: 70vh;display:grid;margin:auto">
        <div style="width:100%;overflow:hidden;object-fit:cover;position:relative;border-bottom-left-radius: 25% 20%;border-bottom-right-radius: 25% 20%;border-top-left-radius: 0% 100%;border-top-right-radius: 0% 100%;justify-content: center;align-items: center;">
            <img src="<?=$row['image']?>" alt="" style="object-fit:cover;width:100%;height:100%;position:absolute">
            <h1 class="text-bg" style="font-size: 70px;color:white;display:block;position:absolute;top: 43%;left: 50%;transform: translate(-50%, -50%);text-shadow: 0 0 8px black">HOTEL</h1>
            <br>
            <p class="text-bg" style="font-size: 45px;color:white;display:block;position:absolute;top: 57%;left: 50%;transform: translate(-50%, -50%);text-shadow: 0 0 8px black;text-align:center;width:100%">Informasi Tempat Menginap</p>
        </div>
    </section>
    <br><br>

    <section class="section-up">
        <div  class="button-search" style="background-color: #C4A484;cursor:default" id="google_element"></div>
    </section>

    <section>
        <section class="section-up">
            <p class="text-bg">Recommended</p>
        </section>
        <div class='gbody'>
            <div class="gridContainer">
                <?php
                    $nameArray = array('gsidebar', 'gsidebar-1', 'content-1', 'content-2', 'content-3');
                    $count = 0;
                    $hotels = $hotel->ShowHotelsLimit5($id);
                    while ($row = $hotels->fetch_assoc()) {
                        echo "<div class='gitem ".$nameArray[$count]."' style='background-image: url(".$row['image'].");background-position: center;background-repeat: no-repeat;text-shadow:0 0 5px black'><a class='link-wrap' href='detailhotel.php?hotelid=".$row['id']."'>".$row['name']."</a></div>";
                        $count++;
                    }
                ?>
            </div>
        </div>
    </section>
    <script>
        function loadGoogleTranslate() {
            new google.translate.TranslateElement("google_element");
        }
    </script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
</body>

</html>