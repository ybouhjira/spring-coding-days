{extends "$SITEDIR/web/tpl/base.tpl"}

{block left_column}
<h2>Message : </h2>
<div class="{$cssclass}"> {$errorMessage} </div>
{/block}

{block right_column}
    {include "$SITEDIR/web/tpl/contact_info.tpl"}
{/block}
