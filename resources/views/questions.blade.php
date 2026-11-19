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
    <link rel="stylesheet" href="{{ asset('css/question.css') }}">
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
                    <h1>Pesan dan Pertanyaan</h1>
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

        <section class="mb-4">
            <div class="row g-3">
                <div class="col-6 col-xl-3">
                    <div class="stat-card">
                        <div class="stat-icon">⌂</div>
                        <div class="stat-label">Total Kamar</div>
                        <div class="stat-value">24</div>
                        <div class="stat-description">Kamar tersedia di kos</div>
                    </div>
                </div>
                <div class="col-6 col-xl-3">
                    <div class="stat-card">
                        <div class="stat-icon">✓</div>
                        <div class="stat-label">Fasilitas</div>
                        <div class="stat-value">08</div>
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

<!-- Pesan & Pertanyaan -->
<section class="content-card question-management-card">

    <!-- Tab Utama -->
    <div class="question-tabs">
        <button type="button" class="question-tab active" data-tab="semua" id="tabSemua">
            Semua Pesan
            <span class="question-tab-count" id="countSemua">0</span>
        </button>

        <button type="button" class="question-tab" data-tab="pengguna" id="tabPengguna">
            Pesan Pengguna
            <span class="question-tab-count" id="countPengguna">0</span>
        </button>

        <button type="button" class="question-tab" data-tab="chatbot" id="tabChatbot">
            Pertanyaan Chatbot AI
            <span class="question-tab-count" id="countChatbot">0</span>
        </button>
    </div>

    <div class="question-divider"></div>

    <!-- Filter Pencarian -->
    <div class="question-filter-row">

        <div class="question-search">
            <i class="bi bi-search"></i>
            <input type="search" id="questionSearch" placeholder="Cari pengirim atau pertanyaan..." aria-label="Cari pesan">
        </div>

        <select id="questionStatusFilter" class="question-select" aria-label="Filter status">
            <option value="">Semua Status</option>
            <option value="baru">Baru</option>
            <option value="diproses">Diproses</option>
            <option value="selesai">Selesai</option>
        </select>

        <select id="questionCategoryFilter" class="question-select" aria-label="Filter kategori">
            <option value="">Semua Kategori</option>
            <option value="kamar">Kamar</option>
            <option value="harga">Harga</option>
            <option value="fasilitas">Fasilitas</option>
            <option value="peraturan kos">Peraturan Kos</option>
            <option value="laundry">Laundry</option>
            <option value="lainnya">Lainnya</option>
        </select>

        <input type="date" id="questionDateFilter" class="question-select question-date" aria-label="Filter tanggal">

        <button type="button" class="question-reset-btn" id="resetQuestionFilter">
            <i class="bi bi-arrow-counterclockwise"></i>
            Reset Filter
        </button>
    </div>

    <!-- Filter Kategori -->
    <div class="question-category-section">
        <span class="question-category-label">Kategori:</span>

        <div class="question-category-list" id="categoryBtnList">
            <button type="button" class="question-category-btn active" data-category="semua">Semua</button>
            <button type="button" class="question-category-btn" data-category="kamar">Kamar</button>
            <button type="button" class="question-category-btn" data-category="harga">Harga</button>
            <button type="button" class="question-category-btn" data-category="fasilitas">Fasilitas</button>
            <button type="button" class="question-category-btn" data-category="peraturan kos">Peraturan Kos</button>
            <button type="button" class="question-category-btn" data-category="laundry">Laundry</button>
            <button type="button" class="question-category-btn" data-category="lainnya">Lainnya</button>
        </div>
    </div>

    <!-- Tabel Pesan -->
    <div class="question-table-wrapper">
        <table class="question-table">
            <thead>
                <tr>
                    <th>Pengirim</th>
                    <th>Subjek atau Pertanyaan</th>
                    <th>Kategori</th>
                    <th>Sumber</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="questionTableBody">
                <tr>
                    <td colspan="7" class="text-center py-4">Memuat data...</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="question-table-footer">
        <span id="questionResultCount">Menampilkan 0 pesan</span>
        <span>Data Asli (Database)</span>
    </div>

</section>


<!-- Overlay Detail Pertanyaan -->
<div class="question-detail-overlay" id="questionDetailOverlay"></div>

<!-- Sidebar Detail Pertanyaan -->
<aside class="question-detail-drawer" id="questionDetailDrawer" aria-hidden="true" aria-labelledby="questionDetailTitle">

    <div class="question-drawer-header">
        <div>
            <h2 id="questionDetailTitle">Detail Pertanyaan</h2>
            <p>Informasi dan penanganan pertanyaan</p>
        </div>

        <button type="button" class="question-drawer-close" id="closeQuestionDetail" aria-label="Tutup detail">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <div class="question-drawer-body">

        <!-- Notifikasi -->
        <div class="question-update-notice" id="questionUpdateNotice" hidden>
            <i class="bi bi-check-circle-fill"></i>
            <span id="questionUpdateNoticeText">Status berhasil diperbarui.</span>
        </div>

        <!-- Pengirim -->
        <div class="question-detail-sender">
            <div class="question-avatar" id="detailSenderAvatar">SA</div>
            <div>
                <h3 id="detailSenderName">Siti Amelia</h3>
                <p>Pengirim pertanyaan</p>
            </div>
        </div>

        <!-- Informasi pesan -->
        <div class="question-detail-meta">
            <div>
                <span>Diterima</span>
                <strong id="detailReceivedDate">-</strong>
            </div>
            <div>
                <span>Sumber</span>
                <strong id="detailSource">-</strong>
            </div>
            <div>
                <span>Kategori</span>
                <strong id="detailCategory">-</strong>
            </div>
        </div>

        <!-- Pertanyaan utama -->
        <section class="question-detail-section">
            <span class="question-detail-eyebrow">Pertanyaan</span>
            <h3 id="detailQuestionText">-</h3>
        </section>

        <!-- Percakapan terkait -->
        <section class="question-detail-section">
            <h3 class="question-detail-section-title">
                <i class="bi bi-chat-square-text"></i>
                Percakapan Terkait
            </h3>

            <div class="question-conversation">
                <div class="question-conversation-avatar" id="detailConversationAvatar">-</div>
                <div class="question-conversation-content">
                    <strong id="detailConversationName">-</strong>
                    <p id="detailConversationText">-</p>
                </div>
            </div>
        </section>

        <!-- Jawaban AI -->
        <section class="question-ai-review">
            <div class="question-ai-review-header">
                <div class="question-ai-review-icon">
                    <i class="bi bi-robot"></i>
                </div>
                <div>
                    <h3>Jawaban AI</h3>
                    <span>
                        <i class="bi bi-exclamation-circle"></i>
                        Perlu ditinjau ulang
                    </span>
                </div>
            </div>

            <p id="detailAIAnswer">-</p>
        </section>

        <!-- Status penanganan -->
        <section class="question-detail-section">
            <div class="question-handling-heading">
                <h3 class="question-detail-section-title">Status Penanganan</h3>
                <span class="question-status" id="detailHandlingStatus">-</span>
            </div>
            <p class="question-handling-description">
                Perbarui status setelah pertanyaan ditinjau.
            </p>
        </section>

        <!-- Catatan admin -->
        <section class="question-detail-section">
            <label for="questionAdminNote" class="question-detail-section-title">
                Catatan dari Admin
            </label>
            <textarea id="questionAdminNote" class="question-admin-note" rows="4" placeholder="Tulis catatan atau tindak lanjut..."></textarea>
        </section>
    </div>

    <!-- Tombol aksi -->
    <div class="question-drawer-footer">
        <button type="button" class="question-process-btn" id="markQuestionInProgress" data-id="">
            <i class="bi bi-arrow-repeat"></i>
            Tandai Dalam Proses
        </button>

        <button type="button" class="question-complete-btn" id="markQuestionComplete" data-id="">
            <i class="bi bi-check2-circle"></i>
            Tandai Selesai
        </button>
    </div>
</aside>

        <footer class="dashboard-footer">
            © 2026 Omah Amah · Smart Boarding House
        </footer>
    </main>

    <script src="{{ asset('js/dashboard.js') }}" defer></script>
    
    <!-- SCRIPT LOGIKA UNTUK SEMUA TOMBOL DAN API -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let inquiriesData = [];      // Data asli dari database
            let filteredData = [];       // Data setelah difilter
            let currentTab = 'semua';    // Tab default
            let currentCategory = 'semua'; // Kategori default

            const tbody = document.getElementById('questionTableBody');

            // ==========================================
            // 1. AMBIL DATA DARI API
            // ==========================================
            function fetchInquiries() {
                fetch('/api/inquiries')
                    .then(res => res.json())
                    .then(res => {
                        if(res.success) {
                            inquiriesData = res.data;
                            updateCounts();  // Hitung jumlah tab
                            applyFilters();  // Terapkan filter dan render
                        }
                    })
                    .catch(err => console.error("Gagal ambil data:", err));
            }

            // ==========================================
            // 2. FUNGSI UTAMA FILTER
            // ==========================================
            function applyFilters() {
                const searchKeyword = document.getElementById('questionSearch').value.toLowerCase();
                const statusKeyword = document.getElementById('questionStatusFilter').value;
                const dateKeyword = document.getElementById('questionDateFilter').value;

                // Filter berdasarkan Tab (Semua / Pengguna / Chatbot)
                filteredData = inquiriesData.filter(item => {
                    let matchTab = true;
                    if (currentTab === 'pengguna' && item.source === 'chatbot_ai') matchTab = false;
                    if (currentTab === 'chatbot' && item.source !== 'chatbot_ai') matchTab = false;
                    return matchTab;
                });

                // Filter berdasarkan Dropdown Search, Status, Tanggal
                filteredData = filteredData.filter(item => {
                    const matchesSearch = item.sender_name.toLowerCase().includes(searchKeyword) || 
                                          item.question.toLowerCase().includes(searchKeyword);
                    const matchesStatus = statusKeyword === "" || item.status === statusKeyword;
                    const matchesDate = dateKeyword === "" || item.created_at.startsWith(dateKeyword);
                    return matchesSearch && matchesStatus && matchesDate;
                });

                // Filter berdasarkan Tombol Kategori Bawah
                if (currentCategory !== 'semua') {
                    filteredData = filteredData.filter(item => item.category === currentCategory);
                }

                renderTable(filteredData);
            }

            // ==========================================
            // 3. RENDER TABEL
            // ==========================================
            function renderTable(data) {
                tbody.innerHTML = '';

                if (data.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="7" class="text-center py-4">Tidak ada pesan yang sesuai filter.</td></tr>`;
                    document.getElementById('questionResultCount').textContent = `Menampilkan 0 pesan`;
                    return;
                }

                data.forEach(item => {
                    const dateObj = new Date(item.created_at);
                    const dateStr = dateObj.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
                    
                    let statusClass = 'status-baru';
                    let statusText = 'Baru';
                    if (item.status === 'diproses') { statusClass = 'status-diproses'; statusText = 'Diproses'; }
                    if (item.status === 'selesai') { statusClass = 'status-selesai'; statusText = 'Selesai'; }

                    let catClass = 'category-lainnya';
                    if(item.category === 'kamar') catClass = 'category-kamar';
                    if(item.category === 'harga') catClass = 'category-harga';
                    if(item.category === 'laundry') catClass = 'category-laundry';
                    if(item.category === 'fasilitas') catClass = 'category-fasilitas';

                    const initials = item.sender_name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();

                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>
                            <div class="question-sender">
                                <div class="question-avatar">${initials}</div>
                                <div>
                                    <strong>${item.sender_name}</strong>
                                    <small>Pengguna</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="question-subject">${item.question}</div>
                        </td>
                        <td><span class="question-category-tag ${catClass}">${item.category}</span></td>
                        <td>
                            <span class="question-source ${item.source === 'chatbot_ai' ? 'source-ai' : ''}">
                                <i class="bi bi-${item.source === 'chatbot_ai' ? 'robot' : 'person'}"></i> 
                                ${item.source === 'chatbot_ai' ? 'Chatbot AI' : 'Pengguna'}
                            </span>
                        </td>
                        <td>${dateStr}</td>
                        <td><span class="question-status ${statusClass}">${statusText}</span></td>
                        <td>
                            <button type="button" class="question-more-btn btn-detail" title="Lihat detail">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    `;

                    tr.querySelector('.btn-detail').addEventListener('click', () => openDetail(item, statusClass, statusText, dateStr));
                    tbody.appendChild(tr);
                });

                document.getElementById('questionResultCount').textContent = `Menampilkan ${data.length} pesan`;
            }

            // ==========================================
            // 4. EVENT LISTENER UNTUK SEMUA FILTER
            // ==========================================
            
            // Search, Status, Tanggal (input event)
            document.getElementById('questionSearch').addEventListener('input', applyFilters);
            document.getElementById('questionStatusFilter').addEventListener('change', applyFilters);
            document.getElementById('questionDateFilter').addEventListener('change', applyFilters);

            // Dropdown Kategori Atas
            document.getElementById('questionCategoryFilter').addEventListener('change', function() {
                currentCategory = this.value === "" ? "semua" : this.value;
                
                // Sinkronkan tombol kategori bawah
                document.querySelectorAll('.question-category-btn').forEach(btn => {
                    btn.classList.toggle('active', btn.dataset.category === currentCategory);
                });
                applyFilters();
            });

            // Tombol Kategori Bawah
            document.querySelectorAll('.question-category-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    currentCategory = this.dataset.category;
                    
                    document.querySelectorAll('.question-category-btn').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Sinkronkan dropdown atas
                    document.getElementById('questionCategoryFilter').value = currentCategory === "semua" ? "" : currentCategory;
                    applyFilters();
                });
            });

            // Tombol Tab Atas (Semua / Pengguna / Chatbot)
            document.getElementById('tabSemua').addEventListener('click', function() {
                currentTab = 'semua';
                document.querySelectorAll('.question-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                applyFilters();
            });

            document.getElementById('tabPengguna').addEventListener('click', function() {
                currentTab = 'pengguna';
                document.querySelectorAll('.question-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                applyFilters();
            });

            document.getElementById('tabChatbot').addEventListener('click', function() {
                currentTab = 'chatbot';
                document.querySelectorAll('.question-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                applyFilters();
            });

            // Tombol Reset Filter
            document.getElementById('resetQuestionFilter').addEventListener('click', function() {
                document.getElementById('questionSearch').value = '';
                document.getElementById('questionStatusFilter').value = '';
                document.getElementById('questionCategoryFilter').value = '';
                document.getElementById('questionDateFilter').value = '';
                
                currentCategory = 'semua';
                currentTab = 'semua';

                document.querySelectorAll('.question-category-btn').forEach(btn => {
                    btn.classList.toggle('active', btn.dataset.category === 'semua');
                });
                
                document.querySelectorAll('.question-tab').forEach(t => t.classList.remove('active'));
                document.getElementById('tabSemua').classList.add('active');

                applyFilters();
            });

            // ==========================================
            // 5. HITUNG JUMLAH TAB
            // ==========================================
            function updateCounts() {
                const total = inquiriesData.length;
                const pengguna = inquiriesData.filter(i => i.source !== 'chatbot_ai').length;
                const chatbot = inquiriesData.filter(i => i.source === 'chatbot_ai').length;

                document.getElementById('countSemua').textContent = total;
                document.getElementById('countPengguna').textContent = pengguna;
                document.getElementById('countChatbot').textContent = chatbot;
            }

            // ==========================================
            // 6. BUKA DETAIL DRAWER
            // ==========================================
            function openDetail(item, statusClass, statusText, dateStr) {
                document.getElementById('detailSenderName').textContent = item.sender_name;
                document.getElementById('detailSenderAvatar').textContent = item.sender_name.substring(0,2).toUpperCase();
                document.getElementById('detailConversationAvatar').textContent = item.sender_name.substring(0,2).toUpperCase();
                document.getElementById('detailConversationName').textContent = item.sender_name;
                document.getElementById('detailReceivedDate').textContent = dateStr;
                document.getElementById('detailSource').textContent = item.source === 'chatbot_ai' ? 'Chatbot AI' : 'Pengguna';
                document.getElementById('detailCategory').textContent = item.category;
                document.getElementById('detailQuestionText').textContent = item.question;
                document.getElementById('detailConversationText').textContent = item.question;
                document.getElementById('detailAIAnswer').textContent = item.answer || "Belum ada jawaban dari sistem / admin.";
                
                const statusEl = document.getElementById('detailHandlingStatus');
                statusEl.textContent = statusText;
                statusEl.className = `question-status ${statusClass}`;

                document.getElementById('markQuestionInProgress').setAttribute('data-id', item.id);
                document.getElementById('markQuestionComplete').setAttribute('data-id', item.id);
                document.getElementById('questionAdminNote').value = item.answer || '';

                document.getElementById('questionDetailDrawer').classList.add('is-open');
                document.getElementById('questionDetailOverlay').classList.add('is-visible');
                document.getElementById('questionUpdateNotice').hidden = true;
            }

            // ==========================================
            // 7. TUTUP DETAIL DRAWER
            // ==========================================
            document.getElementById('closeQuestionDetail').addEventListener('click', closeDrawer);
            document.getElementById('questionDetailOverlay').addEventListener('click', closeDrawer);
            
            function closeDrawer() {
                document.getElementById('questionDetailDrawer').classList.remove('is-open');
                document.getElementById('questionDetailOverlay').classList.remove('is-visible');
            }

            // ==========================================
            // 8. UPDATE STATUS KE DATABASE
            // ==========================================
            function updateStatus(id, newStatus, btnElement) {
                if(!id) return;
                const originalHtml = btnElement.innerHTML;
                btnElement.innerHTML = 'Menyimpan...';
                btnElement.disabled = true;
                const note = document.getElementById('questionAdminNote').value;

                fetch(`/api/inquiries/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ status: newStatus, answer: note })
                })
                .then(res => res.json())
                .then(res => {
                    if(res.success) {
                        document.getElementById('questionUpdateNotice').hidden = false;
                        fetchInquiries(); // Refresh data tabel dari database
                    } else {
                        alert('Gagal update status.');
                    }
                })
                .catch(err => console.error(err))
                .finally(() => {
                    btnElement.innerHTML = originalHtml;
                    btnElement.disabled = false;
                });
            }

            document.getElementById('markQuestionInProgress').addEventListener('click', function() {
                updateStatus(this.getAttribute('data-id'), 'diproses', this);
            });

            document.getElementById('markQuestionComplete').addEventListener('click', function() {
                updateStatus(this.getAttribute('data-id'), 'selesai', this);
            });

            // Jalankan saat halaman pertama kali dibuka
            fetchInquiries();
        });
    </script>
</body>
</html>