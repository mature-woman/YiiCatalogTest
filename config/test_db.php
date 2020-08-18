<?php

\Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../')->load();

$db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases
$db['dsn'] = getenv('DB_TEST_TYPE') . ':host=' . getenv('DB_TEST_HOST') . ';dbname=' . getenv('DB_TEST_BASE') . ';port=' . getenv('DB_TEST_PORT');

return $db;
