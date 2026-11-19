<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard | Omah Amah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rooms.css') }}">
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
                    <h1>Dashboard</h1>
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

        <!-- STATISTIK ATAS -->
        <section class="mb-4">
            <div class="row g-3">
                <div class="col-6 col-xl-3">
                    <div class="stat-card">
                        <div class="stat-icon">⌂</div>
                        <div class="stat-label">Total Kamar</div>
                        <div class="stat-value" id="statTotalKamar">0</div>
                        <div class="stat-description">Kamar tersedia di kos</div>
                    </div>
                </div>
                <div class="col-6 col-xl-3">
                    <div class="stat-card">
                        <div class="stat-icon">✓</div>
                        <div class="stat-label">Fasilitas</div>
                        <div class="stat-value" id="statTotalFasilitas">0</div>
                        <div class="stat-description">Fasilitas utama</div>
                    </div>
                </div>
                <div class="col-6 col-xl-3">
                    <div class="stat-card">
                        <div class="stat-icon">✧</div>
                        <div class="stat-label">Layanan AI</div>
                        <div class="stat-value">24/7</div>
                        <div class="stat-description">Asisten informasi digital</div>
                    </div>
                </div>
                <div class="col-6 col-xl-3">
                    <div class="stat-card">
                        <div class="stat-icon">♡</div>
                        <div class="stat-label">Kenyamanan</div>
                        <div class="stat-value">Prioritas</div>
                        <div class="stat-description">Hunian nyaman dan praktis</div>
                    </div>
                </div>
            </div>
        </section>

        <div class="row g-3">
            <div class="col-lg-6">
                <section class="content-card room-summary-card">
                    <h2 class="section-title">Ringkasan Status Kamar</h2>

                    <div class="room-summary-content">
                        <div class="room-total-wrapper">
                            <div class="room-total-circle">
                                <div class="room-total-inner">
                                    <span class="room-total-number" id="totalKamarLingkaran">0</span>
                                    <span class="room-total-label">Total Kamar</span>
                                </div>
                            </div>
                        </div>

                        <div class="room-status-list">
                            <div class="room-status-item">
                                <div class="room-status-icon occupied-icon"><i class="bi bi-house-check-fill"></i></div>
                                <div class="room-status-info">
                                    <div class="room-status-heading">
                                        <span>Terisi</span>
                                        <strong><span id="jumlahTerisi">0</span> <small>kamar</small></strong>
                                    </div>
                                    <div class="room-progress"><div class="room-progress-bar occupied-bar" id="barTerisi" style="width: 0%;"></div></div>
                                    <span class="room-status-percentage" id="persenTerisi">0%</span>
                                </div>
                            </div>

                            <div class="room-status-item">
                                <div class="room-status-icon available-icon"><i class="bi bi-door-open-fill"></i></div>
                                <div class="room-status-info">
                                    <div class="room-status-heading">
                                        <span>Tersedia</span>
                                        <strong><span id="jumlahTersedia">0</span> <small>kamar</small></strong>
                                    </div>
                                    <div class="room-progress"><div class="room-progress-bar available-bar" id="barTersedia" style="width: 0%;"></div></div>
                                    <span class="room-status-percentage" id="persenTersedia">0%</span>
                                </div>
                            </div>

                            <div class="room-status-item">
                                <div class="room-status-icon repair-icon"><i class="bi bi-tools"></i></div>
                                <div class="room-status-info">
                                    <div class="room-status-heading">
                                        <span>Perbaikan</span>
                                        <strong><span id="jumlahPerbaikan">0</span> <small>kamar</small></strong>
                                    </div>
                                    <div class="room-progress"><div class="room-progress-bar repair-bar" id="barPerbaikan" style="width: 0%;"></div></div>
                                    <span class="room-status-percentage" id="persenPerbaikan">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-lg-6">
                <section class="content-card activity-card">
                    <h2 class="section-title">Aktivitas Terbaru</h2>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon activity-blue"><i class="bi bi-tags-fill"></i></div>
                            <div class="activity-content">
                                <h3>Informasi harga kamar diperbarui</h3>
                                <p>Hari ini, 09.30</p>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon activity-green"><i class="bi bi-door-open-fill"></i></div>
                            <div class="activity-content">
                                <h3>Status ketersediaan kamar diperbarui</h3>
                                <p>Hari ini, 08.45</p>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon activity-orange"><i class="bi bi-megaphone-fill"></i></div>
                            <div class="activity-content">
                                <h3>Informasi fasilitas kos ditambahkan</h3>
                                <p>Kemarin, 15.20</p>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon activity-purple"><i class="bi bi-person-check-fill"></i></div>
                            <div class="activity-content">
                                <h3>Data profil penghuni diperbarui</h3>
                                <p>Kemarin, 10.15</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

<!-- Manajemen Kamar -->
<section class="content-card room-management-card">
    <div class="room-management-header">
        <div class="room-management-heading">
            <h2 class="section-title">Manajemen Kamar</h2>
            <p>Data kamar Omah Amah dari database</p>
        </div>

        <button type="button" class="btn-add-room" onclick="openAddRoomModal()">
            <i class="bi bi-plus-lg"></i>
            <span>Tambah Kamar</span>
        </button>
    </div>

    <div class="room-table-wrapper">
        <table class="room-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nomor Kamar</th>
                    <th>Tipe Kamar</th>
                    <th>Harga</th>
                    <th>Fasilitas Utama</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="roomTableBody">
                <tr>
                    <td colspan="7" class="text-center py-4">Memuat data kamar...</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="room-table-footer">
        <span id="roomTableFooterText">Menampilkan 0 data kamar</span>
    </div>
</section>

        <footer class="dashboard-footer">
            © 2026 Omah Amah · Smart Boarding House
        </footer>
    </main>

<!-- ========================================= -->
<!-- MODAL POP-UP TAMBAH KAMAR -->
<!-- ========================================= -->
<div class="custom-modal-overlay" id="addRoomModal">
    <div class="custom-modal">
        <div class="custom-modal-header">
            <h3>Tambah Kamar Baru</h3>
            <button type="button" class="custom-modal-close" onclick="closeAddRoomModal()"><i class="bi bi-x-lg"></i></button>
        </div>
        
        <form id="addRoomForm">
            <div class="custom-modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" style="font-size: 13px; font-weight: 600;">Nomor Kamar</label>
                        <input type="text" class="form-control" id="add_room_code" placeholder="Contoh: A04" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" style="font-size: 13px; font-weight: 600;">Nama Kamar</label>
                        <input type="text" class="form-control" id="add_room_name" placeholder="Contoh: Kamar Mawar" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" style="font-size: 13px; font-weight: 600;">Tipe Kamar</label>
                        <select class="form-control" id="add_room_type" required>
                            <option value="">Pilih Tipe</option>
                            <option value="standard">Standard</option>
                            <option value="premium">Premium</option>
                            <option value="deluxe">Deluxe</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" style="font-size: 13px; font-weight: 600;">Harga Bulanan (Rp)</label>
                        <input type="number" class="form-control" id="add_room_price" placeholder="Contoh: 800000" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" style="font-size: 13px; font-weight: 600;">Status</label>
                        <select class="form-control" id="add_room_status" required>
                            <option value="tersedia">Tersedia</option>
                            <option value="penuh">Penuh</option>
                            <option value="perlu_konfirmasi">Perlu Konfirmasi</option>
                        </select>
                    </div>
                    
                    <!-- INPUT UPLOAD FOTO -->
                    <div class="col-md-6">
                        <label class="form-label" style="font-size: 13px; font-weight: 600;">Foto Kamar (JPG/PNG)</label>
                        <input type="file" class="form-control" id="add_room_image_file" accept="image/jpeg, image/png, image/jpg">
                        <div id="imagePreviewContainer" class="mt-2" style="display: none;">
                            <img id="imagePreview" src="" alt="Preview" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd;">
                        </div>
                    </div>

                    <!-- TAMBAHAN: CHECKBOX FASILITAS -->
                    <div class="col-12 mt-4">
                        <label class="form-label" style="font-size: 13px; font-weight: 600; display: block; margin-bottom: 10px;">Pilih Fasilitas Kamar</label>
                        <div id="facilitiesContainer" class="d-flex flex-wrap gap-3">
                            <span style="font-size: 13px; color: #667085;">Memuat fasilitas...</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="custom-modal-footer">
                <button type="button" class="custom-btn-cancel" onclick="closeAddRoomModal()">Batal</button>
                <button type="submit" class="custom-btn-save" id="btnSaveRoom">Simpan Kamar</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Konfirmasi Logout -->
<div class="logout-overlay" id="logoutModal">
    <div class="logout-modal">
        <div class="logout-icon">↪</div>
        <h3>Keluar dari Akun?</h3>
        <p>Apakah Anda yakin ingin keluar dari akun Omah Amah?</p>
        <div class="logout-actions">
            <button type="button" id="cancelLogout" class="btn-cancel">Batal</button>
            <button type="button" id="confirmLogout" class="btn-logout">Keluar dari Akun</button>
        </div>
    </div>
</div>

<style>
/* =========================================
   STYLE MODAL POP-UP TAMBAH KAMAR
========================================= */
.custom-modal-overlay {
    position: fixed; inset: 0; background: rgba(10, 25, 49, 0.55);
    display: none; align-items: center; justify-content: center;
    padding: 20px; z-index: 10000; backdrop-filter: blur(4px);
}
.custom-modal-overlay.show { display: flex; }
.custom-modal {
    background: #fff; width: 100%; max-width: 600px; border-radius: 16px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.18); animation: modalFadeIn 0.2s ease;
    display: flex; flex-direction: column; max-height: 90vh;
}
.custom-modal-header {
    padding: 20px 25px; border-bottom: 1px solid #edf0f5;
    display: flex; justify-content: space-between; align-items: center;
}
.custom-modal-header h3 { margin: 0; font-size: 18px; font-weight: 700; color: #1d2939; }
.custom-modal-close { background: none; border: none; font-size: 20px; color: #667085; cursor: pointer; transition: 0.2s; }
.custom-modal-close:hover { color: #d92d20; }
.custom-modal-body { padding: 25px; overflow-y: auto; }
.custom-modal-footer {
    padding: 15px 25px; border-top: 1px solid #edf0f5;
    display: flex; justify-content: flex-end; gap: 12px;
}
.custom-btn-cancel { 
    padding: 10px 20px; border-radius: 8px; border: 1px solid #d0d5dd; 
    background: #fff; color: #344054; font-size: 14px; font-weight: 600; cursor: pointer; 
}
.custom-btn-cancel:hover { background: #f2f4f7; }
.custom-btn-save { 
    padding: 10px 20px; border-radius: 8px; border: 1px solid #426b50; 
    background: #426b50; color: #fff; font-size: 14px; font-weight: 600; cursor: pointer; 
}
.custom-btn-save:hover { background: #34563f; }
.custom-btn-save:disabled { opacity: 0.7; cursor: not-allowed; }

/* =========================================
   STYLE LOGOUT
========================================= */
.logout-overlay { position: fixed; inset: 0; background: rgba(10, 25, 49, 0.55); display: none; align-items: center; justify-content: center; padding: 20px; z-index: 9999; backdrop-filter: blur(4px); }
.logout-overlay.show { display: flex; }
.logout-modal { background: #fff; width: 100%; max-width: 390px; padding: 30px 25px; border-radius: 20px; text-align: center; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.18); animation: modalFadeIn 0.2s ease; }
.logout-icon { width: 58px; height: 58px; margin: 0 auto 18px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #edf4ee; color: #426b50; font-size: 30px; }
.logout-modal h3 { color: #1d2939; font-size: 21px; font-weight: 700; margin-bottom: 10px; }
.logout-modal p { color: #667085; font-size: 14px; line-height: 1.6; margin-bottom: 25px; }
.logout-actions { display: flex; gap: 12px; }
.logout-actions button { flex: 1; padding: 12px 10px; border-radius: 10px; font-size: 13px; font-weight: 600; cursor: pointer; transition: 0.2s; }
.btn-cancel { background: #fff; color: #344054; border: 1px solid #d0d5dd; }
.btn-cancel:hover { background: #f2f4f7; }
.btn-logout { background: #426b50; color: #fff; border: 1px solid #426b50; }
.btn-logout:hover { background: #34563f; }

@keyframes modalFadeIn { from { opacity: 0; transform: translateY(10px) scale(0.98); } to { opacity: 1; transform: translateY(0) scale(1); } }
</style>

<script>
// LOGIKA LOGOUT
document.addEventListener('DOMContentLoaded', function () {
    const logoutBtn = document.getElementById('logoutBtn');
    const logoutModal = document.getElementById('logoutModal');
    const cancelLogout = document.getElementById('cancelLogout');
    const confirmLogout = document.getElementById('confirmLogout');

    if(logoutBtn) {
        logoutBtn.addEventListener('click', function (e) {
            e.preventDefault();
            logoutModal.classList.add('show');
        });
    }
    cancelLogout.addEventListener('click', function () { logoutModal.classList.remove('show'); });
    logoutModal.addEventListener('click', function (e) {
        if (e.target === logoutModal) { logoutModal.classList.remove('show'); }
    });
    confirmLogout.addEventListener('click', function () { window.location.href = '/'; });
});
</script>

    <script src="{{ asset('js/dashboard.js') }}" defer></script>

    <!-- SCRIPT LOGIKA API (CRUD + TAMBAH KAMAR VIA MODAL) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // FUNGSI UNTUK MENGAMBIL DATA KAMAR & FASILITAS
            window.fetchDashboardData = function() {
                fetch('/api/rooms')
                    .then(res => res.json())
                    .then(res => {
                        if(res.success) {
                            renderRoomTable(res.data);
                            updateSummaryStats(res.data);
                        }
                    })
                    .catch(err => console.error("Gagal ambil data kamar:", err));

                fetch('/api/facilities')
                    .then(res => res.json())
                    .then(res => {
                        if(res.success) {
                            document.getElementById('statTotalFasilitas').textContent = res.data.length.toString().padStart(2, '0');
                            
                            const container = document.getElementById('facilitiesContainer');
                            container.innerHTML = '';
                            res.data.forEach(fac => {
                                if(fac.category === 'kamar' || fac.category === 'bersama') {
                                    container.innerHTML += `
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="facilities[]" value="${fac.id}" id="fac_${fac.id}">
                                            <label class="form-check-label" for="fac_${fac.id}" style="font-size: 13px; color: #344054;">
                                                ${fac.name}
                                            </label>
                                        </div>
                                    `;
                                }
                            });
                        }
                    })
                    .catch(err => console.error("Gagal ambil fasilitas:", err));
            };

            // RENDER TABEL
            function renderRoomTable(rooms) {
                const tbody = document.getElementById('roomTableBody');
                tbody.innerHTML = '';

                if (rooms.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="7" class="text-center py-4">Belum ada data kamar.</td></tr>`;
                    document.getElementById('roomTableFooterText').textContent = `Menampilkan 0 data kamar`;
                    return;
                }

                rooms.forEach(room => {
                    const price = room.monthly_price ? `Rp${parseInt(room.monthly_price).toLocaleString('id-ID')}` : 'Hubungi Pengelola';
                    // Gambar fallback jika tidak ada foto
                    const imgUrl = room.image_url || 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=120&h=90&fit=crop';

                    let statusClass = 'status-occupied';
                    let statusText = 'Perlu Konfirmasi';
                    if (room.availability === 'tersedia') { statusClass = 'status-available'; statusText = 'Tersedia'; }
                    if (room.availability === 'penuh') { statusClass = 'status-occupied'; statusText = 'Terisi'; }
                    if (room.availability === 'perlu_konfirmasi') { statusClass = 'status-repair'; statusText = 'Perlu Konfirmasi'; }

                    let fasHtml = '';
                    if (room.facilities && room.facilities.length > 0) {
                        room.facilities.forEach(f => { fasHtml += `<span>${f.name}</span>`; });
                    } else { fasHtml = `<span>-</span>`; }

                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td><img src="${imgUrl}" alt="Foto" class="room-photo" style="object-fit: cover;"></td>
                        <td><strong>${room.room_code}</strong></td>
                        <td><span class="room-type">${room.room_type}</span></td>
                        <td class="room-price">${price}${room.monthly_price ? '<span>/bulan</span>' : ''}</td>
                        <td><div class="room-facilities">${fasHtml}</div></td>
                        <td><span class="room-status ${statusClass}"><span></span> ${statusText}</span></td>
                        <td>
                            <div class="room-actions">
                                <button type="button" class="room-action-btn action-detail" title="Detail" onclick="detailKamar(${room.id})">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button type="button" class="room-action-btn action-edit" title="Edit" onclick="editKamar(${room.id})">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button type="button" class="room-action-btn action-delete" title="Hapus" onclick="hapusKamar(${room.id})">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </div>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
                
                document.getElementById('roomTableFooterText').textContent = `Menampilkan ${rooms.length} data kamar`;
            }

            // STATISTIK LINGKARAN
            function updateSummaryStats(rooms) {
                const total = rooms.length;
                document.getElementById('statTotalKamar').textContent = total;
                document.getElementById('totalKamarLingkaran').textContent = total;

                const tersedia = rooms.filter(r => r.availability === 'tersedia').length;
                const terisi = rooms.filter(r => r.availability === 'penuh').length;
                const perbaikan = rooms.filter(r => r.availability === 'perlu_konfirmasi').length;

                const pTersedia = total > 0 ? ((tersedia / total) * 100).toFixed(1) : 0;
                const pTerisi = total > 0 ? ((terisi / total) * 100).toFixed(1) : 0;
                const pPerbaikan = total > 0 ? ((perbaikan / total) * 100).toFixed(1) : 0;

                document.getElementById('jumlahTersedia').textContent = tersedia;
                document.getElementById('barTersedia').style.width = `${pTersedia}%`;
                document.getElementById('persenTersedia').textContent = `${pTersedia.replace('.', ',')}%`;

                document.getElementById('jumlahTerisi').textContent = terisi;
                document.getElementById('barTerisi').style.width = `${pTerisi}%`;
                document.getElementById('persenTerisi').textContent = `${pTerisi.replace('.', ',')}%`;

                document.getElementById('jumlahPerbaikan').textContent = perbaikan;
                document.getElementById('barPerbaikan').style.width = `${pPerbaikan}%`;
                document.getElementById('persenPerbaikan').textContent = `${pPerbaikan.replace('.', ',')}%`;
            }

            // FUNGSI CRUD (DETAIL, EDIT, HAPUS)
            
            window.detailKamar = function(id) {
                fetch(`/api/rooms/id/${id}`)
                    .then(res => res.json())
                    .then(res => {
                        if(res.success) {
                            const room = res.data;
                            let fas = room.facilities.map(f => f.name).join(', ');
                            alert(`DETAIL KAMAR\n\nNomor: ${room.room_code}\nNama: ${room.name}\nTipe: ${room.room_type}\nHarga: Rp ${room.monthly_price || 'Belum diset'}\nStatus: ${room.availability}\nFasilitas: ${fas || '-'}`);
                        } else {
                            alert('Gagal mengambil detail kamar');
                        }
                    })
                    .catch(err => console.error(err));
            };

            window.editKamar = function(id) {
                fetch(`/api/rooms/id/${id}`)
                    .then(res => res.json())
                    .then(res => {
                        if(res.success) {
                            const room = res.data;
                            
                            let newName = prompt("Masukkan Nama Kamar:", room.name);
                            if(newName === null) return; 
                            
                            let newPrice = prompt("Masukkan Harga Bulanan (Angka saja):", room.monthly_price);
                            if(newPrice === null) return;
                            
                            let newStatus = prompt("Masukkan Status (tersedia / penuh / perlu_konfirmasi):", room.availability);
                            if(newStatus === null) return;

                            if(newName && newPrice && newStatus) {
                                // Karena edit ini masih menggunakan JSON biasa, foto belum di-handle di sini.
                                // Disarankan edit foto menggunakan form khusus seperti modal jika diperlukan.
                                fetch(`/api/rooms/${id}`, {
                                    method: 'PUT',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify({
                                        room_code: room.room_code,
                                        name: newName,
                                        room_type: room.room_type,
                                        monthly_price: newPrice,
                                        availability: newStatus,
                                        image_url: room.image_url
                                    })
                                })
                                .then(async response => {
                                    const data = await response.json();
                                    if (response.ok) {
                                        alert('Data kamar berhasil diupdate!');
                                        fetchDashboardData();
                                    } else {
                                        alert('Gagal update: ' + (data.message || 'Pastikan format input benar.'));
                                    }
                                });
                            }
                        }
                    })
                    .catch(err => console.error(err));
            };

            window.hapusKamar = function(id) {
                if(confirm('Apakah kamu yakin ingin menghapus kamar ini secara permanen dari database?')) {
                    fetch(`/api/rooms/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(res => res.json())
                    .then(res => {
                        if(res.success) {
                            alert('Kamar berhasil dihapus!');
                            fetchDashboardData();
                        } else {
                            alert('Gagal menghapus kamar.');
                        }
                    })
                    .catch(err => console.error(err));
                }
            };

            // =========================================
            // LOGIKA MODAL TAMBAH KAMAR & UPLOAD GAMBAR
            // =========================================
            const addRoomModal = document.getElementById('addRoomModal');
            const addRoomForm = document.getElementById('addRoomForm');
            const imageInput = document.getElementById('add_room_image_file');
            const imagePreview = document.getElementById('imagePreview');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');

            window.openAddRoomModal = function() {
                addRoomModal.classList.add('show');
            };

            window.closeAddRoomModal = function() {
                addRoomModal.classList.remove('show');
                addRoomForm.reset();
                imagePreviewContainer.style.display = 'none'; // Sembunyikan preview foto
            };

            // Preview Gambar saat dipilih
            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreviewContainer.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    imagePreviewContainer.style.display = 'none';
                }
            });

            addRoomModal.addEventListener('click', function (e) {
                if (e.target === addRoomModal) {
                    closeAddRoomModal();
                }
            });

            // Proses Submit Form Tambah Kamar (Menggunakan FormData untuk Upload)
            addRoomForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const btnSave = document.getElementById('btnSaveRoom');
                const originalHtml = btnSave.innerHTML;
                btnSave.innerHTML = 'Menyimpan...';
                btnSave.disabled = true;

                // Gunakan FormData untuk mengirim gambar
                const formData = new FormData();
                formData.append('room_code', document.getElementById('add_room_code').value);
                formData.append('name', document.getElementById('add_room_name').value);
                formData.append('room_type', document.getElementById('add_room_type').value);
                formData.append('monthly_price', document.getElementById('add_room_price').value);
                formData.append('availability', document.getElementById('add_room_status').value);
                
                // Ambil file gambar
                if (imageInput.files[0]) {
                    formData.append('image_file', imageInput.files[0]);
                }

                // Ambil fasilitas yang dicentang
                document.querySelectorAll('input[name="facilities[]"]:checked').forEach((cb) => {
                    formData.append('facilities[]', cb.value);
                });

                fetch('/api/rooms', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        // Jangan set Content-Type jika menggunakan FormData (Browser akan mengaturnya otomatis)
                    },
                    body: formData
                })
                .then(async response => {
                    const res = await response.json();
                    if (response.ok) {
                        alert('Kamar baru berhasil ditambahkan!');
                        closeAddRoomModal();
                        fetchDashboardData(); // Refresh tabel
                    } else {
                        alert('Gagal menyimpan: ' + (res.message || 'Periksa kembali isian form Anda.'));
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

            // Jalankan fungsi saat halaman pertama kali dibuka
            fetchDashboardData();
        });
    </script>
</body>
</html>