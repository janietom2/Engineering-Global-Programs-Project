<?php 
    needs_login();
    requires_admin();
    $id = program_id();
    approval_update($id);
    get_adminheader();
    get_adminnavbar();
    get_admincontent();
?>
    <?php $program = getApplication($id); ?>
    <h1 class="program-title"><?php echo $program->prfun_agency; ?></h1>
    <div class="row program-info">
        <div class="col-md-3">
            <ul>
                <li><b>Student Name:</b></li>
                 - <?= $program->pfname." ".$program->plname ?>
                <li><b>Gender:</b></li>
                 - <?= $program->apgender ?>
                 <li><b>Country:</b></li>
                 - <?= $program->applaceofbirth ?>
                 <li><b>Classification:</b></li>
                 - <?= $program->apclassification ?>
                 <li><b>Contact:</b></li>
                 - +<?= $program->apcontact ?>

            </ul>
        </div>
        <div class="col-md-3">
            <ul>
                 <li><b>GPA:</b></li>
                 - <?= $program->pgpa ?>
                 <li><b>Fund Agency:</b></li>
                 - <?= $program->prfun_agency ?>
                 <li><b>Essay Link File:</b></li>
                 - <a target="_blank" href="./upload/<?= $program->apessay ?>"><?= $program->apessay ?></a>
                 <li><b>LinkedIn:</b></li>
                 - <?= $program->aplinkedin ?>
                 <li><b>Status:</b></li>
                 - <b><?= get_status($program->status); ?></b>

            </ul>
        </div>

        <div class="col-md-3">
            <h3>Media Files</h3>
            <ul>
            <?php foreach(getMediaFiles($id) as $file): ?>
                <li><a target="_blank" href="./upload/<?=$file->mfile ?>" ><?= $file->mfile; ?></a></li>
            <?php endforeach; ?>
            </ul>
        </div>


    </div>

    <div class="row">
        <div class="col-md-6">
            <form class method="POST" action="/admin-check-application?pid=<?= $id ?>">
                <div class="form-group">
                <label for="statuschange">Status Change</label>
                <select class="form-control" name="statuschange" id="statuschange">
                    <option value="1">Approve</option>
                    <option value="2">Reject</option>
                </select>
                <label for="apreason"> Reason (If denied):</label>
                    <textarea class="form-control" type="text" id="apreason" name="apreason"> </textarea>
                </div>
                <input type="hidden" name="token" value="<?= token::generate()?>">
                <br>
                <input type="submit" class="btn btn-primary" value="Update">
            </form>
        </div>
    </div>

<?php
    get_adminfooter();
?>