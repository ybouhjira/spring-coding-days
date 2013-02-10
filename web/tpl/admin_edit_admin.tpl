{extends "$SITEDIR/web/tpl/admin_base.tpl"}

{block content}
<form action="controlers/admin_edit.php" method="post" class="form-horizontal">
    <fieldset>
        <legend>Modifier les identifiants de l'administrateur</legend>
        <div class="control-group">
            <label class="control-label">Nom d'utilisateur</label>
            <div class="controls">
                <input name="username" type="text" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Mot de passe actuel</label>
            <div class="controls">
                <input name="password" type="password" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Nouveau nom d'utilisateur</label>
            <div class="controls">
                <input name="new_username" type="text" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Nouveau mot de passe</label>
            <div class="controls">
                <input name="new_password" type="password" />
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </fieldset>
</form>
{/block}
