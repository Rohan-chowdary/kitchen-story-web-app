<h4 class="uk-heading-line"><span><?php echo echoOutput($translation['tr_137']); ?></span></h4>

<script type="text/javascript">

'use strict';
$(document).ready(function(){
    $('#followers_table').DataTable({
     "bProcessing": true,
     "sAjaxSource": SITEURL+"/controllers/followers.php?action=following",
     "responsive": true,
     "bPaginate":true,
     "bInfo" : false,
     "bFilter": false,
     "sPaginationType":"simple_numbers",
     "iDisplayLength": 5,
     "lengthChange": false,
     "aoColumns": [
     { "mData": null , "width": "20%", "className": "avatar uk-text-center", 'orderable': false,
    'searchable': false,
     "mRender" : function (data) {
      return '<a href="<?php echo $urlPath->user(); ?>'+data.user_id+'" target="_blank"><img src="'+IMAGES_FOLDER+data.user_avatar+'" class="uk-border-rounded"/></a>';}
    },
    { "mData": null,
    "mRender" : function (data) {
      return '<a href="<?php echo $urlPath->user(); ?>'+data.user_id+'" target="_blank" class="uk-link-reset uk-text-small">'+data.user_name+'</a>';}
    }
    ]
  });
  });

</script>

<table id="followers_table" class="uk-table uk-table-hover uk-table-middle uk-table-divider" style="width: 100%">

<thead>
  <tr>
    <th></th>
    <th></th>
  </tr>
</thead>

</table>