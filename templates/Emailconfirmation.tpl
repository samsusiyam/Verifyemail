{if $loggedin}
<link rel="stylesheet" href="./modules/addons/Verifyemail/templates/css/style.css">
{if $email_authentication_status}

<div class="Userauthentication">
    <h1 class="title-pages">Email Verification</h1>
    <p class="text-dec">Please verify your email to access all website services</p>
        <img class="emailconfimedimg" src="./modules/addons/Verifyemail/templates/img/verify.svg"
                alt="confirming">
        <p class="note">Note: To update your email, enter your new email below and click the Update Email button</p>
        <form method="post" class="formedit" action="">
            <div>
                <label for="emailedit">Account Email</label>
                <input required value="{$emailclient}" type="email" name="emailedit" id="emailedit">
            </div>
            <div>
                <button class="btnemailconfrim btn-lg btn-resend-verify-email"
                    data-email-sent="{$LANG.action.Emailsent}" data-error-msg=" {$LANG.action.Emailerror}"
                    data-uri="{routePath('user-email-verification-resend')}">
                    Resend Email
                </button>
                <button type="submit" class="editemail btn-lg">Update Email</button>
        </form>
</div>
</div>
{else}
<div class="Userauthentication">
<img style="margin: 0;" class="emailconfimedimg" src="./modules/addons/Verifyemail/templates/img/Confrimed.svg"
                alt="confirmed">
    <h1 style="color: green;" class="title-pages">Email Verified!</h1>
    <p class="text-dec">Your account email has been verified successfully</p>
    <a class="btndash-confrimed" href="{$WEB_ROOT}/clientarea.php">Dashboard</a>
        </form>
</div>
</div>
{/if}
{else}
<script>
    location.href = './index.php/login';

</script>
{/if}
