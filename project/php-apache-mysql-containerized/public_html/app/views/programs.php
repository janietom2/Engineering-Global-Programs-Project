<?php 
    needs_login();
    get_header();
    get_navbar();
    get_content();
?>
    <div class="content button-wrapper">
        <div class="row">
            <div class="col-md-3">
                <a href="/new_program"><button class="btn btn-primary">New Program</button></a>
            </div>
        </div>
    </div>

    <table id="programs" class="display" style="width:100%">
        <thead>
                <th>Number of Application</th>
                <th>Fund Agency</th>
                <th>Survey</th>
                <th>Description</th>
                <th>Cost</th>
                <th>Location</th>
                <th>Eligibility</th>
                <th>Date Line</th>
                <th>Actions</th>
        </thead>
        <?php foreach(view_programs() as $program): ?>
            <tbody>
                <td><?php echo $program->prn_apps;  ?></td>
                <td><?php echo $program->prfund_agency;  ?></td>
                <td><?php echo $program->prsurvey;  ?></td>
                <td><?php echo $program->prdescription;  ?></td>
                <td><?php echo $program->prcost;  ?></td>
                <td><?php echo $program->prlocation;  ?></td>
                <td><?php echo $program->preligibility;  ?></td>
                <td><?php echo $program->prdateline;  ?></td>
                <td><a href="/edit_program?pid=<?php echo $program->prid?>"><button class="btn btn-primary">Edit</button></a></td>
            </tbody>
        <?php endforeach; ?>
        
    </table>

    <script>
        $(document).ready(function() {
            $('#programs').DataTable();
        } );
    </script>

<?php get_footer(); ?>