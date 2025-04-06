<?php
// Assuming this is your main index.php or similar entry point

// Define controller and action variables. This is crucial!
if (isset($_GET['controller'])) {
    $controllerName = $_GET['controller'];
} else {
    $controllerName = 'home'; // Default controller
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index'; // Default action
}

ob_start(); // Start output buffering

$content = ob_get_clean(); // Get the buffered content

require_once __DIR__ . '/layouts/header.php';
require_once __DIR__ . '/layouts/sidebar.php';
?>
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <?php require_once __DIR__ . '/layouts/main.php'; ?>
    </div>
</div>

<?php

require_once __DIR__ . '/layouts/footer.php';
?>