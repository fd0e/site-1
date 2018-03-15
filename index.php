<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="tilde.team unix group">
    <meta name="author" content="Ben Harris">
    <title>tilde.team</title>

    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#00cc00">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-310x310.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/apple-touch-icon-precomposed.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">

    <link rel="stylesheet" href="/css/hacker.css">
    <link rel="stylesheet" href="/css/font-awesome.css">

</head>

<body style="padding-top: 70px;">
    <div class="container">

        <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<%= thread_path(@conn, :index) %>"><img src="https://tilde.team/favicon-32x32.png" alt="tilde.team logo"></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/faq/">faq</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">tildeverse
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a class="btn btn-default" href="https://github.com/tilde-team">
                            <i class="fa fa-github"></i> ~github-org~</a></li>
                        <li><a class="btn btn-default" href="https://social.tilde.team/">
                            <i class="fa fa-retweet"></i> ~mastodon~</a></li>
                        <li><a class="btn btn-default" href="/discord/">
                            <i class="fa fa-comments"></i> ~discord~</a></li>
                        <li><a class="btn btn-default" href="https://forum.tilde.team/">
                            <i class="fa fa-comment"></i> ~forum~</a></li>
                    </ul>
                </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>

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

        <h1>other tilde.team stuff</h1>

        <a class="btn btn-default" href="https://github.com/tilde-team">
            <i class="fa fa-github"></i> ~github-org~</a>
        <a class="btn btn-default" href="https://social.tilde.team/">
            <i class="fa fa-retweet"></i> ~mastodon~</a>
        <a class="btn btn-default" href="/discord/">
            <i class="fa fa-comments"></i> ~discord~</a>
        <a class="btn btn-default" href="https://forum.tilde.team/">
            <i class="fa fa-comment"></i> ~forum~</a>
        <a class="btn btn-default" href="https://bhh.sh">
            <i class="fa fa-link"></i> ~url-shortener~</a>

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

        <hr>
    </div>

    <br>
    <br>
</body>

</html>
