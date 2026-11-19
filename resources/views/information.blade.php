<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Informasi Kost | Omah Amah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/room.css') }}">
    <link rel="stylesheet" href="{{ asset('css/information.css') }}">
</head>
<body>
    @include('partials.sidebar')

    <main class="main-content">
        <header class="topbar">
            <div class="topbar-left">
                <button type="button" class="sidebar-toggle" id="sidebarToggle" aria-label="Buka atau ciutkan sidebar" aria-controls="sidebar" aria-expanded="true">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div>
                    <h1>Informasi Kost</h1>
                    <p>Selamat datang di layanan penghuni Omah Amah.</p>
                </div>
            </div>

            <div class="profile">
                <div class="avatar">P</div>
                <div class="profile-details">
                    <div class="profile-name">Penghuni</div>
                    <div class="profile-role">Member Omah Amah</div>
                </div>
            </div>
        </header>

        <!-- BAGIAN 1: PROFIL & PERATURAN -->
        <div class="row g-3 mb-4">
            
            <div class="col-lg-8">
                <section class="content-card kos-profile-card">
                    <div class="kos-profile-cover">
                        <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=1600&h=650&fit=crop" alt="Foto bangunan Omah Amah" class="kos-profile-image" id="infoKostImage">
                        <div class="kos-cover-label"><i class="bi bi-house-door"></i> Informasi Hunian</div>
                    </div>

                    <div class="kos-profile-content">
                        <div class="kos-profile-heading">
                            <span class="kos-profile-category"><i class="bi bi-building"></i> Hunian Kos</span>
                            <h2 id="infoKostName">Memuat...</h2>
                            <p class="kos-profile-description" id="infoKostDescription">Memuat deskripsi...</p>
                        </div>

                        <!-- Alamat -->
                        <div class="kos-profile-address">
                            <div class="kos-profile-info-icon"><i class="bi bi-geo-alt"></i></div>
                            <div>
                                <h3>Alamat Kos</h3>
                                <p id="infoKostAddress">Memuat alamat...</p>
                            </div>
                        </div>

                        <!-- Harga -->
                        <div class="kos-profile-price">
                            <div class="kos-price-icon"><i class="bi bi-wallet2"></i></div>
                            <div class="kos-price-content">
                                <span class="kos-price-label">Harga Mulai dari</span>
                                <div class="kos-price-value" id="infoKostPrice">Rp - <span>/ bulan</span></div>
                                <p>Harga dapat berbeda sesuai tipe dan fasilitas kamar.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-lg-4">
                <section class="content-card visit-rules-card h-100">
                    <div class="visit-rules-header">
                        <h2 class="section-title">Peraturan &amp; Jam Kunjung</h2>
                        <p>Informasi tata tertib dan waktu kunjungan bagi penghuni Omah Amah.</p>
                    </div>

                    <!-- Peraturan Kos -->
                    <div class="visit-rules-content">
                        <div class="visit-rules-title">
                            <div class="visit-rules-icon"><i class="bi bi-journal-text"></i></div>
                            <div>
                                <h3>Peraturan Kos</h3>
                                <span>Contoh peraturan penghuni</span>
                            </div>
                        </div>
                        <div class="visit-rules-description">
                            <ul id="infoHouseRules"><li>Memuat peraturan...</li></ul>
                        </div>
                    </div>

                    <!-- Jam Kunjung (DINAMIS) -->
                    <div class="visit-time-group">
                        <label for="jamKunjung"><i class="bi bi-clock"></i> Jam Kunjung</label>
                        <input type="text" id="jamKunjung" name="jam_kunjung" class="visit-time-input" value="Memuat..." readonly>
                    </div>

                    <!-- Jam Tenang (DINAMIS) -->
                    <div class="visit-time-group">
                        <label for="jamTenang"><i class="bi bi-moon-stars"></i> Jam Tenang</label>
                        <input type="text" id="jamTenang" name="jam_tenang" class="visit-time-input" value="Memuat..." readonly>
                    </div>

                    <p class="visit-rules-note">
                        <i class="bi bi-info-circle"></i> Aturan khusus, kontak pengelola, dan kebijakan tamu perlu dilengkapi oleh admin.
                    </p>

                    <div class="visit-rules-actions">
                        <button type="button" class="visit-rules-edit-btn" id="editVisitRules">
                            <i class="bi bi-pencil-square"></i> Edit Informasi
                        </button>
                    </div>
                </section>
            </div>
        </div>

        <!-- BAGIAN 2: LOKASI & AKSES -->
        <section class="location-section mt-4">
            <div class="location-heading">
                <span class="location-eyebrow">TEMUKAN LOKASI KAMI</span>
                <h2>Lokasi &amp; Akses Sekitar</h2>
                <p>Ketahui lokasi Omah Amah dan kemudahan akses menuju kampus maupun tempat kerja untuk mendukung aktivitas harianmu.</p>
            </div>

            <div class="location-grid">
                <!-- Card Kiri: Informasi Lokasi -->
                <div class="location-info-card">
                    <div class="location-card-header">
                        <div class="location-main-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div>
                            <span class="location-card-label">LOKASI KOST</span>
                            <h3>Omah Amah</h3>
                        </div>
                    </div>

                    <div class="location-detail-item">
                        <div class="location-detail-icon"><i class="bi bi-pin-map-fill"></i></div>
                        <div class="location-detail-content">
                            <h4>Alamat Kost</h4>
                            <p id="infoLocationAddress">Memuat alamat...</p>
                        </div>
                    </div>

                    <div class="location-info-note">
                        <i class="bi bi-info-circle-fill"></i>
                        <span>Periksa jarak dan rute perjalanan sebelum berangkat untuk memperkirakan waktu tempuh.</span>
                    </div>

                    <!-- Link Google Maps (DINAMIS) -->
                    <a href="#" target="_blank" rel="noopener noreferrer" class="location-direction-button" id="infoMapsLink">
                        <i class="bi bi-sign-turn-right-fill"></i> Lihat Petunjuk Arah <i class="bi bi-arrow-up-right"></i>
                    </a>
                </div>

                <!-- Card Kanan: Google Maps -->
                <div class="location-map-card">
                    <div class="location-map-header">
                        <div>
                            <span class="location-card-label">PETA LOKASI</span>
                            <h3>Temukan Omah Amah</h3>
                        </div>
                        <div class="location-map-icon"><i class="bi bi-map-fill"></i></div>
                    </div>

                    <div class="location-map-frame">
                        <iframe id="infoMapsIframe" src="" width="100%" height="100%" style="border:0;" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" title="Peta lokasi Omah Amah"></iframe>
                    </div>

                    <div class="location-map-footer">
                        <i class="bi bi-compass-fill"></i>
                        <span>Gunakan peta untuk mencari rute menuju lokasi.</span>
                    </div>
                </div>
            </div>
        </section>

        <footer class="dashboard-footer mt-5">
            © 2026 Omah Amah · Smart Boarding House
        </footer>
    </main>

    <script src="{{ asset('js/dashboard.js') }}" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // Variabel untuk menyimpan data asli dari DB
            let kostData = {};

            // 1. AMBIL DATA PROFIL KOST DARI API
            fetch('/api/kost-profile')
                .then(res => res.json())
                .then(res => {
                    if(res.success && res.data) {
                        kostData = res.data;

                        document.getElementById('infoKostName').textContent = kostData.name;
                        document.getElementById('infoKostDescription').textContent = kostData.description || 'Tidak ada deskripsi.';
                        document.getElementById('infoKostAddress').textContent = kostData.address || 'Alamat belum diset.';
                        document.getElementById('infoLocationAddress').textContent = kostData.address || 'Alamat belum diset.';

                        // Tampilkan Jam
                        document.getElementById('jamKunjung').value = kostData.visit_hours || '08.00 - 21.00';
                        document.getElementById('jamTenang').value = kostData.quiet_hours || '22.00 - 06.00';

                        // Tampilkan Link Maps & Iframe
                        const addressQuery = encodeURIComponent(kostData.address || 'Omah Amah');
                        const mapsUrl = kostData.maps_link || `https://www.google.com/maps/search/?api=1&query=${addressQuery}`;
                        
                        document.getElementById('infoMapsLink').href = mapsUrl;
                        document.getElementById('infoMapsIframe').src = `https://maps.google.com/maps?q=${addressQuery}&t=&z=15&ie=UTF8&iwloc=&output=embed`;

                        // Ambil Harga Termurah
                        fetch('/api/rooms')
                            .then(r => r.json())
                            .then(r => {
                                if(r.success && r.data.length > 0) {
                                    const prices = r.data.filter(room => room.monthly_price > 0).map(room => room.monthly_price);
                                    if(prices.length > 0) {
                                        const minPrice = Math.min(...prices);
                                        document.getElementById('infoKostPrice').innerHTML = `Rp${parseInt(minPrice).toLocaleString('id-ID')} <span>/ bulan</span>`;
                                    }
                                }
                            });
                    }
                })
                .catch(err => console.error("Gagal memuat profil kost:", err));

            // 2. AMBIL DATA PERATURAN
            fetch('/api/faqs')
                .then(res => res.json())
                .then(res => {
                    if(res.success && res.data.length > 0) {
                        const ul = document.getElementById('infoHouseRules');
                        ul.innerHTML = '';
                        res.data.slice(0, 3).forEach(faq => {
                            ul.innerHTML += `<li>${faq.question}</li>`;
                        });
                    }
                });

            // 3. FUNGSI TOMBOL EDIT (MENGEDIT SEMUA DATA)
            document.getElementById('editVisitRules').addEventListener('click', function() {
                let newName = prompt("Edit Nama Kost:", kostData.name);
                if(newName === null) return; 

                let newAddress = prompt("Edit Alamat Kost:", kostData.address);
                if(newAddress === null) return;

                let newDesc = prompt("Edit Deskripsi Kost:", kostData.description);
                if(newDesc === null) return;

                let newVisit = prompt("Edit Jam Kunjung:", kostData.visit_hours);
                if(newVisit === null) return;

                let newQuiet = prompt("Edit Jam Tenang:", kostData.quiet_hours);
                if(newQuiet === null) return;

                let newMaps = prompt("Edit Link Google Maps (Kosongkan untuk otomatis):", kostData.maps_link);
                if(newMaps === null) return;

                // Kirim semua perubahan ke database
                fetch('/api/kost-profile', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        name: newName,
                        address: newAddress,
                        description: newDesc,
                        visit_hours: newVisit,
                        quiet_hours: newQuiet,
                        maps_link: newMaps
                    })
                })
                .then(async response => {
                    const data = await response.json();
                    if (response.ok) {
                        alert('Informasi kost berhasil diupdate!');
                        window.location.reload(); 
                    } else {
                        alert('Gagal update: ' + (data.message || 'Pastikan format input benar.'));
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Terjadi kesalahan sistem saat menyimpan data.');
                });
            });
        });
    </script>
</body>
</html>