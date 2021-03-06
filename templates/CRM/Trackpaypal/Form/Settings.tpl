{* HEADER *}

<div class="crm-submit-buttons">
{include file="CRM/common/formButtons.tpl" location="top"}
</div>

{* FIELD EXAMPLE: OPTION 1 (AUTOMATIC LAYOUT) *}

{foreach from=$elementNames item=elementName}
  <div class="crm-section">
    <div class="label">{$form.$elementName.label}</div>
    <div class="content">{$form.$elementName.html}<br>
      {if $elementName eq "trackpaypal_event_type"}
        {$trackpaypal_event_type_description}
      {elseif $elementName eq "trackpaypal_tracking_code"}
        {$trackpaypal_tracking_code_description}
      {elseif $elementName eq "trackpaypal_event_category"}
        {$trackpaypal_event_category_description}
      {else}
        {$trackpaypal_debug_mode_description}
      {/if}
    </div>
    <div class="clear"></div>
  </div>
{/foreach}

{* FOOTER *}
<div class="crm-submit-buttons">
{include file="CRM/common/formButtons.tpl" location="bottom"}
</div>
