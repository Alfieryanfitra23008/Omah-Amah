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

    <link rel="stylesheet" href="{{ asset('css/user/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/informasi.css') }}">
</head>

<body>

    @include('user_partials.sidebar')

    <main class="main-content">

        <!-- Topbar -->
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

        <!-- Konten Informasi Kost -->
        <section class="kost-hero">
            <div class="kost-hero-left">
                <span class="kost-eyebrow">KENALI TEMPAT TINGGALMU</span>
                <h2>Informasi Kost</h2>
                <p class="kost-left-description">
                    Temukan informasi lengkap mengenai tempat tinggalmu,
                    mulai dari lingkungan, fasilitas, hingga kenyamanan
                    yang ditawarkan oleh Omah Amah.
                </p>
                <div class="kost-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1200&q=85" alt="Rumah kost Omah Amah" class="kost-house-image">
                    <div class="image-caption">
                        <div class="caption-icon"><i class="bi bi-house-heart-fill"></i></div>
                        <div>
                            <h4>Tempat Tinggal Nyaman</h4>
                            <p>Temukan tempat pulang terbaikmu.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kost-hero-right">
                <span class="kost-status">
                    <span class="status-dot"></span>
                    INFORMASI KOST
                </span>
                <h2 class="kost-name" id="infoKostName">Kost Omah Amah</h2>
                <p class="kost-description" id="infoKostDescription">
                    Omah Amah merupakan hunian yang dirancang untuk
                    memberikan pengalaman tinggal yang nyaman dan praktis.
                </p>
                <div class="kost-address">
                    <div class="address-icon"><i class="bi bi-geo-alt-fill"></i></div>
                    <div class="address-content">
                        <span class="address-label">Alamat Kost</span>
                        <p id="infoKostAddress">Alamat kost belum tersedia.</p>
                    </div>
                </div>
                <div class="kost-note">
                    <i class="bi bi-info-circle-fill"></i>
                    <p>Informasi alamat, harga, dan fasilitas dapat diperbarui sesuai data resmi pengelola kost.</p>
                </div>
                <div class="kost-actions">
                    <a href="{{ url('/user/rooms') }}" class="btn-kost-primary">
                        <i class="bi bi-door-open"></i>
                        <span>Lihat Kamar</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="{{ url('/user/chatbot') }}" class="btn-kost-secondary">
                        <i class="bi bi-robot"></i>
                        <span>Tanya Amah AI</span>
                    </a>
                </div>
                <div class="kost-highlights">
                    <div class="highlight-item"><i class="bi bi-check-circle-fill"></i><span>Informasi Terpusat</span></div>
                    <div class="highlight-item"><i class="bi bi-check-circle-fill"></i><span>Bantuan AI</span></div>
                </div>
            </div>
        </section>

        
<!-- INFORMASI KOST (DINAMIS) -->
<section class="kost-information">
    <div class="kost-info-grid">
        <div class="kost-info-card">
            <div class="kost-info-icon icon-location"><i class="bi bi-geo-alt"></i></div>
            <div class="kost-info-content">
                <span class="kost-info-label">Lokasi Kost</span>
                <h3 id="cardLokasi">Memuat...</h3>
                <p><i class="bi bi-clock"></i> <span id="cardLokasiStatus">-</span></p>
            </div>
        </div>
        <div class="kost-info-card">
            <div class="kost-info-icon icon-price"><i class="bi bi-wallet2"></i></div>
            <div class="kost-info-content">
                <span class="kost-info-label">Harga Kost</span>
                <h3 id="cardHarga">Memuat...</h3>
                <p><i class="bi bi-clock"></i> <span id="cardHargaStatus">-</span></p>
            </div>
        </div>
        <div class="kost-info-card">
            <div class="kost-info-icon icon-facility"><i class="bi bi-house-check"></i></div>
            <div class="kost-info-content">
                <span class="kost-info-label">Fasilitas</span>
                <h3 id="cardFasilitas">Memuat...</h3>
                <p><i class="bi bi-clock"></i> <span id="cardFasilitasStatus">-</span></p>
            </div>
        </div>
        <div class="kost-info-card">
            <div class="kost-info-icon icon-status"><i class="bi bi-door-open"></i></div>
            <div class="kost-info-content">
                <span class="kost-info-label">Ketersediaan Kamar</span>
                <h3 id="cardKetersediaan">Memuat...</h3>
                <p><i class="bi bi-clock"></i> <span id="cardKetersediaanStatus">-</span></p>
            </div>
        </div>
    </div>
</section>


<!-- Section Ruang Bersama & Fasilitas Umum (DINAMIS) -->
<section class="public-facilities-section">
    <div class="public-facilities-heading">
        <span class="public-facilities-eyebrow">FASILITAS PENDUKUNG</span>
        <h2>Ruang Bersama &amp; Fasilitas Umum</h2>
        <p>Nikmati berbagai fasilitas pendukung yang dirancang untuk menunjang kenyamanan dan kebutuhan sehari-hari penghuni kost.</p>
    </div>
    <div class="public-facilities-grid" id="publicFacilitiesContainer">
        <p class="text-center w-100">Memuat fasilitas...</p>
    </div>
    <div class="public-facilities-note">
        <i class="bi bi-info-circle"></i>
        <span>Ketersediaan fasilitas mengikuti kondisi dan ketentuan pengelola kost.</span>
    </div>
</section>


<!-- Section Lokasi & Akses Sekitar -->
<section class="location-section">
    <div class="location-heading">
        <span class="location-eyebrow">TEMUKAN LOKASI KAMI</span>
        <h2>Lokasi &amp; Akses Sekitar</h2>
        <p>Ketahui lokasi Omah Amah dan kemudahan akses menuju kampus maupun tempat kerja untuk mendukung aktivitas harianmu.</p>
    </div>

    <div class="location-grid">
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
                    <p id="locationAddress">Memuat alamat...</p>
                </div>
            </div>
            <div class="location-detail-item">
                <div class="location-detail-icon"><i class="bi bi-mortarboard-fill"></i></div>
                <div class="location-detail-content">
                    <h4>Akses ke Kampus</h4>
                    <p>Kampus dapat dijangkau dengan berjalan kaki jika penghuni tidak memiliki kendaraan, sesuai jarak dan kondisi rute.</p>
                </div>
            </div>
            <div class="location-detail-item">
                <div class="location-detail-icon"><i class="bi bi-briefcase-fill"></i></div>
                <div class="location-detail-content">
                    <h4>Akses ke Kantor</h4>
                    <p>Waktu dan kemudahan perjalanan bergantung pada lokasi kantor serta pilihan transportasi.</p>
                </div>
            </div>
            <div class="location-info-note">
                <i class="bi bi-info-circle-fill"></i>
                <span>Periksa jarak dan rute perjalanan sebelum berangkat untuk memperkirakan waktu tempuh.</span>
            </div>
            <!-- TOMBOL PETUNJUK ARAH -->
            <a href="#" id="mapsDirectionLink" target="_blank" rel="noopener noreferrer" class="location-direction-button">
                <i class="bi bi-sign-turn-right-fill"></i>
                Lihat Petunjuk Arah
                <i class="bi bi-arrow-up-right"></i>
            </a>
        </div>

        <div class="location-map-card">
            <div class="location-map-header">
                <div>
                    <span class="location-card-label">PETA LOKASI</span>
                    <h3>Temukan Omah Amah</h3>
                </div>
                <div class="location-map-icon"><i class="bi bi-map-fill"></i></div>
            </div>
            <div class="location-map-frame">
                <iframe id="mapsIframe" src="" width="100%" height="100%" style="border:0;" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" title="Peta lokasi Omah Amah"></iframe>
            </div>
            <div class="location-map-footer">
                <i class="bi bi-compass-fill"></i>
                <span>Gunakan peta untuk mencari rute menuju lokasi.</span>
            </div>
        </div>
    </div>
</section>


<!-- Section Peraturan Kost & Layanan -->
<section class="rules-services-section">
    <div class="rules-services-heading">
        <span class="rules-services-eyebrow">INFORMASI PENGHUNI</span>
        <h2>Peraturan Kost &amp; Layanan</h2>
        <p>Pahami peraturan yang berlaku dan temukan informasi layanan untuk mendukung kenyamanan selama tinggal di Omah Amah.</p>
    </div>

    <div class="rules-services-grid">
        <div class="rules-card">
            <div class="rules-card-header">
                <div>
                    <span class="rules-card-label">TATA TERTIB</span>
                    <h3>Peraturan Kost</h3>
                </div>
            </div>
            <div class="rule-list" id="houseRulesList">
                <p>Memuat peraturan...</p>
            </div>
            <div class="rules-reminder">
                <i class="bi bi-info-circle-fill"></i>
                <span>Mari patuhi peraturan untuk menciptakan lingkungan kost yang aman, tertib, dan nyaman.</span>
            </div>
        </div>

        <div class="services-card">
            <div class="services-card-header">
                <div>
                    <span class="services-card-label">KAMI SIAP MEMBANTU</span>
                    <h3>Layanan dan Bantuan</h3>
                </div>
            </div>
            <div class="service-list">
                <div class="service-item">
                    <div class="service-icon service-laundry"><i class="bi bi-basket2-fill"></i></div>
                    <div class="service-content">
                        <h4>Layanan Laundry</h4>
                        <p id="laundryContactName">Memuat...</p>
                        <a href="#" id="laundryContactPhone" class="service-contact">
                            <i class="bi bi-telephone-fill"></i>
                            <span>-</span>
                        </a>
                    </div>
                    <a href="#" id="laundryWA" target="_blank" rel="noopener noreferrer" class="service-action" title="Hubungi via WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
                <div class="service-item">
                    <div class="service-icon service-manager"><i class="bi bi-person-vcard-fill"></i></div>
                    <div class="service-content">
                        <h4>Kontak Pengelola Kost</h4>
                        <p id="managerContactName">Memuat...</p>
                        <a href="#" id="managerContactPhone" class="service-contact">
                            <i class="bi bi-telephone-fill"></i>
                            <span>-</span>
                        </a>
                    </div>
                    <a href="#" id="managerWA" target="_blank" rel="noopener noreferrer" class="service-action" title="Hubungi via WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
                <div class="service-item">
                    <div class="service-icon service-room"><i class="bi bi-door-open-fill"></i></div>
                    <div class="service-content">
                        <h4>Prosedur Melihat Kamar</h4>
                        <p>Calon penghuni dapat datang langsung ke lokasi untuk melihat kondisi kamar.</p>
                    </div>
                </div>
            </div>
            <div class="services-help-note">
                <i class="bi bi-chat-dots-fill"></i>
                <div>
                    <h4>Butuh informasi lebih lanjut?</h4>
                    <p>Silakan hubungi pengelola kost melalui kontak yang tersedia untuk mendapatkan bantuan.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Section FAQ (DINAMIS) -->
<section class="faq-section">
    <div class="faq-heading">
        <span class="faq-eyebrow">SEBELUM MENENTUKAN PILIHAN</span>
        <h2>Pertanyaan yang Sering Ditanyakan</h2>
        <p>Temukan jawaban atas beberapa pertanyaan umum sebelum memilih Omah Amah sebagai tempat tinggalmu.</p>
    </div>
    <div class="faq-list" id="faqList">
        <p>Memuat FAQ...</p>
    </div>
</section>


<!-- Section CTA: Temukan Kost -->
<section class="kost-cta-section">
    <div class="kost-cta-card">
        <div class="kost-cta-content">
            <span class="kost-cta-eyebrow"><i class="bi bi-house-heart-fill"></i> OMAH AMAH</span>
            <h2>Sudah menemukan kos yang sesuai?</h2>
            <p>Temukan kamar dan fasilitas yang sesuai dengan kebutuhanmu, atau tanyakan langsung kepada Amah AI untuk mendapatkan informasi lebih lanjut tentang Omah Amah.</p>
            <div class="kost-cta-actions">
                <a href="{{ url('/user/rooms') }}" class="kost-cta-button primary">
                    <i class="bi bi-door-open-fill"></i>
                    Lihat Kamar dan Fasilitas
                    <i class="bi bi-arrow-right"></i>
                </a>
                <a href="{{ url('/user/chatbot') }}" class="kost-cta-button secondary">
                    <i class="bi bi-robot"></i>
                    Tanya AI
                </a>
            </div>
        </div>
        <div class="kost-cta-decoration">
            <div class="kost-cta-circle circle-one"></div>
            <div class="kost-cta-circle circle-two"></div>
            <i class="bi bi-house-heart-fill kost-cta-house-icon"></i>
            <i class="bi bi-stars kost-cta-stars"></i>
        </div>
    </div>
</section>

<!-- Footer Omah Amah -->
<footer class="user-footer">
    <div class="user-footer-main">
        <div class="footer-brand">
            <a href="{{ url('/user/dashboard') }}" class="footer-brand-logo">
                <span class="footer-brand-icon"><i class="bi bi-house-heart-fill"></i></span>
                <span>Omah <strong>Amah</strong></span>
            </a>
            <p class="footer-description">Temukan tempat tinggal yang nyaman dan sesuai dengan kebutuhanmu. Omah Amah hadir untuk membantu perjalananmu menemukan kos menjadi lebih mudah dan praktis.</p>
        </div>
        <div class="footer-navigation">
            <h4>Navigasi</h4>
            <a href="{{ url('/user/dashboard') }}">Dashboard</a>
            <a href="{{ route('user.inform') }}">Informasi Kost</a>
            <a href="{{ url('/user/rooms') }}">Kamar &amp; Fasilitas</a>
            <a href="{{ url('/user/chatbot') }}">Chatbot AI</a>
        </div>
    </div>
    <div class="user-footer-bottom">
        <p>&copy; {{ date('Y') }} Omah Amah. Seluruh hak cipta dilindungi.</p>
        <span>Dibuat dengan <i class="bi bi-heart-fill"></i> untuk kenyamananmu</span>
    </div>
</footer>

        <!-- Footer -->
        <footer class="inform-footer">
            <p>&copy; {{ date('Y') }} Omah Amah. Seluruh hak cipta dilindungi.</p>
            <span>Dibuat dengan <i class="bi bi-heart-fill"></i> untuk kenyamananmu</span>
        </footer>

    </main>

    <script src="{{ asset('js/user/dashboard.js') }}" defer></script>

    <!-- SCRIPT UNTUK MENARIK DATA DARI API -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // 1. Ambil Profil Kost (Nama, Deskripsi, Alamat, dan Peta)
            fetch('/api/kost-profile')
                .then(res => res.json())
                .then(res => {
                    if(res.success && res.data) {
                        const data = res.data;
                        document.getElementById('infoKostName').textContent = data.name || 'Omah Amah';
                        document.getElementById('infoKostDescription').textContent = data.description || 'Deskripsi belum tersedia.';
                        document.getElementById('infoKostAddress').textContent = data.address || 'Alamat belum diset.';
                        document.getElementById('locationAddress').textContent = data.address || 'Alamat belum diset.';
                        document.getElementById('cardLokasi').textContent = data.name || 'Alamat belum diset';
                        document.getElementById('cardLokasiStatus').textContent = data.address || 'Lokasi menunggu konfirmasi';

                        // MEMBUAT TAUTAN PETA BERDASARKAN ALAMAT (Valid)
                        const addressQuery = encodeURIComponent(data.address || 'Omah Amah');
                        
                        // Selalu gunakan alamat untuk membuat tautan (abaikan maps_link jika error)
                        const mapsUrl = `https://www.google.com/maps/search/?api=1&query=${addressQuery}`;
                        
                        document.getElementById('mapsDirectionLink').href = mapsUrl;
                        document.getElementById('mapsIframe').src = `https://maps.google.com/maps?q=${addressQuery}&t=&z=15&ie=UTF8&iwloc=&output=embed`;
                    }
                });

            // 2. Ambil Data Kamar (Harga & Ketersediaan)
            fetch('/api/rooms')
                .then(res => res.json())
                .then(res => {
                    if(res.success && res.data.length > 0) {
                        const rooms = res.data;
                        
                        const prices = rooms.filter(r => r.monthly_price > 0).map(r => r.monthly_price);
                        if(prices.length > 0) {
                            const minPrice = Math.min(...prices);
                            document.getElementById('cardHarga').textContent = `Rp ${parseInt(minPrice).toLocaleString('id-ID')}`;
                            document.getElementById('cardHargaStatus').textContent = 'Harga sewa mulai dari';
                        } else {
                            document.getElementById('cardHarga').textContent = 'Hubungi Pengelola';
                            document.getElementById('cardHargaStatus').textContent = 'Harga menunggu konfirmasi';
                        }

                        const availableCount = rooms.filter(r => r.availability === 'tersedia').length;
                        document.getElementById('cardKetersediaan').textContent = `${availableCount} Kamar`;
                        document.getElementById('cardKetersediaanStatus').textContent = 'Siap dihuni';
                    }
                });

            // 3. Ambil Fasilitas (Untuk Kartu Atas & Ruang Bersama)
            fetch('/api/facilities')
                .then(res => res.json())
                .then(res => {
                    if(res.success) {
                        document.getElementById('cardFasilitas').textContent = `${res.data.length} Fasilitas`;
                        document.getElementById('cardFasilitasStatus').textContent = 'Tersedia untuk penghuni';

                        const container = document.getElementById('publicFacilitiesContainer');
                        container.innerHTML = '';
                        const publicFac = res.data.filter(f => f.category === 'bersama' || f.category === 'layanan');
                        
                        publicFac.forEach(fac => {
                            let iconClass = 'bi-stars';
                            let iconColor = 'icon-common';
                            if(fac.name.toLowerCase().includes('wifi')) { iconClass = 'bi-wifi'; iconColor = 'icon-wifi'; }
                            else if(fac.name.toLowerCase().includes('parkir')) { iconClass = 'bi-p-square-fill'; iconColor = 'icon-parking'; }
                            else if(fac.name.toLowerCase().includes('keamanan')) { iconClass = 'bi-shield-check'; iconColor = 'icon-security'; }
                            else if(fac.name.toLowerCase().includes('laundry')) { iconClass = 'bi-basket2-fill'; iconColor = 'icon-laundry'; }

                            container.innerHTML += `
                                <div class="public-facility-card">
                                    <div class="public-facility-icon ${iconColor}">
                                        <i class="bi ${iconClass}"></i>
                                    </div>
                                    <h3>${fac.name}</h3>
                                    <p>${fac.description || 'Fasilitas pendukung untuk penghuni.'}</p>
                                </div>
                            `;
                        });
                    }
                });

            // 4. Ambil Peraturan Kost & FAQ (Menggunakan API FAQ)
            fetch('/api/faqs')
                .then(res => res.json())
                .then(res => {
                    if(res.success) {
                        const rulesList = document.getElementById('houseRulesList');
                        rulesList.innerHTML = '';
                        res.data.slice(0, 5).forEach((faq, index) => {
                            rulesList.innerHTML += `
                                <div class="rule-item">
                                    <div class="rule-number">0${index + 1}</div>
                                    <div class="rule-content">
                                        <h4>${faq.question}</h4>
                                        <p>${faq.answer}</p>
                                    </div>
                                </div>
                            `;
                        });

                        const faqList = document.getElementById('faqList');
                        faqList.innerHTML = '';
                        res.data.forEach((faq) => {
                            faqList.innerHTML += `
                                <div class="faq-item">
                                    <button type="button" class="faq-question" aria-expanded="false">
                                        <span>${faq.question}</span>
                                        <span class="faq-toggle"><i class="bi bi-plus-lg"></i></span>
                                    </button>
                                    <div class="faq-answer">
                                        <p>${faq.answer}</p>
                                    </div>
                                </div>
                            `;
                        });
                    }
                });

            // 5. Ambil Kontak Pengelola & Laundry
            fetch('/api/kost-profile')
                .then(res => res.json())
                .then(res => {
                    if(res.success && res.data) {
                        document.getElementById('managerContactName').textContent = res.data.contact_name || 'Ibu Kost';
                        document.getElementById('managerContactPhone').innerHTML = `<i class="bi bi-telephone-fill"></i> ${res.data.contact_phone || '-'}`;
                        document.getElementById('managerContactPhone').href = `tel:${res.data.contact_phone || ''}`;
                        document.getElementById('managerWA').href = `https://wa.me/${(res.data.contact_phone || '').replace(/[^0-9]/g, '')}`;
                    }
                });

            fetch('/api/laundry')
                .then(res => res.json())
                .then(res => {
                    if(res.success && res.data) {
                        document.getElementById('laundryContactName').textContent = res.data.contact_name || 'Ibu Laundry';
                        document.getElementById('laundryContactPhone').innerHTML = `<i class="bi bi-telephone-fill"></i> ${res.data.contact_wa || '-'}`;
                        document.getElementById('laundryContactPhone').href = `tel:${res.data.contact_wa || ''}`;
                        document.getElementById('laundryWA').href = `https://wa.me/${(res.data.contact_wa || '').replace(/[^0-9]/g, '')}`;
                    }
                });

        });
    </script>

</body>
</html>