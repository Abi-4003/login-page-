<!-- dashboard.php - User Home -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gradient">
<div class="container mt-5 text-center">
    <div class="card p-5 shadow-sm rounded">
        <h1>Welcome, <?= $_SESSION['username']; ?>!</h1>
        <a href="logout.php" class="btn btn-danger mt-4">Logout</a>
    </div>
</div>
</body>
</html>