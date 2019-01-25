<?php
include __DIR__.'/../header.php';

$online_users = shell_exec("online-users");
$total_users = shell_exec("members team | wc -w");
?>

<div class="row">
    <?=$online_users?> users online of <?=$total_users?> total users
    <img src="https://tilde.chat/badges/badge.php?channel=%23team" alt="users online in #team">
</div>


<div class="row">
    <div class="col-md-5">
        <h1>~all users~</h1>
        <p><em><a href="/tilde.24h.html"><i class="fa fa-clock-o"></i> recent updates</a></em></p>
        <br><br>
        <div class="list-group">
        <ul>
        <?php
        foreach (glob("/home/*") as $user):
            if (!is_dir("$user/public_html")) continue;
            $user = basename($user); ?>
            <li style="list-style: none; margin-left: -40px;">
                <a href="/~<?=$user?>/" class="list-group-item">
                    <h6 class="list-group-item-heading">~<?=$user?></h5>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>
        </div>
    </div>
</div>

<?php
include __DIR__.'/../footer.php';
