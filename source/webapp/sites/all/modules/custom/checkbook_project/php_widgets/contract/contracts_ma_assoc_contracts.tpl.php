<?php
/**
* This file is part of the Checkbook NYC financial transparency software.
* 
* Copyright (C) 2012, 2013 New York City
* 
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU Affero General Public License as
* published by the Free Software Foundation, either version 3 of the
* License, or (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU Affero General Public License for more details.
* 
* You should have received a copy of the GNU Affero General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<h3>Associated Contracts</h3>
<table id="assoc_contracts_list">
  <thead>
  <tr>
    <th></th>
  </tr>
  </thead>
  <tbody>
  <?php
  $count = 0;
  $clickClass = "clickOnLoad";
  $count = 0;
  foreach ($node->data as $contract) {
    if ($count % 2 == 0) {
      $class = "class=\"odd\"";
    }
    else {
      $class = "class=\"even\"";
    }

    ?>
  <tr>
    <td class="assoc_item">
      <div class="contract-title clearfix">
             <span agurl="/minipanels/contracts_cta_history/agid/<?php echo $contract['original_agreement_id']; ?>"
                   class="toggler collapsed <?php echo $clickClass . " " . $class; ?>"
                   id="master_assoc_cta_expand"></span>

        <div class='contract-title-text'>Contract Spending for <a
          href="/panel_html/contract_transactions/contract_details/agid/<?php echo $contract['original_agreement_id']; ?>/doctype/
<?php echo $contract['document_code@checkbook:ref_document_code']; ?>"
          class="bottomContainerReload"><?php echo $contract['contract_number']; ?></a></div>
        <div class="rfed-amount"><?php echo custom_number_formatter_format($contract['rfed_amount'], 2, '$');?></div>
      </div>

      <div class="resultsContainer<?php print $count?>">&nbsp</div>
    </td>

  </tr>
    <?php $count += 1;
    if ($count > 1) {
      $clickClass = "";
    }
  }

  ?>

  </tbody>
</table>

<script type="text/javascript">
  jQuery(document).ready(function () {
    oTable = jQuery('#assoc_contracts_list').dataTable(
      {
        "bPaginate":true,
        "bJQueryUI":true,
        "bRetrieve":true,
        "bFilter":false,
        "iDisplayLength":10,
        "sPaginationType":"input",
        "oLanguage":{
          "oPaginate":{
            "sFirst":"<img src='/<?php print drupal_get_path('theme',$GLOBALS['theme']); ?>/images/first_blue.png'>",
            "sLast":"<img src='/<?php print drupal_get_path('theme',$GLOBALS['theme']); ?>/images/last_blue.png'>",
            "sNext":"<img src='/<?php print drupal_get_path('theme',$GLOBALS['theme']); ?>/images/next_blue.png'>",
            "sPrevious":"<img src='/<?php print drupal_get_path('theme',$GLOBALS['theme']); ?>/images/previous_blue.png'>"
          }
        },
        "bLengthChange":false,
        "sDom":"<r><t><ip>",
        "bSort":false,
        "asStripeClasses":[]
      }
    );
  });

</script>