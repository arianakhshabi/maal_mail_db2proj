<?php
// String to be hashed
$string = 'Hello World';

// Creating MD5 hash
$md5Hash = md5($string);
echo "MD5 Hash: " . $md5Hash . "\n";

// Creating SHA256 hash
$sha256Hash = hash('sha256', $string);
echo "SHA256 Hash: " . $sha256Hash . "\n";
?>
