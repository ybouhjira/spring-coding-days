<!DOCTYPE html>
<html>
<head>
    <title>Espace d'administration</title>
    <link href="/{$SUBDIR}web/css/panel.css" rel="stylesheet" />
    <link rel="stylesheet" href="../web/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" 
        href="../web/bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../web/css/admin_index.css" />
    <script src="../web/bootstrap/js/bootstrap.min.js" ></script>
</head>
<body>
    {*--NAVBAR --------------------------------------------------------------- *}
    <div class="navbar primary-navbar">
      <div class="navbar-inner">
        <a class="brand" href="/{$SUBDIR}">SmartBuy</a>

        {* NAVBAR BUTTONS AND DROPDOWNS----------------------------------------*}
        <ul class="nav">
            <li class="active">
                <a href="#"><i class="icon-home"></i> Acceuil </a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-shopping-cart"></i> Produits 
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                    <a href="product_add.php"> 
                        <i class="icon-plus"></i> Ajouter un produit
                    </a>
                </li>
                <li>
                    <a href="product_list.php">
                        <i class="icon-th-list"></i> Parcourir tous les produits
                    </a>
                </li>
              </ul>
            </li>
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
                <a href="#"><i class="icon-lock"></i> Changer les identifiants</a>
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
