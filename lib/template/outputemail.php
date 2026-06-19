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
        $on = $Emailauthentication == "on";
        $on1 = $Userauthentication == "on";
        $on2 = $Deletedatabase == "on";

        if (isset($_POST['submit'])) {
            try {
                Capsule::table('mod_Verifyemail')->update([
                    'Emailauthentication' => $_POST['Emailauthentication'],
                    'Userauthentication' => $_POST['Userauthentication'],
                    'Deletedatabase' => $_POST['Deletedatabase'],
                ]);
            } catch (\Exception $e) {
                echo "An error has occurred: {$e->getMessage()}";
            }
        }

        $toggle1 = $on ? 'checked' : '';
        $toggle2 = $on1 ? 'checked' : '';
        $toggle3 = $on2 ? 'checked' : '';
        $bg1 = $on ? '#7c3aed' : '#d1d5db';
        $bg2 = $on1 ? '#7c3aed' : '#d1d5db';
        $bg3 = $on2 ? '#7c3aed' : '#d1d5db';
        $tx1 = $on ? 'translateX(18px)' : 'translateX(0)';
        $tx2 = $on1 ? 'translateX(18px)' : 'translateX(0)';
        $tx3 = $on2 ? 'translateX(18px)' : 'translateX(0)';
        $badge = function($isOn) {
            return $isOn
                ? '<span style="background:#d1fae5;color:#059669;font-size:12px;font-weight:600;padding:3px 12px;border-radius:20px;display:inline-block;">ON</span>'
                : '<span style="background:#f3f4f6;color:#9ca3af;font-size:12px;font-weight:600;padding:3px 12px;border-radius:20px;display:inline-block;">OFF</span>';
        };

        return <<<EOF
        <link rel="stylesheet" href="../modules/addons/Verifyemail/lib/template/css/style.css">

        <div class="hnv-wrap" style="font-family:inherit;font-size:14px;line-height:1.5;color:#333;max-width:860px;">
            <div style="background:linear-gradient(135deg,#1e1b4b,#312e81);border-radius:12px;padding:20px 24px;margin-bottom:18px;display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;gap:14px;">
                <div style="display:flex;align-items:center;gap:14px;">
                    <div style="width:48px;height:48px;border-radius:12px;background:rgba(255,255,255,.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8"><rect x="2" y="4" width="20" height="16" rx="3"/><path d="M22 7l-10 7L2 7"/></svg>
                    </div>
                    <div>
                        <div style="font-size:20px;font-weight:700;color:#fff;line-height:1.2;">Email Verification</div>
                        <div style="font-size:13px;color:rgba(255,255,255,.7);">Manage addon settings</div>
                    </div>
                </div>
                <a href="configgeneral.php?nocache=yc4opdjzyLEJ43Zn#tab=10" style="display:inline-flex;align-items:center;gap:6px;padding:8px 18px;background:rgba(255,255,255,.12);border-radius:8px;color:#fff;text-decoration:none;font-size:13px;font-weight:600;border:1px solid rgba(255,255,255,.08);">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    General Settings
                </a>
            </div>

            <div style="display:flex;align-items:flex-start;gap:10px;background:#fef3cd;border:1px solid #fcd34d;border-radius:10px;padding:12px 16px;margin-bottom:18px;font-size:13px;color:#92400e;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" style="flex-shrink:0;margin-top:1px;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <span>{$LANG['Warning']['dec-configgeneral']}</span>
            </div>

            <div style="display:flex;gap:4px;background:#f3f4f6;border-radius:10px;padding:4px;margin-bottom:20px;">
                <a href="{$modulelink}&page=index" style="flex:1;text-align:center;padding:9px 14px;border-radius:8px;text-decoration:none;font-size:13px;font-weight:600;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align:middle;margin-right:4px;"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    {$LANG['menu']['setting-email-active']}
                </a>
                <a href="{$modulelink}&page=about" style="flex:1;text-align:center;padding:9px 14px;border-radius:8px;text-decoration:none;font-size:13px;font-weight:600;color:#6b7280;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align:middle;margin-right:4px;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    {$LANG['menu']['aboutanicoweb']}
                </a>
            </div>

            <div style="display:flex;gap:12px;margin-bottom:20px;flex-wrap:wrap;">
                <div style="flex:1;min-width:180px;background:#fff;border:1px solid #e5e7eb;border-radius:10px;padding:14px 16px;display:flex;align-items:center;gap:12px;">
                    <div style="width:42px;height:42px;border-radius:10px;background:#f5f3ff;color:#7c3aed;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.04em;">Email Confirmation</div>
                        {$badge($on)}
                    </div>
                </div>
                <div style="flex:1;min-width:180px;background:#fff;border:1px solid #e5e7eb;border-radius:10px;padding:14px 16px;display:flex;align-items:center;gap:12px;">
                    <div style="width:42px;height:42px;border-radius:10px;background:#eef2ff;color:#4f46e5;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.04em;">Page Restriction</div>
                        {$badge($on1)}
                    </div>
                </div>
                <div style="flex:1;min-width:180px;background:#fff;border:1px solid #e5e7eb;border-radius:10px;padding:14px 16px;display:flex;align-items:center;gap:12px;">
                    <div style="width:42px;height:42px;border-radius:10px;background:#fff1f2;color:#e11d48;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                    </div>
                    <div>
                        <div style="font-size:11px;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.04em;">DB Deletion</div>
                        {$badge($on2)}
                    </div>
                </div>
            </div>

            <form action="#" method="post" style="background:#fff;border:1px solid #e5e7eb;border-radius:12px;padding:20px 24px;">
                <div style="font-size:15px;font-weight:700;color:#374151;margin-bottom:14px;display:flex;align-items:center;gap:8px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#667eea" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    Module Settings
                </div>

                <div style="display:flex;flex-direction:column;gap:8px;">
                    <div style="display:flex;align-items:center;justify-content:space-between;padding:12px 16px;border:1px solid #e5e7eb;border-radius:10px;gap:12px;">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <span style="width:36px;height:36px;border-radius:8px;background:#eef2ff;color:#4f46e5;display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:700;flex-shrink:0;">@</span>
                            <div>
                                <div style="font-size:14px;font-weight:600;color:#111827;">{$LANG['setting']['Emailconfirmation']}</div>
                                <div style="font-size:12px;color:#6b7280;margin-top:1px;">{$LANG['setting']['dec-confirmemail']}</div>
                            </div>
                        </div>
                        <div onclick="var c=this.querySelector('input');c.checked=!c.checked;c.dispatchEvent(new Event('change'))" style="position:relative;display:inline-block;width:40px;height:22px;flex-shrink:0;cursor:pointer;">
                            <input type="hidden" name="Emailauthentication" value="off">
                            <input type="checkbox" name="Emailauthentication" id="Emailauthentication" value="on" {$toggle1} style="opacity:0;width:0;height:0;position:absolute;">
                            <span style="position:absolute;top:0;left:0;right:0;bottom:0;background:{$bg1};border-radius:22px;transition:.3s;pointer-events:none;"></span>
                            <span style="position:absolute;content:'';height:18px;width:18px;left:2px;bottom:2px;background:#fff;border-radius:50%;transition:.3s;transform:{$tx1};box-shadow:0 1px 3px rgba(0,0,0,.15);pointer-events:none;"></span>
                        </div>
                    </div>

                    <div style="display:flex;align-items:center;justify-content:space-between;padding:12px 16px;border:1px solid #e5e7eb;border-radius:10px;gap:12px;">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <span style="width:36px;height:36px;border-radius:8px;background:#f5f3ff;color:#7c3aed;display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:700;flex-shrink:0;">!</span>
                            <div>
                                <div style="font-size:14px;font-weight:600;color:#111827;">{$LANG['setting']['Userauthentication']}</div>
                                <div style="font-size:12px;color:#6b7280;margin-top:1px;">{$LANG['setting']['dec-Userauthentication']}</div>
                            </div>
                        </div>
                        <div onclick="var c=this.querySelector('input[type=checkbox]');c.checked=!c.checked;c.dispatchEvent(new Event('change'))" style="position:relative;display:inline-block;width:40px;height:22px;flex-shrink:0;cursor:pointer;">
                            <input type="hidden" name="Userauthentication" value="off">
                            <input type="checkbox" name="Userauthentication" id="Userauthentication" value="on" {$toggle2} style="opacity:0;width:0;height:0;position:absolute;">
                            <span style="position:absolute;top:0;left:0;right:0;bottom:0;background:{$bg2};border-radius:22px;transition:.3s;pointer-events:none;"></span>
                            <span style="position:absolute;content:'';height:18px;width:18px;left:2px;bottom:2px;background:#fff;border-radius:50%;transition:.3s;transform:{$tx2};box-shadow:0 1px 3px rgba(0,0,0,.15);pointer-events:none;"></span>
                        </div>
                    </div>

                    <div style="display:flex;align-items:center;justify-content:space-between;padding:12px 16px;border:1px solid #e5e7eb;border-radius:10px;gap:12px;">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <span style="width:36px;height:36px;border-radius:8px;background:#fff1f2;color:#e11d48;display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:700;flex-shrink:0;">&#10005;</span>
                            <div>
                                <div style="font-size:14px;font-weight:600;color:#111827;">{$LANG['setting']["Deletedatabase"]}</div>
                                <div style="font-size:12px;color:#6b7280;margin-top:1px;">{$LANG['setting']['dec-Deletedatabase']}</div>
                            </div>
                        </div>
                        <div onclick="var c=this.querySelector('input[type=checkbox]');c.checked=!c.checked;c.dispatchEvent(new Event('change'))" style="position:relative;display:inline-block;width:40px;height:22px;flex-shrink:0;cursor:pointer;">
                            <input type="hidden" name="Deletedatabase" value="off">
                            <input type="checkbox" name="Deletedatabase" id="Deletedatabase" value="on" {$toggle3} style="opacity:0;width:0;height:0;position:absolute;">
                            <span style="position:absolute;top:0;left:0;right:0;bottom:0;background:{$bg3};border-radius:22px;transition:.3s;pointer-events:none;"></span>
                            <span style="position:absolute;content:'';height:18px;width:18px;left:2px;bottom:2px;background:#fff;border-radius:50%;transition:.3s;transform:{$tx3};box-shadow:0 1px 3px rgba(0,0,0,.15);pointer-events:none;"></span>
                        </div>
                    </div>
                </div>

                <div style="border-top:1px solid #f3f4f6;margin-top:18px;padding-top:16px;display:flex;justify-content:flex-end;">
                    <button type="submit" name="submit" style="display:inline-flex;align-items:center;gap:8px;padding:10px 26px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;border:none;border-radius:8px;font-size:14px;font-weight:600;cursor:pointer;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
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

        <div class="hnv-wrap" style="font-family:inherit;font-size:14px;line-height:1.5;color:#333;max-width:860px;">
            <div style="background:linear-gradient(135deg,#1e1b4b,#312e81);border-radius:12px;padding:20px 24px;margin-bottom:18px;">
                <div style="display:flex;align-items:center;gap:14px;">
                    <div style="width:48px;height:48px;border-radius:12px;background:rgba(255,255,255,.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <div>
                        <div style="font-size:20px;font-weight:700;color:#fff;line-height:1.2;">{$LANG['menu']['aboutanicoweb']}</div>
                        <div style="font-size:13px;color:rgba(255,255,255,.7);">About this module</div>
                    </div>
                </div>
            </div>

            <div style="display:flex;gap:4px;background:#f3f4f6;border-radius:10px;padding:4px;margin-bottom:20px;">
                <a href="{$modulelink}&page=index" style="flex:1;text-align:center;padding:9px 14px;border-radius:8px;text-decoration:none;font-size:13px;font-weight:600;color:#6b7280;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align:middle;margin-right:4px;"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    {$LANG['menu']['setting-email-active']}
                </a>
                <a href="{$modulelink}&page=about" style="flex:1;text-align:center;padding:9px 14px;border-radius:8px;text-decoration:none;font-size:13px;font-weight:600;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align:middle;margin-right:4px;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    {$LANG['menu']['aboutanicoweb']}
                </a>
            </div>

            <div style="background:#fff;border:1px solid #e5e7eb;border-radius:12px;padding:28px 24px;text-align:center;">
                <div style="display:flex;justify-content:center;margin-bottom:16px;">
                    <div style="width:64px;height:64px;border-radius:50%;background:linear-gradient(135deg,#667eea,#764ba2);display:flex;align-items:center;justify-content:center;">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                </div>
                <p style="font-size:15px;line-height:1.8;color:#374151;max-width:600px;margin:0 auto;white-space:pre-line;">{$LANG['about']['Description']}</p>
                <hr style="border:0;border-top:1px solid #f3f4f6;margin:20px 0;">
                <div style="display:flex;justify-content:center;gap:10px;flex-wrap:wrap;">
                    <span style="background:#eef2ff;color:#4f46e5;font-size:12px;font-weight:600;padding:5px 14px;border-radius:20px;display:inline-block;">Version 1.0</span>
                    <span style="background:#f5f3ff;color:#7c3aed;font-size:12px;font-weight:600;padding:5px 14px;border-radius:20px;display:inline-block;">WHMCS Module</span>
                    <span style="background:#ecfdf5;color:#059669;font-size:12px;font-weight:600;padding:5px 14px;border-radius:20px;display:inline-block;">Email Verification</span>
                </div>
            </div>
        </div>
EOF;
    }
}