<?php 
    needs_login();
    get_header();
    get_navbar();
    get_content();
?>

    <table id="programs" class="display" style="width:100%">
        <thead>
            <th>name</th>
            <th>lastname</th>
        </thead>
        <tbody>
            <td>pepe</td>
            <td>Nieto</td>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#programs').DataTable();
        } );
    </script>

<?php get_footer(); ?>