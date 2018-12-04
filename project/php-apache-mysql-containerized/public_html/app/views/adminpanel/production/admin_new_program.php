<?php
    needs_login();
    requires_admin();
    create_new();
    get_adminheader();
    get_adminnavbar();
    get_admincontent();
?>

    <div class="row">
        <div class="col-md-4 offset-md-4">
            <h1>New Program</h1>
        <form method="POST" action="/new_program">
 
                <div class="form-group">
                    <label for="prn_apps"> Number of Programs:</label>
                    <input class="form-control" type="text" id="prn_apps" name="prn_apps">
                </div>

                <div class="form-group">
                    <label for="prfund_agency"> Fund Agency:</label>
                    <input class="form-control" type="text" id="prfun_agency" name="prfun_agency">
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
                    <label for="prelegibility"> Eligibility:</label>
                    <input class="form-control" type="text" id="prelegibility" name="prelegibility">
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

                <button type="submit" class="btn btn-primary">Create</button>
        </form>
        </div>
    </div>

<?php get_adminfooter();?>