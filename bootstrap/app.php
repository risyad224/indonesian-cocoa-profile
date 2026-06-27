<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (\Illuminate\Http\Exceptions\PostTooLargeException $e, $request) {
            return back()->withInput()->with('error', 'File yang diupload terlalu besar! (Maksimal 2MB karena batasan serverless).');
        });
    })->create();

if (getenv('VERCEL') || getenv('VERCEL_ENV') || isset($_ENV['VERCEL']) || isset($_ENV['VERCEL_ENV']) || isset($_SERVER['VERCEL'])) {
    $app->useStoragePath('/tmp/storage');
    $app->useBootstrapPath('/tmp/storage/bootstrap');
    $directories = [
        '/tmp/storage/app',
        '/tmp/storage/logs',
        '/tmp/storage/bootstrap/cache',
        '/tmp/storage/framework/cache/data',
        '/tmp/storage/framework/views',
        '/tmp/storage/framework/sessions',
    ];
    foreach ($directories as $dir) {
        if (!is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }
    }
}

return $app;
