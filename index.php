<?php 
include 'header.php'; 
require __DIR__.'/vendor/autoload.php';
$parser = new Mni\FrontYAML\Parser();
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

        <p>tilde.team is a shared system that provides an inclusive, non-commercial space for teaching, learning, practicing and enjoying the social medium of unix.</p>
        <p>i created this tilde after hearing about paul ford's <a href="http://tilde.club/">tilde.club</a>. when i was unable to join due to the waitlist, i decided to create my own tilde.</p>
        <p>thanks for stopping by!</p>
        <p>tilde.team is a founding member of <a href="https://tildeverse.org">tildeverse.org</a>, which is a collaborative effort among several <a href="/wiki/?page=other-tildes">other tilde servers</a>.</p>
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
                <?php
                foreach (array_slice(array_reverse(glob("news/pages/*.md")), 0, 3) as $page):
                    $parsed = $parser->parse(file_get_contents($page));
                    $yaml = $parsed->getYAML();
                    if (!$yaml["published"]) continue; ?>
                    <div class="list-group">
                        <div class="list-group-item">
                            <h3 class="list-group-item-heading"><?=$yaml["title"]?></h3>
                            <em><a href="/news/?page=<?=basename($page, ".md")?>"><?=$yaml["date"]?></a> - <a href="/~<?=$yaml["author"]?>/"><?=$yaml["author"]?></a></em>
                            <hr>
                            <p class="list-group-item-text"><?=$parsed->getContent()?></p>
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
                
                <h1>our <a href="https://tilde.zone/@tildeteam">mastodon</a> feed</h1>
                <iframe allowfullscreen sandbox="allow-top-navigation allow-scripts" width="100%" height="800" src="https://www.mastofeed.com/api/feed?url=https%3A%2F%2Ftilde.zone%2Fusers%2Ftildeteam.atom&theme=dark&size=100&header=true&replies=true&boosts=true"></iframe>
            </div>

            <div class="col-md-5">
                <h1>~users~</h1>
                <em><a href="https://tilde.team/tilde.24h.html"><i class="fa fa-clock-o"></i> recent updates</a></em>
                <br><br>
                <div class="list-group">
                <ul>
                <?php
                foreach (glob("/home/*") as $user):
                    if (!is_dir("$user/public_html") 
                        || sha1_file("/etc/skel/public_html/index.php") == sha1_file("$user/public_html/index.php")) 
                        continue;
                    $user = basename($user); ?>
                    <li style="list-style: none; margin-left: -40px;">
                        <a href="/~<?=$user?>/" class="list-group-item">
                            <h6 class="list-group-item-heading">~<?=$user?></h5>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
                </div>
            </div>
        </div>

<?php include 'footer.php'; ?>

