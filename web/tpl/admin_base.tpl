<!DOCTYPE html>
<html>
    <head>
        <title>Espace d'administration</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" 
        href="/{$SUBDIR}/web/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" 
        href="/{$SUBDIR}/wweb/bootstrap/css/bootstrap-responsive.min.css" />
        <link href="/{$SUBDIR}/wweb/css/admin_index.css" rel="stylesheet"/>
        <link href="/{$SUBDIR}/web/css/panel.css" rel="stylesheet" />
        {block stylesheets} {/block}
        <script src="/{$SUBDIR}/web/js/jquery-1.9.0.min.js"></script>
        <script src="/{$SUBDIR}/web/bootstrap/js/bootstrap.min.js" ></script>
    </head>
    <body>
        {*--NAVBAR ----------------------------------------------------------- *}
        <div class="navbar primary-navbar">
            <div class="navbar-inner">
                <a class="brand" href="/{$SUBDIR}">Spring Coding Days</a>

                {* NAVBAR BUTTONS AND DROPDOWNS--------------------------------*}
                <ul class="nav"> 
                    <li class="{block active_acceuil}{/block}">
                        <a href="panel.php"> <i class="icon-home"> </i> Acceuil </a>
                    </li>
                    <li class="{block active_messages}{/block}">
                        <a href="messages.php">
                            <i class="icon-envelope"></i> Messages
                        </a>
                    </li>
                    <li class="{block active_inscriptions}{/block}">
                        <a href="inscriptions.php">
                            <i class="icon-user"></i> Inscriptions
                        </a>
                    </li>
                </ul>

                {* OPTIONS ----------------------------------------------------*}
                <div class="btn-group pull-right">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="icon-wrench"></i>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/{$SUBDIR}/admin/logout.php">
                            <i class="icon-user"></i> Se deconnecter</a>
                        </li>
                        <li>
                            <a href="/{$SUBDIR}/admin/edit_admin.php">
                                <i class="icon-lock"></i> Changer les identifiants
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {*  CONTENT  --------------------------------------------------------- *}
        <div class="container-fluid">
            {block name=content}{/block}
        </div>
        {block javascript} {/block}
    </body>
</html>
