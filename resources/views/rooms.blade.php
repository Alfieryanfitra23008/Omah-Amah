<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tambah Kamar | Omah Amah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/room.css') }}">
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
                    <h1>Tambah Kamar</h1>
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

        <div class="row g-3">
            
            <div class="col-lg-8">
                <section class="content-card room-detail-card">

                    <!-- Header -->
                    <div class="room-detail-header">
                        <h2 class="section-title">Detail Kamar</h2>
                        <p>Lengkapi informasi kamar</p>
                    </div>

                    <form class="room-detail-form" id="addRoomForm">

                        <!-- Nomor dan Nama Kamar -->
                        <div class="room-form-grid">

                            <div class="room-form-group">
                                <label for="nomor_kamar">Nomor Kamar</label>
                                <input type="text" id="nomor_kamar" name="nomor_kamar" class="room-form-control" placeholder="Contoh: 101" required>
                            </div>

                            <div class="room-form-group">
                                <label for="nama_kamar">Nama Kamar</label>
                                <input type="text" id="nama_kamar" name="nama_kamar" class="room-form-control" placeholder="Contoh: Kamar Mawar" required>
                            </div>

                            <!-- Tipe Kamar dan Harga -->
                            <div class="room-form-group">
                                <label for="tipe_kamar">Tipe Kamar</label>
                                <select id="tipe_kamar" name="tipe_kamar" class="room-form-control" required>
                                    <option value="">Pilih tipe kamar</option>
                                    <option value="standard">Standard</option>
                                    <option value="premium">Premium</option>
                                </select>
                            </div>

                            <div class="room-form-group">
                                <label for="harga_bulanan">Harga Bulanan</label>
                                <div class="room-price-input">
                                    <span>Rp</span>
                                    <input type="number" id="harga_bulanan" name="harga_bulanan" class="room-form-control" placeholder="Contoh: 800000" min="0" required>
                                </div>
                            </div>

                        </div>

                        <p class="room-form-note">
                            Pilihan tipe: Standar / Premium. Harga merupakan sampel, bukan tarif resmi.
                        </p>

                        <!-- Fasilitas Kamar -->
                        <div class="room-form-section">
                            <h3>Fasilitas Kamar</h3>
                            <div class="room-facility-options" id="facilitiesContainer">
                                <!-- Checkbox akan diisi oleh JavaScript dari API -->
                                <span style="font-size: 13px; color: #667085;">Memuat fasilitas...</span>
                            </div>
                        </div>

                        <!-- Status Kamar -->
                        <div class="room-form-group room-status-field">
                            <label for="status_kamar">Status Kamar</label>
                            <select id="status_kamar" name="status_kamar" class="room-form-control" required>
                                <option value="">Pilih status kamar</option>
                                <option value="tersedia">Tersedia</option>
                                <option value="penuh">Penuh</option>
                                <option value="perlu_konfirmasi">Perlu Konfirmasi</option>
                            </select>
                        </div>

                        <!-- Tombol -->
                        <div class="room-form-actions">
                            <button type="reset" class="room-btn-reset">Reset</button>
                            <button type="submit" class="room-btn-save" id="btnSaveRoom">
                                <i class="bi bi-check2-circle"></i> Simpan Kamar
                            </button>
                        </div>

                    </form>

                </section>
            </div>


            <div class="col-lg-4">
                <section class="content-card room-photo-card">

                    <!-- Judul -->
                    <div class="room-photo-header">
                        <h2 class="section-title">Foto Kamar</h2>
                        <p>Tampilkan foto kamar sebagai ilustrasi hunian.</p>
                    </div>

                    <!-- Preview Foto -->
                    <div class="room-photo-preview">
                        <img id="roomPhotoPreview" src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=800&h=500&fit=crop" alt="Foto ilustrasi kamar">
                    </div>

                    <!-- Upload Foto -->
                    <div class="room-upload-area">
                        <div class="room-upload-icon">
                            <i class="bi bi-cloud-arrow-up"></i>
                        </div>

                        <div class="room-upload-content">
                            <label for="roomPhotoInput" class="room-upload-button">
                                <i class="bi bi-image"></i> Pilih Foto
                            </label>
                            <input type="file" id="roomPhotoInput" accept="image/jpeg,image/png,image/jpg" hidden>
                            <p>JPG/PNG maks. 5 MB</p>
                        </div>
                    </div>

                    <!-- Referensi Kamar -->
                    <div class="room-reference-section">
                        <div class="room-reference-header">
                            <h3>Referensi Kamar (Contoh)</h3>
                            <p>Contoh tipe kamar, harga, fasilitas, dan status.</p>
                        </div>

                        <div class="room-reference-grid">
                            <!-- Kamar A01 -->
                            <article class="room-reference-item">
                                <div class="room-reference-top">
                                    <span class="room-reference-number">A01</span>
                                    <span class="room-reference-status">
                                        <span></span> Tersedia
                                    </span>
                                </div>
                                <h4>Standard</h4>
                                <p class="room-reference-price">Rp800.000<span>/bulan</span></p>
                                <p class="room-reference-facilities">Wi-Fi, Lemari</p>
                            </article>

                            <!-- Kamar A02 -->
                            <article class="room-reference-item">
                                <div class="room-reference-top">
                                    <span class="room-reference-number">A02</span>
                                    <span class="room-reference-status">
                                        <span></span> Tersedia
                                    </span>
                                </div>
                                <h4>Premium</h4>
                                <p class="room-reference-price">Rp1.200.000<span>/bulan</span></p>
                                <p class="room-reference-facilities">Wi-Fi, AC</p>
                            </article>
                        </div>
                    </div>

                </section>
            </div>
        </div>

        <footer class="dashboard-footer">
            © 2026 Omah Amah · Smart Boarding House
        </footer>
    </main>

    <script src="{{ asset('js/dashboard.js') }}" defer></script>

    <!-- SCRIPT UNTUK LOGIKA SIMPAN KAMAR & UPLOAD GAMBAR -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // 1. Ambil Data Fasilitas dari API untuk Checkbox
            fetch('/api/facilities')
                .then(res => res.json())
                .then(res => {
                    if(res.success) {
                        const container = document.getElementById('facilitiesContainer');
                        container.innerHTML = ''; // Hapus teks loading
                        
                        res.data.forEach(fac => {
                            // Hanya tampilkan fasilitas kamar & bersama
                            if (fac.category === 'kamar' || fac.category === 'bersama') {
                                container.innerHTML += `
                                    <label class="room-checkbox">
                                        <input type="checkbox" name="fasilitas[]" value="${fac.id}">
                                        <span>${fac.name}</span>
                                    </label>
                                `;
                            }
                        });
                    }
                })
                .catch(err => console.error("Gagal memuat fasilitas:", err));

            // 2. Preview Foto Saat Dipilih
            const imageInput = document.getElementById('roomPhotoInput');
            const imagePreview = document.getElementById('roomPhotoPreview');

            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });

            // 3. Proses Simpan Kamar
            const form = document.getElementById('addRoomForm');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const btnSave = document.getElementById('btnSaveRoom');
                const originalHtml = btnSave.innerHTML;
                btnSave.innerHTML = '<i class="bi bi-hourglass-split"></i> Menyimpan...';
                btnSave.disabled = true;

                // Gunakan FormData untuk mendukung upload file
                const formData = new FormData();
                formData.append('room_code', document.getElementById('nomor_kamar').value);
                formData.append('name', document.getElementById('nama_kamar').value);
                formData.append('room_type', document.getElementById('tipe_kamar').value);
                formData.append('monthly_price', document.getElementById('harga_bulanan').value);
                formData.append('availability', document.getElementById('status_kamar').value);
                
                // Ambil file foto
                if (imageInput.files[0]) {
                    formData.append('image_file', imageInput.files[0]);
                }

                // Ambil fasilitas yang dicentang
                document.querySelectorAll('input[name="fasilitas[]"]:checked').forEach((cb) => {
                    formData.append('facilities[]', cb.value);
                });

                // Kirim ke API
                fetch('/api/rooms', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                })
                .then(async response => {
                    const res = await response.json();
                    if (response.ok) {
                        alert('Kamar baru berhasil ditambahkan!');
                        window.location.href = '/dashboard'; // Redirect ke dashboard setelah sukses
                    } else {
                        alert('Gagal menyimpan: ' + (res.message || 'Periksa kembali isian form.'));
                        console.error(res);
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Terjadi kesalahan sistem.');
                })
                .finally(() => {
                    btnSave.innerHTML = originalHtml;
                    btnSave.disabled = false;
                });
            });
        });
    </script>
</body>
</html>