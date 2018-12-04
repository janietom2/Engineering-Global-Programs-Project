<?php 
    needs_login();
    $id = program_id();
    get_header();
    get_navbar();
    get_content();
?>
    <?php $program = get_program($id); ?>
    <h1 class="program-title"><?php echo $program->prfun_agency; ?></h1>
    <div class="row program-info">
        <div class="col-4">
            <ul>
                <li><b>Description:</b></li>
                 - <?= $program->prdescription ?>
                <li><b>Survey:</b></li>
                 - <?= $program->prsurvey ?>
                 <li><b>Cost:</b></li>
                 - $<?= $program->prcost ?> USD
                 <li><b>Start Date:</b></li>
                 - <?= $program->prstartdate ?>

            </ul>
        </div>
        <div class="col-4">
            <ul>
                 <li><b>Location:</b></li>
                 - <?= $program->prlocation ?>
                 <li><b>Eligibility:</b></li>
                 - <?= $program->prelegibility ?>
                 <li><b>Award Amount:</b></li>
                 - $<?= $program->prawardamount ?> USD
                 <li><b>Dead Line:</b></li>
                 - <?= $program->prdeadline ?>
            </ul>
        </div>
    </div>
   <a href="/new_application?pid=<?= $program->prid ?>"> <button class="btn btn-primary">Apply</button> </a>

<?php
    get_footer();
?>