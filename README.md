# Verifyemail

A WHMCS module for email verification.

## Features

- Force users to verify email before placing orders
- Restrict page access for unverified users
- Auto-redirect unverified users to verification page
- Option to delete database table on deactivation

## Installation

1. Download the plugin file.
2. Upload the file to your WHMCS hosting.
3. Extract the file in your WHMCS installation path.
4. Go to your WHMCS admin panel > Setup > Addon Modules.
5. Activate the **Email Verification** module, click Configure, enable **Full Administrator** access, and save.
6. Go to Addons > Email Verification to configure the module.

## Configuration

### Settings Page

- **Require Email Confirmation** - Prevents users from placing orders without a verified email.
- **Restrict Page Access** - Redirects unverified users to the verification page.
- **Delete Database on Deactivation** - Removes the plugin database table when the module is deactivated.

> **Note:** If the user's email is incorrect, they can change it on the verification page.

## Support

For support, visit [HosT NIbo](https://hostnibo.com).
