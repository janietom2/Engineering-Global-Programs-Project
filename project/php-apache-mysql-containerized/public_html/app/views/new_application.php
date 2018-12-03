<?php
    needs_login();
    $id = program_id();
    create_new();
    get_header();
    get_navbar();
    get_content();
?>

    <?php $program = get_program($id); ?>
    <div class="row">
        <div class="col-md-4 offset-md-4">

        <?php if(alreadyApplied($id)): ?>
            <form method="POST" action="/new_program">
    
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
                            <label for="prcost"> Essay and Images:</label>
                            <input class="form-control" type="file" id="mediafiles" name="mediafiles">
                        </div>

                        <input type="hidden" name="token" value="<?php echo Token::generate() ?>">

                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
            </form>
        <?php else: ?>
            <h1>Application for: <?= $program->prfun_agency ?></h1>
            <p>You already applied! You can see your application status <a href="#">here</a></p>
        <?php endif; ?>
        </div>
    </div>

<?php get_footer();?>