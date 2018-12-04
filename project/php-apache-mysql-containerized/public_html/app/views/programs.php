<?php 
    needs_login();
    get_header();
    get_navbar();
    get_content();
?>
    <div class="content button-wrapper">
        <div class="row">
            <div class="col-md-3">
                <?php if(ifAdmin()): ?><a href="/new_program"><button class="btn btn-primary">New Program</button></a><?php endif;?>
            </div>
        </div>
    </div>

    <h1>Available Programs</h1>

    <table id="programs" class="display hover cell-border stripe" style="width:100%">
        <thead>
            <tr>
                <!-- <th>Number of Application</th> -->
                <th>Fund Agency</th>
                <th>Survey</th>
                <th>Description</th>
                <th>Cost</th>
                <th>Location</th>
                <th>Eligibility</th>
                <th>Award Amount</th>
                <th>Start Date </th>
                <th>Dead Line</th>
                <th>View</th>
                <?php if(ifAdmin()): ?><th>Actions</th> <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach(view_programs() as $program): ?>
            <tr>
                <!-- <td><?php echo $program->prn_apps;  ?></td> -->
                <td><?php echo $program->prfun_agency;  ?></td>
                <td><?php echo $program->prsurvey;  ?></td>
                <td><?php echo $program->prdescription;  ?></td>
                <td><?php echo $program->prcost;  ?></td>
                <td><?php echo $program->prlocation;  ?></td>
                <td><?php echo $program->prelegibility;  ?></td>
                <td><?php echo $program->prawardamount;  ?></td>
                <td><?php echo $program->prstartdate;  ?></td>
                <td><?php echo $program->prdeadline;  ?></td>
                <td><a href="/program?pid=<?= $program->prid ?>"><button class="btn btn-primary">View</button></a></td>
                <?php if(ifAdmin()): ?><td><a href="/edit_program?pid=<?php echo $program->prid?>"><button class="btn btn-primary">Edit</button></a></td><?php endif; ?>
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

<?php get_footer(); ?>