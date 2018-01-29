<?php
$users = json_decode(file_get_contents("https://tilde.team/~ben/api/?users"));
foreach ($users as $user): ?>
    <div class="list-group">
        <a href="https://tilde.team/~<?=$user?>/" class="list-group-item">
            <h5 class="list-group-item-heading">~<?=$user?></h5>
        </a>
    </div>
<?php endforeach;
