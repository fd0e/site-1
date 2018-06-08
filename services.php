<?php

$services = [
    'gitea' => ['fa' => 'code-fork', 'url' => 'https://git.tilde.team'],
    'forum' => ['fa' => 'comment', 'url' => 'https://forum.tilde.team'],
    'wiki' => ['fa' => 'book', 'url' => '/wiki/'],
    'mastodon' => ['fa' => 'retweet', 'url' => 'https://tilde.zone'],
    'chat' => ['fa' => 'comments-o', 'url' => '/wiki/?page=irc'],
    'cryptpad' => ['fa' => 'sticky-note', 'url' => 'https://pad.tilde.team'],
];

$nav = isset($navbar);
unset($navbar);

foreach ($services as $name => $service) { ?>
    <?php if ($nav) echo '<li>'; ?>
    <a href="<?=$service['url']?>"
        <?php if (!$nav) echo 'class="btn btn-default"'; ?>>
        <i class="fa fa-<?=$service['fa']?>"></i> ~<?=$name?>~</a>
    <?php if ($nav) echo '</li>'; ?>
<?php }

