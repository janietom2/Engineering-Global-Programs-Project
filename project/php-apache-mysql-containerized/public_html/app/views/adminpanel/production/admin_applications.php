<?php
get_init();
needs_login();
requires_admin();
get_adminheader();
get_adminnavbar();
get_admincontent();
?>

<h1>All Applications</h1>

<table id="programs" class="display hover cell-border stripe" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Gender</th>
                <th>Country</th>
                <th>Classification</th>
                <th>GPA</th>
                <th>Program Fund Agency</th>
                <th>Essay File</th>
                <th>LinkedIn</th>
                <th>Contact Number</th>
                <th>Status</th>
                <?php if(ifAdmin()): ?><th>Actions</th> <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach(view_applications() as $program): ?>
            <tr>
                <td><?php echo $program->apid;  ?></td>
                <td><?php echo $program->pfname." ".$program->plname;  ?></td>
                <td><?php echo $program->apgender;  ?></td>
                <td><?php echo $program->applaceofbirth;  ?></td>
                <td><?php echo $program->apclassification;  ?></td>
                <td><?php echo $program->pgpa;  ?></td>
                <td><?php echo $program->prfun_agency;  ?></td>
                <td><?php echo $program->apessay;  ?></td>
                <td><?php echo $program->aplinkedin;  ?></td>
                <td>+<?php echo $program->apcontact;  ?></td>
                <td><?php echo get_status($program->status);  ?></td>
                <?php if(ifAdmin()): ?>
                <td><a href="/admin-check-application?pid=<?php echo $program->apid?>"><button class="btn btn-primary">Check</button></a></td><?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
        
    </table>

    <script>
        $(document).ready(function() {

            $('#programs').DataTable( {
                responsive: true
            } );


        });
    </script>

<?php
get_adminfooter();
?>