{if $loggedin}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="./modules/addons/Verifyemail/templates/css/style.css">

<main class="min-vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #f0f4ff 0%, #e8f0fe 100%); padding: 2rem 1rem;">
    {if $email_authentication_status}

    <div class="tw-bg-white tw-rounded-2xl tw-shadow-lg tw-w-full" style="max-width: 440px;">
        <div class="p-4 pt-5 text-center">
            <div class="d-flex justify-content-center mb-3">
                <div class="d-flex align-items-center justify-content-center" style="width:64px;height:64px;border-radius:18px;background:linear-gradient(135deg,#667eea,#764ba2);box-shadow:0 8px 24px rgba(102,126,234,.3);">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </div>
            </div>
            <h1 class="tw-text-2xl tw-font-bold tw-text-gray-900 mb-1">Verify Your Email</h1>
            <p class="tw-text-gray-500 tw-text-sm mb-0">Please confirm your email to unlock all services</p>
        </div>

        <div class="text-center px-4">
            <div class="d-flex justify-content-center my-3">
                <svg width="160" height="100" viewBox="0 0 200 120" fill="none">
                    <rect x="10" y="15" width="180" height="95" rx="12" fill="url(#g1)" opacity=".12"/>
                    <rect x="10" y="15" width="180" height="95" rx="12" stroke="url(#g1)" stroke-width="2"/>
                    <path d="M10 33L100 75L190 33" stroke="url(#g1)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <defs><linearGradient id="g1" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#667eea"/><stop offset="1" stop-color="#764ba2"/></linearGradient></defs>
                </svg>
            </div>
        </div>

        <div class="px-4">
            <div class="d-flex align-items-center justify-content-center gap-1 mb-4">
                <div class="text-center">
                    <div class="d-flex align-items-center justify-content-center rounded-circle mx-auto mb-1" style="width:30px;height:30px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;font-size:13px;font-weight:700;box-shadow:0 3px 10px rgba(102,126,234,.3);">1</div>
                    <span class="tw-text-xs tw-font-medium" style="color:#667eea;">Confirm</span>
                </div>
                <div style="width:40px;height:2px;background:#e5e7eb;margin-bottom:20px;"></div>
                <div class="text-center">
                    <div class="d-flex align-items-center justify-content-center rounded-circle mx-auto mb-1" style="width:30px;height:30px;background:#f3f4f6;color:#9ca3af;font-size:13px;font-weight:700;">2</div>
                    <span class="tw-text-xs tw-font-medium tw-text-gray-400">Verified</span>
                </div>
                <div style="width:40px;height:2px;background:#e5e7eb;margin-bottom:20px;"></div>
                <div class="text-center">
                    <div class="d-flex align-items-center justify-content-center rounded-circle mx-auto mb-1" style="width:30px;height:30px;background:#f3f4f6;color:#9ca3af;font-size:13px;font-weight:700;">3</div>
                    <span class="tw-text-xs tw-font-medium tw-text-gray-400">Explore</span>
                </div>
            </div>
        </div>

        <div class="px-4">
            <div class="d-flex align-items-start gap-2 p-3 rounded-3 mb-4" style="background:#fef3cd;border:1px solid #fcd34d;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" class="flex-shrink-0 mt-1"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                <span class="tw-text-xs" style="color:#92400e;line-height:1.5;">To change your email, enter a new address below and click <strong>Update Email</strong>.</span>
            </div>
        </div>

        <form method="post" class="px-4 pb-4" action="">
            <div class="mb-3">
                <label class="tw-text-xs tw-font-semibold tw-text-gray-700 mb-1 d-block">Account Email</label>
                <div class="position-relative">
                    <svg class="position-absolute" style="left:12px;top:50%;transform:translateY(-50%);color:#9ca3af;" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <input required value="{$emailclient}" type="email" name="emailedit" id="emailedit" placeholder="you@example.com" class="form-control" style="padding:10px 14px 10px 38px;border-radius:10px;border:1.5px solid #e5e7eb;font-size:14px;">
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn flex-fill tw-font-semibold" style="padding:11px 16px;border-radius:10px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;border:none;font-size:14px;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                    Update Email
                </button>
                <button type="button" class="btn flex-fill tw-font-semibold btn-resend-verify-email" style="padding:11px 16px;border-radius:10px;background:transparent;color:#667eea;border:1.5px solid #667eea;font-size:14px;"
                    data-email-sent="{$LANG.action.Emailsent}" data-error-msg="{$LANG.action.Emailerror}"
                    data-uri="{routePath('user-email-verification-resend')}">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><path d="M1 4v6h6"/><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"/></svg>
                    Resend
                </button>
            </div>
        </form>
    </div>

    {else}

    <div class="tw-bg-white tw-rounded-2xl tw-shadow-lg tw-w-full" style="max-width: 440px;">
        <div class="p-4 pt-5 text-center">
            <div class="d-flex justify-content-center mb-3">
                <div class="d-flex align-items-center justify-content-center" style="width:72px;height:72px;border-radius:50%;background:#ecfdf5;">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
            </div>
            <h1 class="tw-text-2xl tw-font-bold mb-1" style="color:#059669;">Email Verified!</h1>
            <p class="tw-text-gray-500 tw-text-sm mb-0">Your email has been verified successfully</p>
        </div>

        <div class="text-center px-4">
            <div class="d-flex justify-content-center my-3">
                <svg width="160" height="100" viewBox="0 0 200 120" fill="none">
                    <rect x="10" y="15" width="180" height="95" rx="12" fill="#059669" opacity=".08"/>
                    <rect x="10" y="15" width="180" height="95" rx="12" stroke="#059669" stroke-width="2"/>
                    <path d="M10 33L100 75L190 33" stroke="#059669" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>

        <div class="px-4">
            <div class="d-flex align-items-center justify-content-center gap-1 mb-4">
                <div class="text-center">
                    <div class="d-flex align-items-center justify-content-center rounded-circle mx-auto mb-1" style="width:30px;height:30px;background:#059669;color:#fff;font-size:13px;font-weight:700;">&#10003;</div>
                    <span class="tw-text-xs tw-font-medium" style="color:#059669;">Confirm</span>
                </div>
                <div style="width:40px;height:2px;background:#059669;margin-bottom:20px;"></div>
                <div class="text-center">
                    <div class="d-flex align-items-center justify-content-center rounded-circle mx-auto mb-1" style="width:30px;height:30px;background:#059669;color:#fff;font-size:13px;font-weight:700;">&#10003;</div>
                    <span class="tw-text-xs tw-font-medium" style="color:#059669;">Verified</span>
                </div>
                <div style="width:40px;height:2px;background:#e5e7eb;margin-bottom:20px;"></div>
                <div class="text-center">
                    <div class="d-flex align-items-center justify-content-center rounded-circle mx-auto mb-1" style="width:30px;height:30px;background:#f3f4f6;color:#9ca3af;font-size:13px;font-weight:700;">3</div>
                    <span class="tw-text-xs tw-font-medium tw-text-gray-400">Explore</span>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
                <span class="badge rounded-pill px-3 py-2" style="background:#ecfdf5;color:#059669;font-size:12px;border:1px solid #a7f3d0;">&#10003; Email Confirmed</span>
                <span class="badge rounded-pill px-3 py-2" style="background:#eef2ff;color:#4f46e5;font-size:12px;border:1px solid #c7d2fe;">Account Active</span>
            </div>
        </div>

        <div class="px-4 pb-4">
            <a class="btn w-100 tw-font-semibold d-flex align-items-center justify-content-center gap-2" href="{$WEB_ROOT}/clientarea.php" style="padding:12px;border-radius:10px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;border:none;font-size:15px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                Go to Dashboard
            </a>
        </div>
    </div>

    {/if}
</main>

{else}
<script>location.href='./index.php/login';</script>
{/if}