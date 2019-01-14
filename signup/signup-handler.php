<?php
require __DIR__.'/../vendor/autoload.php';
require_once "email/smtp.php";

function forbidden_name($name) {
    return in_array($name, [
        '0x0',
        'abuse',
        'admin',
        'administrator',
        'auth',
        'autoconfig',
        'bbj',
        'broadcasthost',
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
    ]);
}

$message = "";
if (isset($_REQUEST["username"]) && isset($_REQUEST["email"])) {
    // Check the name.
    $name = trim($_REQUEST["username"]);
    if ($name == "")
        $message .= "<li>please fill in your desired username</li>";
    if (strlen($name) > 32)
        $message .= "<li>username too long (32 character max)</li>";
    if (!preg_match('/^[A-Za-z][A-Za-z0-9]{2,31}$/', $name))
        $message .= "<li>username contains invalid characters (lowercase only, must start with a letter)</li>";
    if (posix_getpwnam($name) || forbidden_name($name))
        $message .= "<li>sorry, the username $name is unavailable</li>";

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
    }

    if ($_REQUEST["sshkey"] == "") {
        $message .= "<li>ssh key required: please create one and submit the public key</li>";
    }


    if ($message == "") { // no validation errors
        $msgbody = "
desired username: {$_REQUEST["username"]}
contact email: {$_REQUEST["email"]}
reason: {$_REQUEST["interest"]}
ssh key:
{$_REQUEST["sshkey"]}

sudo ./makeuser {$_REQUEST["username"]} {$_REQUEST["email"]} \"{$_REQUEST["sshkey"]}\"
";

        if (mail('sudoers', 'new tilde.team signup', $msgbody, "Reply-To: {$_REQUEST["email"]}")) {
            echo '<div class="alert alert-success" role="alert">
                    email sent! i\'ll get back to you soon with login instructions! <a href="/">back to tilde.team home</a>
                  </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    something went wrong... please send an email to <a href="mailto:sudoers@tilde.team">sudoers@tilde.team</a> with details of what happened
                  </div>';
        }

    } else {
        ?>
        <div class="alert alert-warning" role="alert">
            <strong>please correct the following errors: </strong>
            <?=$message?>
        </div>
        <?php
    }
}
?>
