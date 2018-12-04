<?php 
    needs_login();
    $user = new User();
    get_header();
    get_navbar();
    get_content();
?>
    <h1>My Applications</h1>

    <table id="programs" class="display hover cell-border stripe" style="width:100%">
        <thead>
            <tr>
                <th>Aplication ID</th>
                <th>Program ID</th>
                <th>Essay</th>
                <th>aplinkedin</th>
                <th>Contact</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach(get_student_status($user->data()->pid) as $program): ?>
            <tr>
                <td><?php echo $program->apid;  ?></td>
                <td><?php echo $program->prid;  ?></td>
                <td><?php echo $program->apessay;  ?></td>
                <td><?php echo $program->aplinkedin;  ?></td>
                <td><?php echo $program->apcontact;  ?></td>
                <td><?php echo get_status($program->status);  ?></td>
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