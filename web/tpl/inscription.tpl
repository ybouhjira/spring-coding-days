{extends "$SITEDIR/web/tpl/base.tpl"}

{block stylesheets }
<link rel="stylesheet" href="/{$SUBDIR}/web/css/inscription.css" />
{/block }

{block scripts}
<script src="/{$SUBDIR}/web/js/inscription.form_toggle.js"></script>
{/block}

{block left_column }
<h2> Inscription </h2>
<form 
    action="controlers/binomes.php" 
    id="inscrip-form" 
    method="post"
    enctype="multipart/form-data"
    >
    {* EQUIPE ----------------------------------------------------------------*}
    <fieldset>
        <legend>Equipe</legend> 
        <div class="row">
            <label>
                <input name="equipe" type="radio" value="binome" id="bin-radio"/>
                Binôme
            </label>
        </div>
        <div class="row">
            <label>
                <input name="equipe" type="radio" checked="checked"
                    value="monome"/>
                Monôme
            </label>
        </div>
    </fieldset>

    {* PC -------------------------------------------------------------------- *}
    <fieldset>
        <legend>PC</legend>
        <div class="row">
            <label>
                <input name="pc" type="checkbox" />
                Nous allons utiliser notre propre PC
            </label>
        </div>
    </fieldset>

    {* BINOMES ----------------------------------------------------------------*}
    {for $i=1 to 2 }
        <fieldset id="fieldset-bin{$i}">
            <legend>Binôme {$i}</legend>
            <div class="row">
                <label>Nom : </label>
                <input name="nom{$i}" type="text" maxlength="45"/>
            </div>
            <div class="row">
                <label>Prénom : </label>
                <input name="prenom{$i}" type="text" maxlength="45"/>
            </div>
            <div class="row">
                <label>Date de naissance : </label>
                <input name="date_naiss{$i}" type="date" 
                    maxlength="45" placeholder="YYYY-MM-JJ"/>
            </div>
            <div class="row">
                <label>Adresse : </label>
                <textarea  name="adresse{$i}" maxlength="500">
                </textarea>
            </div>
            <div class="row">
                <label>Ville : </label>
                <input name="ville{$i}" type="text" maxlength="45"/>
            </div>
            <div class="row">
                <label>Numéro de téléphone : </label>
                <input  name="tel{$i}" type="text" maxlength="20"/>
            </div>
            <div class="row">
                <label>e-mail : </label>
                <input  name="email{$i}" type="email" maxlength="45"/>
            </div>
            <div class="row">
                <label>Etablissement : </label>
                <input name="etab{$i}" type="text" maxlength="45"/>
            </div>
            <div class="row">
                <label>Fillière : </label>
                <input name="filliere{$i}" type="text" maxlength="45"/>
            </div>
            <div class="row">
                <label>Niveau : </label>
                <input name="niveau{$i}" type="text" maxlength="45"/>
            </div>
        </fieldset>
    {/for}
    {* BUTTON ENVOYER ----------------------------------------------------*}
    <div class="row center"><input type="submit" value="Envoyer" /></div>
{/block }

{block right_column }
{include "{$SITEDIR}/web/tpl/contact_info.tpl"}
{/block }
