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

        <p>tilde.team is one tiny standard unix computer in the cloud that anyone can use and learn to use in the shared pursuit
            of cool sites and unix tools.</p>
        <p>i created this site after hearing about paul ford's <a href="http://tilde.club/">tilde.club</a>. when i was unable to join due to the waitlist, i decided to create my own tilde.</p>
        <p>thanks for stopping by!</p>
        <p><a href="/~ben/">~ben</a></p>

        <br>

        <a href="/signup/" class="btn btn-primary btn-lg">
            <i class="fa fa-user-plus"></i> signup</a>

        <a href="/faq/" class="btn btn-warning btn-lg">
            <i class="fa fa-info"></i> faq</a>

        <br>
        <br>
        <hr>

        <h3>other tilde.team stuff</h3>

        <a class="btn btn-default" href="https://github.com/tilde-team">
            <i class="fa fa-github"></i> ~github-org~</a>
        <a class="btn btn-default" href="https://tilde.zone/invite/9xjfCyYJ">
            <i class="fa fa-retweet"></i> ~mastodon~</a>
        <a class="btn btn-default" href="/discord/">
            <i class="fa fa-comments"></i> ~discord~</a>
        <a class="btn btn-default" href="https://forum.tilde.team/">
            <i class="fa fa-comment"></i> ~forum~</a>
        <a class="btn btn-default" href="/irc/">
            <i class="fa fa-comments-o"></i> ~irc~</a>

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
                <h4>on our <a href="https://github.com/tilde-team">github org</a></h4>
                <hr>
                <?php
                    ini_set('user_agent', 'tilde-team');
                    foreach (json_decode(file_get_contents("https://api.github.com/orgs/tilde-team/repos")) ?? [] as $repo): ?>

                    <div class="list-group">
                        <div class="list-group-item">
                            <a href="<?=$repo->html_url?>">
                                <h3 class="list-group-item-heading"><?=$repo->name?></h3>
                            </a>
                            <p class="list-group-item-text"><?=$repo->description?></p>
                            <?php if ($repo->homepage != ""): ?>
                                <hr style="border-top: 1px solid #000;">
                                <em><a href="<?=$repo->homepage?>"><?=$repo->homepage?></a></em>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-md-5">
                <h1>~users~</h1>
                <em><a href="https://tilde.team/tilde.24h.html"><i class="fa fa-clock-o"></i> recent updates</a></em>
                <br><br>
                <?php $users = json_decode(file_get_contents("https://tilde.team/~ben/api/?users"));
                foreach ($users as $user): ?>
                    <div class="list-group">
                        <a href="https://tilde.team/~<?=$user?>/" class="list-group-item">
                            <h5 class="list-group-item-heading">~<?=$user?></h5>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

<?php include 'footer.php'; ?>
