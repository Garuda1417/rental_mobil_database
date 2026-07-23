# Car Management Admin Features

Fitur manajemen mobil untuk admin Neo Drive telah ditambahkan. Semua fitur dapat diakses melalui **browser console** tanpa mengubah tampilan atau layout dashboard.

## Cara Menggunakan

### 1. Buka Dashboard Admin
- Buka halaman admin di `/admin`

### 2. Buka Browser Console
- Tekan `F12` atau `Ctrl+Shift+I` (Windows/Linux) / `Cmd+Option+I` (Mac)
- Pilih tab **Console**

### 3. Gunakan Perintah Manajemen Mobil

#### A. Tambah Mobil Baru
```javascript
addNewCar()
```
**Langkah-langkah:**
1. Masukkan make (merek) mobil, contoh: "Toyota", "BMW"
2. Masukkan model, contoh: "Camry", "3 Series"
3. Masukkan plate number, contoh: "NEO-001"
4. Masukkan tahun, contoh: "2024"
5. Masukkan harga per hari, contoh: "500000"
6. Masukkan catatan (optional)
7. Masukkan ID showroom (1-4)

**Contoh Showroom ID:**
- 1 = Jakarta Experience Center
- 2 = Surabaya Showroom
- 3 = Bandung Gallery
- 4 = Medan Branch

#### B. Lihat Daftar Semua Mobil
```javascript
getCarsList()
```
Akan menampilkan dialog dengan semua mobil yang terdaftar di database.

#### C. Perbarui Data Mobil
```javascript
updateCar()
```
**Langkah-langkah:**
1. Masukkan ID mobil yang ingin diubah
2. Masukkan field yang ingin diubah (make/model/plate_number/year/price_per_day/notes)
3. Masukkan nilai baru

#### D. Hapus Mobil
```javascript
deleteCar()
```
**Langkah-langkah:**
1. Masukkan ID mobil yang ingin dihapus
2. Konfirmasi penghapusan

## API Endpoints

Jika ingin mengintegrasikan dengan aplikasi lain atau frontend berbeda, tersedia API endpoints:

- `GET /api/admin/cars` - Ambil semua mobil
- `POST /api/admin/cars` - Tambah mobil baru
- `GET /api/admin/cars/{id}` - Ambil data mobil spesifik
- `PATCH /api/admin/cars/{id}` - Perbarui mobil
- `DELETE /api/admin/cars/{id}` - Hapus mobil
- `GET /api/admin/showrooms` - Ambil daftar showroom

## Format Data

### Request Tambah/Update Mobil
```json
{
  "make": "string (required)",
  "model": "string (required)",
  "plate_number": "string (required, unique)",
  "showroom_id": "integer (required, 1-4)",
  "year": "integer (required, 1900-2025)",
  "price_per_day": "numeric (required)",
  "notes": "string (optional)"
}
```

### Response Mobil
```json
{
  "id": 1,
  "make": "Toyota",
  "model": "Camry",
  "plate_number": "NEO-001",
  "year": 2024,
  "price_per_day": 500000,
  "notes": "New vehicle",
  "showroom_id": 1,
  "showroom": {
    "id": 1,
    "name": "Jakarta Experience Center",
    "city": "Jakarta"
  },
  "created_at": "2026-07-23T10:00:00Z",
  "updated_at": "2026-07-23T10:00:00Z"
}
```

## Notifikasi & Activity Log

Setiap operasi akan:
- Menampilkan toast notification (berhasil/gagal)
- Dicatat di Activity Stream di dashboard
- Muncul di console browser

## Database Seeding

Untuk menginisialisasi data showroom awal, jalankan:
```bash
php artisan db:seed
```

Atau untuk fresh install:
```bash
php artisan migrate:fresh --seed
```

---

**Catatan:** Semua perubahan disimpan ke database SQLite secara real-time.
