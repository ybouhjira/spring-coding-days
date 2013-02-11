{extends "/$SITEDIR/web/tpl/admin_base.tpl"}

{block active_inscriptions}active{/block}
{block content}

<table class="table table-bordered" >
    <tr>
        <td></td>
        <td>Nom</td>
        <td>Prénom</td>
        <td>Etablissement</td>
        <td>Ville</td>
        <td>Niveau</td>
        <td>Equipe</td>
        <td>PC</td>
    </tr>
    {foreach $particips as $p}
    <tr>
        <td style="width:1%">
            <a href="details.php?id={$p->id_participant}" class="btn">
                <i class="icon-file">
                </i>
            </a>
        </td>
        <td>{$p->nom|escape}</td>
        <td>{$p->prenom|escape}</td>
        <td>{$p->etab|escape}</td>
        <td>{$p->ville|escape}</td>
        <td>{$p->niveau|escape}</td>
        <td>{$p->id_equipe|escape}</td>
        <td>
            {if $p->pc}
                <i class="icon-ok"></i>
            {else}
                <i class="icon-remove"></i>
            {/if}
        </td>
    </tr>
    {/foreach}
</table>
{/block}
