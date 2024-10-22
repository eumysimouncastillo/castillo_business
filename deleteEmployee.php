<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';
$employee_id = $_GET['employee_id'];

deleteEmployee($pdo, $employee_id);
header("Location: index.php");
exit;
?>
