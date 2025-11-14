<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subskripcije - Moja Biznis Platforma</title>
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
                    <h1>Izaberite Vaš Plan</h1>
                    <p class="lead">Odaberite paket koji najbolje odgovara vašim potrebama i napredujte u svojoj karijeri.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Subscription Plans -->
    <section class="container my-5">
        <div class="row">
            <!-- Silver Plan -->
            <div class="col-md-4 mb-4">
                <div class="card subscription-card h-100">
                    <div class="card-header">
                        <h4>Silver</h4>
                        <p class="mb-0">Osnovni pristup</p>
                    </div>
                    <div class="card-body">
                        <div class="price">$12<span class="fs-6">/mesečno</span></div>
                        <div class="text-muted mb-3">$100.00 / godišnje</div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2">✓ Pristup osnovnim kursevima</li>
                            <li class="mb-2">✓ E-literatura i materijali</li>
                            <li class="mb-2">✓ Forumska podrška</li>
                            <li class="mb-2 text-muted">✗ Video lekcije</li>
                            <li class="mb-2 text-muted">✗ Certifikati</li>
                        </ul>
                        <button class="btn btn-outline-primary w-100">Izaberi Plan</button>
                    </div>
                </div>
            </div>
            
            <!-- Gold Plan -->
            <div class="col-md-4 mb-4">
                <div class="card subscription-card h-100">
                    <div class="card-header bg-warning">
                        <h4>Gold</h4>
                        <p class="mb-0">Najpopularniji</p>
                    </div>
                    <div class="card-body">
                        <div class="price">$29<span class="fs-6">/mesečno</span></div>
                        <div class="text-muted mb-3">$320.00 / godišnje</div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2">✓ Sve iz Silver paketa</li>
                            <li class="mb-2">✓ Video lekcije</li>
                            <li class="mb-2">✓ Digitalni certifikati</li>
                            <li class="mb-2">✓ Projekti i vežbe</li>
                            <li class="mb-2 text-muted">✗ Lični mentor</li>
                        </ul>
                        <button class="btn btn-warning w-100">Izaberi Plan</button>
                    </div>
                </div>
            </div>
            
            <!-- Platinum Plan -->
            <div class="col-md-4 mb-4">
                <div class="card subscription-card h-100">
                    <div class="card-header bg-primary">
                        <h4>Platinum</h4>
                        <p class="mb-0">Premium iskustvo</p>
                    </div>
                    <div class="card-body">
                        <div class="price">$32<span class="fs-6">/mesečno</span></div>
                        <div class="text-muted mb-3">$355.00 / godišnje</div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2">✓ Sve iz Gold paketa</li>
                            <li class="mb-2">✓ Lični mentor</li>
                            <li class="mb-2">✓ Ekskluzivni sadržaj</li>
                            <li class="mb-2">✓ Prioritetna podrška</li>
                            <li class="mb-2">✓ Career coaching</li>
                        </ul>
                        <button class="btn btn-primary w-100">Izaberi Plan</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

      <script src="js/script.js"></script> <!-- DODAJTE OVU LINIJU -->
</body>
</html>