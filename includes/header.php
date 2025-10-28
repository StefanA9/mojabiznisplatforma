<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">BiznisPlatforma</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Početna</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        Predmeti
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        // Provera da li već postoji konekcija
                        if (!isset($pdo)) {
                            include 'database.php';
                        }
                        
                        try {
                            $stmt = $pdo->query("SELECT * FROM categories ORDER BY name");
                            $categories = $stmt->fetchAll();
                            
                            foreach ($categories as $category) {
                                echo '<li><a class="dropdown-item" href="kategorija.php?id=' . $category['id'] . '">' . htmlspecialchars($category['name']) . '</a></li>';
                            }
                        } catch(PDOException $e) {
                            echo '<li><a class="dropdown-item" href="#">Greška pri učitavanju</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="partneri.php">Partneri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="subskripcije.php">Subskripcije</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="onama.php">O nama</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <span class="nav-link">Dobrodošao/la, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Odjava</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Prijava</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Registracija</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>