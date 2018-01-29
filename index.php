<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="tilde.team unix group">
    <meta name="author" content="Ben Harris">
    <title>tilde.team</title>

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#00cc00">

    <link rel="stylesheet" href="/css/hacker.css">
    <link rel="stylesheet" href="/css/font-awesome.css">

</head>

<body>
    <div class="container">

        <div class="jumbotron">
            <h1>~~~tilde.team~~~</h1>
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

        <a class="btn btn-default" href="/discord/">
            <i class="fa fa-comments"></i> ~discord~</a>
        <a class="btn btn-default" href="https://github.com/tilde-team">
            <i class="fa fa-github"></i> ~github-org~</a>
        <a class="btn btn-default" href="https://bhh.sh">
            <i class="fa fa-link"></i> ~url-shortener~</a>
        <a class="btn btn-default" href="https://social.tilde.team/">
            <i class="fa fa-retweet"></i> ~mastodon~</a>
        <a class="btn btn-default" href="https://notes.tilde.team/">
            <i class="fa fa-sticky-note"></i> ~notepad~</a>

        <br>
        <hr>

        <div class="row">
            <div class="col-md-7">
                <h1>~news~</h1>
                <?php include "news.php"; ?>
            </div>
            <div class="col-md-5">
                <h1>~users~</h1>
                <em><a href="https://tilde.team/tilde.24h.html"><i class="fa fa-clock-o"></i> recent updates</a></em>
                <br><br>
                <?php echo file_get_contents("https://tilde.team/users.php"); ?>
            </div>
        </div>

        <hr>
    </div>

    <br>
    <br>
</body>

</html>
