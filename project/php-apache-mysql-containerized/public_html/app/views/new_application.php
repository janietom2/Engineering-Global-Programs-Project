<?php
    needs_login();
    $id = program_id();
    $user = new User();
    create_new($user->data()->pid, $id);
    // insert_media();
    get_header();
    get_navbar();
    get_content();

?>
    
    <div class="row">
        <div class="col-md-4 offset-md-4">
        <?php $user = new User(); ?>
        <?php if(!alreadyApplied($id, $user->data()->pid)): ?>
            <form method="POST" action="/new_application?pid=<?= $id ?>" enctype = "multipart/form-data">
                    <?php $program = get_program($id); ?>
                    <h1>Application for: <?= $program->prfun_agency ?></h1>

                    <div class="form-group">

                        <div class="form-group">
                            <label for="prsurvey"> Linkedin:</label>
                            <input class="form-control" type="text" id="aplinkedin" name="aplinkedin">
                        </div>

                        <div class="form-group">
                            <label for="prdescription"> Phone Number:</label>
                            <input class="form-control" type="text" id="apcontact" name="apcontact">
                        </div>

                        <div class="form-group">
                            <label for="essay"> Essay Only:</label>
                            <input class="form-control" type="file" name="essay">
                        </div>

                        <div class="form-group">
                            <label for="prcost"> Image:</label>
                            <input class="form-control" type="file" name="images[]">
                        </div>
                        <div class="form-group">
                            <label for="prcost"> Image:</label>
                            <input class="form-control" type="file" name="images[]">
                        </div>
                        <div class="form-group">
                            <label for="prcost"> Image:</label>
                            <input class="form-control" type="file" name="images[]">
                        </div>

                        <input type="hidden" name="token" value="<?php echo Token::generate() ?>">

                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
            </form>
        <?php else: ?>
            <h1>Application for: <?= $program->prfun_agency ?></h1>
            <p>You already applied!</p> <p>You can see your application status <a href="/mystatus">here</a></p>
        <?php endif; ?>
        </div>
    </div>

<?php get_footer();?>