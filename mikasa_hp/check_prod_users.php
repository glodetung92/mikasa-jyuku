<?php
// Bảo mật: Chỉ cho phép truy cập nếu có tham số secret=mikasa2026
if (!isset($_GET['secret']) || $_GET['secret'] !== 'mikasa2026') {
    die("Access denied");
}

// 1. Cập nhật trang Blog (Database: kogaku-sha_mksdb)
echo "<h3>1. Cập nhật Trang Blog (Database: kogaku-sha_mksdb)</h3>";
$connBlog = @new mysqli("mysql633.db.sakura.ne.jp", "kogaku-sha", "L-pt18HL", "kogaku-sha_mksdb");
if ($connBlog->connect_error) {
    echo "<b>Lỗi kết nối database blog:</b> " . $connBlog->connect_error . "<br>";
} else {
    // Tìm tên bảng users (thường là mikasahp_wpusers)
    $res = $connBlog->query("SHOW TABLES LIKE '%users'");
    $userTableBlog = $res ? $res->fetch_row()[0] : 'mikasahp_wpusers';

    $newLoginBlog = 'yoko ishida';
    $newPassBlog = 'dekirukotokara';
    $sqlBlog = "UPDATE $userTableBlog SET user_login = '$newLoginBlog', user_pass = MD5('$newPassBlog') WHERE ID = 1";
    
    if ($connBlog->query($sqlBlog) === TRUE) {
        echo "<b>Thành công:</b> Đã cập nhật ID = 1 thành:<br>";
        echo "- Username mới: <b>$newLoginBlog</b><br>";
        echo "- Password mới: <b>$newPassBlog</b><br><br>";
    } else {
        echo "<b>Lỗi cập nhật:</b> " . $connBlog->error . "<br><br>";
    }
    $connBlog->close();
}

// 2. Cập nhật trang Admin chính (Database: kogaku-sha_mikasa_hp)
echo "<h3>2. Cập nhật Trang Admin chính (Database: kogaku-sha_mikasa_hp)</h3>";
$connMain = @new mysqli("mysql633.db.sakura.ne.jp", "kogaku-sha", "L-pt18HL", "kogaku-sha_mikasa_hp");
if ($connMain->connect_error) {
    echo "<b>Lỗi kết nối database main:</b> " . $connMain->connect_error . "<br>";
} else {
    // Tìm tên bảng users
    $res = $connMain->query("SHOW TABLES LIKE '%users'");
    $userTableMain = $res ? $res->fetch_row()[0] : 'mikasahp_wpusers';

    $newLoginMain = 'Mikasa teacher';
    $newPassMain = 'Mikasanakanoku288';
    $newEmailMain = 'info@mikasajyuku.org';
    $sqlMain = "UPDATE $userTableMain SET user_login = '$newLoginMain', user_pass = MD5('$newPassMain'), user_email = '$newEmailMain' WHERE ID = 1";

    if ($connMain->query($sqlMain) === TRUE) {
        echo "<b>Thành công:</b> Đã cập nhật ID = 1 thành:<br>";
        echo "- Username mới: <b>$newLoginMain</b><br>";
        echo "- Password mới: <b>$newPassMain</b><br>";
        echo "- Email mới: <b>$newEmailMain</b><br><br>";
    } else {
        echo "<b>Lỗi cập nhật:</b> " . $connMain->error . "<br><br>";
    }
    $connMain->close();
}
?>
