<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | Omah Amah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #426b50;
            --primary-dark: #2f503a;
            --text: #24352a;
            --muted: #7b847c;
        }

        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            background-color:#F6FAFD;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            padding: 42px;
        }

        .form-heading { margin-bottom: 10px; }
        .form-heading h1 { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 25px; font-weight: 800; margin-bottom: 9px; }
        .form-heading p { color: var(--muted); font-size: 13px; line-height: 1.7; margin: 0; }

        .form-label { margin-bottom: 9px; font-size: 13px; font-weight: 700; }
        .input-wrap { position: relative; margin-bottom: 21px; }
        .input-icon { position: absolute; top: 50%; left: 15px; transform: translateY(-50%); color: #899489; font-size: 16px; pointer-events: none; }
        .form-control { height: 51px; padding: 12px 15px 12px 44px; border: 1px solid #e3e7df; border-radius: 11px; background: #fcfcfa; font-size: 13px; }
        .form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 4px rgba(66, 107, 80, 0.10); background: #fff; }
        .password-input { padding-right: 75px; }
        .password-toggle { position: absolute; top: 50%; right: 13px; transform: translateY(-50%); padding: 5px; border: none; background: transparent; color: var(--primary); font-size: 12px; font-weight: 700; cursor: pointer; }
        .form-options { display: flex; justify-content: space-between; align-items: center; margin: -1px 0 25px; font-size: 12px; }
        .form-check-input:checked { background-color: var(--primary); border-color: var(--primary); }
        .forgot-link { color: var(--primary); font-weight: 700; text-decoration: none; }
        .btn-login { width: 100%; height: 51px; border: none; border-radius: 11px; background-color:#1B3D63; color: white; font-size: 14px; font-weight: 700; transition: 0.2s ease; }
        .btn-login:hover { background: var(--primary-dark); transform: translateY(-1px); }
        
        .btn-register-account {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #dce7df;
            border-radius: 10px;
            background: #f5f9f6;
            color: #426b50;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: background .2s ease, border-color .2s ease;
        }
        .btn-register-account:hover {
            background: #eaf3ed;
            border-color: #b9d2c0;
            color: #31543d;
        }

        /* Style untuk modal register */
        .modal-dialog { max-width: 400px; }
        .modal-content { border-radius: 16px; border: none; box-shadow: 0 15px 50px rgba(0,0,0,0.1); }
        .modal-header { padding: 16px 20px; border-bottom: 1px solid #edf0f5; background: #fcfcfd; border-radius: 16px 16px 0 0; }
        .modal-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 16px; color: #1d2939; }
        .modal-header small { font-size: 11px; }
        .modal-body { padding: 20px; }
        .modal-footer { padding: 15px 20px; border-top: 1px solid #edf0f5; background: #fcfcfd; border-radius: 0 0 16px 16px; }
        .modal-body .form-label { font-size: 12px; margin-bottom: 6px; color: #344054; font-weight: 600; }
        .modal-body .form-control, .modal-body .input-group-text { height: 42px; font-size: 13px; }
        .modal-body .mb-3 { margin-bottom: 15px !important; }
        .modal-body .form-control { padding: 8px 12px; border-color: #d0d5dd; }
        .btn-register-submit { background-color: #1B3D63; border: none; font-weight: 600; font-size: 13px; padding: 8px 18px; border-radius: 8px; transition: 0.2s; }
        .btn-register-submit:hover { background-color: #2f503a; }
        .login-error { color: #c33b3b; font-size: 12px; margin-top: 10px; text-align: center; }
        .toggle-password-modal { background: none; border: none; color: #667085; cursor: pointer; padding: 0 10px; }
        .toggle-password-modal:hover { color: #1B3D63; }
    </style>
</head>

<body>

    <main class="login-card">
        <div class="form-heading">
            <h1>Login</h1>
            <p>Masukan akun administrator atau penghuni untuk melanjutkan</p>
        </div>

        <form id="loginForm" novalidate>
            <div>
                <label for="email" class="form-label">Email</label>
                <div class="input-wrap">
                    <span class="input-icon">✉</span>
                    <input type="email" id="email" name="email" class="form-control" placeholder="email@omahamah.com" required>
                </div>
            </div>

            <div>
                <label for="password" class="form-label">Password</label>
                <div class="input-wrap">
                    <span class="input-icon">♙</span>
                    <input type="password" id="password" name="password" class="form-control password-input" placeholder="Masukan Kata Sandi" required>
                    <button type="button" class="password-toggle" id="togglePassword">Lihat</button>
                </div>
            </div>

            <!-- DROPDOWN ROLE -->
            <div>
                <label for="loginRole" class="form-label">Login Sebagai</label>
                <div class="input-wrap">
                    <select id="loginRole" class="form-control" style="padding-left: 15px; height: 51px;" required>
                        <option value="penghuni">Penghuni / Calon Penghuni</option>
                        <option value="admin">Administrator</option>
                    </select>
                </div>
            </div>

            <div class="form-options">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>
                <!-- Link Lupa Kata Sandi -->
                <a href="#" class="forgot-link" id="forgotPasswordLink">Lupa Kata Sandi.?</a>
            </div>

            <button type="submit" class="btn btn-login">Masuk Sekarang</button>
            
            <div id="loginErrorMessage" class="login-error" hidden></div>

            <!-- TOMBOL DAFTAR AKUN BARU -->
            <div style="margin-top: 24px; padding-top: 20px; border-top: 1px solid #e9eaf0; text-align: center;">
                <span style="display: block; margin-bottom: 12px; color: #85869a; font-size: 12px;">Belum punya akun? Daftar sebagai penghuni di sini</span>
                <!-- Tombol ini memicu Modal -->
                <button type="button" class="btn-register-account" data-bs-toggle="modal" data-bs-target="#registerModal">
                    <i class="bi bi-person-plus"></i>
                    Daftar Akun Penghuni
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </form>
    </main>

    <!-- MODAL REGISTER -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center gap-2">
                        <div style="width: 35px; height: 35px; background: #edf5ff; color: #3974ad; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 16px;">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                        <div>
                            <h5 class="modal-title">Daftar Akun Baru</h5>
                            <small style="color: #85869a;">Lengkapi data diri Anda.</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px;"></button>
                </div>
                
                <div class="modal-body">
                    <form id="registerForm">
                        <div class="mb-3">
                            <label for="regName" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="regName" placeholder="Contoh: Budi Santoso" required>
                        </div>

                        <div class="mb-3">
                            <label for="regEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="regEmail" placeholder="contoh@email.com" required>
                        </div>

                        <div class="mb-3">
                            <label for="regConfirmEmail" class="form-label">Konfirmasi Email</label>
                            <input type="email" class="form-control" id="regConfirmEmail" placeholder="Ulangi email" required>
                        </div>

                        <div class="mb-3">
                            <label for="regPassword" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                                <input type="password" class="form-control" id="regPassword" placeholder="Minimal 8 karakter" required style="border-left: 0;">
                                <button class="toggle-password-modal" type="button" onclick="toggleModalPassword('regPassword', this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="regConfirm" class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" class="form-control" id="regConfirm" placeholder="Ulangi password" required style="border-left: 0;">
                                <button class="toggle-password-modal" type="button" onclick="toggleModalPassword('regConfirm', this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div id="registerMessage" class="login-error" hidden></div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" style="font-size: 13px; padding: 8px 18px; border-radius: 8px;">Batal</button>
                    <button type="button" class="btn btn-register-submit text-white" id="btnRegister">
                        <i class="bi bi-check2-circle me-1"></i> Daftar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Toggle Password Form Login
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    togglePassword.addEventListener('click', function () {
        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';
        togglePassword.textContent = isPassword ? 'Sembunyi' : 'Lihat';
    });

    // Toggle Password di Modal Register
    function toggleModalPassword(inputId, btnElement) {
        const input = document.getElementById(inputId);
        const icon = btnElement.querySelector('i');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }

    // ==========================================
    // LOGIKA INGAT SAYA (SIMPAN EMAIL DI BROWSER)
    // ==========================================
    const rememberCheckbox = document.getElementById('remember');
    const emailInput = document.getElementById('email');

    // Saat halaman dimuat, cek apakah ada email yang diingat
    if (localStorage.getItem('rememberedEmail')) {
        emailInput.value = localStorage.getItem('rememberedEmail');
        rememberCheckbox.checked = true;
    }

    // LOGIKA LOGIN
    document.getElementById('loginForm').addEventListener('submit', function (event) {
        event.preventDefault();
        const btn = this.querySelector('button[type="submit"]');
        const errorMsg = document.getElementById('loginErrorMessage');
        const originalBtnText = btn.textContent;
        
        btn.textContent = 'Memproses...';
        btn.disabled = true;
        errorMsg.hidden = true;

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const role = document.getElementById('loginRole').value;

        // Simpan / Hapus email berdasarkan centang "Ingat Saya"
        if (rememberCheckbox.checked) {
            localStorage.setItem('rememberedEmail', email);
        } else {
            localStorage.removeItem('rememberedEmail');
        }

        fetch('/api/login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
            body: JSON.stringify({ email: email, password: password, role: role })
        })
        .then(res => res.json())
        .then(res => {
            if (res.success) {
                sessionStorage.setItem('user_login', JSON.stringify(res.user));
                
                // Redirect Otomatis Sesuai Role
                if (res.user.role === 'admin' || res.user.role === 'super_admin') {
                    window.location.href = '/dashboard';
                } else {
                    window.location.href = '/user/dashboard';
                }
            } else {
                errorMsg.textContent = res.message || 'Login gagal.';
                errorMsg.hidden = false;
                btn.textContent = originalBtnText;
                btn.disabled = false;
            }
        })
        .catch(err => {
            console.error(err);
            errorMsg.textContent = 'Terjadi kesalahan sistem.';
            errorMsg.hidden = false;
            btn.textContent = originalBtnText;
            btn.disabled = false;
        });
    });

    // ==========================================
    // LOGIKA LUPA KATA SANDI (TERSAMBUNG KE API EMAIL)
    // ==========================================
    document.getElementById('forgotPasswordLink').addEventListener('click', async function(e) {
        e.preventDefault();
        
        const email = prompt("Masukkan email yang terdaftar untuk mereset kata sandi:");
        if (!email) return;

        try {
            const response = await fetch('/api/forgot-password', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ email: email })
            });

            const res = await response.json();

            if (res.success) {
                alert('Berhasil! Silakan periksa kotak masuk (Inbox) atau folder Spam di email Anda untuk tautan reset kata sandi.');
            } else {
                alert('Gagal: ' + res.message);
            }
        } catch (err) {
            console.error(err);
            alert('Terjadi kesalahan sistem saat mengirim email.');
        }
    });

    // LOGIKA REGISTER
    document.getElementById('btnRegister').addEventListener('click', function() {
        const btn = this;
        const msg = document.getElementById('registerMessage');
        const originalBtnText = btn.innerHTML;

        const name = document.getElementById('regName').value;
        const email = document.getElementById('regEmail').value;
        const confirmEmail = document.getElementById('regConfirmEmail').value;
        const password = document.getElementById('regPassword').value;
        const confirm = document.getElementById('regConfirm').value;

        msg.hidden = true;

        if (!name || !email || !confirmEmail || !password || !confirm) {
            msg.textContent = 'Semua kolom wajib diisi.';
            msg.hidden = false;
            return;
        }
        if (email !== confirmEmail) {
            msg.textContent = 'Konfirmasi email tidak cocok.';
            msg.hidden = false;
            return;
        }
        if (password !== confirm) {
            msg.textContent = 'Konfirmasi password tidak cocok.';
            msg.hidden = false;
            return;
        }
        if (password.length < 8) {
            msg.textContent = 'Password minimal 8 karakter.';
            msg.hidden = false;
            return;
        }

        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Mendaftar...';
        btn.disabled = true;

        fetch('/api/register', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
            body: JSON.stringify({ name: name, email: email, password: password })
        })
        .then(res => res.json())
        .then(res => {
            if (res.success) {
                alert('Pendaftaran berhasil! Silakan login.');
                const modal = bootstrap.Modal.getInstance(document.getElementById('registerModal'));
                modal.hide();
                document.getElementById('email').value = email;
                document.getElementById('password').focus();
            } else {
                msg.textContent = res.message || 'Pendaftaran gagal.';
                msg.hidden = false;
            }
        })
        .catch(err => {
            console.error(err);
            msg.textContent = 'Terjadi kesalahan sistem.';
            msg.hidden = false;
        })
        .finally(() => {
            btn.innerHTML = originalBtnText;
            btn.disabled = false;
        });
    });
    </script>

</body>
</html>