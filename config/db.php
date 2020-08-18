<?php

\Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../')->load();

return [
    'class' => 'yii\db\Connection',
    'dsn'       => getenv('DB_TYPE') . ':host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_BASE') . ';port=' . getenv('DB_PORT'),
    'username'  => getenv('DB_NAME'),
    'password'  => getenv('DB_PSWD'),
    'charset'   => getenv('DB_CHAR'),

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
