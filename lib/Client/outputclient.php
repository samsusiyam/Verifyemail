<?php

namespace WHMCS\Module\Addon\Verifyemail\Client;
use WHMCS\Database\Capsule;


class outputclient
{

    public function index($vars)
    {
        $iduser = $_SESSION['uid'];
        $getemailclientdata = Capsule::table('tblusers')->where('id', $iduser)->value('email');
        if(isset($_POST['emailedit'])){
            $getemailclient= $_POST['emailedit'];
        }
        else{
            $getemailclient = $getemailclientdata;
        }
        $Get_email_authentication_status = Capsule::table('tblusers')->where('id', $iduser)->value('email_verification_token');
        $email_authentication_status=false;
        if(isset($Get_email_authentication_status)){
            $email_authentication_status=true;
        }
        else{
            $email_authentication_status=  false;
        }
        if(isset($_POST['emailedit'])){
        try {
            $updatedemailtblclients = Capsule::table('tblclients')
                ->where('id', $iduser)
                ->update(
                    [
                        'email' => $_POST['emailedit'],
                    ]
                );
                

            echo "Fixed {$updatedemailtblclients} misspelled last names.";
        } catch (\Exception $e) {
            echo "Failed to update email address. Please try again.";
        }
        try {
            $updatedemailtblusers = Capsule::table('tblusers')
                ->where('id', $iduser)
                ->update(
                    [
                        'email' => $_POST['emailedit'],
                    ]
                );
                

            echo "Fixed {$updatedemailtblusers} misspelled last names.";
        } catch (\Exception $e) {
            echo "Failed to update email address. Please try again.";
        } }

if (isset($_SESSION['uid'])) {
      $login=true;
}

        return array(
            'pagetitle' => 'Email Verification',
            'templatefile' => 'Emailconfirmation',
            'requirelogin' => false,
            'vars' => array(
                'emailclient' => $getemailclient,
                'email_authentication_status' => $email_authentication_status,
            ),
        );
        
    }

}