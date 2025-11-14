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

    <!-- Premium Hero Section -->

        <!-- Premium Hero Section sa Unsplash API -->
    <section class="hero-section-category" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php
        // Unsplash API za slike kategorija
        $category_images = [
            1 => 'technology programming',      // IT
            2 => 'digital marketing',          // Marketing  
            3 => 'business economics',         // Ekonomija
            4 => 'graphic design creative'     // Dizajn
        ];
        
        $search_query = $category_images[$category_id] ?? 'education';
        $unsplash_url = "https://api.unsplash.com/photos/random?query=" . urlencode($search_query) . "&orientation=landscape&client_id=bkiOlu3uDHIul0kveiHu40UJ7nVd70vySIpAbjl0DuQ";
        
        // Dobijanje slike sa Unsplash API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $unsplash_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept-Version: v1'
        ]);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        $data = json_decode($response, true);
        
        // Ako API radi, koristi Unsplash sliku, inače fallback
        if (isset($data['urls']['regular'])) {
            echo $data['urls']['regular'];
        } else {
            // Fallback gradient pozadina
            echo 'linear-gradient(135deg, var(--primary-color), var(--secondary-color))';
        }
    ?>'); background-size: cover; background-position: center; color: white; padding: 4rem 0; margin-bottom: 2rem; border-radius: 0 0 20px 20px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);"><?php 
                    $category_titles = [
                        1 => 'IT',
                        2 => 'Marketing', 
                        3 => 'Ekonomija',
                        4 => 'Grafički dizajn'
                    ];
                    echo htmlspecialchars($category_titles[$category_id] ?? $category['name']); 
                    ?></h1>
                    <p class="lead" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5);"><?php 
                    $category_descriptions = [
                        1 => 'Kursevi iz informacionih tehnologija i programiranja',
                        2 => 'Digitalni i tradicionalni marketing', 
                        3 => 'Poslovanje, finansije i ekonomija',
                        4 => 'Dizajn, UI/UX i kreativne veštine'
                    ];
                    echo htmlspecialchars($category_descriptions[$category_id] ?? $category['description']); 
                    ?></p>
                </div>
            </div>
        </div>
    </section>
   
    <!---------------------->

    <main class="container my-5">
        <div class="courses-section-title">
            <h2>Kursevi u ovoj kategoriji</h2>
            <p class="lead">Odaberite kurs koji vas zanima i započnite putovanje ka uspehu</p>
        </div>
        
        <div class="courses-grid">
            <?php
            $courses_data = [
                3 => [
                    ['title' => 'Osnove Mikroekonomije', 'description' => 'Uvod u osnovne ekonomske koncepte i principe koji će vam pomoći da razumete tržišne mehanizme.', 'level' => 'Početni'],
                    ['title' => 'Poslovne Finansije', 'description' => 'Naučite kako da upravljate finansijama kompanije i donosite profitabilne poslovne odluke.', 'level' => 'Srednji'],
                    ['title' => 'Tržišna Analiza', 'description' => 'Savladajte tehnike analize tržišta i konkurencije za donošenje strateških odluka.', 'level' => 'Napredni']
                ],
                1 => [
                    ['title' => 'PHP Programiranje', 'description' => 'Savladajte osnove PHP programiranja i kreirajte dinamičke web aplikacije od nule.', 'level' => 'Početni'],
                    ['title' => 'Web Dizajn', 'description' => 'Naučite moderne tehnike web dizajna koje će vaše sajtove učiniti atraktivnim i funkcionalnim.', 'level' => 'Srednji'],
                    ['title' => 'Baze Podataka', 'description' => 'Usavršite veštine rada sa SQL i relacionim bazama podataka za kompleksne aplikacije.', 'level' => 'Srednji']
                ],
                2 => [
                    ['title' => 'Digitalni Marketing', 'description' => 'Strategije marketinga na digitalnim platformama koje donose merljive rezultate.', 'level' => 'Srednji'],
                    ['title' => 'SEO Optimizacija', 'description' => 'Napredne tehnike optimizacije sajta za pretraživače koje povećavaju vidljivost.', 'level' => 'Napredni'],
                    ['title' => 'Društveni Mediji', 'description' => 'Kreirajte efektivne marketinške kampanje kroz društvene mreže i gradite zajednicu.', 'level' => 'Srednji']
                ],
                4 => [
                    ['title' => 'UI/UX Dizajn', 'description' => 'Dizajnirajte intuitivne korisničke interfejse koji povedavaju zadovoljstvo korisnika.', 'level' => 'Srednji'],
                    ['title' => 'Adobe Photoshop', 'description' => 'Osnove rada u Adobe Photoshop-u za kreiranje profesionalnih grafičkih elemenata.', 'level' => 'Početni'],
                    ['title' => 'Grafički Identitet', 'description' => 'Kreirajte celovit grafički identitet kompanije koji ostavlja jak utisak.', 'level' => 'Napredni']
                ]
            ];
            
            $courses = $courses_data[$category_id] ?? [];
            
            if (empty($courses)): ?>
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <h5>💫 Novi kursevi uskoro stižu!</h5>
                        <p>Trenutno radimo na novim kursevima za ovu kategoriju. Povratite se uskoro!</p>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($courses as $course): ?>
                <div class="course-card card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($course['title']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($course['description']); ?></p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="course-level level-<?php echo strtolower($course['level']); ?>">
                                📚 <?php echo htmlspecialchars($course['level']); ?>
                            </span>
                            <small class="text-muted">⭐ Premium kurs</small>
                        </div>
                        
                        <button class="course-btn" onclick="alert('🎉 Kurs \"<?php echo htmlspecialchars($course['title']); ?>\" će biti dostupan uskoro!\n\nBićete obavešteni kada budemo pokrenuli ovaj kurs.')">
                            🚀 Započni Kurs
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script> <!-- SEARCH JAVASCRIPT -->
</body>
</html>