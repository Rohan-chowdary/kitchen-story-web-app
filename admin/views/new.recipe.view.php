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
              <h5><?php echo _ADDITEM; ?></h5>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                <div class="form-row">
                  <div class="form-group col-md-9">
                    <div class="block col-md-12">

                      <input type="hidden" value="<?php echo $check_access['user_id']; ?>" name="recipe_author">

                      <label class="required"><?php echo _TABLEFIELDTITLE; ?></label>
                      <input type="text" placeholder="" name="recipe_title" class="form-control" required="">

                      <label class="required"><?php echo _TABLEFIELDDESCRIPTION; ?></label>
                      <textarea type="text" class="mceNoEditor form-control" name="recipe_description" required=""></textarea>

                      <label><?php echo _TABLEFIELDINGREDIENTS; ?></label>
                      <div id="ingredients">  
                      <div id="rowIng1">
                      <div class="row small-margin-bottom">  
                         <div class="col-11"><input type="text" name="recipe_ingredients[]" placeholder="<?php echo _ENTERVALUE; ?>"" class="form-control" /></div>  
                         <div class="col-1 no-padding-left"><button type="button" name="add" id="addIng" class="btn btn-block btn-success"><i class="fa fa-plus"></i></button></div>  
                     </div>  
                     </div>  
                     </div>  

                      <label><?php echo _TABLEFIELDINSTRUCTIONS; ?></label>
                      <div id="instructions">  
                      <div id="rowIns1">
                      <div class="row small-margin-bottom">  
                         <div class="col-11"><input type="text" name="recipe_instructions[]" placeholder="<?php echo _ENTERVALUE; ?>"" class="form-control" /></div>  
                         <div class="col-1 no-padding-left"><button type="button" name="add" id="addIns" class="btn btn-block btn-success"><i class="fa fa-plus"></i></button></div>  
                     </div>  
                     </div>  
                     </div>  

                     <div class="row">

                      <div class="col-6">
                        <label class="required"><?php echo _TABLEFIELDTIME; ?></label>
                        <input type="text" placeholder="Example: 60 Min." name="recipe_time" class="form-control" required="">
                      </div>

                      <div class="col-6">
                        <label class="required"><?php echo _TABLEFIELDSERVINGS; ?></label>
                        <input type="text" placeholder="" name="recipe_servings" class="form-control" required="">
                      </div>

                    </div>

                     <div class="row">

                      <div class="col-3">
                        <label><?php echo _TABLEFIELDCARBS; ?></label>
                        <input type="text" name="recipe_carbs" class="form-control">
                      </div>

                      <div class="col-3">
                        <label><?php echo _TABLEFIELDPROTEIN; ?></label>
                        <input type="text" name="recipe_protein" class="form-control">
                      </div>

                      <div class="col-3">
                        <label><?php echo _TABLEFIELDFAT; ?></label>
                        <input type="text" name="recipe_fat" class="form-control">
                      </div>

                      <div class="col-3">
                        <label><?php echo _TABLEFIELDKCAL; ?></label>
                        <input type="text" name="recipe_kcal" class="form-control">
                      </div>

                    </div>

                     <label class="control-label required"><?php echo _TABLEFIELDCATEGORY; ?></label>

                     <select class="custom-select form-control" name="recipe_category" required="">
                       <?php foreach($categories as $category): ?>
                         <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_title']; ?></option>
                       <?php endforeach; ?>
                     </select>

                    <label class="control-label required"><?php echo _TABLEFIELDDIFFICULT; ?></label>
                    <select class="custom-select form-control" name="recipe_difficult" required="">
                     <?php foreach($difficulties as $difficult): ?>
                       <option value="<?php echo $difficult['difficult_id']; ?>"><?php echo $difficult['difficult_title']; ?></option>
                     <?php endforeach; ?>
                   </select>

                   <label><?php echo _TABLEFIELDVIDEO; ?></label>
                   <input type="text" placeholder="" name="recipe_video" class="form-control">

                   <label class="control-label"><?php echo _TABLEFIELDFEATURED; ?></label>
                   <select class="custom-select form-control" name="recipe_featured">
                     <option value="0"><?php echo _NOTEXT; ?></option>
                     <option value="1"><?php echo _YESTEXT; ?></option>
                   </select>

                   <label class="control-label"><?php echo _TABLEFIELDNUTRIFACTS; ?></label>
                   <select class="custom-select form-control" name="recipe_facts">
                     <option value="0"><?php echo _NOTEXT; ?></option>
                     <option value="1"><?php echo _YESTEXT; ?></option>
                   </select>

                   <br>
                   <br>

                   <fieldset>
                    <legend><?php echo _SEO; ?></legend>

                    <label class="no-margin-top"><?php echo _SEOTITLE; ?></label>
                    <input type="text" placeholder="" name="recipe_seotitle" class="form-control">


                    <label><?php echo _SEODESCRIPTION; ?></label>
                    <textarea type="text" class="mceNoEditor form-control" name="recipe_seodescription"></textarea>

                  </fieldset>

                </div>
              </div>
              <div class="form-group col-md-3 sidebar">

               <div class="block col-md-12">
                 <label><?php echo _TABLEFIELDSTATUS; ?></label>

                 <select class="custom-select form-control" name="recipe_status" required="">
                  <option value="1" selected=""><?php echo _ENABLED; ?></option>
                  <option value="2"><?php echo _DISABLED; ?></option>
                  <option value="3"><?php echo _PENDING; ?></option>
                </select>

              </div>

              <div class="block col-md-12">
                <label class="required"><?php echo _TABLEFIELDIMAGE; ?></label>

                <div class="new-image" id="image-preview">
                  <label for="image-upload" id="image-label"><?php echo _CHOOSEFILE; ?></label>
                  <input type="file" name="recipe_image" id="image-upload" required="" />
                </div>

                <span class="text-danger recomendedsize"><?php echo _RECOMMENDEDSIZE; ?> <b>650 x 350</b> </span>
                <br/>
              </div>

              <button class="btn btn-primary" type="submit" name="save"><?php echo _SAVECHANGES; ?></button>

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