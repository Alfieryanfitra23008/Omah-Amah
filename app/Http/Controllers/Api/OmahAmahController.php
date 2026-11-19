<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class OmahAmahController extends Controller
{
    // =========================================================
    // 1. API KAMAR (DASHBOARD, ROOMS, ROOM DETAIL)
    // =========================================================

    // Menampilkan semua kamar
    public function rooms()
    {
        $rooms = DB::table('rooms')
            ->where('is_active', true)
            ->orderBy('room_code')
            ->get();

        foreach ($rooms as $room) {
            $room->facilities = DB::table('facilities')
                ->join('room_facility', 'facilities.id', '=', 'room_facility.facility_id')
                ->where('room_facility.room_id', $room->id)
                ->select('facilities.id', 'facilities.name')
                ->get();
        }

        return response()->json([
            'success' => true,
            'message' => 'Data kamar berhasil ditampilkan',
            'data' => $rooms
        ]);
    }

    // Menampilkan detail kamar berdasarkan slug
    public function roomDetail($slug)
    {
        $room = DB::table('rooms')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$room) {
            return response()->json([
                'success' => false,
                'message' => 'Kamar tidak ditemukan'
            ], 404);
        }

        $room->facilities = DB::table('facilities')
            ->join('room_facility', 'facilities.id', '=', 'room_facility.facility_id')
            ->where('room_facility.room_id', $room->id)
            ->select('facilities.id', 'facilities.name')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $room
        ]);
    }

    // Menyimpan kamar baru (Dengan Upload Gambar & Fasilitas)
    public function storeRoom(Request $request)
    {
        $validated = $request->validate([
            'room_code' => 'required|string|max:20|unique:rooms,room_code',
            'name' => 'required|string|max:100',
            'room_type' => 'required|string|max:40',
            'monthly_price' => 'nullable|numeric|min:0',
            'availability' => 'required|in:tersedia,penuh,perlu_konfirmasi',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $slug = Str::slug($validated['name']);
        $originalSlug = $slug;
        $counter = 1;

        while (DB::table('rooms')->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $imagePath = null;

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('rooms', 'public');
            $imagePath = asset('storage/' . $path);
        }

        $id = DB::table('rooms')->insertGetId([
            'room_code' => $validated['room_code'],
            'name' => $validated['name'],
            'slug' => $slug,
            'room_type' => $validated['room_type'],
            'monthly_price' => $validated['monthly_price'],
            'availability' => $validated['availability'],
            'image_url' => $imagePath,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->has('facilities') && is_array($request->facilities)) {
            foreach ($request->facilities as $facilityId) {
                DB::table('room_facility')->insert([
                    'room_id' => $id,
                    'facility_id' => $facilityId,
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Data kamar berhasil disimpan.',
            'data' => ['id' => $id]
        ], 201);
    }

    // Mengambil detail 1 kamar berdasarkan ID (Untuk tombol Detail/Edit)
    public function showRoom($id)
    {
        $room = DB::table('rooms')->where('id', $id)->first();

        if (!$room) {
            return response()->json([
                'success' => false,
                'message' => 'Kamar tidak ditemukan'
            ], 404);
        }

        $room->facilities = DB::table('facilities')
            ->join('room_facility', 'facilities.id', '=', 'room_facility.facility_id')
            ->where('room_facility.room_id', $room->id)
            ->select('facilities.id', 'facilities.name')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $room
        ]);
    }

    // Mengupdate data kamar (Dengan Upload Gambar)
    public function updateRoom(Request $request, $id)
    {
        $validated = $request->validate([
            'room_code' => 'required|string|max:20|unique:rooms,room_code,' . $id,
            'name' => 'required|string|max:100',
            'room_type' => 'required|string|max:40',
            'monthly_price' => 'nullable|numeric|min:0',
            'availability' => 'required|in:tersedia,penuh,perlu_konfirmasi',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $room = DB::table('rooms')->where('id', $id)->first();

        if (!$room) {
            return response()->json([
                'success' => false,
                'message' => 'Kamar tidak ditemukan'
            ], 404);
        }

        $imagePath = $room->image_url;

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('rooms', 'public');
            $imagePath = asset('storage/' . $path);
        }

        DB::table('rooms')
            ->where('id', $id)
            ->update([
                'room_code' => $validated['room_code'],
                'name' => $validated['name'],
                'room_type' => $validated['room_type'],
                'monthly_price' => $validated['monthly_price'],
                'availability' => $validated['availability'],
                'image_url' => $imagePath,
                'updated_at' => now(),
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Data kamar berhasil diperbarui.'
        ]);
    }

    // Menghapus data kamar
    public function destroyRoom($id)
    {
        DB::table('room_facility')->where('room_id', $id)->delete();

        $deleted = DB::table('rooms')->where('id', $id)->delete();

        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => 'Kamar telah dihapus.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus kamar.'
        ], 500);
    }

    // =========================================================
    // 2. API FASILITAS (FACILITIES.BLADE.PHP)
    // =========================================================

    // Menampilkan fasilitas
    public function facilities()
    {
        $data = DB::table('facilities')
            ->where('is_active', true)
            ->orderBy('category')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    // Menyimpan fasilitas baru
    public function storeFacility(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:facilities,name',
            'category' => 'required|in:kamar,bersama,layanan',
            'description' => 'nullable|string',
        ]);

        $id = DB::table('facilities')->insertGetId([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'description' => $validated['description'] ?? null,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Fasilitas berhasil disimpan.',
            'data' => ['id' => $id]
        ], 201);
    }

    // Mengupdate fasilitas
    public function updateFacility(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:facilities,name,' . $id,
            'category' => 'required|in:kamar,bersama,layanan',
            'description' => 'nullable|string',
        ]);

        DB::table('facilities')
            ->where('id', $id)
            ->update([
                'name' => $validated['name'],
                'category' => $validated['category'],
                'description' => $validated['description'] ?? null,
                'updated_at' => now(),
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Data fasilitas berhasil diperbarui.'
        ]);
    }

    // Menghapus fasilitas
    public function destroyFacility($id)
    {
        DB::table('room_facility')->where('facility_id', $id)->delete();

        $deleted = DB::table('facilities')->where('id', $id)->delete();

        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => 'Fasilitas berhasil dihapus.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus fasilitas.'
        ], 500);
    }

    // =========================================================
    // 3. API INFORMASI KOST & FAQ (INFORMATION.BLADE.PHP)
    // =========================================================

    // Menampilkan informasi kost
    public function profile()
    {
        $data = DB::table('kost_profiles')->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    // Mengupdate Profil Kost (Termasuk Jam & Link Maps)
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'contact_name' => 'nullable|string|max:100',
            'contact_phone' => 'nullable|string|max:30',
            'visit_hours' => 'nullable|string|max:50',
            'quiet_hours' => 'nullable|string|max:50',
            'maps_link' => 'nullable|string',
        ]);

        DB::table('kost_profiles')
            ->where('id', 1)
            ->update([
                'name' => $validated['name'],
                'address' => $validated['address'] ?? null,
                'description' => $validated['description'] ?? null,
                'contact_name' => $validated['contact_name'] ?? null,
                'contact_phone' => $validated['contact_phone'] ?? null,
                'visit_hours' => $validated['visit_hours'] ?? null,
                'quiet_hours' => $validated['quiet_hours'] ?? null,
                'maps_link' => $validated['maps_link'] ?? null,
                'updated_at' => now(),
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Informasi kost berhasil diperbarui.'
        ]);
    }

    // Menampilkan FAQ (Digunakan sebagai contoh peraturan di halaman informasi)
    public function faqs()
    {
        $data = DB::table('faqs')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    // =========================================================
    // 4. API PESAN & PERTANYAAN (QUESTION.BLADE.PHP)
    // =========================================================

    // Menyimpan pertanyaan dari penghuni
    public function storeInquiry(Request $request)
    {
        $validated = $request->validate([
            'sender_name' => 'required|string|max:120',
            'category' => 'required|in:kamar,harga,fasilitas,laundry,lainnya',
            'question' => 'required|string',
        ]);

        $id = DB::table('inquiries')->insertGetId([
            'sender_name' => $validated['sender_name'],
            'category' => $validated['category'],
            'source' => 'website',
            'question' => $validated['question'],
            'status' => 'baru',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pertanyaan berhasil dikirim.',
            'data' => ['id' => $id]
        ], 201);
    }

    // Mengambil semua daftar pertanyaan (Admin)
    public function getInquiries()
    {
        $inquiries = DB::table('inquiries')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $inquiries
        ]);
    }

    // Mengubah status pertanyaan & menyimpan catatan admin
    public function updateInquiryStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:baru,diproses,selesai',
            'answer' => 'nullable|string'
        ]);

        DB::table('inquiries')
            ->where('id', $id)
            ->update([
                'status' => $validated['status'],
                'answer' => $validated['answer'] ?? null,
                'updated_at' => now()
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Status pertanyaan telah diperbarui.'
        ]);
    }

    // =========================================================
    // 5. API LAUNDRY (LAUNDRY.BLADE.PHP)
    // =========================================================

    // Menampilkan data laundry
    public function getLaundry()
    {
        $data = DB::table('laundry_services')
            ->where('id', 1)
            ->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    // Mengupdate data laundry
    public function updateLaundry(Request $request, $id)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:120',
            'price_per_kg' => 'nullable|numeric|min:0',
            'estimated_days' => 'nullable|integer|min:1',
            'minimum_weight' => 'nullable|numeric|min:0.1',
            'is_active' => 'required|boolean',
            'notes' => 'nullable|string',
        ]);

        DB::table('laundry_services')
            ->where('id', $id)
            ->update([
                'service_name' => $validated['service_name'],
                'price_per_kg' => $validated['price_per_kg'],
                'estimated_days' => $validated['estimated_days'],
                'minimum_weight' => $validated['minimum_weight'] ?? 3.0,
                'is_active' => $validated['is_active'],
                'notes' => $validated['notes'] ?? null,
                'updated_at' => now(),
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Informasi laundry berhasil diperbarui.'
        ]);
    }

    // =========================================================
    // 6. API CHATBOT (CHATBOT.BLADE.PHP)
    // =========================================================

    // Logika Chatbot AI Sederhana (Rule-Based)
    public function askChatbot(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string',
            'sender_name' => 'nullable|string'
        ]);

        $message = strtolower($validated['message']);
        $reply = "";
        $category = "lainnya";

        // 1. Cek Kamar Mandi & Fasilitas
        if (
            strpos($message, 'kamar mandi') !== false ||
            strpos($message, 'mandi') !== false ||
            strpos($message, 'toilet') !== false
        ) {
            $reply = "Setiap kamar di Omah Amah sudah dilengkapi dengan kamar mandi dalam (privat) untuk kenyamanan penghuni.";
            $category = "fasilitas";
        } elseif (
            strpos($message, 'ac') !== false ||
            strpos($message, 'wifi') !== false ||
            strpos($message, 'kasur') !== false ||
            strpos($message, 'lemari') !== false ||
            strpos($message, 'fasilitas') !== false
        ) {
            $reply = "Omah Amah menyediakan fasilitas seperti AC, Wi-Fi, Meja Belajar, Lemari, Kasur, dan Kamar Mandi Dalam. Fasilitas dapat berbeda tiap tipe kamar.";
            $category = "fasilitas";
        }

        // 2. Cek Harga
        elseif (
            strpos($message, 'harga') !== false ||
            strpos($message, 'biaya') !== false ||
            strpos($message, 'bayar') !== false
        ) {
            $cheapestRoom = DB::table('rooms')
                ->whereNotNull('monthly_price')
                ->orderBy('monthly_price', 'asc')
                ->first();

            $price = $cheapestRoom
                ? "Rp " . number_format($cheapestRoom->monthly_price, 0, ',', '.')
                : "Hubungi pengelola";

            $reply = "Harga sewa kamar di Omah Amah mulai dari $price per bulan. Harga dapat berbeda tergantung tipe kamar dan fasilitas.";
            $category = "harga";
        }

        // 3. Cek Laundry
        elseif (
            strpos($message, 'laundry') !== false ||
            strpos($message, 'cuci') !== false
        ) {
            $laundry = DB::table('laundry_services')
                ->where('id', 1)
                ->first();

            $price = $laundry && $laundry->price_per_kg !== null
                ? "Rp " . number_format($laundry->price_per_kg, 0, ',', '.') . " / Kg"
                : "menunggu konfirmasi";

            $estimatedDays = $laundry->estimated_days ?? '2-3';

            $reply = "Layanan laundry di Omah Amah dikenakan biaya $price. Estimasi pengerjaan sekitar $estimatedDays hari.";
            $category = "laundry";
        }

        // 4. Cek Ketersediaan Kamar
        elseif (
            strpos($message, 'kamar') !== false ||
            strpos($message, 'kosong') !== false ||
            strpos($message, 'tersedia') !== false
        ) {
            $availableRooms = DB::table('rooms')
                ->where('availability', 'tersedia')
                ->count();

            if ($availableRooms > 0) {
                $reply = "Saat ini tersedia $availableRooms kamar kosong. Silakan cek halaman 'Kamar & Fasilitas' untuk melihat detailnya.";
            } else {
                $reply = "Mohon maaf, saat ini kamar sedang penuh. Silakan hubungi pengelola untuk info ketersediaan selanjutnya.";
            }

            $category = "kamar";
        }

        // 5. Cek Alamat
        elseif (
            strpos($message, 'alamat') !== false ||
            strpos($message, 'lokasi') !== false ||
            strpos($message, 'dimana') !== false
        ) {
            $profile = DB::table('kost_profiles')->first();

            $reply = "Omah Amah beralamat di " . ($profile->address ?? "Jl. Kenting No. 145") . ". Anda bisa melihat petunjuk arah di halaman Informasi Kost.";
            $category = "lainnya";
        }

        // 6. Sapaan
        elseif (
            strpos($message, 'halo') !== false ||
            strpos($message, 'hai') !== false ||
            strpos($message, 'pagi') !== false
        ) {
            $reply = "Halo! Saya Amah AI, asisten virtual Omah Amah. Ada yang bisa saya bantu terkait kamar, harga, fasilitas, atau laundry?";
        }

        // 7. Fallback
        else {
            $reply = "Mohon maaf, saya belum mengerti pertanyaan tersebut. Silakan hubungi pengelola Omah Amah untuk informasi lebih lanjut.";
        }

        // Simpan pertanyaan & jawaban ke database
        DB::table('inquiries')->insert([
            'sender_name' => $validated['sender_name'] ?? 'Anonim',
            'category' => $category,
            'source' => 'chatbot_ai',
            'question' => $validated['message'],
            'answer' => $reply,
            'status' => 'selesai',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'reply' => $reply
        ]);
    }

    // =========================================================
    // 7. API PENGATURAN ADMIN (SETTINGS.BLADE.PHP)
    // =========================================================

    // 1. Mengambil Profil Admin
    public function getAdminProfile()
    {
        $data = DB::table('admin_profiles')
            ->where('id', 1)
            ->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    // 2. Menyimpan Profil Admin (Dengan Upload Foto)
    public function updateAdminProfile(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:120',
            'email' => 'required|email',
            'telepon' => 'nullable|string|max:30',
            'peran' => 'required|string',
            'foto_file' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $profile = DB::table('admin_profiles')
            ->where('id', 1)
            ->first();

        $fotoPath = $profile ? $profile->foto_url : null;

        if ($request->hasFile('foto_file')) {
            $path = $request->file('foto_file')->store('profiles', 'public');
            $fotoPath = asset('storage/' . $path);
        }

        $exists = DB::table('admin_profiles')
            ->where('id', 1)
            ->exists();

        $data = [
            'nama_lengkap' => $validated['nama_lengkap'],
            'email' => $validated['email'],
            'telepon' => $validated['telepon'] ?? null,
            'peran' => $validated['peran'],
            'foto_url' => $fotoPath,
            'updated_at' => now()
        ];

        if ($exists) {
            DB::table('admin_profiles')
                ->where('id', 1)
                ->update($data);
        } else {
            $data['id'] = 1;
            $data['created_at'] = now();

            DB::table('admin_profiles')->insert($data);
        }

        return response()->json([
            'success' => true,
            'message' => 'Profil berhasil diperbarui.',
            'foto_url' => $fotoPath
        ]);
    }

    // 3. Mengambil Data Notifikasi
    public function getNotificationSettings()
    {
        $data = DB::table('notification_settings')
            ->where('id', 1)
            ->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    // 4. Menyimpan Preferensi Notifikasi
    public function updateNotificationSettings(Request $request)
    {
        $exists = DB::table('notification_settings')
            ->where('id', 1)
            ->exists();

        $data = [
            'notif_penghuni' => $request->input('penghuni_baru', false),
            'notif_pembayaran' => $request->input('pembayaran', false),
            'notif_jatuh_tempo' => $request->input('jatuh_tempo', false),
            'notif_pengumuman' => $request->input('pengumuman', false),
            'updated_at' => now()
        ];

        if ($exists) {
            DB::table('notification_settings')
                ->where('id', 1)
                ->update($data);
        } else {
            $data['id'] = 1;
            $data['created_at'] = now();

            DB::table('notification_settings')->insert($data);
        }

        return response()->json([
            'success' => true,
            'message' => 'Pengaturan notifikasi disimpan.'
        ]);
    }

    // =========================================================
    // 8. API LOGIN (DENGAN PENGECEKAN ROLE)
    // =========================================================

    public function loginAdmin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'role' => 'required|string|in:admin,penghuni'
        ]);

        // Cek user berdasarkan email
        $user = DB::table('users')
            ->where('email', $validated['email'])
            ->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Email belum terdaftar.'
            ], 401);
        }

        // Cek password
        if (!Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Kata sandi salah.'
            ], 401);
        }

        // Pengecekan Role
        $dbRole = $user->role ?? 'penghuni';
        $isAdmin = in_array($dbRole, ['admin', 'super_admin']);

        if ($validated['role'] === 'admin' && !$isAdmin) {
            return response()->json([
                'success' => false,
                'message' => 'Akses ditolak. Akun ini bukan admin.'
            ], 403);
        }

        if ($validated['role'] === 'penghuni' && $isAdmin) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login menggunakan jalur admin.'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil.',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $dbRole
            ]
        ]);
    }

    // =========================================================
    // 9. API REGISTER (DAFTAR AKUN PENGHUNI)
    // =========================================================

    public function registerUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $id = DB::table('users')->insertGetId([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'penghuni',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Akun berhasil dibuat. Silakan masuk.',
            'data' => ['id' => $id]
        ], 201);
    }

    // =========================================================
    // 10. API LUPA KATA SANDI (KIRIM EMAIL RESET)
    // =========================================================

    public function forgotPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        try {
            $status = Password::broker('users')->sendResetLink([
                'email' => $validated['email'],
            ]);

            if ($status === Password::RESET_LINK_SENT) {
                return response()->json([
                    'success' => true,
                    'message' => 'Tautan reset password berhasil dikirim. Silakan periksa email Anda.'
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => __($status)
            ], 400);

        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Email reset gagal dikirim. Silakan periksa konfigurasi email atau coba kembali.'
            ], 500);
        }
    }

    // =========================================================
    // 11. API RESET PASSWORD (SIMPAN PASSWORD BARU)
    // =========================================================

    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'token' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $status = Password::broker('users')->reset(
                [
                    'email' => $validated['email'],
                    'password' => $validated['password'],
                    'password_confirmation' => $request->input('password_confirmation'),
                    'token' => $validated['token'],
                ],
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password),
                        'remember_token' => Str::random(60),
                    ])->save();
                }
            );

            if ($status === Password::PASSWORD_RESET) {
                return response()->json([
                    'success' => true,
                    'message' => 'Password berhasil diperbarui. Silakan login menggunakan password baru.'
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => __($status)
            ], 400);

        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui password.'
            ], 500);
        }
    }
}
