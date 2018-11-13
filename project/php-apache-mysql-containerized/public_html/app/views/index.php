<?php needs_login(); ?>

<?php 
    get_header();
    get_navbar();
    get_content();
?>
    <p>Welcome <b><?php echo $user->data()->pfname." ".$user->data()->plname; ?> </b>!</p>

<?php
    get_footer();
?>