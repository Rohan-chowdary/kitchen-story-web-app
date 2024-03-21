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

            <div>
              <table>
                <tr>
                  <td><p><b><?php echo _AUTHORBY; ?> </b> <a class="link-primary" href="../controller/edit_user.php?id=<?php echo $check_access['user_id']; ?>"><?php echo $recipe['author_name']; ?></a></p></td>
                  <td><p><b><?php echo _PUBLISHED; ?> </b> <?php echo FormatDate($connect, $recipe['recipe_created']); ?></p></td>
                  <td><p><b><?php echo _UPDATED; ?> </b> <?php echo FormatDate($connect, $recipe['recipe_updated']); ?></p></td>
                </tr>
              </table>
            </div>

            <div class="form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

               <input type="hidden" value="<?php echo $recipe['recipe_id']; ?>" name="recipe_id">

               <div class="form-row">
                <div class="form-group col-md-9">
                  <div class="block col-md-12">

                    <label class="required"><?php echo _TABLEFIELDTITLE; ?></label>
                    <input type="text" value="<?php echo $recipe['recipe_title']; ?>" name="recipe_title" class="form-control" required="">

                    <label><?php echo _TABLEFIELDSLUG; ?></label>
                    <input type="hidden" value="<?php echo $recipe['recipe_slug']; ?>" name="recipe_slug_save">
                    <input type="text" placeholder="<?php echo $recipe['recipe_slug']; ?>" name="recipe_slug" class="form-control">
                    
                    <label><?php echo _TABLEFIELDDESCRIPTION; ?></label>
                    <textarea type="text" class="mceNoEditor form-control" name="recipe_description"><?php echo $recipe['recipe_description']; ?></textarea>

                    <label><?php echo _TABLEFIELDINGREDIENTS; ?></label>
                    <div id="ingredients">

                      <?php $ingredients =  explode(',', $recipe["recipe_ingredients"]); ?>
                      <?php foreach ($ingredients as $key => $item){
                        reset($ingredients);
                        if ($key === key($ingredients)) { ?>

                          <div id="rowIng1">
                            <div class="row small-margin-bottom">  
                             <div class="col-11">
                              <input type="text" name="recipe_ingredients[]" placeholder="<?php echo _ENTERVALUE; ?>" value="<?php echo $item ?>" class="form-control" />
                            </div>  
                            <div class="col-1 no-padding-left">
                              <button type="button" name="add" id="addIng" class="btn btn-block btn-success">
                                <i class="fa fa-plus"></i>
                              </button>
                            </div>  
                          </div> 
                        </div> 

                      <?php } else { ?>

                        <div id="rowIng<?php echo $key+1; ?>">
                          <div class="row small-margin-bottom">  
                           <div class="col-11">
                            <input type="text" name="recipe_ingredients[]" value="<?php echo $item ?>" class="form-control" />
                          </div>  
                          <div class="col-1 no-padding-left">
                            <button type="button" name="remove" id="<?php echo $key+1; ?>" class="btn btn-block btn-danger remove_ing">
                              <i class="fa fa-times"></i>
                            </button>
                          </div>  
                        </div>
                      </div>

                    <?php } } ?>

                  </div>  

                  <label><?php echo _TABLEFIELDINSTRUCTIONS; ?></label>
                  <div id="instructions">

                    <?php $instructions =  explode(',', $recipe["recipe_instructions"]); ?>
                    <?php foreach ($instructions as $key => $item){
                      reset($instructions);
                      if ($key === key($instructions)) { ?>

                        <div id="rowIns1">
                          <div class="row small-margin-bottom">  
                           <div class="col-11">
                            <input type="text" name="recipe_instructions[]" placeholder="<?php echo _ENTERVALUE; ?>" value="<?php echo $item ?>" class="form-control" />
                          </div>  
                          <div class="col-1 no-padding-left">
                            <button type="button" name="add" id="addIns" class="btn btn-block btn-success">
                              <i class="fa fa-plus"></i>
                            </button>
                          </div>  
                        </div> 
                      </div> 

                    <?php } else { ?>

                      <div id="rowIns<?php echo $key+1; ?>">
                        <div class="row small-margin-bottom">  
                         <div class="col-11">
                          <input type="text" name="recipe_instructions[]" value="<?php echo $item ?>" class="form-control" />
                        </div>  
                        <div class="col-1 no-padding-left">
                          <button type="button" name="remove" id="<?php echo $key+1; ?>" class="btn btn-block btn-danger remove_ins">
                            <i class="fa fa-times"></i>
                          </button>
                        </div>  
                      </div>
                    </div>

                  <?php } } ?>

                </div>

                     <div class="row">

                      <div class="col-6">
                        <label class="required"><?php echo _TABLEFIELDTIME; ?></label>
                         <input type="text" value="<?php echo $recipe['recipe_time']; ?>" name="recipe_time" class="form-control" required="">
                      </div>

                      <div class="col-6">
                        <label class="required"><?php echo _TABLEFIELDSERVINGS; ?></label>
                         <input type="text" value="<?php echo $recipe['recipe_servings']; ?>" name="recipe_servings" class="form-control" required="">
                      </div>

                    </div>

                     <div class="row">

                      <div class="col-3">
                        <label><?php echo _TABLEFIELDCARBS; ?></label>
                         <input type="text" value="<?php echo $recipe['recipe_carbs']; ?>" name="recipe_carbs" class="form-control">
                      </div>

                      <div class="col-3">
                        <label><?php echo _TABLEFIELDPROTEIN; ?></label>
                         <input type="text" value="<?php echo $recipe['recipe_protein']; ?>" name="recipe_protein" class="form-control">
                      </div>

                      <div class="col-3">
                        <label><?php echo _TABLEFIELDFAT; ?></label>
                         <input type="text" value="<?php echo $recipe['recipe_fat']; ?>" name="recipe_fat" class="form-control">
                      </div>

                      <div class="col-3">
                        <label><?php echo _TABLEFIELDKCAL; ?></label>
                         <input type="text" value="<?php echo $recipe['recipe_kcal']; ?>" name="recipe_kcal" class="form-control">
                      </div>

                    </div>


                    <label class="control-label"><?php echo _TABLEFIELDCATEGORY; ?></label>

                    <select class="custom-select form-control" name="recipe_category">

                      <?php
                      foreach($categories as $category)
                      {
                        if($recipe['recipe_category'] == $category['category_id'])
                        {
                          echo '<option value="'.$recipe['recipe_category'].'" selected="selected">'.$category['category_title'].'</option>';
                        }
                        else{
                          echo '<option value="'.$category['category_id'].'">'.$category['category_title'].'</option>';
                        }
                      }
                      ?>

                    </select>

                    <label class="control-label"><?php echo _TABLEFIELDDIFFICULT; ?></label>

                    <select class="custom-select form-control" name="recipe_difficult">

                      <?php
                      foreach($difficulties as $difficult)
                      {
                        if($recipe['recipe_difficult'] == $difficult['difficult_id'])
                        {
                          echo '<option value="'.$recipe['recipe_difficult'].'" selected="selected">'.$difficult['difficult_title'].'</option>';
                        }
                        else{
                          echo '<option value="'.$difficult['difficult_id'].'">'.$difficult['difficult_title'].'</option>';
                        }
                      }
                      ?>

                    </select>

                    <label><?php echo _TABLEFIELDVIDEO; ?></label>
                     <input type="text" value="<?php echo $recipe['recipe_video']; ?>" name="recipe_video" class="form-control">


                    <label class="control-label"><?php echo _TABLEFIELDFEATURED; ?></label>

                    <select class="custom-select form-control" name="recipe_featured" required="">
                      <?php
                      if($recipe['recipe_featured'] == 1)
                      {
                        echo '<option value="1" selected="selected">'._YESTEXT.'</option>';
                        echo '<option value="0">'._NOTEXT.'</option>';

                      }
                      else {
                        echo '<option value="0" selected="selected">'._NOTEXT.'</option>';
                        echo '<option value="1">'._YESTEXT.'</option>';
                      }
                      ?>
                    </select>

                    <label class="control-label"><?php echo _TABLEFIELDNUTRIFACTS; ?></label>

                    <select class="custom-select form-control" name="recipe_facts" required="">
                      <?php
                      if($recipe['recipe_facts'] == 1)
                      {
                        echo '<option value="1" selected="selected">'._YESTEXT.'</option>';
                        echo '<option value="0">'._NOTEXT.'</option>';

                      }
                      else {
                        echo '<option value="0" selected="selected">'._NOTEXT.'</option>';
                        echo '<option value="1">'._YESTEXT.'</option>';
                      }
                      ?>
                    </select>
                    
                    <br>
                    <br>

                    <fieldset>
                      <legend><?php echo _SEO; ?></legend>

                      <label class="no-margin-top"><?php echo _SEOTITLE; ?></label>
                      <input type="text" value="<?php echo $recipe['recipe_seotitle']; ?>" name="recipe_seotitle" class="form-control">


                      <label><?php echo _SEODESCRIPTION; ?></label>
                      <textarea type="text" class="form-control" name="recipe_seodescription"><?php echo $recipe['recipe_seodescription']; ?></textarea>

                    </fieldset>

                  </div>
                </div>

                <div class="form-group col-md-3 sidebar">

                 <div class="block col-md-12">
                   <label><?php echo _TABLEFIELDSTATUS; ?></label>

                   <select class="custom-select form-control" name="recipe_status" required="">

                    <?php
                    if($recipe['recipe_status'] == 1){
                      echo '<option value="1" selected="selected">'._ENABLED.'</option>';
                      echo '<option value="2">'._DISABLED.'</option>';
                      echo '<option value="3">'._PENDING.'</option>';

                    }elseif($recipe['recipe_status'] == 2){
                      echo '<option value="2" selected="selected">'._DISABLED.'</option>';
                      echo '<option value="1">'._ENABLED.'</option>';
                      echo '<option value="3">'._PENDING.'</option>';
                    }elseif($recipe['recipe_status'] == 3){
                      echo '<option value="3" selected="selected">'._PENDING.'</option>';
                      echo '<option value="1">'._ENABLED.'</option>';
                      echo '<option value="2">'._DISABLED.'</option>';
                    }
                    ?>
                  </select>

                </div>

                <div class="block col-md-12">
                  <label><?php echo _TABLEFIELDIMAGE; ?></label>

                  <div class="new-image" id="image-preview" style="background: url(../../images/<?php echo $recipe['recipe_image'] ?>);">
                    <label for="image-upload" id="image-label"><?php echo _CHOOSEFILE; ?></label>
                    <input type="hidden" value="<?php echo $recipe['recipe_image']; ?>" name="recipe_image_save">
                    <input type="file" name="recipe_image" id="image-upload" />
                  </div>

                  <span class="text-danger recomendedsize"><?php echo _RECOMMENDEDSIZE; ?> <b>650 x 350</b> </span>
                  <br/>
                </div>

                <button class="btn btn-primary" type="submit" name="save"><?php echo _UPDATEITEM; ?></button>
                <button class="btn btn-danger deleteItem" type="button" data-url="../controller/delete_recipe.php?id=<?php echo $recipe['recipe_id']; ?>" data-redirect="../controller/recipes.php"><?php echo _DELETEITEM; ?></button>

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
