<?php

foreach (array_reverse(glob("news/*.json")) as $file):
    $post = json_decode(file_get_contents($file));
    if (!$post->published) continue; ?>

    <div class="list-group">
        <div class="list-group-item">
            <h4 class="list-group-item-heading"><?=$post->title?></h4>
                <em><?=$post->date?> - <?=$post->author?></em>
                <p class="list-group-item-text"><?=$post->content?></p>
        </div>
    </div>

<?php endforeach;
