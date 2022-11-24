<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/grid.css">
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

    <section class="theme" id="home" style="height: 100vh;display:grid">
        <div style="width:100%;overflow:hidden;border-radius:0 0 90vh 0;object-fit:cover">
            <img src="images/candi_kategori.png" alt="" style="object-fit:cover;width:100%;height:100%;border-radius:0 0 90vh">
        </div>
    </section>
    <br><br>
    <section>
        <section class="section-up">
            <p class="text-bg">Popular Destination</p>
        </section>
        <section class="section-down" style="display: block;">
            <div class="popular" style="padding-right:30px;">
                <div style="height:100%;width:40%;margin-right:30px">
                    <img src="images/images.png" style="height:100%; max-width:100%;object-fit:cover;border-radius:40px;">
                </div>
                <div style="height:100%;width:70%;margin-top:30px">
                    <p class="text-bg">Candi Borobudur</p>
                    <p class="text-sm" style="text-align: left;line-height:25px">Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a class="button-search" style="position:absolute; bottom: 0; right:0;margin-right:30px;margin-bottom:30px" href="#"><strong>Details &#8594</strong></a>

                </div>

            </div>
        </section>
        <section class="section-down" style="display: block;">
            <div class="popular"  style="z-index:-100">
                <div style="height:100%;width:30%;">
                    <img src="images/image.png" style="height:100%; max-width:100%;object-fit:cover;border-radius:40px;">
                </div>
                <div style="height:100%;width:70%;margin-top:30px">
                    <p class="text-bg">Candi Prambanan</p>
                    <p class="text-sm" style="text-align: left;line-height:25px">Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a class="button-search" style="position:absolute; bottom: 0; right:0;margin-right:30px;margin-bottom:30px" href="#"><strong>Details &#8594</strong></a>
                </div>
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
            <p class="text-bg">Recommended</p>
        </section>
        <section class="section-down" style="padding: 30px 10px;">
            <main class="grid" style="width: 100%;">
                    <div class="box">
                        <a href=""><img src="images/candi.jpg" alt=""></a>
                    </div>
                    <div class="box">
                        <a href=""><img src="images/candi.jpg" alt=""></a>
                    </div>
                    <div class="box">
                        <a href=""><img src="images/candi.jpg" alt=""></a>
                    </div>
                    <div class="box">
                        <a href=""><img src="images/candi.jpg" alt=""></a>
                    </div>
                    <div class="box">
                        <a href=""><img src="images/candi.jpg" alt=""></a>
                    </div>
                    <div class="box">
                        <a href=""><img src="images/candi.jpg" alt=""></a>
                    </div>
            </main>
        </section>
    </section>

    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min"></script>
</body>

</html>