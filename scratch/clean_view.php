<?php
$filePath = __DIR__ . '/../resources/views/product-details.blade.php';
$content = file_get_contents($filePath);

$secTag = "@section('content')";
$breadTag = '<div class="rbt-breadcrumb-two rbt-bg-color-white">';

$pos1 = strpos($content, $secTag);
$pos2 = strpos($content, $breadTag);

if ($pos1 !== false && $pos2 !== false && $pos2 > $pos1) {
    $newContent = substr($content, 0, $pos1 + strlen($secTag)) . "\n    " . substr($content, $pos2);
    file_put_contents($filePath, $newContent);
    echo "SUCCESSFULLY CLEANED DUPLICATE HEADER MARKUP\n";
} else {
    echo "MARKUP TAGS NOT FOUND: pos1=$pos1, pos2=$pos2\n";
}
