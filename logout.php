<?php
session_start();
session_unregister("komunitas_admin_id");
session_unregister("komunitas_admin_pass");
session_destroy();
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
exit;
?>