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


$parser = new Mni\FrontYAML\Parser();


if (!isset($_GET["page"]) || !file_exists("pages/{$_GET['page']}.md")) {
    $title = "tilde.team~wiki";
    include __DIR__.'/../header.php';
    // render wiki index ?>

    <meta property='og:title' content='<?=$title?>'>
    <meta property='og:type' content='website'>
    <meta property='og:image' content='https://git.tilde.team/avatars/26f6db9866154eafaa167a9471c313ea'>
    <meta property='og:url' content='https://tilde.team/<?=$_SERVER['REQUEST_URI']?>'>

    <h1>tilde.team wiki</h1>

    <p>welcome to the tilde.team wiki!</p>

    <p>if you want to contribute, check out the <a href="https://git.tilde.team/meta/site/src/branch/master/wiki">source!</a></p>

    <hr>
    <h3>pages:</h3>

    <?php
    foreach (glob("pages/*.md") as $page) {
        $yaml = $parser->parse(file_get_contents($page))->getYAML();
        if (!$yaml["published"]) continue; ?>
        <a href="?page=<?=basename($page, ".md")?>"><?=$yaml["title"]?></a><br>

    <?php }

} else {
    $pg = $parser->parse(file_get_contents("pages/{$_GET["page"]}.md"));
    $title = $pg->getYAML()['title'] . " | tilde.team~wiki";
    include __DIR__.'/../header.php';
    // show a single page ?>

    <a href=".">&lt; ~wiki</a>

    <meta property='og:title' content='<?=$title?>'>
    <meta property='og:type' content='website'>
    <meta property='og:image' content='https://git.tilde.team/avatars/26f6db9866154eafaa167a9471c313ea'>
    <meta property='og:url' content='https://tilde.team<?=$_SERVER['REQUEST_URI']?>'>

    <hr>
        <?=$pg->getContent()?>
    <hr>
    <a href="https://git.tilde.team/meta/site/src/branch/master/wiki/pages/<?=$_GET["page"]?>.md">
        <i class="fa fa-edit"></i> source
    </a>
<?php }

include __DIR__.'/../footer.php';
