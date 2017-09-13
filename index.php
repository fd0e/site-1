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
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#00cc00">

    <link rel="stylesheet" href="/css/hacker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</head>

<body>
    <div class="container">
    <h1>~~~tilde.team~~~</h1>
    <pre style="background-color:#333;">
   __  _ __    __      __
  / /_(_) /___/ /__   / /____  ____ _____ ___
 / __/ / / __  / _ \ / __/ _ \/ __ `/ __ `__ \
/ /_/ / / /_/ /  __// /_/  __/ /_/ / / / / / /
\__/_/_/\__,_/\___(_)__/\___/\__,_/_/ /_/ /_/
</pre>

    <br>
    <p>tilde.team is one tiny standard unix computer in the cloud that anyone can use and learn to use in the shared pursuit of cool sites and unix tools.</p>

    <p>i created this site after hearing about paul ford's <a href="http://tilde.club">tilde.club</a>. when i was unable to join due to the waitlist, i decided to create my own. see <a href="/~ben">my tilde page</a> or my <a href="https://benharr.is">personal site</a> for more info about me.</p>

    <br>
    <a href="/signup" class="btn btn-primary btn-lg"><i class="fa fa-user-plus"></i> signup</a>

    <a href="/faq" class="btn btn-warning btn-lg"><i class="fa fa-info"></i> faq</a>

    <br>
    <br>
    <hr>

    <h1>other tilde services</h1>

    <a class="btn btn-info" href="https://cloud.tilde.team"><i class="fa fa-cloud"></i> tilde~cloud</a>
    <a class="btn btn-info" href="https://gitlab.com/tilde.team"><i class="fa fa-gitlab"></i> tilde~git</a>
    <a class="btn btn-info" href="https://bhh.sh"><i class="fa fa-link"></i> url shortener</a>
    <a class="btn btn-info" href="https://bag.tilde.team"><i class="fa fa-shopping-bag"></i> tilde~wallabag read it later</a>
    <a class="btn btn-info" href="https://paste.tilde.team"><i class="fa fa-clipboard"></i> tilde~pastebin</a>
    <a class="btn btn-info" href="https://drop.tilde.team"><i class="fa fa-file"></i> tilde~filedrop</a>
    <br>
    <hr>

    <h1>users:</h1>
        <?php foreach (array_diff(scandir("/home"), ['..', '.']) as $user): ?>
            <div class="list-group">
                <a href="/~<?=$user?>" class="list-group-item">
                    <h4 class="list-group-item-heading">~<?=$user?></h4>
                </a>
            </div>
        <?php endforeach; ?>

    <hr>
    </div>

<br>
<br>
</body>
</html>


