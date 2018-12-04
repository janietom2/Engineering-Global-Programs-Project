<?php needs_login(); ?>

<?php 
    get_header();
    get_navbar();
    get_content();
?>
    <h1>Global Programs</h1>
    <p>Welcome <b><?php echo $user->data()->pfname." ".$user->data()->plname; ?> </b>!</p>

    <p>The Engineering Global Programs Office supports faculty, staff, and students to foster, create, and maintain collaborations with international institutions by:</p>

    <ul>
        <li>Facilitating faculty led programs for students to gain experiences beyond the classroom by participating in an interdisciplinary and binational academic environment.</li>
        <li>Facilitating research abroad programs funded by the National Science Foundation.</li>
        <li>Offering two dual degree programs available for students in the departments of Civil Engineering and Metallurgical, Materials, and Biomedical Engineering.</li>
    </ul>

    <img src="https://www.utep.edu/engineering/global%20programs/_Files/GP-Slide/gp-bg.png" alt="img" width="500">

<?php
    get_footer();
?>