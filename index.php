<?php
// OVO MORA BITI NA PRVOJ LINIJI
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'includes/database.php';

// Provera da li je korisnik prijavljen
if (isset($_SESSION['user_id'])) {
    // Ako je prijavljen, prikaži početnu stranicu
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja Biznis Platforma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <main class="container my-5">
        <h1>Dobrodošli na Moja Biznis Platforma, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p class="lead">Vaša prva destinacija za profesionalni razvoj i učenje.</p>
        <div class="row">
            <div class="col-md-4">
                <h3>Kursevi</h3>
                <p>Pristupite našoj bogatoj biblioteci kurseva.</p>
            </div>
            <div class="col-md-4">
                <h3>Eksperti</h3>
                <p>Učite od najboljih u industriji.</p>
            </div>
            <div class="col-md-4">
                <h3>Certifikati</h3>
                <p>Unapredite svoj CV sa našim sertifikatima.</p>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
} else {
    // Ako nije prijavljen, preusmeri na login
    header("Location: login.php");
    exit();
}
?>