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
    $additional_head .= "
    <meta property='og:title' content='$title'>
    <meta property='og:type' content='website'>
    <meta property='og:image' content='https://tilde.team/apple-icon.png'>
    <meta property='og:url' content='https://tilde.team{$_SERVER['REQUEST_URI']}'>
    <meta property='og:description' content='tilde.team wiki'>
    <meta property='og:site_name' content='tilde.team wiki'>
    ";
    include __DIR__.'/../header.php';
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
        <a href="?page=<?=basename($page, ".md")?>"><?=$yaml["title"]?></a><br>

    <?php }

} else {
    $pg = $parser->parse(file_get_contents("pages/{$_GET["page"]}.md"));
    $yml = $pg->getYAML();
    $title = $yml['title'] . " | tilde.team~wiki";
    $description = $yml['description'] ?? "tilde.team wiki article {$yml['title']}";
    $additional_head .= "
    <meta property='og:title' content='$title'>
    <meta property='og:type' content='website'>
    <meta property='og:image' content='https://tilde.team/apple-icon.png'>
    <meta property='og:url' content='https://tilde.team{$_SERVER['REQUEST_URI']}'>
    <meta property='og:description' content='$description'>
    <meta property='og:site_name' content='tilde.team wiki'>
    ";
    include __DIR__.'/../header.php';
    // show a single page ?>

    <a href=".">&lt; ~wiki</a>

    <hr>
        <?=$pg->getContent()?>
    <hr>
    <a href="https://git.tilde.team/meta/site/src/branch/master/wiki/pages/<?=$_GET["page"]?>.md">
        <i class="fa fa-edit"></i> source
    </a>
<?php }

include __DIR__.'/../footer.php';
