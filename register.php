<!-- register.php - Registration Page -->
<?php
include 'db.php';
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        $msg = "Registered successfully!";
    } else {
        $msg = "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gradient">
<div class="container mt-5">
    <div class="card p-4 shadow-sm rounded">
        <h2 class="mb-4 text-center">User Registration</h2>
        <form method="POST">
            <input class="form-control mb-3" type="text" name="username" placeholder="Username" required>
            <input class="form-control mb-3" type="email" name="email" placeholder="Email" required>
            <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
            <button class="btn btn-primary w-100" type="submit">Register</button>
            <p class="text-success mt-2 text-center"><?= $msg ?></p>
        </form>
        <p class="mt-3 text-center">Already registered? <a href="index.php">Login Here</a></p>
    </div>
</div>
</body>
</html>