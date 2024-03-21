<h4 class="uk-heading-line"><span><?php echo echoOutput($translation['tr_93']); ?></span></h4>

<script type="text/javascript">

'use strict';
$(document).ready(function(){
    $('#recipes_table').DataTable({
     "bProcessing": true,
     "sAjaxSource": SITEURL+"/controllers/user-recipes.php",
     "responsive": true,
     "bPaginate":true,
     "sPaginationType":"simple_numbers",
     "iDisplayLength": 5,
     "lengthChange": false,
     "fnCreatedRow": function( nRow, data, iDataIndex ) {
      $(nRow).addClass("id-"+data.recipe_id);
    },
     "aoColumns": [
     { "mData": null , "width": "12%", "className": "uk-text-center",
     "mRender" : function (data) {
      return '<a href="<?php echo $urlPath->recipe(); ?>'+data.recipe_id+'/'+data.recipe_slug+'" target="_blank"><img src="'+IMAGES_FOLDER+data.recipe_image+'" class="uk-border-rounded"/></a>';}
    },
    { "mData": null,
    "mRender" : function (data) {
      return '<a href="<?php echo $urlPath->recipe(); ?>'+data.recipe_id+'/'+data.recipe_slug+'" target="_blank" class="uk-link-reset uk-text-small">'+data.recipe_title+'</a>';}
    },
    { "mData": null , "width": "12%", "className": "uk-text-center",
     "mRender" : function (data) {
      if (data.recipe_status == 1) {
        return '<span class="uk-label uk-label-success uk-text-success"><?php echo $translation['tr_99']; ?></span>';
      }else if(data.recipe_status == 2){
        return '<span class="uk-label uk-label-danger uk-text-danger"><?php echo $translation['tr_100']; ?></span>';
      }else if(data.recipe_status == 3){
        return '<span class="uk-label uk-label-warning uk-text-warning"><?php echo $translation['tr_101']; ?></span>';
      }
      }
    },
    { "mData": null,
    "mRender" : function (data) {
    	let date = new Date(data.recipe_created);
      return '<span>'+date.toLocaleDateString()+'</span>';}
    },
    { "mData": null ,
    "width": "14%",
    'orderable': false,
    'searchable': false,
    "mRender" : function (data) {
      return '<a uk-icon="icon: trash" class="deleteItem uk-text-danger" data-item="'+data.recipe_id+'" data-user="'+data.recipe_author+'"></a>';}
    }
    ]
  });
  });

</script>

<table id="recipes_table" class="uk-table uk-table-hover uk-table-middle uk-table-divider" style="width: 100%">

<thead>
  <tr>
    <th><?php echo $translation['tr_105']; ?></th>
    <th><?php echo $translation['tr_106']; ?></th>
    <th><?php echo $translation['tr_107']; ?></th>
    <th><?php echo $translation['tr_103']; ?></th>
    <th><?php echo $translation['tr_108']; ?></th>
  </tr>
</thead>
</table>