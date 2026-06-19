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
        <link rel="stylesheet" href="../modules/addons/Verifyemail/lib/template/css/style.css">
        <div class="verify-admin-wrapper">
            <div class="verify-admin-header">
                <div class="verify-admin-header-content">
                    <div class="verify-admin-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <div>
                        <h1 class="verify-admin-title">Email Verification</h1>
                        <p class="verify-admin-subtitle">Configure plugin settings below</p>
                    </div>
                </div>
                <a class="verify-admin-link" href="configgeneral.php?nocache=yc4opdjzyLEJ43Zn#tab=10">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    {$LANG['Warning']['go-to-configgeneral']}
                </a>
            </div>

            <div class="verify-admin-warning">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <span>{$LANG['Warning']['dec-configgeneral']}</span>
            </div>

            <div class="verify-admin-nav">
                <a href="{$modulelink}&page=index" class="verify-nav-tab active">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    {$LANG['menu']['setting-email-active']}
                </a>
                <a href="{$modulelink}&page=about" class="verify-nav-tab">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    {$LANG['menu']['aboutanicoweb']}
                </a>
            </div>

            <form class="verify-admin-form" action="#" method="post">
                <div class="verify-setting-card">
                    <div class="verify-setting-row">
                        <div class="verify-setting-info">
                            <div class="verify-setting-icon verify-icon-blue">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            </div>
                            <div>
                                <h3 class="verify-setting-label">{$LANG['setting']['Emailconfirmation']}</h3>
                                <p class="verify-setting-desc">{$LANG['setting']['dec-confirmemail']}</p>
                            </div>
                        </div>
                        <label class="verify-toggle" for="Emailauthentication">
                            <input type="checkbox" {$checked} name="Emailauthentication" id="Emailauthentication" />
                            <span class="verify-toggle-slider"></span>
                        </label>
                    </div>
                </div>

                <div class="verify-setting-card">
                    <div class="verify-setting-row">
                        <div class="verify-setting-info">
                            <div class="verify-setting-icon verify-icon-purple">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                            </div>
                            <div>
                                <h3 class="verify-setting-label">{$LANG['setting']['Userauthentication']}</h3>
                                <p class="verify-setting-desc">{$LANG['setting']['dec-Userauthentication']}</p>
                            </div>
                        </div>
                        <label class="verify-toggle" for="Userauthentication">
                            <input type="checkbox" {$checked1} name="Userauthentication" id="Userauthentication" />
                            <span class="verify-toggle-slider"></span>
                        </label>
                    </div>
                </div>

                <div class="verify-setting-card">
                    <div class="verify-setting-row">
                        <div class="verify-setting-info">
                            <div class="verify-setting-icon verify-icon-red">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                            </div>
                            <div>
                                <h3 class="verify-setting-label">{$LANG['setting']["Deletedatabase"]}</h3>
                                <p class="verify-setting-desc">{$LANG['setting']['dec-Deletedatabase']}</p>
                            </div>
                        </div>
                        <label class="verify-toggle" for="Deletedatabase">
                            <input type="checkbox" {$checked2} name="Deletedatabase" id="Deletedatabase" />
                            <span class="verify-toggle-slider"></span>
                        </label>
                    </div>
                </div>

                <div class="verify-form-footer">
                    <button type="submit" class="verify-btn-save" name="submit">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
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
            <link rel="stylesheet" href="../modules/addons/Verifyemail/lib/template/css/style.css">
            <div class="verify-admin-wrapper">
                <div class="verify-admin-header">
                    <div class="verify-admin-header-content">
                        <div class="verify-admin-icon verify-about-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <div>
                            <h1 class="verify-admin-title">{$LANG['menu']['aboutanicoweb']}</h1>
                            <p class="verify-admin-subtitle">About this module</p>
                        </div>
                    </div>
                </div>

                <div class="verify-admin-nav">
                    <a href="{$modulelink}&page=index" class="verify-nav-tab">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                        {$LANG['menu']['setting-email-active']}
                    </a>
                    <a href="{$modulelink}&page=about" class="verify-nav-tab active">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        {$LANG['menu']['aboutanicoweb']}
                    </a>
                </div>

                <div class="verify-about-card">
                    <p>{$LANG['about']['Description']}</p>
                </div>
            </div>
EOF;
    }
}