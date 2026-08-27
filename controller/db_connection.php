<?php
function OpenCon() {
    $dbhost = "mysql633.db.sakura.ne.jp";
    $dbuser = "kogaku-sha";
    $dbpass = "L-pt18HL";
    $db = "kogaku-sha_mikasa_hp";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    return $conn;
}
 
function CloseCon($conn) {
    $conn -> close();
}