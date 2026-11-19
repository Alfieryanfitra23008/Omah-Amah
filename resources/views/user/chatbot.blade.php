<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Chatbot | Omah Amah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/user/chatbot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/dashboard.css') }}">
</head>

<body>

    @include('user_partials.sidebar')

    <main class="main-content">

        <!-- TOPBAR -->
        <header class="topbar">
            <div class="topbar-left">

                <button type="button" class="sidebar-toggle" id="sidebarToggle" aria-label="Buka atau ciutkan sidebar" aria-controls="sidebar" aria-expanded="true">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div>
                    <h1>Chatbot</h1>
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

        
<div class="chatbot-container">

    <!-- Judul halaman -->
    <section class="chatbot-page-heading">
        <span class="chatbot-eyebrow">BANTUAN INFORMASI LEBIH MUDAH</span>
        <h1>Amah AI - Asisten Kostmu</h1>
        <p>
            Temukan informasi seputar kamar, fasilitas, dan layanan
            Omah Amah dengan mudah melalui Amah AI.
        </p>
    </section>

    <!-- Card utama chatbot -->
    <section class="chatbot-card">

        <!-- Header putih -->
        <div class="chatbot-card-header">
            <div class="chatbot-brand-icon">
                <i class="bi bi-robot"></i>
            </div>

            <div class="chatbot-brand-info">
                <h3>Amah AI</h3>
                <p>Asisten virtual Omah Amah</p>
            </div>

            <span class="chatbot-ai-badge">
                <span class="chatbot-status-dot"></span>
                AI Assistant
            </span>
        </div>

        <!-- Konten chatbot -->
        <div class="chatbot-card-body">

            <!-- Sapaan awal -->
            <div class="chatbot-welcome">
                <div class="chatbot-robot-icon">
                    <i class="bi bi-robot"></i>
                </div>

                <h2>Halo, ada yang bisa Amah AI bantu?</h2>

                <p>
                    Silakan pilih pertanyaan di bawah atau tuliskan
                    pertanyaanmu pada kolom pesan.
                </p>
            </div>

            <!-- Area pesan: dipakai oleh JavaScript chatbot -->
            <div class="chatbot-messages" id="chatMessages"></div>

            <!-- Pertanyaan cepat -->
            <div class="chatbot-question-section">
                <h4>Mulai dari pertanyaan berikut</h4>

                <div class="chatbot-question-grid">

                    <button type="button" class="chatbot-question-card suggestion-chip" data-question="Apakah ada kamar kosong?">
                        <span class="question-icon question-icon-blue">
                            <i class="bi bi-house-door"></i>
                        </span>
                        <span class="question-text">
                            Apakah ada kamar kosong?
                        </span>
                        <i class="bi bi-arrow-up-right question-arrow"></i>
                    </button>

                    <button type="button" class="chatbot-question-card suggestion-chip" data-question="Apa saja fasilitas yang tersedia?">
                        <span class="question-icon question-icon-green">
                            <i class="bi bi-stars"></i>
                        </span>
                        <span class="question-text">
                            Apa saja fasilitas yang tersedia?
                        </span>
                        <i class="bi bi-arrow-up-right question-arrow"></i>
                    </button>

                    <button type="button" class="chatbot-question-card suggestion-chip" data-question="Berapa harga sewa kamar per bulan?">
                        <span class="question-icon question-icon-orange">
                            <i class="bi bi-wallet2"></i>
                        </span>
                        <span class="question-text">
                            Berapa harga per bulan?
                        </span>
                        <i class="bi bi-arrow-up-right question-arrow"></i>
                    </button>

                    <button type="button" class="chatbot-question-card suggestion-chip" data-question="Berapa tarif laundry per kilogram?">
                        <span class="question-icon question-icon-purple">
                            <i class="bi bi-basket"></i>
                        </span>
                        <span class="question-text">
                            Berapa tarif laundry per kg?
                        </span>
                        <i class="bi bi-arrow-up-right question-arrow"></i>
                    </button>

                </div>
            </div>
        </div>

        <!-- Input pertanyaan -->
        <div class="chatbot-input-wrapper">
            <form id="chatForm" class="chatbot-input-form">
                <textarea id="chatInput" name="message" rows="1" placeholder="Tulis pertanyaanmu di sini..." aria-label="Tulis pertanyaan" required></textarea>
                <button type="submit" class="chatbot-send-button" aria-label="Kirim pertanyaan">
                    <i class="bi bi-send-fill"></i>
                </button>
            </form>

            <p class="chatbot-input-note">
                <i class="bi bi-shield-check"></i>
                Amah AI membantu memberikan informasi seputar Omah Amah.
            </p>
        </div>

    </section>
</div>


<!-- Footer Omah Amah -->
<footer class="user-footer">

    <div class="user-footer-main">

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

        <div class="footer-navigation">
            <h4>Navigasi</h4>
            <a href="{{ url('/user/dashboard') }}">Dashboard</a>
            <a href="{{ route('user.inform') }}">Informasi Kost</a>
            <a href="{{ url('/rooms') }}">Kamar &amp; Fasilitas</a>
            <a href="{{ url('/chatbot') }}">Chatbot AI</a>
        </div>

    </div>

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

    </main>

    <script src="{{ asset('js/user/dashboard.js') }}" defer></script>

    <!-- SCRIPT UNTUK CHATBOT (TERSAMBUNG KE API) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatForm = document.getElementById('chatForm');
            const chatInput = document.getElementById('chatInput');
            const chatMessages = document.getElementById('chatMessages');
            const suggestionChips = document.querySelectorAll('.suggestion-chip');

            // 1. Fungsi untuk menambahkan pesan ke layar
            function appendMessage(sender, text) {
                const messageDiv = document.createElement('div');
                messageDiv.className = `chat-message ${sender}`;
                
                // Styling langsung (inline) agar tidak bentrok dengan CSS yang ada
                if (sender === 'user') {
                    messageDiv.style.cssText = 'background: #426b50; color: white; padding: 12px 15px; border-radius: 15px 0 15px 15px; max-width: 80%; align-self: flex-end; margin-bottom: 10px; font-size: 14px;';
                } else {
                    messageDiv.style.cssText = 'background: #f1f5f9; color: #333; padding: 12px 15px; border-radius: 0 15px 15px 15px; max-width: 80%; align-self: flex-start; margin-bottom: 10px; font-size: 14px;';
                }

                messageDiv.innerHTML = text;
                chatMessages.appendChild(messageDiv);
                
                // Scroll otomatis ke bawah
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            // 2. Fungsi untuk mengirim pesan ke API
            async function sendMessage(message) {
                if (!message.trim()) return;

                // Tampilkan pesan user
                appendMessage('user', message);
                chatInput.value = '';

                // Tampilkan status "mengetik"
                const typingId = 'typing-' + Date.now();
                const typingDiv = document.createElement('div');
                typingDiv.id = typingId;
                typingDiv.style.cssText = 'background: #f1f5f9; color: #64748b; padding: 12px 15px; border-radius: 0 15px 15px 15px; max-width: 80%; align-self: flex-start; margin-bottom: 10px; font-size: 14px; font-style: italic;';
                typingDiv.innerHTML = 'Amah AI sedang mengetik...';
                chatMessages.appendChild(typingDiv);
                chatMessages.scrollTop = chatMessages.scrollHeight;

                try {
                    const response = await fetch('/api/chatbot', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ 
                            message: message,
                            sender_name: 'Penghuni' // Bisa diganti dengan nama user jika ada login
                        })
                    });

                    const res = await response.json();

                    // Hapus status mengetik
                    const typingEl = document.getElementById(typingId);
                    if (typingEl) typingEl.remove();

                    if (res.success) {
                        appendMessage('ai', res.reply);
                    } else {
                        appendMessage('ai', 'Maaf, Amah AI sedang sibuk. Silakan coba lagi.');
                    }
                } catch (err) {
                    console.error(err);
                    const typingEl = document.getElementById(typingId);
                    if (typingEl) typingEl.remove();
                    appendMessage('ai', 'Terjadi kesalahan sistem. Pastikan server menyala.');
                }
            }

            // 3. Event saat form di-submit (menekan Enter atau klik tombol kirim)
            chatForm.addEventListener('submit', function(e) {
                e.preventDefault();
                sendMessage(chatInput.value);
            });

            // 4. Event saat tombol saran pertanyaan diklik
            suggestionChips.forEach(chip => {
                chip.addEventListener('click', function() {
                    const question = this.getAttribute('data-question');
                    sendMessage(question);
                });
            });
        });
    </script>

</body>
</html>