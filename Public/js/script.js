// Konfirmasi hapus data
function confirmDelete(url) {
    if (confirm("Yakin ingin menghapus data?")) {
        window.location.href = url;
    }
}

// Auto timestamp untuk waktu kunjungan tamu
function autoFillDateTime() {
    let now = new Date();
    let tanggal = now.toISOString().slice(0, 10);
    let waktu = now.toLocaleTimeString("id-ID", { hour12: false });

    let tglInput = document.getElementById("tanggal_kunjungan");
    let wktInput = document.getElementById("waktu_kunjungan");

    if (tglInput) tglInput.value = tanggal;
    if (wktInput) wktInput.value = waktu;
}

document.addEventListener("DOMContentLoaded", autoFillDateTime);
