<!DOCTYPE html>
<html>
<head>
    <title>Espace d'administration</title>
    <link rel="stylesheet" 
        href="/{$SUBDIR}/web/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" 
        href="/{$SUBDIR}/wweb/bootstrap/css/bootstrap-responsive.min.css" />
    <link href="/{$SUBDIR}/wweb/css/admin_index.css" rel="stylesheet"/>
    <link href="/{$SUBDIR}/web/css/panel.css" rel="stylesheet" />
    <script src="/{$SUBDIR}/web/js/jquery-1.9.0.min.js"></script>
    <script src="/{$SUBDIR}/web/bootstrap/js/bootstrap.min.js" ></script>
</head>
<body>
    {*--NAVBAR --------------------------------------------------------------- *}
    <div class="navbar primary-navbar">
      <div class="navbar-inner">
        <a class="brand" href="/{$SUBDIR}">Spring Coding Days</a>

        {* NAVBAR BUTTONS AND DROPDOWNS----------------------------------------*}
        <ul class="nav">
            <li class="active">
                <a href="#"><i class="icon-home"></i> Acceuil </a>
            </li>
            <li>
                <a href="#"><i class="icon-envelope"></i> Messages</a>
            </li>
            <li>
                <a href="#"><i class="icon-user"></i> Inscriptions</a>
            </li>
            <li><a href="#"><i class="icon-wrench"></i> Administrateurs </a></li>
        </ul>

        {* OPTIONS ------------------------------------------------------------*}
        <div class="btn-group pull-right">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-wrench"></i>
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="#"><i class="icon-user"></i> Se deconnecter</a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-lock"></i> Changer les identifiants
                </a>
            </li>
        </ul>
    </div>
      </div>
    </div>
    {*  CONTENT  ------------------------------------------------------------- *}
    <div class="container-fluid">
        {block name=content}{/block}
    </div>
</body>
</html>
