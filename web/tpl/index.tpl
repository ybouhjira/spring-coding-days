{extends file="$SITEDIR/web/tpl/base.tpl" }

{block name=stylesheets}
<link rel="stylesheet" href="/{$SUBDIR}/web/css/index.css" />
{/block}

{block name=left_column}
<h2>Le "Club Informatique" de l’ESTE vous souhaite la bienvenue</h2>
<p>
    Après la première édition de "Spring Coding Days " la compétition en
    programmation C/C++ et java, le club informatique de l’ESTE organise la 2ème
    édition de cette compétition et invite tous les étudiants ayant des
    connaissances au niveau de la programmation à s’inscrire en suivant ce lien.
</p>
<p>
    Les 3 premières équipes gagnantes de la compétition auront des prix de
    l’ESTE, remis lors de la cerémonie de clôture des portes ouvertes le 15 Mars
    2012. 
</p>
<p class="center">
    <img src="/{$SUBDIR}/web/img/scd1.jpg" alt="Affiche Spring Coding days" />
</p>
<p class="center">
    <img src="/{$SUBDIR}/web/img/scd2.jpg" alt="Affiche Spring Coding days" />
</p>
{/block}


{block name=right_column}
<h2>Les étapes de la compétition</h2>
<ul>
    <li>
        <img src="/{$SUBDIR}/web/img/icons/menu-editor.png" alt="icon"
        class="float" />
        <p>
        <h3>Inscription: </h3> 
            <a href="/{$SUBDIR}/inscription.php">ici</a>
            avant le 08/03/2012.
        </p>
    </li>
    <li>
        <img src="/{$SUBDIR}/web/img/icons/key.png" alt="icon" class="float"/>
        <p>
            <h3>Etape 1:</h3>
            Qualification à l’ESTE, le Samedi 10 Mars 2012 de 09h00 à 18h00. 
        </p>
    </li>
    <li>
        <img src="/{$SUBDIR}/web/img/icons/term.png" alt="icon" class="float"/>
        <p>
            <h3>Etape 2:</h3> 
            Phase finale à l’ESTE, Le Dimanche 11 Mars 2012 de 09h00 à 18h00.
        </p>
    </li>
</ul>
{/block}

