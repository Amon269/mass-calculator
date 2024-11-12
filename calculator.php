<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

define("SOLAR_MASS_KG", 1.989e30); // Solar mass in kilograms

$solar_mass = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $star_mass_kg = $_POST['mass_kg'];
    if ($star_mass_kg > 0) {
        $solar_mass = $star_mass_kg / SOLAR_MASS_KG;
    } else {
        echo "<script>alert('Please enter a valid mass.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Solar Mass Calculator</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Solar Mass Calculator</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="mass_kg" class="form-label">Star Mass (kg)</label>
                <input type="number" step="any" class="form-control" id="mass_kg" name="mass_kg" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate Solar Mass</button>
        </form>

        <?php if ($solar_mass !== null): ?>
            <div class="mt-4">
                <h3>Results:</h3>
                <p>The star's mass is approximately <strong><?php echo number_format($solar_mass, 2); ?></strong> solar masses.</p>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
