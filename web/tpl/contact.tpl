{extends file="$SITEDIR/web/tpl/base.tpl"}

{block name=stylesheets }
<link rel="stylesheet" href="/{$SUBDIR}/web/css/inscription.css" />
<link rel="stylesheet" href="/{$SUBDIR}/web/css/contact.css" />
{/block }

{block name=left_column }
<form action="">
    <div class="row">
        <label>Nom : </label>
    <input name="nom" type="text" required="required" />
    </div>
    <div class="row">
        <label>E-mail : </label>
        <input name="email" type="text" required="required" />
    </div>
    <div class="row">
        <label>Message : </label>
        <textarea name="message"  required="required"></textarea>
    </div>
    <div class="row center">
        <input type="submit" value="Envoyer" />
    </div>
</form>
{/block }

{block name=right_column }
{include "{$SITEDIR}/web/tpl/contact_info.tpl"}
{/block }
