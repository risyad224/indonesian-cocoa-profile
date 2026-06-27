# Vercel Deployment Fix - tempnam() Error Resolution

## Problem Solved
The application was throwing an error: `ErrorException - tempnam(): file created in the system's temporary directory`

This occurred because Vercel's serverless environment has a read-only file system except for `/tmp`. Laravel's temporary file operations were failing when trying to write to system temporary directories that aren't accessible on Vercel.

## Solution Overview

The fix involves configuring PHP and Laravel to use Vercel's writable `/tmp` directory for all temporary operations.

## Changes Made

### 1. **api/index.php**
Added environment detection to set PHP temporary directories to `/tmp` before Laravel bootstraps:
```php
if (getenv('VERCEL') || getenv('VERCEL_ENV')) {
    ini_set('upload_tmp_dir', '/tmp');
    ini_set('sys_temp_dir', '/tmp');
}
```

### 2. **public/index.php**
Added the same configuration for additional serverless platform compatibility.

### 3. **api/php.ini**
Created a PHP configuration file that sets:
- `upload_tmp_dir = /tmp`
- `sys_temp_dir = /tmp`
- `session.save_path = /tmp`
- Performance and security settings for serverless

### 4. **vercel.json**
Enhanced configuration with:
- `maxDuration: 30` - Increased timeout for function execution
- Environment variables for APP configuration
- VERCEL flag to trigger PHP configuration

### 5. **.env.production**
Created production environment configuration with:
- Database-based sessions (using `SESSION_DRIVER=database`)
- Database-based cache (using `CACHE_STORE=database`)
- Production-appropriate settings (APP_DEBUG=false, LOG_LEVEL=notice)

### 6. **.vercelignore**
Created to exclude unnecessary files and reduce deployment size.

## Deployment Steps

### Before Deploying to Vercel:

1. **Update .env.production** with your actual values:
   ```
   APP_URL=https://your-domain.com
   DB_HOST=your-database-host
   DB_DATABASE=your-database-name
   DB_USERNAME=your-username
   DB_PASSWORD=your-password
   ```

2. **Set Vercel Environment Variables** in Vercel dashboard:
   - Go to your project settings → Environment Variables
   - Add all sensitive variables from .env.production
   - Use `@APP_KEY` placeholder for the APP_KEY (it will auto-populate)

3. **Run Database Migrations** (after first deployment):
   ```bash
   vercel env pull
   php artisan migrate --force
   ```

4. **Ensure Storage Directory Exists**:
   The `storage/` directory needs to exist on Vercel. The PHP configuration will write to `/tmp` for temporary files.

## How It Works on Vercel

1. When the application starts, it detects the VERCEL environment variable
2. PHP is configured to use `/tmp` for temporary files
3. Laravel's storage directories (configured in `config/filesystems.php`) use `storage_path()`
4. Sessions and cache use the database (configured in .env.production)
5. All temporary operations (view compilation, etc.) use `/tmp`

## Troubleshooting

If you still encounter issues:

1. **Check Vercel Logs**: View deployment logs in Vercel dashboard
2. **Verify Environment Variables**: Ensure all required variables are set
3. **Database Connectivity**: Test your database connection from Vercel CLI:
   ```bash
   vercel env pull
   php artisan tinker
   >>> DB::connection()->getPdo()
   ```
4. **File Permissions**: Ensure the `storage/` directory structure exists:
   ```bash
   php artisan storage:link
   ```

## Additional Notes

- The solution is backward compatible; local development is unaffected
- All temporary files now use `/tmp` on Vercel (ephemeral between requests)
- For file uploads, ensure they're stored in database or S3, not local storage
- Consider using cloud storage (S3) for production file uploads instead of local storage

## Files Modified
- ✅ `api/index.php`
- ✅ `public/index.php`
- ✅ `vercel.json`
- ✅ `api/php.ini` (new)
- ✅ `.env.production` (new)
- ✅ `.vercelignore` (new)
