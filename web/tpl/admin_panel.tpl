{extends "/$SITEDIR/web/tpl/admin_base.tpl"}

{block active_acceuil}active{/block}

{block stylesheets}
<style type="text/css">
.wrapper {
    text-align: center
}
.stat {
    display: inline-block;
    border-radius: 10px;
    background: rgba(20,30,50,0.6);
    color: white;
    font-family: Arial;
    padding: 20px;
    box-shadow: 0 0 2px #000;
    margin: 20px;
    font-weight: bold;
    text-shadow: 0 2px black;
}

.number {
    padding: 10px;
    font-size: 6em;
    display: block;
    margin: 10px;
    margin-bottom: 30px;
    text-align: center
}

.text {
    font-size: 2em;
    display: block;
}
</style>
{/block}
{block content}
<div class="wrapper">
    <div class="stat">
        <div class="number">{$msgCount}</div>
        <div class="text">Messages</div>
    </div>
    <div class="stat">
        <div class="number">{$inscripCount}</div>
        <div class="text">Participants</div>
    </div>
    <div class="stat">
        <div class="number">{$eqpCount}</div>
        <div class="text">Equipes</div>
    </div>
</div>
{/block}
