# API Manajemen User

Halo! Ini adalah project API sederhana untuk mengelola data user. Saya buat pakai Laravel dan MySQL.

## Kenapa Saya Buat Ini?

Project ini saya buat untuk skill test backend developer. Fiturnya simpel aja:
- Tambah user baru
- Lihat semua user atau user tertentu
- Edit data user
- Hapus user

## Cara Install di Komputer Kamu

### 1. Download dulu projectnya
```bash
git clone https://github.com/bintangnugrahaa/user-management-api.git
cd user-management-api
```

### 2. Install Laravel
```bash
composer install
cp .env.example .env
php artisan key:generate
```

### 3. Setting database
Buka file `.env` terus edit bagian ini:
```
DB_DATABASE=user_management
DB_USERNAME=root  
DB_PASSWORD=     # kosongkan kalo ga pake password
```

Buat database di MySQL:
```sql
CREATE DATABASE user_management;
```

### 4. Bikin tabel
```bash
php artisan migrate
php artisan db:seed    # ini buat data sample
```

### 5. Jalankan
```bash
php artisan serve
```

Sekarang API kamu udah jalan di `http://localhost:8000` 🎉

## Cara Pake APInya

Gampang kok, ini endpoint-endpointnya:

### Ambil semua user
```
GET http://localhost:8000/api/v1/users
```

### Ambil user tertentu
```
GET http://localhost:8000/api/v1/users/1
```

### Bikin user baru
```
POST http://localhost:8000/api/v1/users

Body (JSON):
{
    "name": "Muhammad Bintang Nugraha",
    "email": "muhammadbintangnugraha18@gmail.com", 
    "phone": "085155344998",
    "is_active": true,
    "department": "Software Engineer"
}
```

### Update user
```
PUT http://localhost:8000/api/v1/users/1

Body (JSON):
{
    "name": "Bintang Updated",
    "department": "IT"
}
```

### Hapus user
```
DELETE http://localhost:8000/api/v1/users/1
```

## Contoh Response

### Kalo berhasil:
```json
{
    "success": true,
    "message": "Data berhasil diambil", 
    "data": {
        "id": 1,
        "name": "Muhammad Bintang Nugraha",
        "email": "muhammadbintangnugraha18@gmail.com",
        "phone": "085155344998",
        "is_active": true,
        "department": "Software Engineer"
    }
}
```

### Kalo ada error:
```json
{
    "success": false,
    "message": "Email udah kepake",
    "errors": {
        "email": ["Email sudah terdaftar"]
    }
}
```

## Aturan Input Data

Ini yang harus diperhatikan waktu input data:

- **name**: wajib diisi dong
- **email**: wajib, harus format email yang bener, dan belum pernah dipake
- **phone**: wajib, cuma boleh angka, minimal 10 digit
- **department**: wajib diisi
- **is_active**: opsional, defaultnya true

## Test Pake Postman

Kalo mau test pake Postman, bisa import collection ini:

```json
{
    "info": {
        "name": "User Management API - Test Collection"
    },
    "item": [
        {
            "name": "Lihat Semua User",
            "request": {
                "method": "GET",
                "url": "http://localhost:8000/api/v1/users"
            }
        },
        {
            "name": "Bikin User Baru", 
            "request": {
                "method": "POST",
                "header": [
                    {"key": "Content-Type", "value": "application/json"}
                ],
                "body": {
                    "mode": "raw",
                    "raw": "{\n    \"name\": \"Test User\",\n    \"email\": \"test@example.com\",\n    \"phone\": \"081234567890\",\n    \"is_active\": true,\n    \"department\": \"IT\"\n}"
                },
                "url": "http://localhost:8000/api/v1/users"
            }
        },
        {
            "name": "Update User",
            "request": {
                "method": "PUT",
                "header": [
                    {"key": "Content-Type", "value": "application/json"}
                ],
                "body": {
                    "mode": "raw", 
                    "raw": "{\n    \"name\": \"User Updated\"\n}"
                },
                "url": "http://localhost:8000/api/v1/users/1"
            }
        },
        {
            "name": "Hapus User",
            "request": {
                "method": "DELETE",
                "url": "http://localhost:8000/api/v1/users/1"
            }
        }
    ]
}
```

## Teknologi yang Dipake

- Laravel (PHP framework yang enak dipake)
- MySQL (buat nyimpen data)
- PHP 
- Eloquent ORM (buat ngatur database)

## Troubleshooting

**Error 500 waktu bikin user?**
- Cek koneksi database udah bener belum
- Pastiin migration udah dijalankan

**Email validation gagal?**
- Cek format email udah bener (contoh@domain.com)
- Mungkin email udah kepake

**Phone validation error?**  
- Nomor HP cuma boleh angka doang
- Minimal 10 digit ya

**Connection refused?**
- Pastiin MySQL udah jalan
- Cek username/password di file .env

## Kontak


**Muhammad Bintang Nugraha**  
Software Engineer  
📱 WhatsApp: 085155344998  
📧 Email: muhammadbintangnugraha18@gmail.com
🐙 GitHub: [@bintangnugrahaa](https://github.com/bintangnugrahaa)

 ---