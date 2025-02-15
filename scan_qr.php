-<?php
if (isset($_GET['data'])) {
    $scannedData = $_GET['data']; // Get scanned QR data

    echo "<h2>Scan Successful!</h2>";
    echo "<p>Data Scanned: <strong>$scannedData</strong></p>";
} else {
    echo "<h2>No QR Code Data Found</h2>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan Result</title>
</head>
<body>
    <a href="scanner.html">Scan Another</a>
</body>
</html>
