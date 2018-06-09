<?php
require __DIR__.'/../vendor/autoload.php';
$additional_head = '
<style>
a.anchor {
    display: block;
    position: relative;
    top: -250px;
    visibility: hidden;
}
</style>
';
include __DIR__.'/../header.php';

$parser = new Mni\FrontYAML\Parser();


if (!isset($_GET["page"]) || !file_exists("pages/{$_GET['page']}.md")) {
// render wiki index ?>

<h1>tilde.team wiki</h1>

<p>welcome to the tilde.team wiki!</p>

<p>if you want to contribute, check out the <a href="https://git.tilde.team/meta/site/src/branch/master/wiki">source!</a></p>

<hr>
<h3>pages:</h3>

<?php
foreach (glob("pages/*.md") as $page) {
    $yaml = $parser->parse(file_get_contents($page))->getYAML();
    if (!$yaml["published"]) continue; ?>
    <a href="/wiki/?page=<?=basename($page, ".md")?>"><?=$yaml["title"]?></a><br>

<?php }

} else {
    // show a single page ?>
    <a href="/wiki/">&lt; ~wiki</a>
    <hr>
        <?=$parser->parse(file_get_contents("pages/{$_GET['page']}.md"))->getContent()?>
    <hr>
    <a href="https://git.tilde.team/meta/site/src/branch/master/wiki/pages/<?=$_GET["page"]?>.md">
        <i class="fa fa-edit"></i> source
    </a>
<?php }

include __DIR__.'/../footer.php';
