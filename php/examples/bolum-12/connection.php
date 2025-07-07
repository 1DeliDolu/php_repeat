<?php

    // sunucu => coursedb
    // php => mysqli
    // php => pdo

    // Load process.env file manually
    $envFile = __DIR__ . '/process.env';
    if (file_exists($envFile)) {
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            list($name, $value) = array_map('trim', explode('=', $line, 2));
            putenv("$name=$value");
        }
    }

    $host = getenv('HOST') ?: 'localhost';
    $username = getenv('USERNAME') ?: 'root';
    $password = getenv('PASSWORD') ?: '';
    $database = getenv('DATABASE') ?: 'coursedb';

    $baglanti = mysqli_connect($host, $username, $password, $database);

    if(mysqli_connect_errno() > 0) {
        die("hata: ".mysqli_connect_errno());
    }

    echo "mysql bağlantısı oluşturuldu.<br>";

    // sql sorgusularını yazacağız.

    mysqli_close($baglanti);

    echo "mysql bağlantısı kapatıldı.";

?>