<?php include 'header.php'; ?>

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

        <p>tilde.team is a shared system that provides a radically inclusive, non-commercial space for teaching, learning, practicing and enjoying the social medium of unix.</p>
        <p>i created this tilde after hearing about paul ford's <a href="http://tilde.club/">tilde.club</a>. when i was unable to join due to the waitlist, i decided to create my own tilde.</p>
        <p>thanks for stopping by!</p>
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
                <?php foreach (array_reverse(glob("news/*.json")) as $file):
                    $post = json_decode(file_get_contents($file));
                    if (!$post->published) continue; ?>

                    <div class="list-group">
                        <div class="list-group-item">
                            <h3 class="list-group-item-heading"><?=$post->title?></h3>
                                <em><?=$post->date?> - <?=$post->author?></em>
                                <hr>
                                <p class="list-group-item-text"><?=$post->content?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

                <h1>~current projects~</h1>
                <h4>on our <a href="https://git.tildeverse.org/team">gitea</a></h4>
                <hr>
                <?php foreach (json_decode(file_get_contents("https://git.tilde.team/api/v1/orgs/team/repos")) ?? [] as $repo): ?>
                    <div class="list-group">
                        <div class="list-group-item">
                            <a href="<?=$repo->html_url?>">
                                <h3 class="list-group-item-heading"><?=$repo->name?></h3>
                            </a>
                            <p class="list-group-item-text"><?=$repo->description?></p>
                            <?php if ($repo->website != ""): ?>
                                <hr style="border-top: 1px solid #000;">
                                <em><a href="<?=$repo->website?>"><?=$repo->website?></a></em>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-md-5">
                <h1>~users~</h1>
                <em><a href="https://tilde.team/tilde.24h.html"><i class="fa fa-clock-o"></i> recent updates</a></em>
                <br><br>
                <?php
                foreach (glob("/home/*") as $user):
                    if (!is_dir("$user/public_html")) continue;
                    $user = basename($user); ?>
                    <div class="list-group">
                        <a href="https://tilde.team/~<?=$user?>/" class="list-group-item">
                            <h5 class="list-group-item-heading">~<?=$user?></h5>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

<?php include 'footer.php'; ?>
