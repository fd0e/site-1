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

    <?=$additional_head ?? ""?>

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
            <a class="navbar-brand" href="/"><img src="https://tilde.team/favicon-32x32.png" alt="tilde.team logo"></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/faq/">faq</a></li>
                <li><a href="/signup/">sign up</a></li>

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
                        <li><a class="btn btn-default" href="http://webchat.freenode.net/?channels=%23%23tilde.team">
                            <i class="fa fa-comments-o"></i> ~irc~</a></li>
                    </ul>
                </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>

