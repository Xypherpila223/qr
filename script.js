document.addEventListener("DOMContentLoaded", () => {
    const video = document.getElementById("video");
    const scanResult = document.getElementById("scan-result");
    const scanBtn = document.getElementById("scan-btn");
    const generateQRBtn = document.getElementById("generate-qr");
    const teacherOptions = document.getElementById("teacher-options");

    let scanner = new Instascan.Scanner({ video: video });

    scanner.addListener("scan", (content) => {
        scanResult.textContent = "Scan Successful: " + content;
    });

    function startScanner() {
        Instascan.Camera.getCameras()
            .then((cameras) => {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    alert("No camera found!");
                }
            })
            .catch((e) => console.error(e));
    }

    // Start scanner on page load
    startScanner();

    // Restart scanner when button is clicked
    scanBtn.addEventListener("click", () => {
        startScanner();
    });

    // Generate QR based on selected option
    generateQRBtn.addEventListener("click", () => {
        const selectedClass = teacherOptions.value;
        window.location.href = `generate_qr.php?class=${selectedClass}`;
    });
});
