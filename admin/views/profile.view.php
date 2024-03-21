<?php require'sidebar.php'; ?>

<!--Page Container--> 
<section class="page-container">
  <div class="page-content-wrapper">

    <!--Main Content-->

    <div class="content sm-gutter">
      <div class="container-fluid padding-25 sm-padding-10">

        <div class="section-title">
              <h4><?php echo _PROFILE; ?></h4>
        </div>

        <div class="row">


          <div class="col-md-7">
            <div class="block form-block mb-4">

              <div class="form-row">

                <div class="form-group col-md-12">

                 <label><?php echo _TABLEFIELDUSERNAME; ?></label>
                 <input type="text" value="<?php echo $userDetails['user_name']; ?>" class="form-control" disabled>

                 <br/>

                 <label><?php echo _TABLEFIELDUSEREMAIL; ?></label>
                 <input type="text" value="<?php echo $userDetails['user_email']; ?>" class="form-control" disabled>

                 <br/>

                 <label><?php echo _TABLEFIELDUSERROLE; ?></label>
                 <input type="text" value="<?php echo $userDetails['role_name']; ?>" class="form-control" disabled>

                 <div style="margin-top: 20px;">
                  <p><b><?php echo _TABLEFIELDDATEREGISTER; ?> </b> <?php echo FormatDate($connect, $userDetails['user_created']); ?></p>
                </div>


              </div>


            </div>
          </div>
        </div>

        <div class="col-md-5 sidebar">
          <div class="block form-block mb-4">

                 <label><?php echo _RECIPES; ?></label>

            <div class="form-group col-md-12">
                <div class="table-responsive text-no-wrap">
                    <table class="table">
                        <tbody class="text-middle">
                            <?php foreach($recipes as $item): ?>
                                <tr>
                                    <td class="product" width="50px">
                                        <img class="product-img product-img-w" src="../../images/<?php echo $item['recipe_image']; ?>">
                                    </td>
                                    <td class="name"><span class="span-title" style="max-width: 180px"><?php echo echoOutput($item['recipe_title']); ?></span></td>
                                    <td align="right" class="text-muted"><?php echo FormatDate($connect, $item['recipe_created']); ?></td> 
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
           </div>

                            <?php if(empty($recipes)): ?>
                              <p><?php echo _NOITEMSFOUND; ?></p>
                            <?php endif; ?>

         </div>
       </div>

     </div>
   </div>
 </div>
</div>
</section>
