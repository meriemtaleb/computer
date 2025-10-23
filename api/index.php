<?php

use Illuminate\Http\Request;

/**
 * نقطة الدخول لـ Laravel على Vercel
 */

// شغلي Composer autoload
require_once __DIR__ . '/../vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

/**
 * حل مشكلة الكتابة في bootstrap/cache و storage على Vercel
 * خلي Laravel يقرأ الكاش الجاهز بدل ما يحاول يكتبه
 */
putenv('APP_CONFIG_CACHE='.__DIR__.'/../bootstrap/cache/config.php');
putenv('APP_SERVICES_CACHE='.__DIR__.'/../bootstrap/cache/services.php');
putenv('APP_PACKAGES_CACHE='.__DIR__.'/../bootstrap/cache/packages.php');
putenv('VIEW_COMPILED_PATH='.__DIR__.'/../storage/framework/views');

// شغّل الطلب
$app->handleRequest(Request::capture());
