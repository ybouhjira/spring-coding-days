{extends "/$SITEDIR/web/tpl/admin_base.tpl"}

{block active_messages}active{/block}
{block stylesheets}
<link rel="stylesheet" href="/{$SUBDIR}/web/css/admin_messages.css" />
{/block}
{block content}
    {foreach $messages as $msg}                                            
   <table class="table table-bordered" >
        <tr>
            <td>Nom</td>
            <td>
                {$msg->nom|escape}
                <a href="controlers/delete_message.php?id={$msg->id_message}"
                    class="pull-right btn btn-danger">
                    <i class="icon-trash"></i> 
                </a>
            </td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><a href="mailto:{$msg->email|escape}">{$msg->email|escape}</a></td>
        </tr>
        <tr>
            <td>Message</td>
            <td>{$msg->message|escape}</td>
        </tr>
    </table>
    {/foreach}                                                        
{/block}
