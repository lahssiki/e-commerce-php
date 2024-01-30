<?php
session_start();
session_unset();
session_destroy();


header('Location: http://localhost/E-commerce_php/');
exit();