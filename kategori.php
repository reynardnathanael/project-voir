<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="leaflet/leaflet.css" type="text/css">
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
    </style>
</head>

<body>
    <?php
        require("class/categories.php");
        require("class/places.php");
        $category = new Categories("localhost", "root", "", "local_culture");
        $place = new Places("localhost", "root", "", "local_culture");
        $id = $_GET['categoryid'];
        $res = $category->ShowCategoryByID($id);

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

    <section class="theme" id="home" style="height: 100vh;display:grid">
        <div style="width:100%;overflow:hidden;border-radius:0 0 90vh 0;object-fit:cover;position:relative">
            <img src="<?=$row['img']?>" alt="" style="object-fit:cover;width:100%;height:100%;border-radius:0 0 90vh;position:absolute">
            <div style="background-color: rgba(0, 0, 0, 0.6); width:65%;height:90%;position:absolute;border-radius:0 0 90vh;padding:0 10% 0 3%">
                <div style="position: relative;top: 50%;transform: translateY(-50%);">
                    <h1 class="text-bg" style="font-size: 70px;color:white;display:block;"><?=$row['category']?></h1>
                        <strong><p class="text-sm" style="text-align:left;color:white;line-height:25px"><?=$row['description']?></p></strong>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section>
        <section class="section-up">
            <p class="text-bg">Popular Destination</p>
        </section>
        <!-- <section class="section-down" style="display: block;"> -->
            <?php
                $arr = array();
                $showplaces = $place->ShowPlacesLimitTwo($id);
                $counter = 1;
                while ($row = $showplaces->fetch_assoc()) {
                    $placeid = $row['id'];
                    array_push($arr, $placeid);
                    echo "<style>";
                    echo ".popular{$counter} ::before {
                        content: \"\";
                        background-image: url(". $row['image_url'] .");
                        background-size: cover;
                        position: absolute;
                        top: 0px;
                        right: 0px;
                        bottom: 0px;
                        left: 0px;
                        opacity: 0.08;
                        border-radius:40px;
                        z-index: -100;
                        box-shadow: 0 0 12px grey;
                    }";
                    echo "</style>";
                    echo "<section class='section-down' style='display: block;'>";
                    echo "<div class='popular{$counter}' style='padding-right:30px;'>";
                    echo "<div style='height:100%;width:40%;margin-right:30px'>";
                    echo "<img src='". $row['image_url'] ."' style='height:100%; max-width:100%;object-fit:cover;border-radius:40px;'>";
                    echo "</div>";
                    echo "<div style='height:100%;width:70%;margin-top:30px'>";
                    echo "<p class='text-bg'>". $row['name'] ."</p>";
                    echo "<p class='text-sm' style='text-align: left;line-height:25px'>". $row['description'] ."</p>";
                    echo "<a class='button-search' style='position:absolute; bottom: 0; right:0;margin-right:30px;margin-bottom:30px' href='detail.php?placeid=$placeid'><strong>Details &#8594</strong></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</section>";
                    $counter++;
                }
            ?>
    </section>
    <br>
    <br>

    <div class="hr-end">
        <hr>
    </div>
    <br>
    <br>

    <section>
        <section class="section-up">
            <p class="text-bg">Recommended</p>
        </section>
        <section class="section-down" style="padding: 30px 10px;">
            <?php
                $recom = $place->ShowPlacesLimitSix($id, $arr[0], $arr[1]);
                if (mysqli_num_rows($recom)==0) {
                    echo "<p>Belum ada rekomendasi</p>";
                }
                else {
                    echo "<main class='grid' style='width: 100%;'>";
                    while ($row2 = $recom->fetch_assoc()) {
                            echo "<div class='box'>";
                            echo "<a href='detail.php?placeid=".$row2['id']."'><img src='".$row2['image_url']."' alt=''></a>";
                            echo "</div>";
                        }
                    echo "</main>";
                }
            ?>
        </section>
    </section>

    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
</body>

</html>