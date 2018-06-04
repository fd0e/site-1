<?php
if (!isset($_GET["page"]) || !file_exists("pages/{$_GET['page']}.md")) {
    header("Location: /wiki/"); die();
}

require __DIR__.'/../vendor/autoload.php';
include __DIR__.'/../header.php';

?>
<a href="/wiki/"><h1>tilde.team wiki</h1></a>
<hr>

<?php
$parser = new Mni\FrontYAML\Parser();

$page = $parser->parse(file_get_contents("pages/{$_GET['page']}.md"));


echo $page->getContent();


include __DIR__.'/../footer.php';
