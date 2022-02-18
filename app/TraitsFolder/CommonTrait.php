<?php

namespace App\TraitsFolder;

use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\GeneralSetting;
use App\InteractionsLog;
use Sentinel;
trait CommonTrait
{

    public function getRealIpAddr()
    {
        /*if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }*/
        $ip = (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : ((isset($_SERVER['HTTP_CLIENT_IP'])) ? $_SERVER['HTTP_CLIENT_IP'] : $_SERVER['REMOTE_ADDR']);
        return $ip;
    }

    public function sendContact($email,$name,$subject,$text,$phone)
    {
        $basic = GeneralSetting::first();
        $body = $basic->email_body;
        $footer = $basic->footer;

        $mail_val = [
            'email' => $email,
            'name' => $name,
            'g_email' => $basic->office_email,
            'g_title' => $basic->title,
            'subject' => 'Contact Message - '.$subject,
        ];
        Config::set('mail.from',$basic->office_email);
        Config::set('mail.name',$basic->title);



        $body = $basic->email_body;
        $body = str_replace("Hi",'Hi. I\'m',$body);
        $body = str_replace("{{name}}",$name." - ".$phone,$body);
        $body = str_replace("{{message}}",$text,$body);
        $body = str_replace("{{footer}}",$footer,$body);

        Mail::send('emails.email', ['body'=>$body], function ($m) use ($mail_val) {
            $m->from($mail_val['email'], $mail_val['name']);
            $m->to($mail_val['g_email'], $mail_val['g_title'])->subject($mail_val['subject']);
        });
    }
    
    public function sendWithEmail($email,$name,$frindsMail,$text,$url)
    {
        $basic = GeneralSetting::first();
        $body = $basic->email_body;
        $footer = $basic->title;

        $mail_val = [
            'email' => $email,
            'name' => $name,
            'g_email' => $frindsMail,
        ];
        
        Config::set('mail.from',$frindsMail);
        Config::set('mail.name',$basic->title);

        $body = $basic->email_body;
        $body = str_replace("Hi",'Hi. I\'m',$body);
        $body = str_replace("{{name}}",$name,$body);
        $body = str_replace("{{message}}",$text."<br> <a href=".$url.">".$url."<a>",$body);
        $body = str_replace("{{footer}}",$footer,$body);

        Mail::send('emails.email', ['body'=>$body], function ($m) use ($mail_val) {
            $m->from($mail_val['email'], $mail_val['name']);
            $m->to($mail_val['g_email'])->subject('Listing Item From Friend');;
        });
    }
    
   public function sendWithPublisher($email,$name,$frindsMail,$text,$url,$addId,$visitor_id)
    {
        $basic = GeneralSetting::first();
        $body = $basic->email_body;
        $footer = $basic->title;

        $mail_val = [
            'email' => $email,
            'name' => $name,
            'g_email' => $frindsMail,
        ];
        
        Config::set('mail.from',$frindsMail);
        Config::set('mail.name',$basic->title);

        $body = $basic->email_body;
        $body = str_replace("Hi",'Hi. I\'m',$body);
        $body = str_replace("{{name}}",$name,$body);
        $body = str_replace("{{message}}",$text."<br> <a href=".$url.">".$url."<a>",$body);
        $body = str_replace("{{footer}}",$footer,$body);

        Mail::send('emails.email', ['body'=>$body], function ($m) use ($mail_val) {
            $m->from($mail_val['email'], $mail_val['name']);
            $m->to($mail_val['g_email'])->subject('Email for Listing Item From User');;
        });

        $ip = $this->getRealIpAddr();

        $api = "http://api.ipstack.com/$ip?access_key=584c48b9c47fe2bb871a6b26d82db7fb";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($output);

        $rr['ip'] = $ip;
        $rr['email_from'] = $email;
        $rr['message'] = $text;
        $rr['name_from'] = $name;
        $rr['user_id'] = $visitor_id;
        $rr['latitude'] =$obj->latitude;
        $rr['longitude'] = $obj->longitude;
        $rr['addlist_id'] = $addId;

        InteractionsLog::create($rr);


    }


    public function userPasswordReset($email,$name,$route)
    {
        $basic = GeneralSetting::first();
        $mail_val = [
            'email' => $email,
            'name' => $name,
            'g_email' => $basic->office_email,
            'g_title' => $basic->title,
            'subject' => 'Password Reset Request',
        ];
 
        Config::set('mail.from',$basic->office_email);
        Config::set('mail.name',$basic->title);

        $reset = DB::table('password_resets')->whereEmail($email)->count();
        $token = Str::random(40);
        $bToken = bcrypt($token);
        $url = route($route,$token);

        if ($reset == 0){
            DB::table('password_resets')->insert(
                ['email' => $email, 'token' => $bToken]
            );
            Mail::send('emails.reset-email', ['name' => $name,'link'=>$url,'footer'=>$basic->footer], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_title']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            });
        }else{
            DB::table('password_resets')
                ->where('email', $email)
                ->update(['email' => $email, 'token' => $bToken]);
            Mail::send('emails.reset-email', ['name' => $name,'link'=>$url,'footer'=>$basic->footer], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_title']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            });
logger('Hello');
            $fail = Mail::failures();
            if(!empty($fail)) {
                throw new \Exception('Could not send message to '.$fail[0]);
            }
        }
    }

    public function sendCouponEmail($receiverName, $receiverEmail, $mailSubject, $mailBody) {
        $basic = GeneralSetting::first();
        $footer = $basic->title;

        $mail_val = [
            'email' => $basic->office_email,
            'name' => $basic->title,
            'g_email' => $receiverEmail,
            'subject' => $mailSubject,
        ];

        Config::set('mail.from', $mail_val['email']);
        Config::set('mail.name', $mail_val['name']);

        $body = $basic->email_body;
        $body = str_replace("{{name}}", $receiverName, $body);
        $body = str_replace("{{message}}", $mailBody, $body);
        $body = str_replace("{{footer}}", $footer, $body);

        Mail::send('emails.email', ['body' => $body], function ($m) use ($mail_val) {
            $m->from($mail_val['email'], $mail_val['name']);
            $m->to($mail_val['g_email'])->subject($mail_val['subject']);
        });
    }


    public function randString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}