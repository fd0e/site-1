<?php
include __DIR__.'/../header.php';
require __DIR__.'/../vendor/autoload.php';

$pages = array_map(function($page) {
    return YamlFrontMatter::parse(file_get_contents($page));
}, glob("pages/*.md"));
?>

<h1>tilde.team wiki</h1>

<?php foreach ($pages as $page): ?>

<?php endforeach; ?>


<?php
include __DIR__.'/../footer.php';
