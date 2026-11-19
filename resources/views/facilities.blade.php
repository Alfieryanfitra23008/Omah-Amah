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
    <link rel="stylesheet" href="{{ asset('css/room.css') }}">
    <link rel="stylesheet" href="{{ asset('css/facilities.css') }}">
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
                    <h1>Fasilitas Kos</h1>
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

       
<section class="content-card room-management-card facility-management-card">

    <!-- Header -->
    <div class="room-management-header">
        <div class="room-management-heading">
            <h2 class="section-title">Daftar Fasilitas</h2>
            <p>Kelola fasilitas yang tersedia untuk penghuni Omah Amah.</p>
        </div>

        <!-- Tombol ini dihubungkan ke Modal Tambah Fasilitas -->
        <button type="button" class="btn-add-room" onclick="openAddFacilityModal()">
            <i class="bi bi-plus-lg"></i>
            <span>Tambah Fasilitas</span>
        </button>
    </div>

    <!-- Tabel Fasilitas -->
    <div class="room-table-wrapper">
        <table class="room-table facility-table">
            <thead>
                <tr>
                    <th>Fasilitas</th>
                    <th>Deskripsi &amp; Detail</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <!-- Tbody diisi otomatis oleh JavaScript dari API -->
            <tbody id="facilityTableBody">
                <tr>
                    <td colspan="4" class="text-center py-4">Memuat data fasilitas...</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="room-table-footer">
        <span id="facilityFooterText">Menampilkan 0 data fasilitas</span>
    </div>

</section>

        <footer class="dashboard-footer">
            © 2026 Omah Amah · Smart Boarding House
        </footer>
    </main>

<!-- ========================================= -->
<!-- MODAL POP-UP TAMBAH FASILITAS -->
<!-- ========================================= -->
<div class="custom-modal-overlay" id="addFacilityModal">
    <div class="custom-modal">
        <div class="custom-modal-header">
            <h3>Tambah Fasilitas Baru</h3>
            <button type="button" class="custom-modal-close" onclick="closeAddFacilityModal()"><i class="bi bi-x-lg"></i></button>
        </div>
        
        <form id="addFacilityForm">
            <div class="custom-modal-body">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label" style="font-size: 13px; font-weight: 600;">Nama Fasilitas</label>
                        <input type="text" class="form-control" id="add_fac_name" placeholder="Contoh: Kolam Renang" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" style="font-size: 13px; font-weight: 600;">Kategori</label>
                        <select class="form-control" id="add_fac_category" required>
                            <option value="">Pilih Kategori</option>
                            <option value="kamar">Kamar</option>
                            <option value="bersama">Bersama</option>
                            <option value="layanan">Layanan</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" style="font-size: 13px; font-weight: 600;">Deskripsi Singkat</label>
                        <textarea class="form-control" id="add_fac_description" rows="3" placeholder="Jelaskan detail fasilitas ini..." required></textarea>
                    </div>
                </div>
            </div>

            <div class="custom-modal-footer">
                <button type="button" class="custom-btn-cancel" onclick="closeAddFacilityModal()">Batal</button>
                <button type="submit" class="custom-btn-save" id="btnSaveFacility">Simpan Fasilitas</button>
            </div>
        </form>
    </div>
</div>

<style>
/* =========================================
   STYLE MODAL POP-UP TAMBAH FASILITAS
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

@keyframes modalFadeIn { from { opacity: 0; transform: translateY(10px) scale(0.98); } to { opacity: 1; transform: translateY(0) scale(1); } }
</style>

    <script src="{{ asset('js/dashboard.js') }}" defer></script>

    <!-- SCRIPT LOGIKA API (CRUD FASILITAS) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // 1. FUNGSI UNTUK MENGAMBIL DATA FASILITAS DARI DATABASE
            window.fetchFacilitiesData = function() {
                fetch('/api/facilities')
                    .then(res => res.json())
                    .then(res => {
                        if(res.success) {
                            renderFacilityTable(res.data);
                        }
                    })
                    .catch(err => console.error("Gagal ambil data fasilitas:", err));
            };

            // 2. RENDER TABEL FASILITAS
            function renderFacilityTable(facilities) {
                const tbody = document.getElementById('facilityTableBody');
                tbody.innerHTML = '';

                if (facilities.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="4" class="text-center py-4">Belum ada data fasilitas.</td></tr>`;
                    document.getElementById('facilityFooterText').textContent = `Menampilkan 0 data fasilitas`;
                    return;
                }

                facilities.forEach(fac => {
                    // Tentukan ikon dan warna berdasarkan nama/kategori
                    let iconClass = 'bi-box';
                    let iconColorClass = '';
                    let categoryLabel = fac.category.charAt(0).toUpperCase() + fac.category.slice(1);

                    if (fac.name.toLowerCase().includes('wifi') || fac.name.toLowerCase().includes('wi-fi')) {
                        iconClass = 'bi-wifi';
                        iconColorClass = 'facility-icon-wifi';
                    } else if (fac.name.toLowerCase().includes('parkir')) {
                        iconClass = 'bi-p-circle';
                        iconColorClass = 'facility-icon-parking';
                    } else if (fac.name.toLowerCase().includes('dapur') || fac.name.toLowerCase().includes('masak')) {
                        iconClass = 'bi-cup-hot';
                        iconColorClass = 'facility-icon-kitchen';
                    } else if (fac.name.toLowerCase().includes('ac')) {
                        iconClass = 'bi-snow';
                    } else if (fac.name.toLowerCase().includes('keamanan')) {
                        iconClass = 'bi-shield-check';
                    }

                    // Tentukan status (Aktif/Nonaktif)
                    let statusClass = fac.is_active ? 'status-available' : 'status-repair';
                    let statusText = fac.is_active ? 'Aktif' : 'Nonaktif';

                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>
                            <div class="facility-name">
                                <div class="facility-icon ${iconColorClass}">
                                    <i class="bi ${iconClass}"></i>
                                </div>
                                <strong>${fac.name}</strong>
                            </div>
                        </td>

                        <td>
                            <div class="facility-description">
                                <span>Kategori: ${categoryLabel}</span>
                                <small>${fac.description || 'Tidak ada deskripsi.'}</small>
                            </div>
                        </td>

                        <td>
                            <span class="room-status ${statusClass}">
                                <span></span> ${statusText}
                            </span>
                        </td>

                        <td>
                            <div class="room-actions">
                                <button type="button" class="room-action-btn action-edit" title="Edit fasilitas ${fac.name}" onclick="editFacility(${fac.id})">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </div>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });

                document.getElementById('facilityFooterText').textContent = `Menampilkan ${facilities.length} data fasilitas`;
            }

            // 3. FUNGSI EDIT FASILITAS (Menggunakan prompt sederhana sebagai simulasi cepat)
            window.editFacility = function(id) {
                // Tanya input baru
                let newName = prompt("Masukkan Nama Fasilitas Baru:");
                if (newName === null || newName === "") return;
                
                let newDesc = prompt("Masukkan Deskripsi Baru:");
                if (newDesc === null) return;

                // Tanya kategori
                let newCategory = prompt("Masukkan Kategori (kamar / bersama / layanan):");
                if (newCategory === null) return;
                if (!['kamar', 'bersama', 'layanan'].includes(newCategory)) {
                    alert("Kategori tidak valid. Harus 'kamar', 'bersama', atau 'layanan'.");
                    return;
                }

                // Kirim update ke API (Kamu harus memastikan API update-facility sudah dibuat di Controller)
                fetch(`/api/facilities/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        name: newName,
                        description: newDesc,
                        category: newCategory
                    })
                })
                .then(async response => {
                    const data = await response.json();
                    if (response.ok) {
                        alert('Fasilitas berhasil diupdate!');
                        fetchFacilitiesData(); // Refresh tabel
                    } else {
                        alert('Gagal update: ' + (data.message || 'Periksa kembali input.'));
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Terjadi kesalahan sistem saat menyimpan data.');
                });
            };

            // =========================================
            // LOGIKA MODAL TAMBAH FASILITAS
            // =========================================
            const addFacilityModal = document.getElementById('addFacilityModal');
            const addFacilityForm = document.getElementById('addFacilityForm');

            window.openAddFacilityModal = function() {
                addFacilityModal.classList.add('show');
            };

            window.closeAddFacilityModal = function() {
                addFacilityModal.classList.remove('show');
                addFacilityForm.reset();
            };

            // Tutup modal jika area luar diklik
            addFacilityModal.addEventListener('click', function (e) {
                if (e.target === addFacilityModal) {
                    closeAddFacilityModal();
                }
            });

            // Proses Submit Form Tambah Fasilitas
            addFacilityForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const btnSave = document.getElementById('btnSaveFacility');
                const originalHtml = btnSave.innerHTML;
                btnSave.innerHTML = 'Menyimpan...';
                btnSave.disabled = true;

                const data = {
                    name: document.getElementById('add_fac_name').value,
                    category: document.getElementById('add_fac_category').value,
                    description: document.getElementById('add_fac_description').value
                };

                fetch('/api/facilities', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(data)
                })
                .then(async response => {
                    const res = await response.json();
                    if (response.ok) {
                        alert('Fasilitas baru berhasil ditambahkan!');
                        closeAddFacilityModal();
                        fetchFacilitiesData(); // Refresh tabel
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
            fetchFacilitiesData();
        });
    </script>
</body>
</html>