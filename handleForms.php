<?php
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertEmployeeBtn'])) {
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    insertEmployee($pdo, $username, $firstName, $lastName, $email);
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['insertSaleBtn'])) {
    $product = $_POST['product'];
    $amount = $_POST['amount'];
    $employee_id = $_GET['employee_id'];

    insertSale($pdo, $product, $amount, $employee_id);
    header("Location: ../viewSales.php?employee_id=$employee_id");
    exit;
}

if (isset($_POST['editEmployeeBtn'])) {
    $employee_id = $_GET['employee_id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    editEmployee($pdo, $employee_id, $firstName, $lastName, $email);
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['editSaleBtn'])) {
    $sale_id = $_GET['sale_id'];
    $product = $_POST['product'];
    $amount = $_POST['amount'];
    $employee_id = $_GET['employee_id'];

    editSale($pdo, $sale_id, $product, $amount);
    header("Location: ../viewSales.php?employee_id=$employee_id");
    exit;
}

if (isset($_POST['deleteEmployeeBtn'])) {
    $employee_id = $_GET['employee_id'];

    deleteEmployee($pdo, $employee_id);
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['deleteSaleBtn'])) {
    $sale_id = $_GET['sale_id'];
    $employee_id = $_GET['employee_id'];

    deleteSale($pdo, $sale_id);
    header("Location: ../viewSales.php?employee_id=$employee_id");
    exit;
}
?>
