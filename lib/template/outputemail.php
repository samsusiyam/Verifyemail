<?php

namespace WHMCS\Module\Addon\Verifyemail\template;

use WHMCS\Database\Capsule;
class outputemail
{
    public function index($vars)
    {
        $modulelink = $vars['modulelink'];
        $LANG = $vars['_lang'];

        $Emailauthentication = Capsule::table('mod_Verifyemail')->where('id', '1')->value('Emailauthentication');
        $Userauthentication = Capsule::table('mod_Verifyemail')->where('id', '1')->value('Userauthentication');
        $Deletedatabase = Capsule::table('mod_Verifyemail')->where('id', '1')->value('Deletedatabase');
        $checked = $Emailauthentication == "on" ? "checked" : "";
        $checked1 = $Userauthentication == "on" ? "checked" : "";
        $checked2 = $Deletedatabase == "on" ? "checked" : "";
        $badge1style = $Emailauthentication == "on" ? "background:#d1fae5;color:#059669" : "background:#f3f4f6;color:#9ca3af";
        $badge1txt = $Emailauthentication == "on" ? "ON" : "OFF";
        $badge2style = $Userauthentication == "on" ? "background:#d1fae5;color:#059669" : "background:#f3f4f6;color:#9ca3af";
        $badge2txt = $Userauthentication == "on" ? "ON" : "OFF";
        $badge3style = $Deletedatabase == "on" ? "background:#d1fae5;color:#059669" : "background:#f3f4f6;color:#9ca3af";
        $badge3txt = $Deletedatabase == "on" ? "ON" : "OFF";

        try {
            Capsule::connection()->transaction(
                function ($connectionManager) {
                    if (isset($_POST['Emailauthentication'])) {
                        $connectionManager->table('mod_Verifyemail')->update(
                            [
                                'Emailauthentication' => $_POST['Emailauthentication'],
                                'Userauthentication' => $_POST['Userauthentication'],
                                'Deletedatabase' => $_POST['Deletedatabase'],
                            ]
                        );
                    }
                }
            );
        } catch (\Exception $e) {
            echo "An error has occurred: {$e->getMessage()}";
        }

        return <<<EOF
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../modules/addons/Verifyemail/lib/template/css/style.css">
        <style>body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen,Ubuntu,Cantarell,sans-serif}</style>

        <div class="container-fluid px-0" style="font-size:15px;">
            <div class="rounded-4 p-4 mb-4 text-white d-flex flex-wrap justify-content-between align-items-center gap-3" style="background:linear-gradient(135deg,#1e1b4b,#312e81);">
                <div class="d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center justify-content-center" style="width:54px;height:54px;border-radius:14px;background:rgba(255,255,255,.12);">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8"><rect x="2" y="4" width="20" height="16" rx="3"/><path d="M22 7l-10 7L2 7"/></svg>
                    </div>
                    <div>
                        <h1 class="fw-bold mb-0" style="font-size:22px;">Email Verification</h1>
                        <p class="mb-0" style="font-size:14px;opacity:.75;">Manage your verification settings</p>
                    </div>
                </div>
                <a href="configgeneral.php?nocache=yc4opdjzyLEJ43Zn#tab=10" class="btn text-white d-inline-flex align-items-center gap-2 px-4 py-2" style="background:rgba(255,255,255,.12);border-radius:10px;font-size:14px;font-weight:600;border:1px solid rgba(255,255,255,.1);">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    General Settings
                </a>
            </div>

            <div class="d-flex align-items-start gap-2 p-3 rounded-3 mb-4" style="background:#fef3cd;border:1px solid #fcd34d;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" class="flex-shrink-0 mt-0"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <span style="font-size:14px;color:#92400e;">{$LANG['Warning']['dec-configgeneral']}</span>
            </div>

            <ul class="nav nav-pills mb-4 gap-1" style="background:#f3f4f6;border-radius:12px;padding:4px;">
                <li class="nav-item flex-fill">
                    <a href="{$modulelink}&page=index" class="nav-link active text-center fw-semibold" style="border-radius:8px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;font-size:14px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                        {$LANG['menu']['setting-email-active']}
                    </a>
                </li>
                <li class="nav-item flex-fill">
                    <a href="{$modulelink}&page=about" class="nav-link text-center fw-semibold" style="border-radius:8px;color:#6b7280;font-size:14px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        {$LANG['menu']['aboutanicoweb']}
                    </a>
                </li>
            </ul>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-white" style="border:1px solid #f3f4f6;">
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width:48px;height:48px;background:#f5f3ff;color:#7c3aed;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div>
                            <div class="fw-semibold" style="font-size:13px;color:#6b7280;letter-spacing:.04em;text-transform:uppercase;">Email Confirmation</div>
                            <span class="badge rounded-pill d-inline-block mt-1 px-3 py-1" style="font-size:12px;{$badge1style}">{$badge1txt}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-white" style="border:1px solid #f3f4f6;">
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width:48px;height:48px;background:#eef2ff;color:#4f46e5;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                        </div>
                        <div>
                            <div class="fw-semibold" style="font-size:13px;color:#6b7280;letter-spacing:.04em;text-transform:uppercase;">Page Restriction</div>
                            <span class="badge rounded-pill d-inline-block mt-1 px-3 py-1" style="font-size:12px;{$badge2style}">{$badge2txt}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-white" style="border:1px solid #f3f4f6;">
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width:48px;height:48px;background:#fff1f2;color:#e11d48;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                        </div>
                        <div>
                            <div class="fw-semibold" style="font-size:13px;color:#6b7280;letter-spacing:.04em;text-transform:uppercase;">DB Deletion</div>
                            <span class="badge rounded-pill d-inline-block mt-1 px-3 py-1" style="font-size:12px;{$badge3style}">{$badge3txt}</span>
                        </div>
                    </div>
                </div>
            </div>

            <form action="#" method="post" class="bg-white rounded-3 p-4" style="border:1px solid #e5e7eb;">
                <h6 class="fw-bold mb-3 d-flex align-items-center gap-2" style="font-size:16px;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#667eea" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    Module Settings
                </h6>

                <div class="d-flex flex-column gap-2">
                    <label class="d-flex align-items-center justify-content-between p-3 rounded-3" style="border:1px solid #e5e7eb;cursor:pointer;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-2 fw-bold" style="width:40px;height:40px;background:#eef2ff;color:#4f46e5;font-size:18px;">@</div>
                            <div>
                                <div class="fw-semibold" style="font-size:15px;">{$LANG['setting']['Emailconfirmation']}</div>
                                <div style="font-size:13px;color:#6b7280;">{$LANG['setting']['dec-confirmemail']}</div>
                            </div>
                        </div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" {$checked} name="Emailauthentication" id="Emailauthentication" style="width:44px;height:24px;cursor:pointer;">
                        </div>
                    </label>

                    <label class="d-flex align-items-center justify-content-between p-3 rounded-3" style="border:1px solid #e5e7eb;cursor:pointer;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-2 fw-bold" style="width:40px;height:40px;background:#f5f3ff;color:#7c3aed;font-size:18px;">!</div>
                            <div>
                                <div class="fw-semibold" style="font-size:15px;">{$LANG['setting']['Userauthentication']}</div>
                                <div style="font-size:13px;color:#6b7280;">{$LANG['setting']['dec-Userauthentication']}</div>
                            </div>
                        </div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" {$checked1} name="Userauthentication" id="Userauthentication" style="width:44px;height:24px;cursor:pointer;">
                        </div>
                    </label>

                    <label class="d-flex align-items-center justify-content-between p-3 rounded-3" style="border:1px solid #e5e7eb;cursor:pointer;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-2 fw-bold" style="width:40px;height:40px;background:#fff1f2;color:#e11d48;font-size:18px;">&#10005;</div>
                            <div>
                                <div class="fw-semibold" style="font-size:15px;">{$LANG['setting']["Deletedatabase"]}</div>
                                <div style="font-size:13px;color:#6b7280;">{$LANG['setting']['dec-Deletedatabase']}</div>
                            </div>
                        </div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" {$checked2} name="Deletedatabase" id="Deletedatabase" style="width:44px;height:24px;cursor:pointer;">
                        </div>
                    </label>
                </div>

                <hr class="my-4">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn text-white d-inline-flex align-items-center gap-2 px-4 py-2 fw-semibold" name="submit" style="background:linear-gradient(135deg,#667eea,#764ba2);border-radius:10px;border:none;font-size:15px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                        {$LANG['setting']['savechanges']}
                    </button>
                </div>
            </form>
        </div>
EOF;
    }

    public function about($vars)
    {
        $LANG = $vars['_lang'];
        $modulelink = $vars['modulelink'];

        return <<<EOF
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../modules/addons/Verifyemail/lib/template/css/style.css">
        <style>body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen,Ubuntu,Cantarell,sans-serif}</style>

        <div class="container-fluid px-0" style="font-size:15px;">
            <div class="rounded-4 p-4 mb-4 text-white" style="background:linear-gradient(135deg,#1e1b4b,#312e81);">
                <div class="d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center justify-content-center" style="width:54px;height:54px;border-radius:14px;background:rgba(255,255,255,.12);">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <div>
                        <h1 class="fw-bold mb-0" style="font-size:22px;">{$LANG['menu']['aboutanicoweb']}</h1>
                        <p class="mb-0" style="font-size:14px;opacity:.75;">About this module</p>
                    </div>
                </div>
            </div>

            <ul class="nav nav-pills mb-4 gap-1" style="background:#f3f4f6;border-radius:12px;padding:4px;">
                <li class="nav-item flex-fill">
                    <a href="{$modulelink}&page=index" class="nav-link text-center fw-semibold" style="border-radius:8px;color:#6b7280;font-size:14px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                        {$LANG['menu']['setting-email-active']}
                    </a>
                </li>
                <li class="nav-item flex-fill">
                    <a href="{$modulelink}&page=about" class="nav-link active text-center fw-semibold" style="border-radius:8px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;font-size:14px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        {$LANG['menu']['aboutanicoweb']}
                    </a>
                </li>
            </ul>

            <div class="bg-white rounded-3 p-4 text-center" style="border:1px solid #e5e7eb;">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <div class="d-flex align-items-center justify-content-center" style="width:72px;height:72px;border-radius:50%;background:linear-gradient(135deg,#667eea,#764ba2);">
                        <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                </div>
                <p class="mb-0" style="font-size:15px;line-height:1.8;color:#374151;max-width:600px;margin:0 auto;white-space:pre-line;">{$LANG['about']['Description']}</p>
                <hr class="my-4">
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <span class="badge rounded-pill px-3 py-2" style="background:#eef2ff;color:#4f46e5;font-size:13px;">Version 1.0</span>
                    <span class="badge rounded-pill px-3 py-2" style="background:#f5f3ff;color:#7c3aed;font-size:13px;">WHMCS Module</span>
                    <span class="badge rounded-pill px-3 py-2" style="background:#ecfdf5;color:#059669;font-size:13px;">Email Verification</span>
                </div>
            </div>
        </div>
EOF;
    }
}