<?php
require __DIR__.'/../vendor/autoload.php';

$additional_head = "
    <style>
    :target:before {
        content:\"\";
        display:block;
        height:90px; /* fixed header height*/
        margin:-90px 0 0; /* negative fixed header height */
    }
    </style>
    <meta property='og:type' content='website'>
    <meta property='og:image' content='https://tilde.team/apple-icon.png'>
    <meta property='og:site_name' content='tilde.team news'>
";

$parser = Tildeverse\Wiki\Parser::factory();


if (!isset($_GET["page"]) || !file_exists("pages/{$_GET['page']}.md")) {

    $title = "tilde.team~news";
    $additional_head .= "
    <meta property='og:title' content='$title'>
    <meta property='og:url' content='https://tilde.team{$_SERVER['REQUEST_URI']}'>
    <meta property='og:description' content='tilde.team news'>
    ";
    include __DIR__.'/../header.php';
    // render news index ?>

    <h1>tilde.team news</h1>

    <p>welcome to the tilde.team news!</p>

    <p>if you want to contribute, check out the
        <a href="https://tildegit.org/team/site/src/branch/master/news">source</a> and open a PR!
    </p>

    <hr>
    <h3>updates:</h3>

    <?php
    foreach (array_reverse(glob("pages/*.md")) as $page) {
        $yaml = $parser->parse(file_get_contents($page))->getYAML();
        if (!$yaml["published"]) continue; ?>
        <a href="<?=basename($page, ".md")?>"><?=$yaml["title"]?></a> - <?=$yaml["date"]?><br>
    <?php }

} else {

    $pg = $parser->parse(file_get_contents("pages/{$_GET["page"]}.md"));
    $yml = $pg->getYAML();
    $title = $yml['title'] . " | tilde.team~news";
    $description = $yml['description'] ?? "tilde.team news update {$yml['title']}";
    $additional_head .= "
    <meta property='og:title' content='$title'>
    <meta property='og:url' content='https://tilde.team{$_SERVER['REQUEST_URI']}'>
    <meta property='og:description' content='$description'>
    ";
    include __DIR__.'/../header.php';
    // show a single page ?>

    <a href=".">&lt; ~news</a>

    <h1><?=$yml["title"]?></h1>
    <p><?=$yml["date"]?> - <a href="/~<?=$yml["author"]?>/">~<?=$yml["author"]?></a></p>

    <hr>
        <?=$pg->getContent()?>
    <hr>

    <a href="https://tildegit.org/team/site/src/branch/master/news/pages/<?=$_GET["page"]?>.md">
        <i class="fa fa-edit"></i> source
    </a>

<?php }

include __DIR__.'/../footer.php';
