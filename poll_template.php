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
|
|     $URL: https://e107.svn.sourceforge.net/svnroot/e107/trunk/e107_0.7/e107_plugins/poll/templates/poll_template.php $
|     $Revision: 11678 $
|     $Id: poll_template.php 11678 2010-08-22 00:43:45Z e107coders $
|     $Author: e107coders $
|
+----------------------------------------------------------------------------+
*/

if (!defined('e107_INIT')) { exit; }

/* ################################# */
/*		template for polls when user HASN'T voted ...			*/


$POLL_NOTVOTED_START = "
<div class='poll'>
	<div class='question'>{QUESTION}</div>
	<p>";

$POLL_NOTVOTED_LOOP = "
	{OPTIONBUTTON} <label class='checkbox inline'> {OPTION} </label>";

$POLL_NOTVOTED_END = "
	</p>
	<div style='text-align:center' class='smalltext'>
		<p>
		{SUBMITBUTTON}<br />
		{AUTHOR} | {VOTE_TOTAL} | {COMMENTS} | {OLDPOLLS}
		</p>
	</div>
</div>";


/* ################################# */
/*		template for polls when user HAS voted ...			*/

$POLL_VOTED_START = "
<div class='poll'>
	<div class='btn btn-small disabled'>{QUESTION}</div>
	<div class='clearfix'></div>
	";

$POLL_VOTED_LOOP = "
	<span class='label'>{OPTION} - {VOTES} | {PERCENTAGE}</span>
	<div class='spacer'>{BAR}</div>
	<div class='clearfix'></div>
";

$POLL_VOTED_END = "
	<div style='text-align:center' class='smalltext'>
		<span class='badge badge-inverse'>{AUTHOR}</span><span class='badge badge-info'>{VOTE_TOTAL}</span><span class='badge badge-inverse'>{COMMENTS}</span><span class='badge badge-inverse'>{OLDPOLLS}</span>	
	</div>
</div>	
";


/* ################################# */
/*		template for polls when user CANNOT vote ...		*/


$POLL_DISALLOWED_START = "
<div class='poll'>
	<div class='question'>
		{QUESTION}
	</div>
	<p><br /> ";
	
$POLL_DISALLOWED_LOOP = "
	{OPTIONBUTTON}<label for='{OPTION}'><span><span></span></span>{OPTION}</label>
	<br />";

$POLL_DISALLOWED_END = "
<div style='text-align:center' class='smalltext'>
{DISALLOWMESSAGE}<br /><br />
{VOTE_TOTAL} {COMMENTS}
<br />
{OLDPOLLS}
</div>
";


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
	{OPTIONBUTTON}<label for='{OPTION}'><span><span></span></span>{OPTION}</label>
	<br />";

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