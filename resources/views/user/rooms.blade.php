
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamar dan Fasilitas | Omah Amah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/user/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/rooms.css') }}">
</head>
<body>

    @include('user_partials.sidebar')

    <main class="main-content">

        <!-- Topbar -->
        <header class="topbar">
            <div class="topbar-left">
                <button
                    type="button"
                    class="sidebar-toggle"
                    id="sidebarToggle"
                    aria-label="Buka atau ciutkan sidebar"
                    aria-controls="sidebar"
                    aria-expanded="true">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div>
                    <h1>Kamar dan Fasilitas</h1>
                    <p>Informasi pilihan kamar Omah Amah.</p>
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

        <div class="rooms-page-content">

            <!-- Hero Heading -->
            <section class="rooms-hero">
                <span class="rooms-eyebrow">TEMUKAN RUANG YANG SESUAI</span>
                <h2>Kamar dan Fasilitas</h2>
                <p>
                    Temukan pilihan kamar yang nyaman untuk mendukung
                    aktivitas belajar, bekerja, dan beristirahat.
                    Kenali fasilitas yang tersedia sebelum menentukan pilihan.
                </p>
            </section>

            <!-- Pilihan Kamar -->
            <section class="room-options-section">

                <div class="room-section-heading">
                    <div>
                        <h3>Pilihan Kamar</h3>
                        <p>
                            Jelajahi pilihan kamar dan temukan ruang
                            yang sesuai dengan kebutuhanmu.
                        </p>
                    </div>

                    <span class="room-count">
                        <i class="bi bi-house-door"></i>
                        3 Tipe Kamar
                    </span>
                </div>

                <div class="room-cards-grid">

                    <!-- Card 1 -->
                    <article class="room-card">

                        <div class="room-image-wrapper">
                            <img
                                src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=900&q=85"
                                alt="Contoh kamar kost dengan tempat tidur nyaman"
                                class="room-image"
                                loading="lazy">

                            
                        </div>

                        <div class="room-card-body">
                            <div class="room-title-row">
                                <h4>Kamar Standard</h4>
                                <span class="room-status">
                                    <span></span> Pilihan kamar
                                </span>
                            </div>

                            <div class="room-price">
                                <strong>Hubungi pengelola</strong>
                            </div>

                            <p class="room-description">
                                Kamar sederhana dan nyaman untuk
                                beristirahat serta menjalani aktivitas
                                sehari-hari.
                            </p>

                            <div class="room-facilities">
                                <span><i class="bi bi-snow"></i> AC</span>
                                <span><i class="bi bi-laptop"></i> Meja Belajar</span>
                                <span><i class="bi bi-door-closed"></i> Lemari</span>
                            </div>

                            <a href="{{ url('/user/rooms/standard') }}"
                               class="room-detail-button">
                                Lihat Detail
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                    </article>

                    <!-- Card 2 -->
                    <article class="room-card">

                        <div class="room-image-wrapper">
                            <img
                                src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=900&q=85"
                                alt="Contoh interior kamar kost yang tertata rapi"
                                class="room-image"
                                loading="lazy">

                            
                        </div>

                        <div class="room-card-body">
                            <div class="room-title-row">
                                <h4>Kamar Nyaman</h4>
                                <span class="room-status">
                                    <span></span> Pilihan kamar
                                </span>
                            </div>

                            <div class="room-price">
                                <strong>Hubungi pengelola</strong>
                            </div>

                            <p class="room-description">
                                Ruang pribadi dengan penataan yang
                                mendukung kenyamanan saat belajar,
                                bekerja, maupun beristirahat.
                            </p>

                            <div class="room-facilities">
                                <span><i class="bi bi-snow"></i> AC</span>
                                <span><i class="bi bi-laptop"></i> Meja Belajar</span>
                                <span><i class="bi bi-door-closed"></i> Lemari</span>
                            </div>

                            <a href="{{ url('/user/rooms/nyaman') }}"
                               class="room-detail-button">
                                Lihat Detail
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                    </article>

                    <!-- Card 3 -->
                    <article class="room-card">

                        <div class="room-image-wrapper">
                            <img
                                src="https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=900&q=85"
                                alt="Contoh kamar dengan tempat tidur dan furnitur"
                                class="room-image"
                                loading="lazy">

                            
                        </div>

                        <div class="room-card-body">
                            <div class="room-title-row">
                                <h4>Kamar Privat</h4>
                                <span class="room-status">
                                    <span></span> Pilihan kamar
                                </span>
                            </div>

                            <div class="room-price">
                                <strong>Hubungi pengelola</strong>
                            </div>

                            <p class="room-description">
                                Pilihan ruang pribadi untuk penghuni
                                yang mengutamakan suasana tenang
                                dan privasi.
                            </p>

                            <div class="room-facilities">
                                <span><i class="bi bi-snow"></i> AC</span>
                                <span><i class="bi bi-laptop"></i> Meja Belajar</span>
                                <span><i class="bi bi-door-closed"></i> Lemari</span>
                            </div>

                            <a href="{{ url('/user/rooms/privat') }}"
                               class="room-detail-button">
                                Lihat Detail
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                    </article>

                </div>

                <div class="room-disclaimer">
                    <i class="bi bi-info-circle"></i>
                    <p>
                        Foto kamar merupakan ilustrasi referensi desain.
                        Tipe, harga, fasilitas, dan ketersediaan kamar
                        perlu dikonfirmasi langsung kepada pengelola Omah Amah.
                    </p>
                </div>

            </section>

            
<!-- Section Fasilitas -->
<section class="room-facilities-section">

    <div class="room-facilities-heading">
        <span class="room-facilities-eyebrow">FASILITAS OMAH AMAH</span>
        <h2>Fasilitas Sesuai Kebutuhanmu</h2>
        <p>
            Kenali fasilitas kamar, fasilitas bersama, dan layanan
            tambahan yang dapat menunjang kenyamanan selama tinggal
            di Omah Amah.
        </p>
    </div>

    <div class="room-facilities-cards">

        <!-- Card 1: Fasilitas Kamar -->
        <article class="room-facility-category">

            <div class="room-facility-category-icon icon-bedroom">
                <i class="bi bi-house-door-fill"></i>
            </div>

            <h3>Fasilitas Kamar</h3>

            <p class="room-facility-category-description">
                Fasilitas untuk mendukung aktivitas pribadi,
                belajar, dan beristirahat.
            </p>

            <div class="room-facility-list">

                <div class="room-facility-list-item">
                    <span class="room-facility-list-icon">
                        <i class="bi bi-snow"></i>
                    </span>
                    <span>AC</span>
                </div>

                <div class="room-facility-list-item">
                    <span class="room-facility-list-icon">
                        <i class="bi bi-laptop"></i>
                    </span>
                    <span>Meja Belajar</span>
                </div>

                <div class="room-facility-list-item">
                    <span class="room-facility-list-icon">
                        <i class="bi bi-door-closed-fill"></i>
                    </span>
                    <span>Lemari</span>
                </div>

            </div>

        </article>

        <!-- Card 2: Fasilitas Bersama -->
        <article class="room-facility-category">

            <div class="room-facility-category-icon icon-shared">
                <i class="bi bi-people-fill"></i>
            </div>

            <h3>Fasilitas Bersama</h3>

            <p class="room-facility-category-description">
                Fasilitas umum untuk menunjang kebutuhan
                dan aktivitas sehari-hari penghuni.
            </p>

            <div class="room-facility-list">

                <div class="room-facility-list-item">
                    <span class="room-facility-list-icon">
                        <i class="bi bi-wifi"></i>
                    </span>
                    <span>Wi-Fi</span>
                </div>

                <div class="room-facility-list-item">
                    <span class="room-facility-list-icon">
                        <i class="bi bi-p-square-fill"></i>
                    </span>
                    <span>Parkir</span>
                </div>

                <div class="room-facility-list-item">
                    <span class="room-facility-list-icon">
                        <i class="bi bi-shield-check"></i>
                    </span>
                    <span>Keamanan</span>
                </div>

                <div class="room-facility-list-item">
                    <span class="room-facility-list-icon">
                        <i class="bi bi-people"></i>
                    </span>
                    <span>Area Bersama</span>
                </div>

            </div>

        </article>

        <!-- Card 3: Layanan Tambahan -->
        <article class="room-facility-category">

            <div class="room-facility-category-icon icon-extra">
                <i class="bi bi-stars"></i>
            </div>

            <h3>Layanan Tambahan</h3>

            <p class="room-facility-category-description">
                Layanan pendukung untuk membantu memenuhi
                kebutuhan penghuni selama tinggal di kost.
            </p>

            <div class="room-facility-list">

                <div class="room-facility-list-item">
                    <span class="room-facility-list-icon">
                        <i class="bi bi-basket2-fill"></i>
                    </span>
                    <span>Laundry</span>
                </div>

            </div>

        </article>

    </div>

    <div class="room-facilities-note">
        <i class="bi bi-info-circle"></i>
        <p>
            Ketersediaan fasilitas dapat berbeda sesuai tipe kamar
            dan ketentuan pengelola Omah Amah.
        </p>
    </div>

</section>


<!-- CTA Tanya Amah AI -->
<section class="rooms-ai-cta">
    <div class="rooms-ai-cta-content">
        <span class="rooms-ai-cta-eyebrow">
            <i class="bi bi-stars"></i>
            BUTUH BANTUAN?
        </span>

        <h2>Masih bingung memilih kamar?</h2>

        <p>
            Tenang, Amah AI siap membantu menjawab pertanyaanmu
            dan memberikan informasi untuk membantumu memilih
            kamar yang sesuai dengan kebutuhan.
        </p>

        <a href="{{ url('/user/chatbot') }}" class="rooms-ai-cta-button">
            <i class="bi bi-robot"></i>
            Tanya Amah AI
            <i class="bi bi-arrow-right"></i>
        </a>
    </div>

    <div class="rooms-ai-cta-decoration">
        <div class="rooms-ai-cta-icon">
            <i class="bi bi-chat-heart-fill"></i>
        </div>
        <span class="rooms-ai-cta-sparkle sparkle-one">
            <i class="bi bi-stars"></i>
        </span>
        <span class="rooms-ai-cta-sparkle sparkle-two">
            <i class="bi bi-plus-lg"></i>
        </span>
    </div>
</section>

<!-- Footer Omah Amah -->
<footer class="user-footer">

    <div class="user-footer-main">

        <!-- Identitas dan Deskripsi -->
        <div class="footer-brand">
            <a href="{{ url('/user/dashboard') }}" class="footer-brand-logo">
                <span class="footer-brand-icon">
                    <i class="bi bi-house-heart-fill"></i>
                </span>
                <span>Omah <strong>Amah</strong></span>
            </a>

            <p class="footer-description">
                Temukan tempat tinggal yang nyaman dan sesuai dengan
                kebutuhanmu. Omah Amah hadir untuk membantu perjalananmu
                menemukan kos menjadi lebih mudah dan praktis.
            </p>
        </div>

        <!-- Navigasi -->
        <div class="footer-navigation">
            <h4>Navigasi</h4>

            <a href="{{ url('/user/dashboard') }}">Dashboard</a>
            <a href="{{ route('user.inform') }}">Informasi Kost</a>
            <a href="{{ url('/rooms') }}">Kamar &amp; Fasilitas</a>
            <a href="{{ url('/chatbot') }}">Chatbot AI</a>
        </div>

    </div>

    <!-- Copyright -->
    <div class="user-footer-bottom">
        <p>
            &copy; {{ date('Y') }} Omah Amah.
            Seluruh hak cipta dilindungi.
        </p>

        <span>
            Dibuat dengan <i class="bi bi-heart-fill"></i> untuk kenyamananmu
        </span>
    </div>

</footer>



        </div>

        

    </main>

    <script src="{{ asset('js/user/dashboard.js') }}" defer></script>

</body>
</html>
