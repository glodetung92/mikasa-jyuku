<?php
function OpenCon()
{
    $is_local = (isset($_SERVER['HTTP_HOST']) && in_array($_SERVER['HTTP_HOST'], ['localhost', 'mikasajyuku.test'])) 
                || (isset($_SERVER['REMOTE_ADDR']) && in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']))
                || (php_sapi_name() === 'cli');

    if ($is_local) {
        $dbhost = "127.0.0.1";
        $dbuser = "root";
        $dbpass = "";
        $db = "kogaku-sha_mikasa_hp";
    } else {
        $dbhost = "mysql633.db.sakura.ne.jp";
        $dbuser = "kogaku-sha";
        $dbpass = "L-pt18HL";
        $db = "kogaku-sha_mikasa_hp";
    }

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}
