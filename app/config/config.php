<?php

// define('BASE_URL', 'http://localhost/web-digitara/public');
define('BASE_URL', 'https://digitaramedan.site/website/public');
date_default_timezone_set('Asia/Jakarta');

// Database (opsional jika ingin koneksi database)
define('DB_HOST', '127.0.0.1:3306');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_kasir');

// Autoloader sederhana
spl_autoload_register(function ($class) {
    if (file_exists('../app/models/' . $class . '.php')) {
        require_once '../app/models/' . $class . '.php';
    }
});


// mail
define('EMAIL_USER', 'mes.it2@jne.co.id');
define('EMAIL_PASS', 'j8BP6qAd3P');
