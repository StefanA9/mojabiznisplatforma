<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'includes/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['query'])) {
    $query = trim($_POST['query']);
    
    if (strlen($query) < 2) {
        echo '<div class="p-2 text-muted">Unesite bar 2 karaktera</div>';
        exit;
    }
    
    try {
        // PRETRAŽI KATEGORIJE IZ BAZE (PREDMETE)
        $stmt = $pdo->prepare("SELECT id, name, description FROM categories WHERE LOWER(name) LIKE ? ORDER BY name");
        $stmt->execute(['%' . strtolower($query) . '%']);
        $categories = $stmt->fetchAll();
        
        if (empty($categories)) {
            echo '<div class="p-2 text-muted">Nema rezultata za "' . htmlspecialchars($query) . '"</div>';
        } else {
            foreach ($categories as $category) {
                // PRAVI LINK KA STRANICI PREDMETA SA PRAVIM ID-jevima IZ VAŠE BAZE
                echo '<a href="kategorija.php?id=' . $category['id'] . '" class="search-result p-2 border-bottom d-block text-decoration-none text-dark">';
                echo '<strong>' . htmlspecialchars($category['name']) . '</strong><br>';
                echo '<small class="text-muted">' . htmlspecialchars($category['description']) . '</small>';
                echo '</a>';
            }
        }
        
    } catch(PDOException $e) {
        echo '<div class="p-2 text-danger">Greška pri pretrazi: ' . $e->getMessage() . '</div>';
    }
} else {
    echo '<div class="p-2 text-muted">Nevažeći zahtev</div>';
}
?>