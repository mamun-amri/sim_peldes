<!--Event area start here-->
<section class="event-area-page section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-heading-two">
                    <h2><?= $title ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class=" col-md-12">
                <?= $this->session->flashdata('message') ?>
                <form action="<?= $action ?>" method="post">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <?php echo form_error('contact_firstName') ?>
                            <input type="text" class="form-control" name="contact_firstName" id="firstName" placeholder="First Name" value="<?php echo $contact_firstName; ?>" />
                        </div>
                        <div class="col-md-6">
                            <?php echo form_error('contact_lastName') ?>
                            <input type="text" class="form-control" name="contact_lastName" id="contact_lastName" placeholder="Last Name" value="<?php echo $contact_lastName; ?>" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <?php echo form_error('contact_email') ?>
                            <input type="text" class="form-control" name="contact_email" id="contact_email" placeholder="Email" value="<?php echo $contact_email; ?>" />
                        </div>
                        <div class="col-md-6">
                            <?php echo form_error('contact_subject') ?>
                            <input type="text" class="form-control" name="contact_subject" id="contact_subject" placeholder="Subject" value="<?php echo $contact_subject; ?>" />
                        </div>
                    </div>
            </div>
            <div class="col-md-12">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <?php echo form_error('contact_message') ?>
                        <textarea class="form-control" rows="10" name="contact_message" id="contact_message" placeholder="Message"><?php echo $contact_message; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <input type="hidden" name="contact_id" value="<?php echo $contact_id; ?>" />
                    <button type="submit" class="btn4"> <span>send</span></button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</section>