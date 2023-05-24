<?php

class MY_Security extends CI_Security {

    public function __construct()
    {
        parent::__construct();      
    }

    public function csrf_show_error()
    {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            $addurl = '/'.'speedybank.net/'; 
        }else{
            $addurl = '/'; 
        }

        $base_url = (@$_SERVER['HTTPS'] == 'on') ? 'https://'.$_SERVER['HTTP_HOST'].'/' : 'http://'.$_SERVER['HTTP_HOST'].$addurl;
        $linkurl = "$_SERVER[REQUEST_URI]";
        
        // Start Check Condition Direct Page CSRF 

        // Login
        if(strstr($linkurl, 'auth/login'))
        {
            header('Location: ' . $base_url . 'homepage');
        }
        // Registrasi
        if(strstr($linkurl, 'auth/signup'))
        {
            header('Location: ' . $base_url . 'auth/signup_notif');
        }
        // Findme
        if(strstr($linkurl, 'link/findcategory') || strstr($linkurl, 'link/findbusiness') )
        {
            header('Location: ' . $base_url . 'link/findme?findme=MQ==');
        }
        // Contact Us Landingpage
        if(strstr($linkurl, 'link/send_message'))
        {
            header('Location: ' . $base_url . '#technology' );
        }        

        /* ========= START ADMIN AREA ========= */
        // Wallet Send
        if(strstr($linkurl, 'wallet/admin_confirm') || strstr($linkurl, 'wallet/admin_notif'))
        {
            header('Location: ' . $base_url . 'admin/sendwallet');
        }
        // Swap
        if(strstr($linkurl, 'admin/swap/admin_confirm') || strstr($linkurl, 'admin/swap/admin_notif'))
        {
            header('Location: ' . $base_url . 'admin/swap');
        }
        /* ========= END ADMIN AREA ========= */


        /* ========= START MEMBER AREA ========= */
        // Topup Local
        if(strstr($linkurl, 'receive/localbank_confirm') || strstr($linkurl, 'receive/localbank_notif'))
        {
            header('Location: ' . $base_url . 'receive/localbank');
        }
        // Topup International
        if(strstr($linkurl, 'receive/interbank_confirm') || strstr($linkurl, 'receive/interbank_notif'))
        {
            header('Location: ' . $base_url . 'receive/interbank');
        }
        // Wallet Send
        if(strstr($linkurl, 'wallet/send_confirm') || strstr($linkurl, 'wallet/send_notif'))
        {
            header('Location: ' . $base_url . 'wallet/send');
        }
        // Wallet Request
        if(strstr($linkurl, 'wallet/request_qrcode'))
        {
            header('Location: ' . $base_url . 'wallet/request');
        }
        // toBank Local
        if(strstr($linkurl, 'bank/bankconfirm') || strstr($linkurl, 'bank/banknotif'))
        {
            header('Location: ' . $base_url . 'bank');
        }
        // Swap
        if(strstr($linkurl, 'swap/confirm') || strstr($linkurl, 'swap/notif'))
        {
            header('Location: ' . $base_url . 'swap');
        }
        // Card Available
        if(strstr($linkurl, 'card/topupconfirm'))
        {
            header('Location: ' . $base_url . 'card/topupcard ');
        }
        if(strstr($linkurl, 'card/topupproses'))
        {
            header('Location: ' . $base_url . 'card ');
        }
        // Card Unavaiilable Req Virtual    
        if(strstr($linkurl, 'card/activecard'))
        {
            header('Location: ' . $base_url . 'card/requestcard?requestcard=dmlydHVhbA==');
        }
        // Card Unavaiilable Req Physical
        if(strstr($linkurl, 'card/shipping') || strstr($linkurl, 'card/cardsecurity') || strstr($linkurl, 'card/summary'))
        {
            header('Location: ' . $base_url . 'card/requestcard_physical?requestcard_physical=cmVxdWVzdGNhcmRfcGh5c2ljYWw=');
        }
        /* ========= END MEMBER AREA ========= */

        // End Check Condition Direct Page CSRF 
    }
}