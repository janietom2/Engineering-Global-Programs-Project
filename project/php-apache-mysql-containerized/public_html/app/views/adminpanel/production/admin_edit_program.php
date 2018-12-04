<?php
    $pid = program_id();
    needs_login();
    requires_admin();
    update_program($pid);
    get_adminheader();
    get_adminnavbar();
    get_admincontent();

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
                    <label for="prfun_agency"> Fund Agency:</label>
                    <input class="form-control" type="text" id="prfun_agency" name="prfun_agency" value="<?php echo $prm->prfun_agency ?>">
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
                    <input class="form-control" type="text" id="preligibility" name="preligibility" value="<?php echo $prm->prelegibility ?>">
                </div>

                <div class="form-group">
                    <label for="prawardamount"> Award Amount:</label>
                    <input class="form-control" type="text" id="prawardamount" name="prawardamount" value="<?php echo $prm->prawardamount ?>">
                </div>

                <div class="form-group">
                    <label for="prstartdate"> Start Line:</label>
                    <input class="form-control" type="text" id="prstartdate" name="prstartdate" value="<?php echo $prm->prstartdate ?>">
                </div>

                <div class="form-group">
                    <label for="prdeadline"> Dead Line:</label>
                    <input class="form-control" type="text" id="prdeadline" name="prdeadline" value="<?php echo $prm->prdeadline ?>">
                </div>

                <input type="hidden" name="token" value="<?php echo Token::generate() ?>">

                <button type="submit" class="btn btn-primary">Edit</button>
        </form>
        </div>
    </div>

<?php get_adminfooter();?>