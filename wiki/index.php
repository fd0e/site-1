<?php
require __DIR__.'/../vendor/autoload.php';
include __DIR__.'/../header.php';

$parser = new Mni\FrontYAML\Parser();
?>

<h1>tilde.team wiki</h1>

<p>welcome to the tilde.team wiki!</p>

<p>if you want to contribute, check out the <a href="https://git.tilde.team/meta/site/src/branch/master/wiki">source!</a></p>

<hr>
<h3>pages:</h3>

<?php
foreach (glob("pages/*.md") as $page) {
    $parsed = $parser->parse(file_get_contents($page));
    $yaml = $parsed->getYAML();
    if (!$yaml["published"]) continue;
    ?>

    <a href="/wiki/view.php?page=<?=basename($page, ".md")?>"><?=$yaml["title"]?></a><br>
<?php }


include __DIR__.'/../footer.php';
