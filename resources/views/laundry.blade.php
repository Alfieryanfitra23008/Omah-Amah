<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Layanan Laundry | Omah Amah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/room.css') }}">
    <link rel="stylesheet" href="{{ asset('css/laundry.css') }}">
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
                    <h1>Layanan Laundry</h1>
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
          
            <div class="col-lg-7">
                <section class="content-card laundry-detail-card">

                    <!-- Nama Layanan -->
                    <div class="laundry-detail-header">
                        <h2 id="viewNamaLayanan">Memuat...</h2>
                        <p>Nama Layanan</p>
                    </div>

                    <!-- Harga -->
                    <div class="laundry-price" id="viewHargaLaundry">
                        Rp - <span>/Kg</span>
                    </div>

                    <!-- Estimasi Selesai -->
                    <div class="laundry-estimation">
                        <div class="laundry-estimation-info">
                            <div class="laundry-estimation-icon">
                                <i class="bi bi-clock"></i>
                            </div>

                            <div>
                                <h3>Estimasi Selesai</h3>
                                <p>Perkiraan waktu penyelesaian layanan laundry</p>
                            </div>
                        </div>

                        <span class="laundry-estimation-status" id="viewEstimasiLaundry">
                            Memuat...
                        </span>
                    </div>

                    <!-- Tombol Edit (Scroll ke form) -->
                    <div class="laundry-detail-actions">
                        <button type="button" class="laundry-edit-btn" onclick="scrollToEdit()">
                            <i class="bi bi-pencil-square"></i>
                            Edit Informasi
                        </button>
                    </div>

                </section>
            </div>


            <div class="col-lg-5" id="editFormSection">
                <section class="content-card laundry-edit-card">

                    <!-- Header -->
                    <div class="laundry-edit-header">
                        <h2 class="section-title">Edit Informasi Layanan</h2>
                        <p>Perbarui informasi layanan laundry.</p>
                    </div>

                    <form id="laundryEditForm" class="laundry-edit-form">

                        <!-- Nama Layanan -->
                        <div class="laundry-form-group">
                            <label for="namaLayanan">Nama Layanan</label>
                            <input type="text" id="namaLayanan" name="nama_layanan" class="laundry-form-control" placeholder="Contoh: Laundry Kiloan" required>
                        </div>

                        <!-- Harga per Kilogram -->
                        <div class="laundry-form-group">
                            <label for="hargaLaundry">Harga per Kilogram</label>
                            <div class="laundry-input-prefix">
                                <span>Rp</span>
                                <input type="number" id="hargaLaundry" name="harga_per_kg" class="laundry-form-control" placeholder="7000" min="0" required>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="laundry-form-group">
                            <label for="deskripsiLaundry">Deskripsi Layanan</label>
                            <textarea id="deskripsiLaundry" name="deskripsi" class="laundry-form-control laundry-textarea" rows="4" placeholder="Tuliskan deskripsi layanan laundry..."></textarea>
                        </div>

                        <!-- Estimasi dan Minimum Berat -->
                        <div class="laundry-form-grid">
                            <div class="laundry-form-group">
                                <label for="estimasiLaundry">Estimasi Pengerjaan</label>
                                <div class="laundry-input-suffix">
                                    <input type="number" id="estimasiLaundry" name="estimasi_pengerjaan" class="laundry-form-control" placeholder="2" min="1">
                                    <span>Hari</span>
                                </div>
                            </div>

                            <div class="laundry-form-group">
                                <label for="minimumBerat">Minimum Berat</label>
                                <div class="laundry-input-suffix">
                                    <input type="number" id="minimumBerat" name="minimum_berat" class="laundry-form-control" placeholder="3" min="0.1" step="0.1" required>
                                    <span>Kg</span>
                                </div>
                            </div>
                        </div>

                        <!-- Status Layanan -->
                        <div class="laundry-form-group laundry-status-group">
                            <label>Status Layanan</label>
                            <div class="laundry-status-options">
                                <label class="laundry-status-option">
                                    <input type="radio" name="status_layanan" value="aktif" id="statusAktif" checked>
                                    <span><i class="bi bi-check-circle"></i> Aktif</span>
                                </label>

                                <label class="laundry-status-option">
                                    <input type="radio" name="status_layanan" value="tidak_aktif" id="statusNonaktif">
                                    <span><i class="bi bi-x-circle"></i> Tidak Aktif</span>
                                </label>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="laundry-form-actions">
                            <button type="reset" class="laundry-btn-cancel" id="cancelLaundryEdit">Batal</button>
                            <button type="submit" class="laundry-btn-submit" id="btnSaveLaundry">
                                <i class="bi bi-check2-circle"></i> Simpan
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // 1. FUNGSI UNTUK MENGAMBIL DATA DARI DATABASE
            function fetchLaundryData() {
                // Mengambil data dari API (Pastikan route GET /api/laundry sudah dibuat)
                fetch('/api/laundry')
                    .then(res => res.json())
                    .then(res => {
                        if(res.success && res.data) {
                            const data = res.data; // Asumsi hanya ada 1 data laundry

                            // Isi Tampilan Kiri (View)
                            document.getElementById('viewNamaLayanan').textContent = data.service_name;
                            document.getElementById('viewHargaLaundry').innerHTML = `Rp${parseInt(data.price_per_kg).toLocaleString('id-ID')} <span>/Kg</span>`;
                            document.getElementById('viewEstimasiLaundry').textContent = data.estimated_days ? `${data.estimated_days} Hari` : 'Belum ditentukan';

                            // Isi Form Kanan (Edit)
                            document.getElementById('namaLayanan').value = data.service_name;
                            document.getElementById('hargaLaundry').value = data.price_per_kg;
                            document.getElementById('deskripsiLaundry').value = data.notes || '';
                            document.getElementById('estimasiLaundry').value = data.estimated_days || '';
                            document.getElementById('minimumBerat').value = data.minimum_weight || 3; // Fallback jika kolom minimum_weight belum ada
                            
                            // Isi Status
                            if (data.is_active) {
                                document.getElementById('statusAktif').checked = true;
                            } else {
                                document.getElementById('statusNonaktif').checked = true;
                            }
                        }
                    })
                    .catch(err => console.error("Gagal mengambil data laundry:", err));
            }

            // 2. FUNGSI UNTUK SCROLL KE FORM (Tombol Edit)
            window.scrollToEdit = function() {
                document.getElementById('editFormSection').scrollIntoView({ behavior: 'smooth' });
                document.getElementById('namaLayanan').focus();
            };

            // 3. FUNGSI UNTUK MENYIMPAN DATA (Tombol Simpan)
            document.getElementById('laundryEditForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const btnSave = document.getElementById('btnSaveLaundry');
                const originalHtml = btnSave.innerHTML;
                btnSave.innerHTML = '<i class="bi bi-hourglass-split"></i> Menyimpan...';
                btnSave.disabled = true;

                // Ambil data dari form
                const data = {
                    service_name: document.getElementById('namaLayanan').value,
                    price_per_kg: document.getElementById('hargaLaundry').value,
                    notes: document.getElementById('deskripsiLaundry').value,
                    estimated_days: document.getElementById('estimasiLaundry').value,
                    minimum_weight: document.getElementById('minimumBerat').value,
                    is_active: document.querySelector('input[name="status_layanan"]:checked').value === 'aktif'
                };

                // Kirim ke API (Pastikan route PUT /api/laundry sudah dibuat)
                fetch('/api/laundry/1', { // Asumsi ID laundry adalah 1
                    method: 'PUT',
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
                        alert('Informasi laundry berhasil disimpan!');
                        fetchLaundryData(); // Refresh data di tampilan kiri
                    } else {
                        alert('Gagal menyimpan: ' + (res.message || 'Periksa kembali isian form.'));
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Terjadi kesalahan sistem saat menyimpan data.');
                })
                .finally(() => {
                    btnSave.innerHTML = originalHtml;
                    btnSave.disabled = false;
                });
            });

            // Jalankan fungsi saat halaman pertama kali dibuka
            fetchLaundryData();
        });
    </script>
</body>
</html>