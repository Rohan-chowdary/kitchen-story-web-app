<?php require'sidebar.php'; ?>

<!--Page Container--> 
<section class="page-container">
  <div class="page-content-wrapper">

    <!--Main Content-->

    <div class="content sm-gutter">
      <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
          <div class="col-12">
            <div class="section-title">
              <h5><?php echo _EDITITEM; ?></h5>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

               <input type="hidden" value="<?php echo $difficult['difficult_id']; ?>" name="difficult_id">

               <div class="form-row">
                <div class="form-group col-md-12">
                  <div class="block col-md-12">

                    <label><?php echo _TABLEFIELDTITLE; ?></label>
                    <input type="text" value="<?php echo $difficult['difficult_title']; ?>" name="difficult_title" class="form-control" required="">

                    <br>
                    <br>
                <button class="btn btn-primary" type="submit" name="save"><?php echo _UPDATEITEM; ?></button>
                <button class="btn btn-danger deleteItem" type="button" data-url="../controller/delete_difficult.php?id=<?php echo $difficult['difficult_id']; ?>" data-redirect="../controller/difficulties.php"><?php echo _DELETEITEM; ?></button>

                  </div>
                </div>

            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>
