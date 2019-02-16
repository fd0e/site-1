<?php

$services = [
    'gitea' => ['fa' => 'code-fork', 'url' => 'https://tildegit.org'],
    'forum' => ['fa' => 'comment', 'url' => 'https://bbj.tilde.team'],
    'wiki' => ['fa' => 'book', 'url' => '/wiki/'],
    'mastodon' => ['fa' => 'retweet', 'url' => 'https://tilde.zone'],
    'chat' => ['fa' => 'comments-o', 'url' => '/wiki/?page=irc'],
    'nextcloud' => ['fa' => 'cloud', 'url' => 'https://cloud.tilde.team/'],
    'webmail' => ['fa' => 'envelope', 'url' => 'https://mail.tilde.team'],
    'cryptpad' => ['fa' => 'sticky-note', 'url' => 'https://pad.tildeverse.org'],
    'pastebin' => ['fa' => 'paste', 'url' => 'https://paste.tildeverse.org/'],
    'termbin' => ['fa' => 'terminal', 'url' => 'https://bin.tilde.team/'],
    'nullpointer' => ['fa' => 'file-code-o', 'url' => 'https://ttm.sh'],
    'gopher' => ['fa' => 'floppy-o', 'url' => 'https://gopher.tilde.team'],
];

$nav = isset($navbar);
unset($navbar);

foreach ($services as $name => $service) { ?>
    <?php if ($nav) echo '<li>'; ?>
    <a href="<?=$service['url']?>" <?php if (!$nav) echo 'class="btn btn-default"'; ?>><i class="fa fa-<?=$service['fa']?>"></i> ~<?=$name?>~</a>
    <?php if ($nav) echo '</li>'; ?>
<?php }

