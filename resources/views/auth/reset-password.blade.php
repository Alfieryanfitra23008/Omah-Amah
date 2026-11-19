<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reset Password | Omah Amah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #F6FAFD;
            font-family: 'DM Sans', sans-serif;
        }
        .card {
            width: 100%;
            max-width: 440px;
            padding: 40px;
            border-radius: 16px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .card h3 {
            font-weight: 800;
            color: #24352a;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #1B3D63;
            border-color: #1B3D63;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="card">
        <h3>Reset Kata Sandi</h3>
        <p class="text-muted mb-4">Silakan masukkan kata sandi baru Anda.</p>

        <form id="resetForm">
            <input type="hidden" id="token" value="{{ $token ?? '' }}">
            <input type="hidden" id="email" value="{{ request()->email ?? '' }}">

            <div class="mb-3">
                <label class="form-label">Kata Sandi Baru</label>
                <input type="password" id="newPassword" class="form-control" placeholder="Minimal 8 karakter" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Konfirmasi Kata Sandi</label>
                <input type="password" id="confirmPassword" class="form-control" placeholder="Ulangi kata sandi" required>
            </div>

            <div id="resetMessage" class="text-danger small mb-3" hidden></div>

            <button type="submit" class="btn btn-primary w-100">Simpan Kata Sandi Baru</button>
        </form>
    </div>

    <script>
        document.getElementById('resetForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = this.querySelector('button[type="submit"]');
            const msg = document.getElementById('resetMessage');
            const originalBtnText = btn.textContent;

            const password = document.getElementById('newPassword').value;
            const confirm = document.getElementById('confirmPassword').value;

            msg.hidden = true;

            if (password !== confirm) {
                msg.textContent = 'Konfirmasi kata sandi tidak cocok.';
                msg.hidden = false;
                return;
            }
            if (password.length < 8) {
                msg.textContent = 'Kata sandi minimal 8 karakter.';
                msg.hidden = false;
                return;
            }

            btn.textContent = 'Menyimpan...';
            btn.disabled = true;

            try {
                const response = await fetch('/api/reset-password', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        token: document.getElementById('token').value,
                        email: document.getElementById('email').value,
                        password: password,
                        password_confirmation: confirm
                    })
                });

                const res = await response.json();

                if (res.success) {
                    alert('Kata sandi berhasil diubah! Silakan login kembali.');
                    window.location.href = '/';
                } else {
                    msg.textContent = res.message || 'Gagal mereset kata sandi.';
                    msg.hidden = false;
                }
            } catch (err) {
                console.error(err);
                msg.textContent = 'Terjadi kesalahan sistem.';
                msg.hidden = false;
            } finally {
                btn.textContent = originalBtnText;
                btn.disabled = false;
            }
        });
    </script>
</body>
</html>