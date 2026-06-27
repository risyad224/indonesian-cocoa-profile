<?php

// Configure PHP temporary directory for Vercel environment
if (getenv('VERCEL') || getenv('VERCEL_ENV')) {
    ini_set('upload_tmp_dir', '/tmp');
    ini_set('sys_temp_dir', '/tmp');
}

try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    // Temporary debug output - remove after fixing
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode([
        'error' => true,
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'trace' => array_slice(explode("\n", $e->getTraceAsString()), 0, 10),
    ], JSON_PRETTY_PRINT);
    exit(1);
}