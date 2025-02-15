
<?php
include 'phpqrcode/qrlib.php'; // Include the QR library

// Create a directory for storing QR codes if it doesn't exist
$qrDir = 'qrcodes/';
if (!is_dir($qrDir)) {
    mkdir($qrDir, 0777, true);
}

if (isset($_POST['generate'])) {
    $data = $_POST['qr_data']; // Data to encode in QR
    if (!empty($data)) {
        $filename = $qrDir . uniqid() . ".png"; // Unique filename for QR code
        QRcode::png($data, $filename, QR_ECLEVEL_L, 10); // Generate QR code

        echo "<h3>QR Code Generated:</h3>";
        echo "<img src='$filename' alt='QR Code'>";
        echo "<p>Scan this QR code for testing.</p>";
    } else {
        echo "<p style='color:red;'>Please enter data to generate QR code.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate QR Code</title>
</head>
<body>
    <h2>QR Code Generator</h2>
    <form method="POST">
        <input type="text" name="qr_data" placeholder="Enter text for QR" required>
        <button type="submit" name="generate">Generate QR Code</button>
    </form>
</body>
</html>
