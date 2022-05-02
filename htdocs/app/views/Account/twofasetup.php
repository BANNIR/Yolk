<html>
    <head>
        <title>Yolk - Two-Factor Authentication Setup</title>
    </head>
    <body>
        <img src= "http://localhost/Account/makeQRCode?data=<?= $data ?>" alt = "problem" />
        <?= _("Please scan the QR-code on the screen with your favorite
        Authenticator software, such as Google Authenticator. The
        authenticator software will generate codes that are valid for 30
        seconds only. Enter such a code while and submit it while it is
        still valid to confirm that the 2-factor authentication can be
        applied to your account. You can also choose to not use a two-factor authentication setup, by clicking on the Cancel button.")?>
        <form method="post" action="">
            <label>Current code:<input type="text" name="currentCode"
            /></label>
            <input type="submit" name="action" value='<?= _('Verify Code, I want to use 2FA') ?>' />
            <input type="submit" id="cancel" name="cancel" value='<?= _('Cancel, I do not want to use 2FA') ?>' />
        </form>
    </body>
</html>