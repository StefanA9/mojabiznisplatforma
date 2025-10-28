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

    <main class="container my-5">
        <h1>Izaberite Vaš Plan</h1>
        <p class="lead">Odaberite paket koji najbolje odgovara vašim potrebama.</p>
        
        <div class="row">
            <!-- Silver Plan -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h4>Silver</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">$12.00 / mesečno</h5>
                        <h6>$100.00 / godišnje</h6>
                        <ul class="list-unstyled">
                            <li>✓ Pristup osnovnim kursevima</li>
                            <li>✓ E-literatura</li>
                        </ul>
                        <button class="btn btn-outline-secondary">Izaberi</button>
                    </div>
                </div>
            </div>
            
            <!-- Gold Plan -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4>Gold</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">$28.99 / mesečno</h5>
                        <h6>$320.00 / godišnje</h6>
                        <ul class="list-unstyled">
                            <li>✓ Sve iz Silver paketa</li>
                            <li>✓ Video lekcije</li>
                            <li>✓ Certifikati</li>
                        </ul>
                        <button class="btn btn-warning">Izaberi</button>
                    </div>
                </div>
            </div>
            
            <!-- Platinum Plan -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Platinum</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">$32.00 / mesečno</h5>
                        <h6>$355.00 / godišnje</h6>
                        <ul class="list-unstyled">
                            <li>✓ Sve iz Gold paketa</li>
                            <li>✓ Lični mentor</li>
                            <li>✓ Ekskluzivni sadržaj</li>
                        </ul>
                        <button class="btn btn-primary">Izaberi</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>