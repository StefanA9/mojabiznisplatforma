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

  <main>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1>Dobrodošli na Moja Biznis Platforma</h1>
                    <p class="lead">Unapredite svoje veštine sa našim premium kursevima i postanite lider u svojoj industriji.</p>
                    <a href="subskripcije.php" class="btn btn-light btn-lg">Započnite Putovanje</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="container my-5">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2>Zašto Birati Nas?</h2>
                <p class="lead">Sve što vam je potrebno za uspeh na jednom mestu</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div style="font-size: 3rem; color: var(--secondary-color); margin-bottom: 1rem;">📚</div>
                        <h4>Kursevi Visokog Kvaliteta</h4>
                        <p>Pristupite našoj bogatoj biblioteci kurseva koje su kreirali vodeći eksperti u industriji.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div style="font-size: 3rem; color: var(--secondary-color); margin-bottom: 1rem;">👨‍🏫</div>
                        <h4>Eksperti iz Industrije</h4>
                        <p>Učite od najboljih praktičara koji dele svoje iskustvo i know-how.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div style="font-size: 3rem; color: var(--secondary-color); margin-bottom: 1rem;">🏆</div>
                        <h4>Priznati Certifikati</h4>
                        <p>Unapredite svoj CV sa našim sertifikatima koji su priznati od strane poslodavaca.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
</main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
</body>
</html>
<?php
} else {
    // Ako nije prijavljen, preusmeri na login
    header("Location: login.php");
    exit();
}
?>