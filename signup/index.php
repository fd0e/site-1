<?php
include __DIR__.'/../header.php';
?>

    <div class="container" id="app">
        <h1>
            tilde.team signup
            <div class="pull-right">
                <small><a href="/">&lt; back</a></small>
            </div>
        </h1>
        <h3>so you wanna join the tilde.team?</h3>

        <p>hi there. fill out this form and i'll get back to you with your account info.</p>

        <hr>

        <form method="post">
            <?php include 'signup-handler.php'; ?>

            <div class="form-group">
                <label>your desired username (numbers and lowercase letters only, no spaces)</label>
                <input class="form-control" name="username" value="<?=$_REQUEST["username"] ?? ""?>" type="text" required>
            </div>

            <div class="form-group">
                <label>email to contact you with account info</label>
                <input class="form-control" name="email" value="<?=$_REQUEST["email"] ?? ""?>" type="text" required>
            </div>

            <div class="form-group">
                <label>what interests you about tilde.team?</label>
                <textarea class="form-control" name="interest" id="" cols="30" rows="10"><?=$_REQUEST["interest"] ?? ""?></textarea>
            </div>

            <div class="form-group">
                <label>SSH public key</label>
                <textarea required class="form-control" name="sshkey" id="" cols="30" rows="10"><?=$_REQUEST["sshkey"] ?? ""?></textarea>
                <p>if you don't have a key, don't worry! <a href="/wiki/?page=ssh">check out our guide to ssh keys</a> and make sure that you only put your pubkey here</p>
            </div>

            <p>
                <em>signing up implies agreement with our <a href="/wiki/?page=code-of-conduct">code of conduct</a>. please give it a read.</em>
            </p>

            <button class="btn btn-primary" type="submit">submit</button>

        </form>
        <br>
    </div>

<?php include __DIR__.'/../footer.php';

