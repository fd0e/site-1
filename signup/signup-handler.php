<?php
require __DIR__.'/../vendor/autoload.php';
require_once "email/smtp.php";

function getUserIpAddr() {
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function forbidden_name($name) {
    $badnames = [
        '0x0',
        'abuse',
        'admin',
        'administrator',
        'auth',
        'autoconfig',
        'bbj',
        'broadcasthost',
        'cloud',
        'forum',
        'ftp',
        'git',
        'gopher',
        'hostmaster',
        'imap',
        'info',
        'irc',
        'is',
        'isatap',
        'it',
        'localdomain',
        'localhost',
        'lounge',
        'mail',
        'mailer-daemon',
        'marketing',
        'marketting',
        'mis',
        'news',
        'nobody',
        'noc',
        'noreply',
        'pop',
        'pop3',
        'postmaster',
        'retro',
        'root',
        'sales',
        'security',
        'smtp',
        'ssladmin',
        'ssladministrator',
        'sslwebmaster',
        'support',
        'sysadmin',
        'team',
        'usenet',
        'uucp',
        'webmaster',
        'wpad',
        'www',
        'znc',
    ];

    return in_array(
        $name,
        array_merge(
            $badnames,
            file("/var/signups_current", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES),
            file("/var/banned_names.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
        )
    );
}

function forbidden_email($email) {
    $femail = file("/var/banned_emails.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($email, $femail);
}


$message = "";
if (isset($_REQUEST["username"]) && isset($_REQUEST["email"])) {
    // Check the name.
    $name = trim($_REQUEST["username"]);
    if ($name == "")
        $message .= "<li>fill in your desired username</li>\n";

    if (strlen($name) > 32)
        $message .= "<li>username too long (32 character max)</li>\n";

    if ($name != "" && strlen($name) < 2)
        $message .= "<li>username is too short (2 character min)</li>\n";

    if (strlen($name) > 1 && !preg_match('/^[a-z][a-z0-9]{1,31}$/', $name))
        $message .= "<li>username contains invalid characters (lowercase only, must start with a letter).</li>\n";

    if (posix_getpwnam($name) || forbidden_name($name))
        $message .= "<li>sorry, the username $name is unavailable</li>\n";

    // Check the e-mail address.
    $email = trim($_REQUEST["email"]);
    if ($email == "")
        $message .= "<li>please fill in your email address</li>";
    else {
        $result = SMTP::MakeValidEmailAddress($_REQUEST["email"]);
        if (!$result["success"])
            $message .= "<li>invalid email address: " . htmlspecialchars($result["error"]) . "</li>";
        elseif ($result["email"] != $email)
            $message .= "<li>invalid email address. did you mean:  " . htmlspecialchars($result["email"]) . "</li>";

        elseif (forbidden_email($email)) {
            $user_ip = getUserIpAddr();
            $user_info = "$name - $email - $user_ip";
            $message .= "<li>your email is banned!</li><br />";
            file_put_contents("/var/signups_banned", $user_info.PHP_EOL, FILE_APPEND);
        }
    }

    if ($_REQUEST["interest"] == "")
        $message .= "<li>please explain why you're interested so we can make sure you're a real human being</li>";

    if ($_REQUEST["sshkey"] == "" || mb_substr($_REQUEST["sshkey"], 0, 4) !== "ssh-")
        $message .= '<li>ssh key required: please create one and submit the public key. '
            . 'see our <a href="https://tilde.team/wiki/?page=ssh">ssh wiki</a> or '
            . 'hop on <a href="https://web.tilde.chat/?join=team">irc</a> and ask for help</li>';


    // no validation errors
    if ($message == "") {
        $sshkey = trim($_REQUEST["sshkey"]);
        $makeuser = "makeuser {$_REQUEST["username"]} {$_REQUEST["email"]} \"{$sshkey}\"";

        $msgbody = "
username: {$_REQUEST["username"]}
email: {$_REQUEST["email"]}
reason: {$_REQUEST["interest"]}

$makeuser
";

        if (mail('sudoers', 'new tilde.team signup', $msgbody)) {
            echo '<div class="alert alert-success" role="alert">
                    email sent! we\'ll get back to you soon (usually within a day) with login instructions! <a href="/">back to tilde.team home</a>
                  </div>';
            // temp. add to forbidden to prevent double signups (cleanup after user creation)
            file_put_contents("/var/signups_current", $name.PHP_EOL, FILE_APPEND);
            file_put_contents("/var/signups", $makeuser.PHP_EOL, FILE_APPEND);
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    something went wrong... please send an email to <a href="mailto:sudoers@tilde.team">sudoers@tilde.team</a> with details of what happened
                  </div>';
        }

    } else {
        ?>
        <div class="alert alert-warning" role="alert">
            <strong>notice: </strong>
            <?=$message?>
        </div>
        <?php
    }
}
?>

