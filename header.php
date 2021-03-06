<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="tilde.team unix group">
    <meta name="author" content="Ben Harris">
    <title><?=$title ?? "tilde.team"?></title>

    <meta name="theme-color" content="#00cc00">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-310x310.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/apple-touch-icon-precomposed.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">

    <link rel="stylesheet" href="/css/hacker.css">
    <link rel="stylesheet" href="/css/fork-awesome.css">

    <?=$additional_head ?? ""?>
    <?php unset($title); unset($additional_head); ?>
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
                <li><a href="/signup/">sign up</a></li>
                <li><a href="/wiki/">wiki</a></li>
                <li><a href="https://bhh.sh/donate/">donate</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">~team stuff
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <?php $navbar = true; include 'services.php'; ?>
                    </ul>
                </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>

