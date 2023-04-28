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
        elseif(strstr($linkurl, 'auth/signup'))
        {
            header('Location: ' . $base_url . 'auth/signup_notif');
        }
        // Findme
        elseif(strstr($linkurl, 'link/findcategory') || strstr($linkurl, 'link/findbusiness') )
        {
            header('Location: ' . $base_url . 'link/findme?findme=MQ==');
        }
        // Contact Us Landingpage
        elseif(strstr($linkurl, 'link/send_message'))
        {
            header('Location: ' . $base_url . '#technology' );
        }
        // Wallet Send
        elseif(strstr($linkurl, 'wallet/send_confirm') || strstr($linkurl, 'wallet/send_notif'))
        {
            header('Location: ' . $base_url . 'wallet/send');
        }
        // Wallet Request
        elseif(strstr($linkurl, 'wallet/request_qrcode'))
        {
            header('Location: ' . $base_url . 'wallet/request');
        }
        // toBank Local
        elseif(strstr($linkurl, 'bank/bankconfirm') || strstr($linkurl, 'bank/banknotif'))
        {
            header('Location: ' . $base_url . 'bank');
        }
        // Swap
        elseif(strstr($linkurl, 'swap/confirm') || strstr($linkurl, 'swap/notif'))
        {
            header('Location: ' . $base_url . 'swap');
        }
        // Card Available
        elseif(strstr($linkurl, 'card/topupconfirm'))
        {
            header('Location: ' . $base_url . 'card/topupcard ');
        }
        elseif(strstr($linkurl, 'card/topupproses'))
        {
            header('Location: ' . $base_url . 'card ');
        }
        // Card Unavaiilable Req Virtual    
        elseif(strstr($linkurl, 'card/activecard'))
        {
            header('Location: ' . $base_url . 'card/requestcard?requestcard=dmlydHVhbA==');
        }
        // Card Unavaiilable Req Physical
        elseif(strstr($linkurl, 'card/shipping') || strstr($linkurl, 'card/cardsecurity') || strstr($linkurl, 'card/summary'))
        {
            header('Location: ' . $base_url . 'card/requestcard_physical?requestcard_physical=cmVxdWVzdGNhcmRfcGh5c2ljYWw=');
        }

        // End Check Condition Direct Page CSRF 
    }
}