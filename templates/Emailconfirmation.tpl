{if $loggedin}
<link rel="stylesheet" href="./modules/addons/Verifyemail/templates/css/style.css">
{if $email_authentication_status}

<section class="verify-card">
    <div class="verify-card-inner">
        <div class="verify-badge">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        </div>
        <h1 class="verify-title">Email Verification</h1>
        <p class="verify-subtitle">Please verify your email to access all website services</p>
        <img class="verify-illustration" src="./modules/addons/Verifyemail/templates/img/verify.svg" alt="verify email">
        <div class="verify-note">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            <span>To update your email, enter your new email below and click the Update Email button</span>
        </div>
        <form method="post" class="verify-form" action="">
            <div class="form-group">
                <label for="emailedit">Account Email</label>
                <input required value="{$emailclient}" type="email" name="emailedit" id="emailedit" placeholder="Enter your email address">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Email</button>
                <button class="btn btn-secondary btn-resend-verify-email"
                    data-email-sent="{$LANG.action.Emailsent}" data-error-msg=" {$LANG.action.Emailerror}"
                    data-uri="{routePath('user-email-verification-resend')}">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 0 0 4.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 0 1-15.357-2m15.357 2H15"/></svg>
                    Resend Email
                </button>
            </div>
        </form>
    </div>
</section>

{else}

<section class="verify-card">
    <div class="verify-card-inner verify-success">
        <div class="success-icon">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </div>
        <h1 class="verify-title" style="color: #059669;">Email Verified!</h1>
        <p class="verify-subtitle">Your account email has been verified successfully</p>
        <img class="verify-illustration" src="./modules/addons/Verifyemail/templates/img/Confrimed.svg" alt="confirmed">
        <a class="btn btn-primary btn-dashboard" href="{$WEB_ROOT}/clientarea.php">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            Dashboard
        </a>
    </div>
</section>

{/if}
{else}
<script>location.href = './index.php/login';</script>
{/if}