<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="btn btn-primary close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo _ADDITEM; ?></h4>
   </div>
   <div class="modal-body">
    <form enctype="multipart/form-data" method="post" id="insertDifficult">

     <label class="required"><?php echo _TABLEFIELDTITLE; ?></label>
     <input type="text" name="difficult_title" id="difficult_title" class="form-control" required="" />
     <br />
   <br>
   <input type="submit" name="insert" id="insert" value="<?php echo _SAVECHANGES; ?>" class="btn btn-primary" />

    </form>
   </div>
  </div>
 </div>
</div>
