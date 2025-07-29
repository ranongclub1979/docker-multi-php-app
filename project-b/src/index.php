<?php
// docker-multi-php-app/project-b/src/index.php
echo "<h1>Hello from Project B (Nginx + PHP-FPM + Docker)!</h1>";
echo "<p>This is Project B running on: " . $_SERVER['HTTP_HOST'] . "</p>";
echo "<p>Current PHP version: " . phpversion() . "</p>";
exit();
// ตัวอย่างการเชื่อมต่อ Database (ถ้าใช้)
// ใน CodeIgniter คุณจะตั้งค่าใน app/Config/Database.php
// สำหรับตัวอย่างนี้ สมมติว่าอ่านค่าจาก ENV หรือมีค่าในโค้ดโดยตรง
$host = 'mysql_db'; // ชื่อ Service ของ MySQL Container
$db   = 'project_b_db';
$user = 'user_b';
$pass = 'password_b';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "<p>Connected to Database for Project B: <strong>$db</strong> on host <strong>$host</strong>!</p>";
    $stmt = $pdo->query("SELECT VERSION()");
    $version = $stmt->fetchColumn();
    echo "<p>MySQL Version: $version</p>";
} catch (\PDOException $e) {
    echo "<p style='color: red;'>Database Connection Error for Project B: " . $e->getMessage() . "</p>";
    // throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
