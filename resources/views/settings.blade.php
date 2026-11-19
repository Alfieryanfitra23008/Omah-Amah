<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pengaturan | Omah Amah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/room.css') }}">
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
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
                    <h1>Pengaturan</h1>
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
       
            <div class="col-lg-4">
                <section class="content-card settings-menu-card">
                    <div class="settings-menu-header">
                        <h2 class="section-title">Pengaturan</h2>
                        <p>Kelola konfigurasi Omah Amah</p>
                    </div>

                    <div class="settings-menu-list">
                        <button type="button" class="settings-menu-item active" data-settings="profil">
                            <span class="settings-menu-icon icon-profile"><i class="bi bi-person-circle"></i></span>
                            <span class="settings-menu-info">
                                <strong>Profil Admin</strong>
                                <small>Kelola informasi profil admin</small>
                            </span>
                            <i class="bi bi-chevron-right settings-menu-arrow"></i>
                        </button>

                        <button type="button" class="settings-menu-item" data-settings="keamanan">
                            <span class="settings-menu-icon icon-security"><i class="bi bi-shield-lock"></i></span>
                            <span class="settings-menu-info">
                                <strong>Keamanan Akun</strong>
                                <small>Password dan keamanan akun</small>
                            </span>
                            <i class="bi bi-chevron-right settings-menu-arrow"></i>
                        </button>

                        <button type="button" class="settings-menu-item" data-settings="notifikasi">
                            <span class="settings-menu-icon icon-notification"><i class="bi bi-bell"></i></span>
                            <span class="settings-menu-info">
                                <strong>Notifikasi</strong>
                                <small>Atur pemberitahuan sistem</small>
                            </span>
                            <i class="bi bi-chevron-right settings-menu-arrow"></i>
                        </button>

                        <button type="button" class="settings-menu-item" data-settings="kost">
                            <span class="settings-menu-icon icon-kost"><i class="bi bi-house-door"></i></span>
                            <span class="settings-menu-info">
                                <strong>Informasi Kost</strong>
                                <small>Kelola informasi Omah Amah</small>
                            </span>
                            <i class="bi bi-chevron-right settings-menu-arrow"></i>
                        </button>
                    </div>
                </section>
            </div>


            <div class="col-lg-8">

                <!-- PANEL 1: PROFIL ADMIN -->
                <section class="content-card admin-profile-card settings-panel" data-settings-panel="profil">
                    <div class="admin-profile-header">
                        <h2>Profil Admin</h2>
                        <p>Kelola informasi profil dan data akun Omah Amah.</p>
                    </div>

                    <form id="adminProfileForm" class="admin-profile-form">
                        <div class="admin-profile-photo-section">
                            <div class="admin-profile-avatar">
                                <img id="adminProfilePreview" src="https://ui-avatars.com/api/?name=Admin+Omah+Amah&background=eeeaff&color=7564d9&size=200" alt="Foto profil admin">
                            </div>
                            <div class="admin-profile-photo-info">
                                <h3>Foto Profil</h3>
                                <p>Gunakan foto yang jelas agar mudah dikenali.</p>
                                <label for="adminProfilePhoto" class="admin-profile-upload-btn">
                                    <i class="bi bi-camera"></i> Upload Foto
                                </label>
                                <!-- Perbaikan: tambahkan accept dan hidden -->
                                <input type="file" id="adminProfilePhoto" accept="image/jpeg,image/png,image/jpg" hidden>
                                <small>JPG atau PNG, maksimal 5 MB.</small>
                            </div>
                        </div>

                        <div class="admin-profile-divider"></div>

                        <div class="admin-profile-field">
                            <label for="adminFullName">Nama Lengkap</label>
                            <input type="text" id="adminFullName" name="nama_lengkap" class="admin-profile-input" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="admin-profile-field">
                            <label for="adminEmail">Email</label>
                            <input type="email" id="adminEmail" name="email" class="admin-profile-input" placeholder="contoh@email.com" required>
                        </div>

                        <div class="admin-profile-field">
                            <label for="adminPhone">Nomor Telepon</label>
                            <input type="tel" id="adminPhone" name="telepon" class="admin-profile-input" placeholder="Contoh: 081234567890">
                        </div>

                        <div class="admin-profile-field">
                            <label for="adminRole">Peran</label>
                            <select id="adminRole" name="peran" class="admin-profile-input" required>
                                <option value="">Pilih peran</option>
                                <option value="super_admin">Super Admin</option>
                                <option value="admin">Admin</option>
                                <option value="pengelola">Pengelola Kost</option>
                            </select>
                        </div>

                        <div id="adminProfileMessage" class="admin-profile-message" role="status" hidden></div>

                        <div class="admin-profile-actions">
                            <button type="submit" class="admin-profile-save-btn">
                                <i class="bi bi-check2-circle"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </section>


                <!-- PANEL 2: KEAMANAN AKUN -->
                <section class="content-card settings-panel" data-settings-panel="keamanan" hidden>
                    <div class="admin-profile-header">
                        <h2><i class="bi bi-shield-lock"></i> Keamanan Akun</h2>
                        <p>Kelola kata sandi untuk menjaga keamanan akun Anda.</p>
                    </div>

                    <form id="securityForm" class="admin-profile-form">
                        <div class="admin-profile-field">
                            <label for="currentPassword">Email</label>
                            <div class="settings-password-field">
                                <input type="password" id="currentPassword" name="current_password" class="admin-profile-input" placeholder="Masukkan kata sandi saat ini" required>
                                <button type="button" class="toggle-password" data-target="currentPassword"><i class="bi bi-eye"></i></button>
                            </div>
                        </div>

                        <div class="admin-profile-field">
                            <label for="newPassword">Kata Sandi Baru</label>
                            <div class="settings-password-field">
                                <input type="password" id="newPassword" name="new_password" class="admin-profile-input" placeholder="Minimal 8 karakter" required>
                                <button type="button" class="toggle-password" data-target="newPassword"><i class="bi bi-eye"></i></button>
                            </div>
                        </div>

                        <div class="admin-profile-field">
                            <label for="confirmPassword">Konfirmasi Kata Sandi Baru</label>
                            <div class="settings-password-field">
                                <input type="password" id="confirmPassword" name="new_password_confirmation" class="admin-profile-input" placeholder="Ulangi kata sandi baru" required>
                                <button type="button" class="toggle-password" data-target="confirmPassword"><i class="bi bi-eye"></i></button>
                            </div>
                            <small id="passwordMatchText" class="security-field-hint"></small>
                        </div>

                        <div id="securityMessage" class="admin-profile-message" role="status" hidden></div>

                        <div class="admin-profile-actions security-form-actions">
                            <button type="submit" class="admin-profile-save-btn">
                                <i class="bi bi-shield-check"></i> Perbarui Kata Sandi
                            </button>
                        </div>
                    </form>
                </section>


                <!-- PANEL 3: NOTIFIKASI -->
                <section class="content-card settings-panel" data-settings-panel="notifikasi" hidden>
                    <div class="admin-profile-header">
                        <h2><i class="bi bi-bell"></i> Notifikasi</h2>
                        <p>Atur pemberitahuan yang ingin Anda terima dari sistem.</p>
                    </div>

                    <form id="notificationForm" class="admin-profile-form">
                        <div class="notification-setting-item">
                            <div>
                                <strong>Notifikasi Penghuni</strong>
                                <p>Pemberitahuan saat ada penghuni baru.</p>
                            </div>
                            <label class="notification-switch">
                                <input type="checkbox" name="penghuni_baru">
                                <span></span>
                            </label>
                        </div>

                        <div class="notification-setting-item">
                            <div>
                                <strong>Notifikasi Pembayaran</strong>
                                <p>Pemberitahuan terkait pembayaran sewa.</p>
                            </div>
                            <label class="notification-switch">
                                <input type="checkbox" name="pembayaran">
                                <span></span>
                            </label>
                        </div>

                        <div class="notification-setting-item">
                            <div>
                                <strong>Pengingat Jatuh Tempo</strong>
                                <p>Pengingat ketika masa sewa akan berakhir.</p>
                            </div>
                            <label class="notification-switch">
                                <input type="checkbox" name="jatuh_tempo">
                                <span></span>
                            </label>
                        </div>

                        <div class="notification-setting-item">
                            <div>
                                <strong>Informasi dan Pengumuman</strong>
                                <p>Informasi penting mengenai pengelolaan kost.</p>
                            </div>
                            <label class="notification-switch">
                                <input type="checkbox" name="pengumuman">
                                <span></span>
                            </label>
                        </div>

                        <div id="notificationMessage" class="admin-profile-message" role="status" hidden></div>

                        <div class="admin-profile-actions">
                            <button type="submit" class="admin-profile-save-btn">
                                <i class="bi bi-check2-circle"></i> Simpan Preferensi
                            </button>
                        </div>
                    </form>
                </section>


                <!-- PANEL 4: INFORMASI KOST -->
                <section class="content-card settings-panel" data-settings-panel="kost" hidden>
                    <div class="admin-profile-header">
                        <h2><i class="bi bi-house-door"></i> Informasi Kost</h2>
                        <p>Kelola identitas dan informasi kontak Omah Amah.</p>
                    </div>

                    <form id="kostForm" class="admin-profile-form">
                        <div class="admin-profile-field">
                            <label for="kostName">Nama Kost</label>
                            <input type="text" id="kostName" name="nama_kost" class="admin-profile-input" placeholder="Contoh: Omah Amah" required>
                        </div>

                        <div class="admin-profile-field">
                            <label for="kostAddress">Alamat Kost</label>
                            <textarea id="kostAddress" name="alamat" class="admin-profile-input" rows="3" placeholder="Masukkan alamat lengkap kost" required></textarea>
                        </div>

                        <div class="admin-profile-field">
                            <label for="kostPhone">Nomor Telepon Kost</label>
                            <input type="tel" id="kostPhone" name="telepon" class="admin-profile-input" placeholder="Contoh: 081234567890">
                        </div>

                        <div class="admin-profile-field">
                            <label for="kostDescription">Deskripsi Kost</label>
                            <textarea id="kostDescription" name="deskripsi" class="admin-profile-input" rows="4" placeholder="Ceritakan fasilitas dan keunggulan kost"></textarea>
                        </div>

                        <div id="kostMessage" class="admin-profile-message" role="status" hidden></div>

                        <div class="admin-profile-actions">
                            <button type="submit" class="admin-profile-save-btn">
                                <i class="bi bi-check2-circle"></i> Simpan Informasi Kost
                            </button>
                        </div>
                    </form>
                </section>

            </div>
        </div>

        <footer class="dashboard-footer">
            © 2026 Omah Amah · Smart Boarding House
        </footer>
    </main>

    <script src="{{ asset('js/dashboard.js') }}" defer></script>
    <script src="{{ asset('js/settings.js') }}" defer></script>

    <!-- SCRIPT LOGIKA API PENGATURAN (DIPERBAIKI) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // ==========================================
            // 1. AMBIL DATA SAAT HALAMAN DIMUAT
            // ==========================================
            fetch('/api/admin-profile')
                .then(res => res.json())
                .then(res => {
                    if(res.success && res.data) {
                        const data = res.data;
                        document.getElementById('adminFullName').value = data.nama_lengkap || '';
                        document.getElementById('adminEmail').value = data.email || '';
                        document.getElementById('adminPhone').value = data.telepon || '';
                        document.getElementById('adminRole').value = data.peran || '';
                        
                        // PERBAIKAN: Tampilkan foto dari database jika ada
                        if(data.foto_url) {
                            document.getElementById('adminProfilePreview').src = data.foto_url;
                        }
                    }
                })
                .catch(err => console.error("Gagal memuat profil admin:", err));

            // Ambil Notifikasi
            fetch('/api/notification-settings')
                .then(res => res.json())
                .then(res => {
                    if(res.success && res.data) {
                        const data = res.data;
                        document.querySelector('input[name="penghuni_baru"]').checked = data.notif_penghuni == 1 || data.notif_penghuni === true;
                        document.querySelector('input[name="pembayaran"]').checked = data.notif_pembayaran == 1 || data.notif_pembayaran === true;
                        document.querySelector('input[name="jatuh_tempo"]').checked = data.notif_jatuh_tempo == 1 || data.notif_jatuh_tempo === true;
                        document.querySelector('input[name="pengumuman"]').checked = data.notif_pengumuman == 1 || data.notif_pengumuman === true;
                    }
                })
                .catch(err => console.error("Gagal memuat notifikasi:", err));

            // Ambil Informasi Kost
            fetch('/api/kost-profile')
                .then(res => res.json())
                .then(res => {
                    if(res.success && res.data) {
                        const data = res.data;
                        document.getElementById('kostName').value = data.name || '';
                        document.getElementById('kostAddress').value = data.address || '';
                        document.getElementById('kostPhone').value = data.contact_phone || '';
                        document.getElementById('kostDescription').value = data.description || '';
                    }
                })
                .catch(err => console.error("Gagal memuat informasi kost:", err));


            // ==========================================
            // 2. PREVIEW FOTO SAAT DIPILIH (TAMBAHAN)
            // ==========================================
            document.getElementById('adminProfilePhoto').addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('adminProfilePreview').src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });


            // ==========================================
            // 3. SIMPAN FORM PROFIL ADMIN (DENGAN FORMDATA)
            // ==========================================
            document.getElementById('adminProfileForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const msg = document.getElementById('adminProfileMessage');
                msg.hidden = false;
                msg.textContent = 'Menyimpan...';

                // Gunakan FormData untuk mengirim file
                const formData = new FormData();
                formData.append('nama_lengkap', document.getElementById('adminFullName').value);
                formData.append('email', document.getElementById('adminEmail').value);
                formData.append('telepon', document.getElementById('adminPhone').value);
                formData.append('peran', document.getElementById('adminRole').value);

                // Tambahkan file foto jika ada
                const fotoInput = document.getElementById('adminProfilePhoto');
                if (fotoInput.files[0]) {
                    formData.append('foto_file', fotoInput.files[0]);
                }

                fetch('/api/admin-profile', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        // Jangan set 'Content-Type', biarkan browser mengaturnya otomatis
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(res => {
                    msg.textContent = res.message;
                    if(res.success) {
                        msg.style.color = '#218653';
                        // Update foto jika API mengembalikan URL baru
                        if(res.foto_url) {
                            document.getElementById('adminProfilePreview').src = res.foto_url;
                        }
                    } else {
                        msg.style.color = '#c33b3b';
                    }
                })
                .catch(err => {
                    msg.textContent = 'Terjadi kesalahan sistem.';
                    msg.style.color = '#c33b3b';
                });
            });


            // ==========================================
            // 4. SIMPAN FORM NOTIFIKASI
            // ==========================================
            document.getElementById('notificationForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const msg = document.getElementById('notificationMessage');
                msg.hidden = false;
                msg.textContent = 'Menyimpan...';

                fetch('/api/notification-settings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        penghuni_baru: document.querySelector('input[name="penghuni_baru"]').checked,
                        pembayaran: document.querySelector('input[name="pembayaran"]').checked,
                        jatuh_tempo: document.querySelector('input[name="jatuh_tempo"]').checked,
                        pengumuman: document.querySelector('input[name="pengumuman"]').checked
                    })
                })
                .then(res => res.json())
                .then(res => {
                    msg.textContent = res.message;
                    if(res.success) msg.style.color = '#218653';
                    else msg.style.color = '#c33b3b';
                })
                .catch(err => {
                    msg.textContent = 'Terjadi kesalahan sistem.';
                    msg.style.color = '#c33b3b';
                });
            });


            // ==========================================
            // 5. SIMPAN FORM INFORMASI KOST
            // ==========================================
            document.getElementById('kostForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const msg = document.getElementById('kostMessage');
                msg.hidden = false;
                msg.textContent = 'Menyimpan...';

                fetch('/api/kost-profile', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        name: document.getElementById('kostName').value,
                        address: document.getElementById('kostAddress').value,
                        description: document.getElementById('kostDescription').value,
                        contact_phone: document.getElementById('kostPhone').value
                    })
                })
                .then(res => res.json())
                .then(res => {
                    if(res.success) {
                        msg.textContent = res.message;
                        msg.style.color = '#218653';
                    } else {
                        msg.textContent = 'Gagal menyimpan.';
                        msg.style.color = '#c33b3b';
                    }
                })
                .catch(err => {
                    msg.textContent = 'Terjadi kesalahan sistem.';
                    msg.style.color = '#c33b3b';
                });
            });

        });
    </script>
</body>
</html>