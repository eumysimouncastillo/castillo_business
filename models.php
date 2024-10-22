<?php
function getAllEmployees($pdo) {
    $stmt = $pdo->query('SELECT * FROM employees');
    return $stmt->fetchAll();
}

function getAllSales($pdo) {
    $stmt = $pdo->query('SELECT * FROM sales');
    return $stmt->fetchAll();
}

function getEmployeeByID($pdo, $employee_id) {
    $stmt = $pdo->prepare('SELECT * FROM employees WHERE employee_id = ?');
    $stmt->execute([$employee_id]);
    return $stmt->fetch();
}

function getSaleByID($pdo, $sale_id) {
    $stmt = $pdo->prepare('SELECT * FROM sales WHERE sale_id = ?');
    $stmt->execute([$sale_id]);
    return $stmt->fetch();
}

function insertEmployee($pdo, $username, $firstName, $lastName, $email) {
    $stmt = $pdo->prepare('INSERT INTO employees (username, first_name, last_name, email) VALUES (?, ?, ?, ?)');
    $stmt->execute([$username, $firstName, $lastName, $email]);
}

function insertSale($pdo, $product, $amount, $employee_id) {
    $stmt = $pdo->prepare('INSERT INTO sales (product, amount, employee_id) VALUES (?, ?, ?)');
    $stmt->execute([$product, $amount, $employee_id]);
}

function editEmployee($pdo, $employee_id, $firstName, $lastName, $email) {
    $stmt = $pdo->prepare('UPDATE employees SET first_name = ?, last_name = ?, email = ? WHERE employee_id = ?');
    $stmt->execute([$firstName, $lastName, $email, $employee_id]);
}

function editSale($pdo, $sale_id, $product, $amount) {
    $stmt = $pdo->prepare('UPDATE sales SET product = ?, amount = ? WHERE sale_id = ?');
    $stmt->execute([$product, $amount, $sale_id]);
}

function deleteEmployee($pdo, $employee_id) {
    $stmt = $pdo->prepare('DELETE FROM employees WHERE employee_id = ?');
    $stmt->execute([$employee_id]);
}

function deleteSale($pdo, $sale_id) {
    $stmt = $pdo->prepare('DELETE FROM sales WHERE sale_id = ?');
    $stmt->execute([$sale_id]);
}
?>
