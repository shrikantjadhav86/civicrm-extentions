
{*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.7                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2016                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
*}
<div class="view-content">

{if $pcpInfoContribution}
<div id="ltype">
{*$pcpInfoContribution|@print_r*} 
{strip}

<table class="selector">
  <tr class="columnheader">
    <th>{ts}Your Page{/ts}</th>
    <th>{ts}Status{/ts}</th>
    <th>{ts}In Support of{/ts}</th>
    <th>{ts}# of Contributions{/ts}</th>
    <th>{ts}Amount Raised{/ts}</th>
    <th>{ts}Target Amount{/ts}</th>
    
    <th></th>
  </tr>

  {foreach from=$pcpInfoContribution item=row}
  
  <tr class="{cycle values="odd-row,even-row"} {$row.class}">
        <td class="bold"><a href="{crmURL p='civicrm/pcp/info' q="reset=1&id=`$row.pcpId`" a=1}" title="{ts}Preview your Personal Campaign Page{/ts}">{$row.pcpTitle}</a></td>
        <td>{$row.pcpStatus}</td>
        <td>{$row.pageTitle}</td>
	<td>{$row.totalContributions}</td>
	<td>{$row.total}</td>
	<td>{$row.goal_amount}</td>
        
	<td>{$row.action|replace:'xx':$row.pcpId}</td>
  </tr>
  {/foreach}
</table>
{/strip}
</div>
{else}
<div class="messages status no-popup">
  <div class="icon inform-icon"></div>
  {ts}You do not have any active Personal Campaign pages.{/ts}
</div>
{/if}



</div>
