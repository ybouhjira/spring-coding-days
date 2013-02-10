{extends "$SITEDIR/web/tpl/admin_base.tpl"}

{block content}
<table class="table">
    <tr>
        <td>ID</td>
        <td> {$particip->id_participant|escape} </td>
    </tr>
    <tr>
        <td>Nom</td>
        <td> {$particip->nom|escape} </td>
    </tr>
    <tr>
        <td>Prenom</td>
        <td> {$particip->prenom|escape} </td>
    </tr>
    <tr>
        <td>Adresse</td>
        <td> {$particip->adresse|escape} </td>
    </tr>
    <tr>
        <td>Tel</td>
        <td> {$particip->tel|escape} </td>
    </tr>
    <tr>
        <td>Etab</td>
        <td> {$particip->etab|escape} </td>
    </tr>
    <tr>
        <td>Niveau</td>
        <td> {$particip->niveau|escape} </td>
    </tr>
    <tr>
        <td>Email</td>
        <td> {$particip->email|escape} </td>
    </tr>
    <tr>
        <td>Filliere</td>
        <td> {$particip->filliere|escape} </td>
    </tr>
    <tr>
        <td>Carte</td>
        <td><img src="/{$SUBDIR}/uploads/{$particip->id_participant}.jpg"/></td>
    </tr>
    <tr>
        <td>Ville</td>
        <td> {$particip->ville|escape} </td>
    </tr>
    <tr>
        <td>Equipe</td>
        <td> {$particip->id_equipe|escape} </td>
    </tr>
</table>
{/block}
