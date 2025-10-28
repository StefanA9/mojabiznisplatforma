<?php

include 'includes/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Validacija
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Korisničko ime i lozinka su obavezni!";
        header("Location: login.php");
        exit();
    }

    try {
        // Pronalaženje korisnika
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Uspešna prijava
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            
            $_SESSION['success'] = "Uspešno ste se prijavili!";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['error'] = "Pogrešno korisničko ime ili lozinka!";
            header("Location: login.php");
            exit();
        }

    } catch(PDOException $e) {
        $_SESSION['error'] = "Greška pri prijavi: " . $e->getMessage();
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>