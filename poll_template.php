<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system
|
|     Copyright (C) 2001-2002 Steve Dunstan (jalist@e107.org)
|     Copyright (C) 2008-2010 e107 Inc (e107.org)
|
|
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org).
*/

if (!defined('e107_INIT')) { exit; }

/* ################################# */
/*		template for polls when user HASN'T voted ...			*/


$POLL_NOTVOTED_START = "
<div class='poll'>
	<div class='panel panel-default'>
		<div class='panel-heading'>
			<h3 class='panel-title'>{QUESTION}</h3>
		</div>
		<div class='panel-body'>
			<p>";

$POLL_NOTVOTED_LOOP = "
				<label class='checkbox radio' >{OPTIONBUTTON}  {OPTION} </label>";

$POLL_NOTVOTED_END = "
			</p>
			<div class='text-center'>
				{SUBMITBUTTON}
				<p></p>
			</div>
		</div>
		<div class='panel-footer'>
			<span class='badge'>{AUTHOR}</span> 
			<span class='badge'>{VOTE_TOTAL}</span> 
			<span class='badge'>{COMMENTS}</span> 
			<span class='badge'>{OLDPOLLS}</span>	
		</div>
	</div>
</div>";


/* ################################# */
/*		template for polls when user HAS voted ...			*/

$POLL_VOTED_START = "
<div class='poll'>
	<div class='panel panel-default'>
		<div class='panel-heading'>
			<h3 class='panel-title'>{QUESTION}</h3>
		</div>
		<ul class='list-group'>";

$POLL_VOTED_LOOP = "
			<li class='list-group-item'>{OPTION} - {VOTES} <span class='badge pull-right '>  {PERCENTAGE}</span>
				<div class='spacer'>{BAR}</div>
				<div class='clearfix'></div>
			</li>
";

$POLL_VOTED_END = "
		</ul>
		<div class='panel-footer'>
			<span class='badge'>{AUTHOR}</span> 
			<span class='badge'>{VOTE_TOTAL}</span> 
			<span class='badge'>{COMMENTS}</span> 
			<span class='badge'>{OLDPOLLS}</span>	
		</div>
	</div>
</div>";


/* ################################# */
/*		template for polls when user CANNOT vote ...		*/


$POLL_DISALLOWED_START = "
<div class='poll'>
	<div class='panel panel-default'>
		<div class='panel-heading'>
			<h3 class='panel-title'>{QUESTION}</h3>
		</div>
		<ul class='list-group'>";
	
$POLL_DISALLOWED_LOOP = "
			<li class='list-group-item'>
				<label class='checkbox radio' >{OPTIONBUTTON}  {OPTION} </label>
				<div class='clearfix'></div>
			</li>";

$POLL_DISALLOWED_END = "
		</ul>
		<div class='alert alert-danger '>
			{DISALLOWMESSAGE}
		</div>		
		<div class='panel-footer'>
			<span class='badge'>{AUTHOR}</span> 
			<span class='badge'>{VOTE_TOTAL}</span> 
			<span class='badge'>{COMMENTS}</span> 
			<span class='badge'>{OLDPOLLS}</span>	
		</div>
	</div>
</div>";


/* ################################# */
/*		template for forum polls when user HASN'T voted*/

$POLL_FORUM_NOTVOTED_START = "
<div style='text-align:center; margin-left: auto; margin-right: auto;'>
<table class='fborder' style='width: 350px;'>
<tr>
<td class='forumheader' style='width: 100%; text-align: center;'>
<b><i>{QUESTION}</i></b>
</td>
</tr>
<tr>
<td class='forumheader3' style='width: 100%;'>";

$POLL_FORUM_NOTVOTED_LOOP = "
	<label for='{OPTION}'>{OPTIONBUTTON}{OPTION}</label>
	";

$POLL_FORUM_NOTVOTED_END = "
</td>
</tr>

<tr>
<td class='forumheader' style='width: 100%;'>
<div style='text-align:center' class='smalltext'>
{SUBMITBUTTON}
</div>
</td>
</tr>
</table>
</div>";


/* ################################# */
/*		template for forum polls when user HAS voted		*/

$POLL_FORUM_VOTED_START = "
<div style='text-align:center; margin-left: auto; margin-right: auto;'>
<table class='fborder' style='width: 350px;'>
<tr>
<td class='forumheader' style='width: 100%; text-align: center;'>
<b><i>{QUESTION}</i></b>
</td>
</tr>
<tr>
<td class='forumheader3' style='width: 100%;'>
";

$POLL_FORUM_VOTED_LOOP = "
<b>{OPTION}</b>
<br />{BAR}<br />
<span class='smalltext'>{VOTES} | {PERCENTAGE}</span>
<br /><br />
";

$POLL_FORUM_VOTED_END = "
</td>
</tr>

<tr>
<td class='forumheader' style='width: 100%;'>
<div style='text-align:center' class='smalltext'>
{VOTE_TOTAL}
</div>
</td>
</tr>
</table>
</div>
";

?>