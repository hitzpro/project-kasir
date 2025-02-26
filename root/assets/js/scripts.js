


// Script untuk card, nav & footer
document.addEventListener("DOMContentLoaded", function () {
    // Ambil semua elemen di dalam navbar
    document.querySelectorAll("#navbar > div").forEach(nav => {
        if (!nav.classList.contains("nav-log")) {
            nav.style.display = "none"; // Sembunyikan navbar lain selain nav-log
        }
    });

    // Menampilkan hanya footer dengan class "foot-basic"
    document.querySelectorAll("footer > div").forEach(foot => {
        if (!foot.classList.contains("foot-basic")) {
            foot.style.display = "none";
        }
    });

    // Ambil semua container
    const containers = document.querySelectorAll(".container");

    if (containers.length >= 2) {
        // Container pertama hanya menampilkan .table-card-reg
        containers[0].querySelectorAll(".card").forEach(card => {
            if (!card.classList.contains("table-card-reg")) {
                card.style.display = "none"; 
            }
        });

        // Container kedua hanya menampilkan .table-card-vip
        containers[1].querySelectorAll(".card").forEach(card => {
            if (!card.classList.contains("table-card-vip")) {
                card.style.display = "none"; 
            }
        });
    }

});



// scrip carousel

document.addEventListener("DOMContentLoaded", function () {
    function setupCarousel(carousel) {
        const track = document.createElement("div");
        track.classList.add("carousel-track");

        // Pindahkan semua card ke dalam track
        while (carousel.children.length > 2) {
            track.appendChild(carousel.children[1]);
        }
        carousel.insertBefore(track, carousel.children[1]);

        const prevButton = carousel.querySelector(".button-prev");
        const nextButton = carousel.querySelector(".button-next");
        const card = track.children[0]; // Ambil satu card untuk ukuran
        const cardWidth = card.offsetWidth; // Lebar asli card dari CSS
        const gap = parseInt(getComputedStyle(track).gap) || 0; // Ambil gap dari CSS
        const containerWidth = carousel.clientWidth; // Lebar container carousel
        const totalCards = track.children.length; // Total jumlah card
        const trackWidth = totalCards * (cardWidth + gap) - gap; // Lebar total track

        let currentPosition = 0;

        nextButton.addEventListener("click", function () {
            const extraSpace = 20; // Ubah angka ini sesuai kebutuhan
            const maxScroll = trackWidth - containerWidth + extraSpace;

            let nextPosition = currentPosition + cardWidth + gap;

            // Jika nextPosition melebihi batas scroll, geser mentok ke kanan
            if (nextPosition > maxScroll) {
                nextPosition = maxScroll;
            }

            track.style.transform = `translateX(-${nextPosition}px)`;
            currentPosition = nextPosition;
        });

        prevButton.addEventListener("click", function () {
            let prevPosition = currentPosition - (cardWidth + gap);

            // Jangan geser lebih dari 0
            if (prevPosition < 0) {
                prevPosition = 0;
            }

            track.style.transform = `translateX(-${prevPosition}px)`;
            currentPosition = prevPosition;
        });
    }

    document.querySelectorAll(".carousel").forEach(setupCarousel);
});




document.addEventListener("DOMContentLoaded", function () {
    const btnOpenModal = document.querySelectorAll(".qrcode");
    const overlay = document.createElement("div");
    overlay.className = "overlay";
    document.body.appendChild(overlay);
    
    let modalTimeouts = [];

    function showModal(modalHtml) {
        overlay.innerHTML = modalHtml;
        overlay.style.display = "flex";
        const modal = overlay.querySelector(".container-modal");
        modal.classList.add("fade-in");
    }

    function closeModal() {
        clearAllTimeouts();
        const modal = overlay.querySelector(".container-modal");
        if (modal) modal.classList.add("fade-out");
        
        setTimeout(() => {
            overlay.style.display = "none";
            overlay.innerHTML = "";
        }, 300);
    }

    function clearAllTimeouts() {
        modalTimeouts.forEach(timeout => clearTimeout(timeout));
        modalTimeouts = [];
    }

    function showNotification(type) {
        const notif = document.querySelector(`.${type}`);
        notif.classList.add("show");
        
        setTimeout(() => {
            notif.classList.remove("show");
            notif.classList.add("hide");
    
            setTimeout(() => {
                notif.classList.remove("hide");
            }, 500); // Sesuai dengan CSS transition
        }, 2000); // Tampil selama 2 detik
    }
    
    function startModalSequence() {
        showModal(`<div class="container-modal">
            <div class="msg-tittle"><p><strong>Pesan Meja</strong></p><div class="close">x</div></div>
            <div class="line"></div>
            <h3>Meja 1</h3>
            <img src="/root/assets/images/qrcode.png" alt="QR-Code">
            <p>Pindai Kode Berikut Untuk memesan meja</p>
        </div>`);
    
        modalTimeouts.push(setTimeout(() => {
            showModal(`<div class="container-modal">
                <div class="msg-tittle"><p><strong>Pesan Meja</strong></p><div class="close">x</div></div>
                <div class="line"></div>
                <h3>Meja 1</h3>
                <div class="loading">
                    <img src="/root/assets/images/loading.gif" alt="loading-gif">
                    <p>Tunggu sebentar...</p>
                </div>
            </div>`);
    
            modalTimeouts.push(setTimeout(() => {
                showModal(`<div class="container-modal">
                    <div class="msg-tittle"><p><strong>Pesan Meja</strong></p><div class="close">x</div></div>
                    <div class="line"></div>
                    <h3>Meja 1</h3>
                    <div class="loading">
                        <img src="/root/assets/images/success.gif" alt="success-gif" class="success">
                        <p>Berhasil memesan</p>
                    </div>
                </div>`);
    
                modalTimeouts.push(setTimeout(() => {
                    showModal(`<div class="container-modal">
                        <div class="msg-tittle"><p><strong>Pesan Meja</strong></p><div class="close">x</div></div>
                        <div class="line"></div>
                        <h3>Meja 1</h3>
                        <p>Masukkan nomor WhatsApp yang bisa dihubungi</p>
                        <form id="whatsappForm">
                            <input type="number" name="no_telp" placeholder="+62948093232">
                            <button type="submit" class="btn btn-primary">Lanjut</button>
                        </form>
                    </div>`);
    
                    document.getElementById("whatsappForm").addEventListener("submit", function (event) {
                        event.preventDefault();
                        showModal(`<div class="container-modal">
                            <div class="msg-tittle"><p><strong>Pesan Meja</strong></p><div class="close">x</div></div>
                            <div class="line"></div>
                            <h3>Meja 1</h3>
                            <p>Masukkan nomor WhatsApp yang bisa dihubungi</p>
                            <input type="number" name="no_telp" placeholder="+62948093232" disabled>
                            <div class="loading">
                                <img src="/root/assets/images/loading.gif" alt="loading-gif">
                                <p>Tunggu Sebentar</p>
                            </div>
                        </div>`);
    
                        modalTimeouts.push(setTimeout(() => {
                            closeModal();
                            
                            // ✅ Tampilkan notifikasi sukses sebelum pindah
                            showNotification("success-notif");
    
                            // ✅ Tunggu animasi notifikasi selesai baru pindah
                            setTimeout(() => {
                                window.location.href = "pesan_menu.php";
                            }, 2500); // Sesuai waktu tampil notif
                            
                        }, 2000));
                    });
                }, 2000));
            }, 2000));
        }, 2000));
    }
    

    btnOpenModal.forEach(btn => {
        btn.addEventListener("click", startModalSequence);
    });

    overlay.addEventListener("click", function (e) {
        if (e.target.classList.contains("close")) {
            closeModal();
        }
    });
});


document.getElementById("pesan-meja-biasa").addEventListener("click", function () {
    document.getElementById("meja-biasa").scrollIntoView({ behavior: "smooth" });
});

document.getElementById("pesan-meja-vip").addEventListener("click", function () {
    document.getElementById("meja-vip").scrollIntoView({ behavior: "smooth" });
});
