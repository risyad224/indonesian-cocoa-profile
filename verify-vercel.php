#!/usr/bin/env php
<?php

/**
 * Vercel Deployment Pre-Check Script
 * Jalankan: php artisan tinker < verify-vercel.php
 * atau: php verify-vercel.php
 */

class VercelCheck {
    public function run() {
        echo "\n📋 VERCEL COMPATIBILITY CHECK\n";
        echo str_repeat("=", 60) . "\n\n";
        
        $checks = [
            'PHP Version' => fn() => $this->checkPhpVersion(),
            'Required Extensions' => fn() => $this->checkExtensions(),
            'Environment Variables' => fn() => $this->checkEnvVars(),
            'Storage Permissions' => fn() => $this->checkStoragePerms(),
            'Database Connection' => fn() => $this->checkDatabase(),
            'Temp Directory' => fn() => $this->checkTempDir(),
        ];
        
        $passed = 0;
        $failed = 0;
        
        foreach ($checks as $name => $check) {
            echo "Checking: $name... ";
            try {
                $result = $check();
                if ($result) {
                    echo "✅\n";
                    $passed++;
                } else {
                    echo "❌\n";
                    $failed++;
                }
            } catch (Exception $e) {
                echo "❌ {$e->getMessage()}\n";
                $failed++;
            }
        }
        
        echo "\n" . str_repeat("=", 60) . "\n";
        echo "Results: ✅ $passed passed, ❌ $failed failed\n\n";
        
        if ($failed === 0) {
            echo "🎉 READY FOR VERCEL DEPLOYMENT!\n\n";
            return true;
        } else {
            echo "⚠️  Fix errors sebelum deploy ke Vercel\n\n";
            return false;
        }
    }
    
    private function checkPhpVersion() {
        $version = PHP_VERSION;
        $major = (int) explode('.', $version)[0];
        $minor = (int) explode('.', $version)[1];
        
        if ($major >= 8 && $minor >= 2) {
            echo "(PHP $version)";
            return true;
        }
        throw new Exception("PHP 8.2+ required, got $version");
    }
    
    private function checkExtensions() {
        $required = ['pdo', 'mysql', 'json', 'fileinfo', 'gd'];
        $missing = [];
        
        foreach ($required as $ext) {
            if (!extension_loaded($ext)) {
                $missing[] = $ext;
            }
        }
        
        if (empty($missing)) {
            return true;
        }
        throw new Exception("Missing: " . implode(', ', $missing));
    }
    
    private function checkEnvVars() {
        $required = [
            'APP_KEY',
            'APP_URL',
            'DB_HOST',
            'DB_DATABASE',
            'DB_USERNAME',
        ];
        
        $missing = [];
        foreach ($required as $var) {
            if (!env($var)) {
                $missing[] = $var;
            }
        }
        
        if (empty($missing)) {
            return true;
        }
        throw new Exception("Missing env: " . implode(', ', $missing));
    }
    
    private function checkStoragePerms() {
        $storagePath = storage_path();
        $frameworkPath = $storagePath . '/framework';
        
        if (!is_writable($storagePath)) {
            throw new Exception("storage/ not writable");
        }
        if (!is_writable($frameworkPath)) {
            throw new Exception("storage/framework not writable");
        }
        
        return true;
    }
    
    private function checkDatabase() {
        try {
            DB::connection()->getPdo();
            echo "(Connected to " . env('DB_DATABASE') . ")";
            return true;
        } catch (Exception $e) {
            throw new Exception("Database error: {$e->getMessage()}");
        }
    }
    
    private function checkTempDir() {
        $tmpDir = sys_get_temp_dir();
        if (!is_writable($tmpDir)) {
            throw new Exception("$tmpDir not writable");
        }
        echo "($tmpDir)";
        return true;
    }
}

// Run check
$checker = new VercelCheck();
exit($checker->run() ? 0 : 1);
