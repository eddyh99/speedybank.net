<?php
function apitrackless($url, $postData = NULL)
{
    $token = "be68YFkvztcaQGLNIXxPdA2jf3uUC79HgVBMW4KsmhwTJDSZEy";

    $ch     = curl_init($url);
    $headers    = array(
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
    );

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    $result = json_decode(curl_exec($ch));
    curl_close($ch);
    return $result;
}

function balance($userid, $currency)
{
    $balance = apitrackless(
        URLAPI . "/v1/member/wallet/getBalance?currency=" . $currency . "&userid=" . $userid
    )->message->balance;
    return $balance;
}

function balanceadmin($currency)
{
    $balance = apitrackless(
        URLAPI . "/v1/admin/wallet/balance_ByCurrency?currency=" . $currency
    )->message->balance;
    return $balance;
}

function rounddown($balance){
    return floor($balance*100)/100;
}

function max_sendtowallet($balance,$currency){
    $mfee = apitrackless(URLAPI . "/v1/admin/fee/getFee?currency=" . $currency);
    $mcost = apitrackless(URLAPI . "/v1/admin/cost/getCost?currency=" . $currency);
    
    $feefxd = $mfee->message->wallet_sender_fxd;
    $feepct = $mfee->message->wallet_sender_pct;
    $refpct = $mfee->message->referral_send_pct;
    $reffxd = $mfee->message->referral_send_fxd;
    $costfxd = $mcost->message->wallet_sender_fxd;
    $costpct = $mcost->message->wallet_sender_pct;

    $fee  = ($balance*$feepct)+$feefxd;
    $ref  = ($balance*$refpct)+$reffxd;
    $cost = ($balance*$costpct)+$costfxd;
    $return = $balance - $fee-$ref-$cost;

    if ($return <= 0) {
        $return = 0;
    }

    return substr(number_format($return,4),0,-2);
}

function sendmail($email, $subject, $message, $phpmailer)
{
    $mail = $phpmailer;

    $mail->isSMTP();
    $mail->Host         = HOST_EMAIL;
    $mail->SMTPAuth     = true;
    $mail->Username     = USERNAME_EMAIL;
    $mail->Password     = PASS_EMAIL;
    $mail->SMTPAutoTLS	= false;
    $mail->SMTPSecure	= false;
    $mail->Port			= 587;

    $mail->setFrom(USERNAME_EMAIL, 'SpeedyBank');
    $mail->isHTML(true);

    $mail->ClearAllRecipients();


    $mail->Subject = $subject;
    $mail->AddAddress($email);

    $mail->msgHTML($message);
    $mail->send();
}


function send_email($email, $message, $phpmailer)
{
    $mail = $phpmailer;
    
    $mail->isSMTP();
    $mail->Host         = HOST_EMAIL;
    $mail->SMTPAuth     = true;
    $mail->Username     = USERNAME_EMAIL;
    $mail->Password     = PASS_EMAIL;
    $mail->SMTPAutoTLS  = true;
    $mail->SMTPSecure   = "tls";
    $mail->Port         = 587;
    // $mail->SMTPDebug    = 2;
    $mail->SMTPOptions = array(
        'ssl'   => array(
            'verify_peer'           => false,
            'verify_peer_name'      => false,
            'allow_self_signed'     => false,

        )
    );
    
    $mail->setFrom(USERNAME_EMAIL, 'SpeedyBank Bank Notification');
    $mail->addReplyTo($email);
    $mail->isHTML(true);
    
    $mail->ClearAllRecipients();
    
    $mail->Subject = 'Ask about SpeedyBank';
    $mail->AddAddress('roberto-info@tracklessmail.com');
    $mail->AddAddress('m3rc4n73@gmail.com');
    
    $mail->msgHTML($message);
    $mail->send();
}



function send_email_admin($email, $subject, $message, $phpmailer)
{
    $mail = $phpmailer;

    $mail->isSMTP();
    $mail->Host         = HOST_EMAIL;
    $mail->SMTPAuth     = true;
    $mail->Username     = USERNAME_EMAIL;
    $mail->Password     = PASS_EMAIL;
    $mail->SMTPAutoTLS  = false;
    $mail->SMTPSecure   = false;
    $mail->Port         = 587;

    $mail->setFrom(USERNAME_EMAIL, 'SpeedyBank Service');
    $mail->isHTML(true);

    $mail->ClearAllRecipients();

    $mail->Subject = $subject;
    foreach ($email as $dt) {
        $mail->AddAddress($dt);
    }

    $mail->msgHTML($message);
    $mail->send();
}