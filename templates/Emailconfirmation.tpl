{if $loggedin}
<link rel="stylesheet" href="./modules/addons/Verifyemail/templates/css/style.css">

<main class="ev-main">
    <div class="ev-bg-shapes">
        <div class="ev-shape ev-shape-1"></div>
        <div class="ev-shape ev-shape-2"></div>
        <div class="ev-shape ev-shape-3"></div>
    </div>

    {if $email_authentication_status}

    <div class="ev-card">
        <div class="ev-card-glow"></div>
        <div class="ev-card-content">
            <div class="ev-icon-ring">
                <div class="ev-ring-pulse"></div>
                <div class="ev-icon-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </div>
            </div>
            <h1 class="ev-title">Verify Your Email</h1>
            <p class="ev-desc">Please confirm your email address to unlock all features and services.</p>
            <div class="ev-ill u-mb-lg">
                <svg class="ev-mail-svg" viewBox="0 0 200 140" fill="none">
                    <rect x="10" y="20" width="180" height="120" rx="16" fill="url(#mail-grad)" opacity="0.15"/>
                    <rect x="10" y="20" width="180" height="120" rx="16" stroke="url(#mail-grad)" stroke-width="2.5"/>
                    <path d="M10 40L100 90L190 40" stroke="url(#mail-grad)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="100" cy="80" r="3" fill="#667eea"/>
                    <defs>
                        <linearGradient id="mail-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#667eea"/>
                            <stop offset="100%" stop-color="#764ba2"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="ev-steps">
                <div class="ev-step active">
                    <div class="ev-step-num">1</div>
                    <span>Confirm</span>
                </div>
                <div class="ev-step-line"></div>
                <div class="ev-step">
                    <div class="ev-step-num">2</div>
                    <span>Verified</span>
                </div>
                <div class="ev-step-line"></div>
                <div class="ev-step">
                    <div class="ev-step-num">3</div>
                    <span>Explore</span>
                </div>
            </div>
            <div class="ev-alert">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                <span>To change your email, enter a new address below and click <strong>Update Email</strong>.</span>
            </div>
            <form method="post" class="ev-form" action="">
                <div class="ev-field">
                    <label for="emailedit">Account Email</label>
                    <div class="ev-input-wrap">
                        <svg class="ev-input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        <input required value="{$emailclient}" type="email" name="emailedit" id="emailedit" placeholder="you@example.com">
                    </div>
                </div>
                <div class="ev-actions">
                    <button type="submit" class="ev-btn ev-btn-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                        Update Email
                    </button>
                    <button type="button" class="ev-btn ev-btn-ghost btn-resend-verify-email"
                        data-email-sent="{$LANG.action.Emailsent}" data-error-msg="{$LANG.action.Emailerror}"
                        data-uri="{routePath('user-email-verification-resend')}">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 4v6h6"/><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"/></svg>
                        Resend Email
                    </button>
                </div>
            </form>
        </div>
    </div>

    {else}

    <div class="ev-card ev-success-card">
        <div class="ev-card-glow"></div>
        <div class="ev-card-content">
            <div class="ev-success-check">
                <svg viewBox="0 0 80 80" class="ev-check-svg">
                    <circle cx="40" cy="40" r="36" fill="none" stroke="#059669" stroke-width="3" class="ev-check-circle"/>
                    <path d="M24 40l10 10 22-22" fill="none" stroke="#059669" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" class="ev-check-path"/>
                </svg>
            </div>
            <h1 class="ev-title ev-success-title">Email Verified!</h1>
            <p class="ev-desc">Your email has been verified successfully. Welcome aboard!</p>
            <div class="ev-ill u-mb-lg">
                <svg class="ev-mail-svg" viewBox="0 0 200 140" fill="none">
                    <rect x="10" y="20" width="180" height="120" rx="16" fill="#059669" opacity="0.08"/>
                    <rect x="10" y="20" width="180" height="120" rx="16" stroke="#059669" stroke-width="2.5"/>
                    <path d="M10 40L100 90L190 40" stroke="#059669" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="100" cy="80" r="3" fill="#059669"/>
                </svg>
            </div>
            <div class="ev-steps">
                <div class="ev-step done">
                    <div class="ev-step-num">&#10003;</div>
                    <span>Confirm</span>
                </div>
                <div class="ev-step-line done"></div>
                <div class="ev-step active">
                    <div class="ev-step-num">&#10003;</div>
                    <span>Verified</span>
                </div>
                <div class="ev-step-line"></div>
                <div class="ev-step">
                    <div class="ev-step-num">3</div>
                    <span>Explore</span>
                </div>
            </div>
            <a class="ev-btn ev-btn-primary ev-btn-lg" href="{$WEB_ROOT}/clientarea.php">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                Go to Dashboard
            </a>
        </div>
    </div>

    {/if}
</main>

{else}
<script>location.href='./index.php/login';</script>
{/if}