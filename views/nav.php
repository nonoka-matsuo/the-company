<div class="navbar navbar-dark bg-dark mb-5">
    <div class="container">
        <a href="dashboard.php" class="navbar-brand">
            <h1 class="h4">The Company</h1>
        </a>
        <div class="navbar-text ms-auto">
            <a href="profile.php" class="text-muted text-decoration-none me-2"><?= $_SESSION['username'] ?></a>
            <a href="../actions/logout.php" class="text-danger text-decoration-none">Logout</a>
        </div>
    </div>
</div>