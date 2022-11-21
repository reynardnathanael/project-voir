<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="leaflet/leaflet.css" type="text/css">
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
    <nav class="bar-navigation navigation-height" style="background-color: rgb(165, 91, 42);">
        <img src="images/logo.png" alt="logo" class="logo">

        <ul class="list-navigation invisible">
            <li><a class="hover-anim" href="#home">Home</a> </li>
            <li><a class="hover-anim" href="#about">About</a></li>
            <li><a class="hover-anim" href="#service">Services</a></li>
            <li><a class="hover-anim" href="#contact-block">Contact</a></li>
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
                    <input type="radio" name="fancy" autofocus value="clubs" id="clubs" />
                    <input type="radio" name="fancy" value="hearts" id="hearts" />
                    <input type="radio" name="fancy" value="spades" id="spades" />
                    <input type="radio" name="fancy" value="diamonds" id="diamonds" />
                    <label for="clubs" class="lbl">
                        <img src="images/lake.png" alt="" style="max-width: 100%; max-height: 100%;">
                    </label>
                    <label for="hearts" class="lbl">
                        <img src="images/lake.png" alt="" style="max-width: 100%; max-height: 100%;">
                    </label>
                    <label for="spades" class="lbl">
                        <img src="images/lake.png" alt="" style="max-width: 100%; max-height: 100%;">
                    </label>
                    <label for="diamonds" class="lbl">
                        <img src="images/lake.png" alt="" style="max-width: 100%; max-height: 100%;">
                    </label>

                </form>
            </div>
        </div>
    </section>

    <section>
        <section class="section-up">
            <p class="text-bg">Pick Your Category</p>
        </section>
        <section class="section-down">
            <div class="thumbnail">
                <img class="imgFluid" src="images/candi.jpg" alt="logo Image">
            </div>
            <div class="thumbnail">
                <img class="imgFluid" src="images/pantai.jpg" alt="logo Image">
            </div>
            <div class="thumbnail">
                <img class="imgFluid" src="images/air-terjun.jpg" alt="logo Image">
            </div>
            <div class="thumbnail">
                <img class="imgFluid" src="images/gunung.jpg" alt="logo Image">
            </div>
            <div class="thumbnail">
                <img class="imgFluid" src="images/gua.jpg" alt="logo Image">
            </div>
        </section>
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
            <p class="text-bg">Popular</p>
        </section>
        <section class="section-down" style="padding: 30px 10px;">
            <img src="images/lake.png" alt="" style="max-width: 100%; max-height: 100%;">
        </section>
    </section>

    <br><br>
    <hr>
    <br><br>

    <section>
        <section class="section-up">
            <p class="text-bg">Map</p>
        </section>
    </section>
    <br><br>
    <div id="tempatpeta" class="section-down" style="height: 300px;"></div>

    <div class="hr-end">
        <hr>
    </div>

    <br><br>
    <script>
        var map = L.map('tempatpeta').setView([-7.25745, 112.752087], 13); //menampilkan koordinat peta pada web, angka 13 menunjukkan seberapa besar zoomnya
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

    </script>

    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min"></script>
</body>

</html>