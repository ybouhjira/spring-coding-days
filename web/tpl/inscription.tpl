{extends file="$SITEDIR/web/tpl/base.tpl"}

{block name=stylesheets }
<link rel="stylesheet" href="/{$SUBDIR}/web/css/inscription.css" />
{/block }

{block name=left_column }
<h2> Inscription </h2>
<form action="#">
    {* EQUIPE ----------------------------------------------------------------*}
    <fieldset>
        <legend>Equipe</legend> 
        <div class="row">
            <label>
                <input name="equipe" type="radio" />
                Binôme
            </label>
        </div>
        <div class="row">
            <label>
                <input name="equipe" type="radio" checked="checked" />
                Monôme
            </label>
        </div>
    </fieldset>

    <fieldset>
        <legend>PC</legend>
        <div class="row">
            <label>
                <input name="pc" type="checkbox" />
                Nous allons utiliser notre propre PC
            </label>
        </div>
    </fieldset>

    {* BINOME 1 ---------------------------------------------------------------*}
    {for $i=1 to 2 }
        <fieldset>
            <legend>Binôme {$i}</legend>
            <div class="row">
                <label>Nom : </label>
                <input name="nom{$i}" type="text" required="required" />
            </div>
            <div class="row">
                <label>Prénom : </label>
                <input name="prenom{$i}" type="text" required="required" />
            </div>
            <div class="row">
                <label>Date de naissance : </label>
                <input name="date_naiss{$i}" type="date" required="required" />
            </div>
            <div class="row">
                <label>Adresse : </label>
                <textarea  name="adresse{$i}" required="required"> </textarea>
            </div>
            <div class="row">
                <label>Numéro de téléphone : </label>
                <input  name="tel{$i}" required="required" type="text"/>
            </div>
            <div class="row">
                <label>e-mail : </label>
                <input  name="email{$i}" required="required" type="email"/>
            </div>
            <div class="row">
                <label>Etablissement : </label>
                <input name="etab{$i}" type="text" required="required" />
            </div>
            <div class="row">
                <label>Fillière : </label>
                <input name="filliere" type="text" required="required" />
            </div>
            <div class="row">
                <label>Niveau : </label>
                <input name="" type="text" required="required" />
            </div>
            <div class="row">
                <label>Carte d'étudiant : </label>
                <input name="carte{$i}" type="file" required="required"/>
            </div>
        </fieldset>
    {/for}
    {* BUTTON ENVOYER ----------------------------------------------------*}
    <div class="row center"><input type="submit" value="Envoyer" /></div>
{/block }

{block name=right_column }
{include "{$SITEDIR}/web/tpl/contact_info.tpl"}
{/block }
