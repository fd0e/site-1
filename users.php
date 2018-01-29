<?php foreach (scandir("/home") as $user):
    if (!is_dir("/home/$user/public_html")) continue; ?>

    <div class="list-group">
        <a href="https://tilde.team/~<?=$user?>/" class="list-group-item">
            <h5 class="list-group-item-heading">~<?=$user?></h5>
        </a>
    </div>

<?php endforeach;
