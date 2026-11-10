const video = document.getElementById("video");
const statusWajah = document.getElementById("statusWajah");
const tombolKamera = document.getElementById("tombolKamera");

let stream = null;
let intervalDeteksi = null;

// Membuka kamera
async function bukaKamera() {
    try {
        stream = await navigator.mediaDevices.getUserMedia({
            video: {
                facingMode: "user"
            },
            audio: false
        });

        video.srcObject = stream;

        statusWajah.textContent = "Kamera aktif, memuat deteksi wajah...";

        await video.play();

        tombolKamera.textContent = "Tutup Kamera";

        mulaiDeteksi();

    } catch (error) {
        statusWajah.textContent =
            "Kamera tidak dapat dibuka. Periksa izin kamera.";
    }
}

// Memulai deteksi wajah
async function mulaiDeteksi() {
    try {
        await faceapi.nets.tinyFaceDetector.loadFromUri(
    "https://cdn.jsdelivr.net/npm/@vladmandic/face-api@1.7.14/model"
);

        statusWajah.textContent = "Silakan arahkan wajah ke kamera.";

        intervalDeteksi = setInterval(async () => {
            if (video.readyState < 2) return;

            const hasil = await faceapi.detectAllFaces(
                video,
                new faceapi.TinyFaceDetectorOptions()
            );

            if (hasil.length > 0) {
                statusWajah.textContent = "Wajah terdeteksi!";
            } else {
                statusWajah.textContent = "Wajah belum terdeteksi.";
            }
        }, 1000);

    } catch (error) {
        statusWajah.textContent =
            "Model deteksi wajah gagal dimuat.";
        console.error(error);
    }
}

// Membuka dan menutup kamera
tombolKamera.addEventListener("click", () => {
    if (stream) {
        tutupKamera();
    } else {
        bukaKamera();
    }
});

function tutupKamera() {
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
        stream = null;
    }

    clearInterval(intervalDeteksi);
    intervalDeteksi = null;

    video.srcObject = null;

    statusWajah.textContent = "Kamera belum aktif.";
    tombolKamera.textContent = "Aktifkan Kamera";
}