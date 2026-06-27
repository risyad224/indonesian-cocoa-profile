<?php

// Configure PHP temporary directory for Vercel environment
if (getenv('VERCEL') || getenv('VERCEL_ENV')) {
    ini_set('upload_tmp_dir', '/tmp');
    ini_set('sys_temp_dir', '/tmp');
}

require __DIR__ . '/../public/index.php';