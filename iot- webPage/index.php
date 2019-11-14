<!DOCTYPE HTML>

<html>

<head>
    <title>Snapshot by TEMPLATED</title>
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
            background-color: #2196F3;
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
<?php
      
        if(isset($_GET['bool'])){
            $file = fopen("focos.txt", "w");
                    if(isset($_GET['foco1'])){
                        fwrite($file, "1" . PHP_EOL);
                    }else{
                        fwrite($file, "0" . PHP_EOL);
                    }
                    if(isset($_GET['foco2'])){
                        fwrite($file, "1" . PHP_EOL);
                    }else{
                        fwrite($file, "0" . PHP_EOL);
                    }
                    if(isset($_GET['foco3'])){
                        fwrite($file, "1" . PHP_EOL);
                    }else{
                        fwrite($file, "0" . PHP_EOL);
                    }
                   fclose($file); 
        }
                    
    
    $archivo=("focos.txt")or die ("No se puede abrir el archivo");
    $filas=file($archivo);
    $foco1=$filas[count($filas)-3];
    $foco2=$filas[count($filas)-2];
    $foco3=$filas[count($filas)-1];
    
   
    
                
                    $setmode13=shell_exec("/usr/local/bin/gpio -g mode 13 out");
                    $setmode5=shell_exec("/usr/local/bin/gpio -g mode 5 out");
                    $setmode6=shell_exec("/usr/local/bin/gpio -g mode 6 out");
                    if($foco1==1){    
                        shell_exec("/usr/local/bin/gpio -g write 13 1");
                    }else{
                        shell_exec("/usr/local/bin/gpio -g write 13 0");
                    }
                    if($foco2==1){
                        shell_exec("/usr/local/bin/gpio -g write 5 1");
                    }else{
                        shell_exec("/usr/local/bin/gpio -g write 5 0");
                    }
                    if($foco3==1){
                        shell_exec("/usr/local/bin/gpio -g write 6 1");
                    }else{
                        shell_exec("/usr/local/bin/gpio -g write 6 0");
                    }
    
    
    ?>

<body>
    <div class="page-wrap">

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="index.php" class="active"><span class="icon fa-home"></span></a></li>
                <li><a href="alarma.php"><span class="icon fa-bullhorn"></span></a></li>
                <li><a href="temperatura.php"><span class="icon fa-umbrella"></span></a></li>
            </ul>
        </nav>

        <!-- Main -->
        <section id="main">

            <!-- Banner -->
            

            <!-- LUCES -->
            <div class="container">
                <form action="index.php" name="f1" method="get">
                    <div class="inner">
                        <h1>Controle las luces de su hogar</h1>

                        <h2>Luces de cochera</h2>
                        <input type="hidden" name="bool">
                        <!-- Rounded switch -->
                        <label class="switch">
                            <input type="checkbox" name="foco1" <?php if($foco1==1){echo 'checked';} ?> onclick="f1.submit()">
                            <span class="slider round"></span>
                        </label>
                        <h2>Luces de Cocina</h2>

                        <!-- Rounded switch -->
                        <label class="switch">
                            <input type="checkbox" name="foco2" <?php if($foco2==1){echo 'checked';} ?> onclick="f1.submit()">
                            <span class="slider round"></span>
                        </label>
                        <h2>Luces de su cuarto</h2>

                        <!-- Rounded switch -->
                        <label class="switch">
                            <input type="checkbox" name="foco3" <?php if($foco3==1){echo 'checked';} ?> onclick="f1.submit()">
                            <span class="slider round"></span>
                        </label>

                    </div>
                </form>
                <?php
                    
                  
              
                ?>


            </div>

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
