<!DOCTYPE HTML>

<html>

<head>
    <title>Gallery - Snapshot by TEMPLATED</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #f3217a;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>
</head>

<body>
    <div class="page-wrap">

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="index.php"><span class="icon fa-home"></span></a></li>
                <li><a href="alarma.php" class="active"><span class="icon fa-bullhorn"></span></a></li>
                <li><a href="temperatura.php"><span class="icon fa-umbrella"></span></a></li>
            </ul>
        </nav>
        <!-- Main -->
        <section id="main">

            <!-- Header -->
            <header id="header">
                <div style="text-align:center;">Atención:<span style="color:rgb(227, 14, 71);">La alarma una vez activada tendrá que ser desactivada desde el boton junto a su Raspberry</span></div>
            </header>

            <div style="text-align:center;">
                <h2>Activar alarma</h2>
                <form action="alarma.php" method="get" name="f1">
                    <label class="switch">
                        <input type="checkbox" name="activar" <?php if(isset($_GET['activar'])){ echo 'checked'; } ?> onclick="f1.submit()"  >
                        <span class="slider round"></span>
                    </label>
                </form>
            </div>
            <?php
                if(isset($_GET['activar'])){
                    echo 'Alarm Desactivated';
                    shell_exec("python ../Sensor.py"); //Aqui se ejecuta la alarma 
                }
            
            ?>
            
            <!-- Footer -->
            <footer id="footer">
                <div class="copyright">
                    Developed By Moisy
                </div>
            </footer>
        </section>
    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.poptrox.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
