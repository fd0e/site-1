<?php

foreach (array_reverse(glob("news/*.json")) as $file):
    $post = json_decode(file_get_contents($file));
    if (!$post->published) continue; ?>

    <div class="list-group">
        <div class="list-group-item">
            <h3 class="list-group-item-heading"><?=$post->title?></h3>
                <em><?=$post->date?> - <?=$post->author?></em>
                <hr style="border-top: 1px solid #000;">
                <p class="list-group-item-text"><?=$post->content?></p>
        </div>
    </div>

<?php endforeach;
