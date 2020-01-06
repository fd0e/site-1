<?php
include 'header.php';
require __DIR__.'/vendor/autoload.php';
$parser = Tildeverse\Wiki\Parser::factory();
?>

        <div class="jumbotron">
            <h1>~team</h1>
            <pre>
   __  _ __    __      __
  / /_(_) /___/ /__   / /____  ____ _____ ___
 / __/ / / __  / _ \ / __/ _ \/ __ `/ __ `__ \
/ /_/ / / /_/ /  __// /_/  __/ /_/ / / / / / /
\__/_/_/\__,_/\___(_)__/\___/\__,_/_/ /_/ /_/
</pre>

            <br>

            <p>a digital community for socializing, learning, and making cool stuff</p>
        </div>

        <p>
            tilde.team is a shared system that provides an inclusive, 
            non-commercial space for teaching, learning, practicing and 
            enjoying the social medium of unix.
        </p>
        <p>
            i created this tilde after hearing about paul ford's 
            <a href="http://tilde.club/">tilde.club</a>. when i was unable 
            to join due to the waitlist, i decided to create my own tilde.
        </p>

        <p>thanks for stopping by!</p>

        <p>
            tilde.team is a founding member of <a href="https://tildeverse.org">tildeverse.org</a>, 
            which is a collaborative effort among several <a href="https://tildeverse.org/members/">
            other tilde servers</a>.
        </p>
        <p>
            hosting and domains are paid out-of-pocket. tilde.team will always 
            be free to use. however, if you are able and willing to pitch in, 
            you can <a href="https://bhh.sh/donate/">donate here</a>.
        </p>

        <p><a href="/~ben/">~ben</a></p>

        <br>

        <a href="/signup/" class="btn btn-primary btn-lg">
            <i class="fa fa-user-plus"></i> signup</a>

        <br>
        <br>
        <hr>

        <h3>other tilde.team stuff</h3>

        <?php include 'services.php'; ?>

        <br>
        <hr>

        <div class="row">
            <div class="col-md-7">
                <h1>~news~</h1>
                <?php foreach (array_slice(array_reverse(glob("news/pages/*.md")), 0, 4) as $page):
                    $parsed = $parser->parse(file_get_contents($page));
                    $yaml = $parsed->getYAML();
                    if (!$yaml["published"]) continue; ?>

                    <div class="list-group">
                        <div class="list-group-item">
                            <h3 class="list-group-item-heading"><?=$yaml["title"]?></h3>
                            <em>
                                <a href="/news/?page=<?=basename($page, ".md")?>">
                                <?=$yaml["date"]?></a> - <a href="/~<?=$yaml["author"]?>/"><?=$yaml["author"]?></a>
                            </em>
                            <hr>
                            <div class="list-group-item-text"><?=$parsed->getContent()?></div>
                        </div>
                    </div>

                <?php endforeach; ?>

                <div class="list-group">
                    <div class="list-group-item">
                        <p class="list-group-item-text"><a href="/news/">news archive here...</a></p>
                    </div>
                </div>

                <h1>~current projects~</h1>
                <h4>on our <a href="https://tildegit.org/team">gitea</a></h4>
                <hr>
                <div class="list-group">
                    <?php foreach (json_decode(file_get_contents("https://tildegit.org/api/v1/orgs/team/repos")) ?? [] as $repo): ?>
                        <div class="list-group-item">
                            <h3 style="display:inline;" class="list-group-item-heading">
                                <a href="<?=$repo->html_url?>"><?=$repo->name?></a>
                            </h3>
                            <?php if ($repo->website != ""): ?>
                                &mdash;
                                <p style="display:inline;"><em><a href="<?=$repo->website?>"><?=$repo->website?></a></em></p>
                            <?php endif; ?>
                            <br>
                            <p class="list-group-item-text"><?=$repo->description?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

            <div class="col-md-5">
                <h1>~users~</h1>
                <p><em><a href="/tilde.24h.html"><i class="fa fa-clock-o"></i> recent updates</a></em></p>
                <p>if you're not listed here, make some changes to your page</p>
                <p><a href="/users/">all users</a></p>
                <br><br>
                <div class="list-group">
                <ul>
                <?php
                foreach (glob("/home/*") as $user):
                    if (!is_dir("$user/public_html")
                        || (file_exists("$user/public_html/index.php")
                            && in_array(sha1_file("$user/public_html/index.php"),
                            // these are the sha1s of two previous default pages
                            ["ca32714c33abb57430583ad07efec6097ae1a044", "f190ba3a1ed796a20bea83304e45e799420c0716"])))
                        continue;
                    $user = basename($user); ?>
                    <li style="list-style: none; margin-left: -40px;">
                        <a href="/~<?=$user?>/" class="list-group-item">
                            <h6 class="list-group-item-heading">~<?=$user?></h6>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
                </div>
            </div>
        </div>

<?php include 'footer.php'; ?>
