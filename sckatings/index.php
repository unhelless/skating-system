<?php 


include "db/db.php";
include "db/base.php";

new app(substr($_SERVER['REQUEST_URI'],2));


?>