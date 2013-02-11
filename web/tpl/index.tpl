{extends file="$SITEDIR/web/tpl/base.tpl" }

{block name=stylesheets}
<link rel="stylesheet" href="/{$SUBDIR}/web/css/index.css" />
{/block}

{block name=left_column}
<h2>Le "Club Informatique" de l’ESTE vous souhaite la bienvenue</h2>
<p>
    Après la troisième édition de "Spring Coding Days " la compétition en
    programmation C/C++ et java, le club informatique de l’ESTE organise la 3ème
    édition de cette compétition et invite tous les étudiants ayant des
    connaissances au niveau de la programmation à s’inscrire en suivant 
    <a href="/{$SUBDIR}/inscription.php"> ce lien</a> .
</p>
<p>
    Les 3 premières équipes gagnantes de la compétition auront des prix de
    l’ESTE, remis lors de la cerémonie de clôture des portes ouvertes le 6 Mars
    2013. 
</p>
<p class="center">
    <img src="/{$SUBDIR}/web/img/scd3.jpg" alt="Affiche Spring Coding days 3" />
</p>
<p class="center">
    <img src="/{$SUBDIR}/web/img/scd2.jpg" alt="Affiche Spring Coding days 2" />
</p>
<p class="center">
    <img src="/{$SUBDIR}/web/img/scd1.jpg" alt="Affiche Spring Coding days 1" />
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
            avant le 01/03/2013 à 18H00.
        </p>
    </li>
    <li>
        <img src="/{$SUBDIR}/web/img/icons/key.png" alt="icon" class="float"/>
        <p>
            <h3>Etape 1:</h3>
            Qualification à l’ESTE, le Samedi 2 Mars 2013 de 10h00 à 18h00. 
        </p>
    </li>
    <li>
        <img src="/{$SUBDIR}/web/img/icons/term.png" alt="icon" class="float"/>
        <p>
            <h3>Etape 2:</h3> 
            Phase finale à l’ESTE, Le Dimanche 3 Mars 2013 de 09h00 à 17h00.
        </p>
    </li>
</ul>
{/block}

