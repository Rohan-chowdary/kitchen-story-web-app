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
  <h4><?php echo _SETTINGS; ?></h4> 
</div>
</div>

<div class="col-12 c-col-12">
<div id="saved"><i class="fa fa-check"></i> <?php echo _CHANGESSAVED; ?></div>
<input type="submit" name="save" id="save" value="<?php echo _SAVECHANGES; ?>" class="btn btn-primary" form="setSettings" />
</div>

<div class="col-md-12">
<div class="block form-block mb-4" style="margin-top: 20px;">

  <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="setSettings">

    <div class="form-row">

      <div class="form-group col-md-12">

        <div class="table-responsive">

          <fieldset>
            <legend><?php echo _SITESETTINGS; ?></legend>

            <table class="display table s-table">

              <tr>  
                <td>
                  <label><?php echo _MAINTENANCEMODE; ?></label>

                  <select class="custom-select form-control" name="st_maintenance">
                    <?php
                      if($settings['st_maintenance'] == '1')
                      {
                        echo '<option value="1" selected="selected">'._ENABLED.'</option>';
                        echo '<option value="0" >'._DISABLED.'</option>';
                      }
                      else
                      {
                        echo '<option value="0" selected="selected">'._DISABLED.'</option>';
                        echo '<option value="1">'._ENABLED.'</option>';
                      }
                    ?>
                  </select>
                </td>
              </tr>

              <tr>  
                <td>
                  <label><?php echo _LANGDIR; ?></label>
                  <select class="custom-select form-control" id="langdir" data-selected="<?php echo $settings['st_langdir']; ?>" name="st_langdir">
                    <option value="ltr">Left to Right (LTR)</option>
                    <option value="rtl">Right to Left (RTL)</option>
                  </select>
                </td>
              </tr>

              <tr>  
                <td>
                  <label><?php echo _DATEFORMAT; ?></label>
                  <select class="custom-select form-control" id="date-format" data-selected="<?php echo $settings['st_dateformat']; ?>" name="st_dateformat">
                    <option value="d/m/Y">DD/MM/YYYY</option>
                    <option value="m/d/Y">MM/DD/YYYY</option>
                    <option value="Y/m/d">YYYY/MM/DD</option>
                    <option value="d-m-Y">DD-MM-YYYY</option>
                    <option value="m-d-Y">MM-DD-YYYY</option>
                    <option value="Y-m-d">YYYY-MM-DD</option>
                    <option value="d.m.Y">DD.MM.YYYY</option>
                    <option value="m.d.Y">MM.DD.YYYY</option>
                    <option value="Y.m.d">YYYY.MM.DD</option>
                  </select>
                </td>
              </tr>

            </table>

          </fieldset>

          <fieldset id="pages">
            <legend><?php echo _DEFAULTPAGES; ?></legend>

            <table class="display table s-table">

              <tr>  
                <td>
                  <label><?php echo _DEFAULTSEARCHPAGE; ?></label>

                  <select class="custom-select form-control" name="st_defaultsearchpage">
                    <option value>-</option>
                    <?php
                    foreach($searchpages as $page)
                    {
                      if($settings['st_defaultsearchpage'] == $page['page_id'])
                      {
                        echo '<option value="'.$settings['st_defaultsearchpage'].'" selected="selected">'.$page['page_title'].'</option>';
                      }
                      else
                      {
                        echo '<option value="'.$page['page_id'].'">'.$page['page_title'].'</option>';
                      }
                    }
                    ?>
                  </select>
                </td>
              </tr>

              <tr>  
                <td>
                  <label><?php echo _DEFAULTMEMBERSPAGE; ?></label>

                  <select class="custom-select form-control" name="st_defaultmemberspage">
                    <option value>-</option>
                    <?php
                    foreach($memberspages as $page)
                    {
                      if($settings['st_defaultmemberspage'] == $page['page_id'])
                      {
                        echo '<option value="'.$settings['st_defaultmemberspage'].'" selected="selected">'.$page['page_title'].'</option>';
                      }
                      else
                      {
                        echo '<option value="'.$page['page_id'].'">'.$page['page_title'].'</option>';
                      }
                    }
                    ?>
                  </select>
                </td>
              </tr>

              <tr>  
                <td>
                  <label><?php echo _DEFAULTPRIVACYPAGE; ?></label>

                  <select class="custom-select form-control" name="st_defaultprivacypage">
                    <option value>-</option>
                    <?php
                    foreach($privacypages as $page)
                    {
                      if($settings['st_defaultprivacypage'] == $page['page_id'])
                      {
                        echo '<option value="'.$settings['st_defaultprivacypage'].'" selected="selected">'.$page['page_title'].'</option>';
                      }
                      else
                      {
                        echo '<option value="'.$page['page_id'].'">'.$page['page_title'].'</option>';
                      }
                    }
                    ?>
                  </select>
                </td>
              </tr>

              <tr>  
                <td>
                  <label><?php echo _DEFAULTTERMSPAGE; ?></label>

                  <select class="custom-select form-control" name="st_defaulttermspage">
                    <option value>-</option>
                    <?php
                    foreach($termspages as $page)
                    {
                      if($settings['st_defaulttermspage'] == $page['page_id'])
                      {
                        echo '<option value="'.$settings['st_defaulttermspage'].'" selected="selected">'.$page['page_title'].'</option>';
                      }
                      else
                      {
                        echo '<option value="'.$page['page_id'].'">'.$page['page_title'].'</option>';
                      }
                    }
                    ?>
                  </select>
                </td>
              </tr>

            </table>
          </fieldset>

          <fieldset>
            <legend><?php echo _COMPANYINFO; ?></legend>

            <table class="display table s-table">

              <tr>  
                <td>
                  <label>Facebook</label>
                  <input class="form-control" value="<?php echo $settings['st_facebook']; ?>" name="st_facebook" type="text">
                </td>
              </tr>

              <tr>  
                <td>
                  <label>Twitter</label>
                  <input class="form-control" value="<?php echo $settings['st_twitter']; ?>" name="st_twitter" type="text">
                </td>
              </tr>

              <tr>  
                <td>
                  <label>Youtube</label>
                  <input class="form-control" value="<?php echo $settings['st_youtube']; ?>" name="st_youtube" type="text">
                </td>
              </tr>

              <tr>  
                <td>
                  <label>Instagram</label>
                  <input class="form-control" value="<?php echo $settings['st_instagram']; ?>" name="st_instagram" type="text">
                </td>
              </tr>

              <tr>  
                <td>
                  <label>Linkedin</label>
                  <input class="form-control" value="<?php echo $settings['st_linkedin']; ?>" name="st_linkedin" type="text">
                </td>
              </tr>

              <tr>  
                <td>
                  <label>Whatsapp</label>
                  <input class="form-control" value="<?php echo $settings['st_whatsapp']; ?>" name="st_whatsapp" type="text">
                </td>
              </tr>

            </table>

          </fieldset>

          <fieldset>
            <legend><?php echo _SMTPEMAILS; ?></legend>

            <table class="display table s-table">

              <tr>  
                <td>
                  <label><?php echo _RECIPIENTEMAIL; ?>  <small style="display: block; margin-bottom: 8px; margin-top: 5px;"><?php echo _MESSAGERECIPIENTEMAIL; ?></small></label>
                  <input class="form-control" value="<?php echo $settings['st_recipientemail']; ?>" name="st_recipientemail" type="email">
                </td>
              </tr>

              <tr>  
                <td>
                  <label><?php echo _SMTPHOST; ?></label>
                  <input class="form-control" value="<?php echo $settings['st_smtphost']; ?>" name="st_smtphost" type="text">
                </td>
              </tr>

              <tr>  
                <td>
                  <label><?php echo _SMTPUSER; ?></label>
                  <input class="form-control" value="<?php echo $settings['st_smtpemail']; ?>" name="st_smtpemail" type="email">
                </td>
              </tr>

              <tr>  
                <td>
                  <label><?php echo _SMTPPASSWORD; ?></label>
                  <input class="form-control" value="<?php echo $settings['st_smtppassword']; ?>" name="st_smtppassword" type="text">
                </td>
              </tr>

              <tr>  
                <td>
                  <label><?php echo _SMTPENCRYPT; ?></label>
                  <input class="form-control" value="<?php echo $settings['st_smtpencrypt']; ?>" name="st_smtpencrypt" type="text">
                </td>
              </tr>

              <tr>  
                <td>
                  <label><?php echo _SMTPPORT; ?></label>
                  <input class="form-control" value="<?php echo $settings['st_smtpport']; ?>" name="st_smtpport" type="text">
                </td>
              </tr>

            </table>

          </fieldset>

          <fieldset>
            <legend><?php echo _GENERALSETTINGS; ?></legend>

            <table class="display table s-table">

              <tr>  
                <td>
                  <label><?php echo _ANALYTICSTRACKINGCODE; ?></label>
                  <textarea class="form-control mceNoEditor" name="st_analytics" type="text"><?php echo $settings['st_analytics']; ?></textarea>
                </td>
              </tr>

              <tr>  
                <td>
                  <label><?php echo _GOOGLERECAPTCHAKEY; ?></label>
                  <input class="form-control" value="<?php echo $settings['st_recaptchakey']; ?>" name="st_recaptchakey" type="text">
                </td>
              </tr>

              <tr>  
                <td>
                  <label><?php echo _GOOGLERECAPTCHASECRETKEY; ?></label>
                  <input class="form-control" value="<?php echo $settings['st_recaptchasecretkey']; ?>" name="st_recaptchasecretkey" type="text">
                </td>
              </tr>

            </table>

          </fieldset>


</div>
</div>
</div>

<input type="submit" name="save" id="save2" value="<?php echo _SAVECHANGES; ?>" class="btn btn-primary" form="setSettings" />
<div id="saved2"><i class="fa fa-check"></i> <?php echo _CHANGESSAVED; ?></div>

</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

  <div class="scrollTop">
    <span><a href=""><i class="dripicons-arrow-thin-up"></i></a></span>
  </div>