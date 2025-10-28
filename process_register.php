<?php

include 'includes/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validacija
    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['error'] = "Sva polja su obavezna!";
        header("Location: register.php");
        exit();
    }

    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Lozinke se ne poklapaju!";
        header("Location: register.php");
        exit();
    }

    if (strlen($password) < 6) {
        $_SESSION['error'] = "Lozinka mora imati najmanje 6 karaktera!";
        header("Location: register.php");
        exit();
    }

    try {
        // Provera da li korisnik već postoji
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        
        if ($stmt->rowCount() > 0) {
            $_SESSION['error'] = "Korisničko ime ili email već postoje!";
            header("Location: register.php");
            exit();
        }

        // Hash lozinke
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Unos novog korisnika
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $hashed_password]);

        $_SESSION['success'] = "Uspešno ste se registrovali! Sada se možete prijaviti.";
        header("Location: login.php");
        exit();

    } catch(PDOException $e) {
        $_SESSION['error'] = "Greška pri registraciji: " . $e->getMessage();
        header("Location: register.php");
        exit();
    }
} else {
    header("Location: register.php");
    exit();
}
?>