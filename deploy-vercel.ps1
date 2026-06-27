#!/usr/bin/env pwsh

# Vercel Deployment Helper Script untuk PowerShell
# Gunakan: .\deploy-vercel.ps1

$ErrorActionPreference = "Stop"

Write-Host "`n🚀 VERCEL DEPLOYMENT HELPER" -ForegroundColor Cyan
Write-Host "=" * 50 -ForegroundColor Cyan

# Check if Vercel CLI is installed
$vercelCmd = Get-Command vercel -ErrorAction SilentlyContinue
if (-not $vercelCmd) {
    Write-Host "`n❌ Vercel CLI tidak terinstall!" -ForegroundColor Red
    Write-Host "Install dengan: npm install -g vercel" -ForegroundColor Yellow
    exit 1
}

# Menu
Write-Host "`nPilih opsi:" -ForegroundColor Yellow
Write-Host "1. Deploy ke Vercel"
Write-Host "2. View logs"
Write-Host "3. Pull environment variables"
Write-Host "4. Run migrations"
Write-Host "5. Clear cache"
Write-Host "6. Full setup (deploy + migrate + cache)"

$choice = Read-Host "`nMasukkan pilihan (1-6)"

switch ($choice) {
    "1" {
        Write-Host "`n📤 Deploy ke Vercel..." -ForegroundColor Green
        & vercel --prod
    }
    
    "2" {
        Write-Host "`n📋 View logs dari Vercel..." -ForegroundColor Green
        & vercel logs indonesian-cocoa-profile --prod
    }
    
    "3" {
        Write-Host "`n⬇️ Pull environment variables..." -ForegroundColor Green
        & vercel env pull
        Write-Host "✅ Environment variables sudah dipull!" -ForegroundColor Green
    }
    
    "4" {
        Write-Host "`n🗄️ Run database migrations..." -ForegroundColor Green
        & vercel env pull
        & php artisan migrate --force
        Write-Host "✅ Migrations selesai!" -ForegroundColor Green
    }
    
    "5" {
        Write-Host "`n🧹 Clear cache..." -ForegroundColor Green
        & vercel env pull
        & php artisan config:clear
        & php artisan cache:clear
        & php artisan view:clear
        Write-Host "✅ Cache cleared!" -ForegroundColor Green
    }
    
    "6" {
        Write-Host "`n🔧 Setup lengkap: Deploy + Migrate + Cache..." -ForegroundColor Green
        
        Write-Host "`n[1/4] Deploy ke Vercel..." -ForegroundColor Cyan
        & vercel --prod
        
        Write-Host "`n[2/4] Pull environment variables..." -ForegroundColor Cyan
        & vercel env pull
        
        Write-Host "`n[3/4] Run migrations..." -ForegroundColor Cyan
        & php artisan migrate --force
        
        Write-Host "`n[4/4] Clear cache..." -ForegroundColor Cyan
        & php artisan config:clear
        & php artisan cache:clear
        
        Write-Host "`n✅ SETUP LENGKAP SELESAI!" -ForegroundColor Green
        Write-Host "Aplikasi siap di: https://indonesian-cocoa-profile.vercel.app" -ForegroundColor Green
    }
    
    default {
        Write-Host "❌ Pilihan tidak valid!" -ForegroundColor Red
        exit 1
    }
}

Write-Host "`n" -ForegroundColor Green
