<?php
get_init();
needs_login();
requires_admin();
get_adminheader();
get_adminnavbar();
get_admincontent();
?>

<h1>Home for admins</h1>


<?php
get_adminfooter();
?>