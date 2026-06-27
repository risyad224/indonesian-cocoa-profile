# 🚀 PANDUAN DEPLOYMENT KE VERCEL

## Status Vercel: ✅ SIAP DEPLOY

Project ini sudah dikonfigurasi penuh untuk Vercel. Ikuti langkah-langkah di bawah untuk deploy tanpa error.

---

## 📋 PREREQUISITE

1. **Git Repository** - Project harus di dalam Git repository
   ```powershell
   # Jika belum ada git
   git init
   git add .
   git commit -m "Initial commit"
   ```

2. **Vercel Account** - Daftar di https://vercel.com (gratis)

3. **Database** - Siapkan database MySQL di hosting atau AWS RDS
   ```
   Database sudah ready? Lanjut ke langkah selanjutnya.
   ```

---

## 🔑 STEP 1: Setup Environment Variables di Vercel

1. Buka https://vercel.com/dashboard
2. Pilih project "indonesian-cocoa-profile"
3. Pergi ke **Settings → Environment Variables**
4. Tambahkan variable berikut (ambil dari DB hosting Anda):

```
APP_KEY                 = base64:sSjbtRK/7m2J+O25p3GW/khZhlXhUFWBkAbbJLCDfDI=
APP_NAME                = Indonesian Cocoa Profile
APP_ENV                 = production
APP_DEBUG               = false
APP_URL                 = https://indonesian-cocoa-profile.vercel.app
LOG_CHANNEL             = stderr
VERCEL                  = 1

DB_CONNECTION           = mysql
DB_HOST                 = your-db-host.com          ⚠️ GANTI
DB_PORT                 = 3306
DB_DATABASE             = indonesian_cocoa          ⚠️ GANTI
DB_USERNAME             = db_user                   ⚠️ GANTI
DB_PASSWORD             = db_password               ⚠️ GANTI

SESSION_DRIVER          = database
CACHE_STORE             = database
QUEUE_CONNECTION        = sync
```

> **PENTING:** 
> - `APP_KEY`: Jangan ganti, sudah di-generate
> - `APP_URL`: Sesuaikan dengan domain Vercel Anda
> - Database credentials: Sesuaikan dengan database Anda

---

## 📤 STEP 2: Deploy ke Vercel via Git

### Option A: Automatic Deploy (Recommended)

```powershell
# 1. Push ke GitHub (atau GitLab/Bitbucket)
git push origin main

# Vercel otomatis detect dan deploy 🎉
```

### Option B: Via Vercel CLI

```powershell
# 1. Install Vercel CLI
npm install -g vercel

# 2. Login
vercel login

# 3. Deploy
cd c:\laragon\www\indonesian-cocoa-profile
vercel --prod
```

### Option C: Manual di Dashboard

1. Buka https://vercel.com/dashboard
2. Klik "New Project"
3. Pilih Git repository Anda
4. Klik "Deploy"

---

## 🗄️ STEP 3: Setup Database Setelah Deployment

Setelah deploy berhasil, jalankan migrations:

### Option A: Via Vercel CLI

```powershell
# Pull environment dari Vercel
vercel env pull

# Jalankan migration
php artisan migrate --force
```

### Option B: Via SSH/Bash

1. Buka Vercel Dashboard → Settings → Function Logs
2. Jalankan:
   ```bash
   cd /var/task
   php artisan migrate --force
   php artisan db:seed --force  # Jika ada seeder
   ```

### Option C: Via Web Terminal

1. Buka project di Vercel Dashboard
2. Klik "... (More)" → "Functions"
3. Buka terminal dan jalankan:
   ```bash
   php artisan migrate --force
   ```

---

## ✅ STEP 4: Verifikasi Deploy

### Test Aplikasi

```powershell
# Akses aplikasi
https://indonesian-cocoa-profile.vercel.app

# Test halaman utama
https://indonesian-cocoa-profile.vercel.app/

# Test admin
https://indonesian-cocoa-profile.vercel.app/admin/login
```

### Check Logs

```powershell
# Lihat logs
vercel logs indonesian-cocoa-profile --prod

# Atau buka di dashboard:
# Vercel Dashboard → Deployments → Logs
```

### Test Database

```powershell
# Verify database connection
vercel env pull
php artisan tinker
>>> DB::connection()->getPdo()
```

---

## 🐛 TROUBLESHOOTING

### Error: `tempnam(): file created in the system's temporary directory`
✅ **SOLVED** - Already configured di `/api/index.php` dan `/public/index.php`

### Error: `Access denied for user '@DB_HOST'`
❌ **Solusi:**
- Pastikan environment variables sudah set di Vercel dashboard
- Cek DB credentials di .env.production
- Verify database connection

### Error: `View not found`
❌ **Solusi:**
```powershell
vercel env pull
php artisan view:cache
php artisan route:cache
```

### Error: `Class not found`
❌ **Solusi:**
```powershell
vercel env pull
php artisan config:cache
```

### 502 Bad Gateway
❌ **Solusi:**
1. Check Vercel function logs
2. Verify database connection
3. Ensure all environment variables are set

---

## 📝 FILES YANG SUDAH DIKONFIGURASI

✅ `api/index.php` - Temp directory config
✅ `public/index.php` - Temp directory config  
✅ `api/php.ini` - PHP production settings
✅ `vercel.json` - Vercel configuration
✅ `.env.production` - Production environment
✅ `.vercelignore` - Files to exclude
✅ `build.sh` - Build script
✅ Storage directories - Created with .gitkeep

---

## 🚀 DEPLOYMENT CHECKLIST

Sebelum deploy, pastikan:

- [ ] Git repository sudah setup
- [ ] Vercel account sudah created
- [ ] Database sudah ready
- [ ] Environment variables sudah diset di Vercel
- [ ] APP_KEY sudah di-copy ke .env.production
- [ ] Database credentials sudah diverifikasi

---

## 📞 QUICK COMMANDS

```powershell
# Deploy baru
vercel --prod

# View logs
vercel logs indonesian-cocoa-profile --prod

# Pull environment dari Vercel
vercel env pull

# Run migrations
php artisan migrate --force

# Clear cache
php artisan config:clear
php artisan cache:clear
```

---

## ✨ NOTES

- Aplikasi menggunakan **database untuk sessions** (bukan file)
- Aplikasi menggunakan **database untuk cache** (bukan file)
- Temporary files menggunakan **/tmp** (read-write di Vercel)
- Frontend assets di-build dengan **Vite**
- Vercel PHP runtime = **0.9.0** (PHP 8.3+)

---

**Status: READY FOR PRODUCTION** ✅

Silakan deploy sesuai langkah-langkah di atas. Semoga sukses! 🎉
