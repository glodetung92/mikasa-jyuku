<?php
// Bảo mật: Chỉ cho phép truy cập nếu có tham số secret=mikasa2026
if (!isset($_GET['secret']) || $_GET['secret'] !== 'mikasa2026') {
    die("Access denied");
}

$databases = [
    'main' => [
        'name' => 'kogaku-sha_mikasa_hp',
        'prefix' => 'mikasahp_wp'
    ],
    'blog' => [
        'name' => 'kogaku-sha_mksdb',
        'prefix' => 'mikasahp_wp' // WordPress tables usually share prefix or use standard wp_
    ]
];

foreach ($databases as $key => $dbInfo) {
    echo "<h2>Database: {$dbInfo['name']} ($key)</h2>";
    $conn = @new mysqli("mysql633.db.sakura.ne.jp", "kogaku-sha", "L-pt18HL", $dbInfo['name']);
    if ($conn->connect_error) {
        echo "<b>Connection failed:</b> " . $conn->connect_error . "<br><br>";
        continue;
    }

    // Check table prefix
    $tables = [];
    $res = $conn->query("SHOW TABLES");
    while ($row = $res->fetch_row()) {
        $tables[] = $row[0];
    }

    $user_table = "";
    foreach ($tables as $t) {
        if (strpos($t, 'users') !== false) {
            $user_table = $t;
            break;
        }
    }

    if (!$user_table) {
        echo "<b>Error:</b> No users table found in {$dbInfo['name']}.<br><br>";
        $conn->close();
        continue;
    }

    // Xử lý reset mật khẩu nếu có tham số reset=1 và trùng với db cần reset (hoặc reset cả hai)
    if (isset($_GET['reset']) && $_GET['reset'] === '1') {
        $new_pass = 'mikasa123';
        $sqlReset = "UPDATE $user_table SET user_pass = MD5('$new_pass') WHERE ID = 1";
        if ($conn->query($sqlReset) === TRUE) {
            echo "<b>Thành công:</b> Đã đặt lại mật khẩu cho tài khoản ID: 1 trong {$dbInfo['name']} thành <u>$new_pass</u>.<br>";
        } else {
            echo "<b>Lỗi reset trong {$dbInfo['name']}:</b> " . $conn->error . "<br>";
        }
    }

    // Liệt kê danh sách users
    $sql = "SELECT ID, user_login, user_email FROM $user_table";
    $resUsers = $conn->query($sql);
    if ($resUsers) {
        echo "<ul>";
        while ($row = $resUsers->fetch_assoc()) {
            echo "<li>ID: " . $row['ID'] . " | Username: <b>" . $row['user_login'] . "</b> | Email: " . $row['user_email'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Error querying users in {$dbInfo['name']}: " . $conn->error . "<br>";
    }
    $conn->close();
}
?>
