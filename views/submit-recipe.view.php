<!-- HEADER -->
<?php require './sections/header.php'; ?>

<!-- PAGE CONTENT -->

<div class="uk-container">

        <div class="uk-section uk-section-default">
            <div class="uk-container">
                <h2 class="uk-text-bold"><?php echo echoOutput($translation['tr_114']); ?></h2>
                <p><?php echo echoOutput($translation['tr_115']); ?></p>
            </div>
        </div>

        <div class="uk-grid-large" uk-grid>

            <div class="uk-width-expand@s">

                <h4 class="uk-text-bold" id="top"><?php echo echoOutput($translation['tr_116']); ?></h4>

                <div class="tas-notify tas-notify-success uk-margin-medium uk-text-small uk-border-rounded" id="success" style="display: none;">
                <p></p>
                </div>

                <div class="tas-notify tas-notify-danger uk-margin-medium uk-text-small uk-border-rounded" id="error" style="display: none;">
                <p></p>
                </div>

                <div class="insert-form">
                <form enctype="multipart/form-data" method="post">

                    <div class="uk-child-width-1-1 uk-margin-medium-bottom">
                        <label class="uk-text-bold required"><?php echo echoOutput($translation['tr_120']); ?></label>
                        <div class="uk-form-controls uk-margin-small-top">
                            <input class="uk-input uk-form-large uk-border-rounded" type="text" name="title" id="title">
                        </div>

                    <label class="tas-error-label errors" id="errorTitleText" style="display: none;"></label>

                    </div>


                    <div class="uk-child-width-1-1 uk-margin-medium-bottom">
                        <label class="uk-text-bold required"><?php echo echoOutput($translation['tr_121']); ?></label>
                        <div class="uk-form-controls uk-margin-small-top">
                            <textarea class="uk-textarea uk-form-large uk-border-rounded" rows="5" name="description" id="description" maxlength="250"></textarea>
                        </div>

                    <label class="tas-error-label errors" id="errorDescriptionText" style="display: none;"></label>

                    </div>

                    <div class="uk-child-width-1-2 uk-grid-medium" uk-grid>

                        <div>
                            <label class="uk-text-bold required"><?php echo echoOutput($translation['tr_122']); ?></label>
                            <div class="uk-form-controls uk-margin-small-top">
                                <input class="uk-input uk-form-large uk-border-rounded" placeholder="Eg. 6" type="text" name="servings" id="servings">
                            </div>

                            <label class="tas-error-label errors" id="errorServingsText" style="display: none;"></label>

                        </div>

                        <div>
                            <label class="uk-text-bold required"><?php echo echoOutput($translation['tr_123']); ?></label>
                            <div class="uk-form-controls uk-margin-small-top">
                                <input class="uk-input uk-form-large uk-border-rounded" placeholder="45 Min" type="text" name="time" id="time">
                            </div>
                            <label class="tas-error-label errors" id="errorTimeText" style="display: none;"></label>

                        </div>

                    </div>

                    <div class="uk-width-1-1 uk-margin-medium-top">
                        <label class="uk-text-bold required"><?php echo echoOutput($translation['tr_128']); ?></label>
                        <label class="uk-text-small uk-text-muted uk-display-block uk-margin-small-top"><?php echo echoOutput($translation['tr_129']); ?></label>
                        <div class="uk-form-controls uk-margin-small-top">
                            <textarea class="uk-textarea uk-form-large uk-border-rounded" rows="5" name="ingredients" id="ingredients"></textarea>
                        </div>

                            <label class="tas-error-label errors" id="errorIngrsText" style="display: none;"></label>

                    </div>

                    <div class="uk-width-1-1 uk-margin-medium-top">
                        <label class="uk-text-bold required"><?php echo echoOutput($translation['tr_130']); ?></label>
                        <label class="uk-text-small uk-text-muted uk-display-block uk-margin-small-top"><?php echo echoOutput($translation['tr_131']); ?></label>
                        <div class="uk-form-controls uk-margin-small-top">
                            <textarea class="uk-textarea uk-form-large uk-border-rounded" rows="5" name="instructions" id="instructions"></textarea>
                        </div>

                            <label class="tas-error-label errors" id="errorInstrText" style="display: none;"></label>

                    </div>

                    <div class="uk-child-width-1-1 uk-margin-medium-top">
                        <label class="uk-text-bold required"><?php echo echoOutput($translation['tr_124']); ?></label>

                    <div class="new-image" id="image-preview">
                      <label for="image-upload" id="image-label"><?php echo echoOutput($translation['tr_113']); ?></label>
                      <input type="file" id="image-upload" name="image" />
                    </div>

                        <p class="uk-text-small uk-text-meta uk-margin-remove"><?php echo echoOutput($translation['tr_125']); ?></p>

                        <label class="tas-error-label errors" id="errorImageText" style="display: none;"></label>

                    </div>

                    <div class="uk-margin-medium-top uk-grid-small uk-child-width-auto uk-grid">
                        <label id="checked">
                        <input class="uk-checkbox uk-border-rounded" type="checkbox" name="ischecked" id="ischecked"><?php echo echoOutput($translation['tr_126']); ?>
                        </label>
                    </div>

                    <hr>

                <?php if(!isLogged()): ?>
                <div class="tas-notify tas-notify-danger uk-margin-medium uk-text-small uk-border-rounded">
                <p><?php echo echoOutput($translation['tr_38']); ?></p>
                </div>
                <?php endif; ?>

                    <div class="uk-child-width-1-1 uk-margin-medium-bottom">
                        <button class="uk-button uk-button-primary uk-width-1-1 uk-text-bold uk-button-large uk-button-primary uk-border-rounded" type="submit" <?php echo (!isLogged() ? 'disabled' : '');?>>
                            <span id="submit"><?php echo echoOutput($translation['tr_127']); ?> <i class="fas fa-angle-right uk-margin-small-left"></i></span>
                            <span id="loading" style="display: none;"><span class="anim-rotate" uk-icon="refresh"></span></span>
                        </button>
                    </div>

                </form>
            </div>

            </div>
            <div class="uk-width-1-2@s">

                <div class="uk-section-default">
                    <div class="uk-container">
                        <h3 class="uk-text-bold"><?php echo echoOutput($translation['tr_117']); ?></h3>
                        <p><?php echo echoOutput($translation['tr_118']); ?></p>
                    </div>

                    <ul class="uk-list uk-list-hyphen uk-list-custom">
                        <?php echo $translation['tr_119']; ?>
                    </ul>

                </div>

            </div>

        </div>

    </div>

<!-- END PAGE CONTENT -->

<!-- FOOTER -->

<?php require './sections/footer.php'; ?>
