<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'includes/database.php';

// Provera da li je korisnik prijavljen
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Provera da li je prosleđen ID kategorije
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$category_id = $_GET['id'];

// Dobijanje podataka o kategoriji
try {
    $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
    $stmt->execute([$category_id]);
    $category = $stmt->fetch();
    
    if (!$category) {
        header("Location: index.php");
        exit();
    }
} catch(PDOException $e) {
    die("Greška pri učitavanju kategorije: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($category['name']); ?> - Moja Biznis Platforma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php include 'includes/header.php'; ?>

    <main class="container my-5">
        <h1><?php echo htmlspecialchars($category['name']); ?></h1>
        <p class="lead"><?php echo htmlspecialchars($category['description']); ?></p>
        
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info">
                    <h4>Kursevi u ovoj kategoriji</h4>
                    <p>Ova funkcionalnost će biti dodata uskoro. Ovde će biti prikazani svi kursevi iz kategorije "<?php echo htmlspecialchars($category['name']); ?>".</p>
                    <p>U međuvremenu, možete istražiti druge kategorije!</p>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>