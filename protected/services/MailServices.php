<?php

/**
 * Created by PhpStorm.
 * User: luckymancvp
 * Date: 1/12/15
 * Time: 2:18 AM
 */
class MailServices
{
    /**
     * @param $user Users
     * @return bool
     */
    public static function sendRegisterMail($user)
    {
        $message = Yii::app()->controller->renderPartial('/mail/register', array('user'=>$user), true, false);

        $mail=Yii::app()->Smtpmail;
        $mail->SetFrom('admin@bantraffic.com', 'Bantraffic.com');
        $mail->Subject    = '[Bantraffic.com] Đăng ký thành công';
        $mail->MsgHTML($message);
        $mail->AddAddress($user->email, $user->email);
        if (!$mail->Send()) {
            $mail->ClearAddresses();
            return false;
        } else {
            $mail->ClearAddresses();
            return true;
        }
    }

    /**
     * @param $order Orders
     * @return bool
     */
    public static function sendPrePaymentMail($order)
    {
        $setting = Settings::getConfig();

        $user = $order->user;
        $message = Yii::app()->controller->renderPartial('/mail/pre', array('order'=>$order, ), true, false);

        $mail=Yii::app()->Smtpmail;
        $mail->SetFrom('admin@santhuexehanoi.com', 'Sàn Thuê Xe Hà Nội');
        $mail->Subject    = '[Santhuexehanoi.com] Đặt hàng thành công';
        $mail->MsgHTML($message);
        $mail->AddAddress($user->email, $user->email);
        $mail->AddAddress($setting->email, $setting->email);
        if (!$mail->Send()) {
            $mail->ClearAddresses();
            return false;
        } else {
            $mail->ClearAddresses();
            return true;
        }
    }

    /**
     * @param $model ContactForm
     * @return bool
     */
    public static function sendContactMail($model)
    {
        $mail=Yii::app()->Smtpmail;
        $mail->SetFrom($model->email, $model->name);
        $mail->Subject    = $model->subject;
        $mail->MsgHTML($model->body);

        $setting = Settings::getConfig();
        $mail->AddAddress($setting->email, $setting->email);
        if (!$mail->Send()) {
            $mail->ClearAddresses();
            return false;
        } else {
            $mail->ClearAddresses();
            return true;
        }
    }

    /**
     * @param Users $user
     * @return bool
     */
    public static function sendForgotMail($user)
    {
        $message = Yii::app()->controller->renderPartial('/mail/forgot', array('user'=>$user), true, false);

        $mail=Yii::app()->Smtpmail;
        $mail->SetFrom('admin@santhuexehanoi.com', 'Sàn Thuê Xe Hà Nội');
        $mail->Subject    = '[Santhuexehanoi.com] Gửi Lại Password';
        $mail->MsgHTML($message);
        $mail->AddAddress($user->email, $user->email);
        if (!$mail->Send()) {
            $mail->ClearAddresses();
            return false;
        } else {
            $mail->ClearAddresses();
            return true;
        }
    }

    public static function sendLog($emailTo, $model)
    {
        
    }

}