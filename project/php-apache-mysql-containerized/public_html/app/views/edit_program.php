<?php
    $pid = program_id();
    needs_login();
    update_program($pid);
    get_header();
    get_navbar();
    get_content();

    $prm = get_program($pid);
?>

    <div class="row">
        <div class="col-md-4 offset-md-4">
        <form method="POST" action="/edit_program?pid=<?php echo $pid ?>">
 
                <div class="form-group">
                    <label for="prn_apps"> Number of Programs:</label>
                    <input class="form-control" type="text" id="prn_apps" name="prn_apps" value="<?php echo $prm->prn_apps ?>">
                </div>

                <div class="form-group">
                    <label for="prfund_agency"> Fund Agency:</label>
                    <input class="form-control" type="text" id="prfund_agency" name="prfund_agency" value="<?php echo $prm->prfund_agency ?>">
                </div>

                <div class="form-group">
                    <label for="prsurvey"> Survey:</label>
                    <input class="form-control" type="text" id="prsurvey" name="prsurvey" value="<?php echo $prm->prsurvey ?>">
                </div>

                <div class="form-group">
                    <label for="prdescription"> Description:</label>
                    <input class="form-control" type="text" id="prdescription" name="prdescription" value="<?php echo $prm->prdescription ?>">
                </div>

                <div class="form-group">
                    <label for="prcost"> Cost:</label>
                    <input class="form-control" type="text" id="prcost" name="prcost" value="<?php echo $prm->prcost ?>">
                </div>

                <div class="form-group">
                    <label for="prlocation"> Location:</label>
                    <input class="form-control" type="text" id="prlocation" name="prlocation" value="<?php echo $prm->prlocation ?>">
                </div>

                <div class="form-group">
                    <label for="preligibility"> Eligibility:</label>
                    <input class="form-control" type="text" id="preligibility" name="preligibility" value="<?php echo $prm->preligibility ?>">
                </div>

                <div class="form-group">
                    <label for="prdateline"> Date Line:</label>
                    <input class="form-control" type="text" id="prdateline" name="prdateline" value="<?php echo $prm->prdateline ?>">
                </div>

                <input type="hidden" name="token" value="<?php echo Token::generate() ?>">

                <button type="submit" class="btn btn-primary">Create</button>
        </form>
        </div>
    </div>

<?php get_footer();?>