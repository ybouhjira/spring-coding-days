<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Espace d'administration</title>
    <link rel="stylesheet" href="../web/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" 
        href="../web/bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../web/css/admin_index.css" />
    <script src="../web/bootstrap/js/bootstrap.min.js" ></script>
</head>
<body>
    <table>
        <tr>
            <td>
                <div class="container-fluid form-wrapper">
                    <h1>Bienvenue</h1>
                    {if $displayError == true}
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">
                            &times;
                        </button>
                        <strong>Erreur!</strong> E-mail ou mot de passe erronés
                    </div>
                    {/if}
                    <form action="panel.php" method="post" >
                        <div class="row-fluid">
                            <div class="input-prepend span12">
                                <span class="add-on">
                                    <i class="icon-user"></i>
                                </span>
                                <input type="text" name="user" maxlength="45"
                                    placeholder="Nom d'utilisateur"/>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="input-prepend span12">
                                <span class="add-on">
                                    <i class="icon-lock"></i>
                                </span>
                                <input type="password" name="pass"
                                    maxlength="45" placeholder="Mot de passe"/>
                            </div>
                        </div>
                    <div id="submit-container">
                        <input type="submit" value="Se connecter" 
                            class="btn btn-primary"/>
                    </div>
                    </form>
                </div>
            </td>
            </tr>
        </table>
</body>
</html>
