<?php
    needs_login();
    requires_admin();
    create_new();
    get_header();
    get_navbar();
    get_content();
?>

    <div class="row">
        <div class="col-md-4 offset-md-4">
        <form method="POST" action="/new_program">
 
                <div class="form-group">
                    <label for="prn_apps"> Number of Programs:</label>
                    <input class="form-control" type="text" id="prn_apps" name="prn_apps">
                </div>

                <div class="form-group">
                    <label for="prfund_agency"> Fund Agency:</label>
                    <input class="form-control" type="text" id="prfund_agency" name="prfund_agency">
                </div>

                <div class="form-group">
                    <label for="prsurvey"> Survey:</label>
                    <input class="form-control" type="text" id="prsurvey" name="prsurvey">
                </div>

                <div class="form-group">
                    <label for="prdescription"> Description:</label>
                    <input class="form-control" type="text" id="prdescription" name="prdescription">
                </div>

                <div class="form-group">
                    <label for="prcost"> Cost:</label>
                    <input class="form-control" type="text" id="prcost" name="prcost">
                </div>

                <div class="form-group">
                    <label for="prlocation"> Location:</label>
                    <input class="form-control" type="text" id="prlocation" name="prlocation">
                </div>

                <div class="form-group">
                    <label for="preligibility"> Eligibility:</label>
                    <input class="form-control" type="text" id="preligibility" name="preligibility">
                </div>

                <div class="form-group">
                    <label for="prdateline"> Date Line:</label>
                    <input class="form-control" type="text" id="prdateline" name="prdateline">
                </div>

                <input type="hidden" name="token" value="<?php echo Token::generate() ?>">

                <button type="submit" class="btn btn-primary">Create</button>
        </form>
        </div>
    </div>

<?php get_footer();?>