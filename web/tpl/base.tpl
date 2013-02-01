<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Spring Coding Days 3</title>
        <link rel="stylesheet" href="web/css/layout.css" />
    </head>
    <body>
        <h1>
            <img src="/{$SUBDIR}/web/img/logo.jpg" alt="" />
            Club Informatique ESTE
        </h1>
        <nav>
            <ul>
                <li><a href="#">Acceuil</a></li>
                <li><a href="#">Plus d'infos</a></li>
                <li><a href="#">Inscription</a></li>
                <li><a href="#">Contactez nous</a></li>
            </ul>
        </nav>
        <div class="jumbotron">
            <div class="imac-wrapper">
                <img src="web/img/imac.png" alt="Sprinf Coding Days 3" />
            </div>
            <div class="langs-canvas-wrapper center">
                <canvas width="300" height="180" id="langs-canvas"></canvas>
                <div class="button"> Inscrivez-vous! </div>
            </div>
        </div>
        <div id="content">
            <div id="left-col" class="column">
                {block name=left_column}{/block} 
            </div>
            <div id="right-col" class="column">
                {block name=right_column}{/block}
            </div>
        </div>
        <script src="/{$SUBDIR}/web/js/jquery-1.9.0.min.js"></script>
        <script src="/{$SUBDIR}/web/js/langs_canvas_animation.js"></script>
    </body>
</html>
