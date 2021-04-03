<?php

session_start();

session_destroy();

header ('location: http://localhost/wat2021/sessions/sessions.php');

?>