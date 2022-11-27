<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="leaflet/leaflet.css" type="text/css">
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
        require("class/events.php");
        require("class/contents.php");

        $event = new Events("localhost", "root", "", "local_culture");
        $content = new Contents("localhost", "root", "", "local_culture");

        $id = $_GET['eventid'];
        $res = $event->ShowEvent($id);

        if (!$row = $res->fetch_assoc()) {
            die("Error Event id!");
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
        <div class="container" style="justify-content: left;align-items: left;margin-top:0px;margin-bottom:0px;height:fit-content">
            <div style="height: 30px;position:relative;width:fit-content;padding-left:5px;">
                <img src="images/calendar.png" style="height: 100%;"><span style="font-size:20px;line-height:30px;position:absolute;width:200px;color:black"> &nbsp; <?=date("d M Y", strtotime($row['date']))?></span>
            </div>
        </div>
    </section>
    <br><br>

    <?php
        $contents = $content->ShowContentsByID($id);
        while ($row = $contents->fetch_assoc()) {
            echo "<section>";
            echo "<section class='section-up'>";
            echo "<p class='text-bg'>".$row['title']."</p>";
            echo "</section>";
            echo "<section class='section-down' style='padding: 30px 10px;margin-top:0;padding-top:10px'>";
            echo "<p class='text-sm' style='text-align: justify;color:black;margin-left:0;margin-top:0;line-height:20px'>".$row['article']."</p>";
            echo "</section>";
            echo "<section class='section-down' style='padding: 10px;height:70vh;object-fit:cover;margin-top:0;padding-top:0'>";
            echo "<img src='".$row['image']."' alt='' style='width: 100%; height: 100%;object-fit:cover'>";
            echo "</section>";
            echo "</section>";
            echo"<br><br>";
        }
    ?>

    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
</body>

</html>