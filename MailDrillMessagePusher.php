<?php namespace App\Services;
/**
 * MailDrillMessagePusher Class
 * Send Mail using MailDrill API push system
 */
class MailDrillMessagePusher
{
     public $template=null;
     public $html=null;
     public $text=null;
     public $subject=null;
     public $from_name=null;
     public $from_email=null;
     public $to=[];
     public $replyTo=null;
     public $important=false;
     public $track_opens=null;
     public $track_clicks=null;
     public $auto_text=null;
     public $auto_html=null;
     public $inline_css=null;
     public $url_strip_qs=null;
     public $preserve_recipients=null;
     public $view_content_link=null;
     public $bcc_address=null;
     public $tracking_domain=null;
     public $signing_domain=null;
     public $return_path_domain=null;
     public $merge=true;
     public $merge_language='mailchimp';
     
     /**
      * 
      * @param type $tempatePath
      * @param type $templateData
      */
     public function __construct($tempatePath=null,$templateData=array()) {
            $this->html=view($tempatePath,$templateData)->render();
     }
    
     
     public function push()
     {
         try 
         {
            $mandrill = new \Mandrill(env('MAN_DRILL_API_KEY'));
            $message = array(
                'html' => $this->html,
                'text' => $this->text,
                'subject' => $this->subject,
                'from_email' => $this->from_email,
                'from_name' => $this->from_name,
                'to' =>$this->to,
                'headers' => array('Reply-To' => $this->replyTo),
                'important' => $this->important,
                'track_opens' => $this->track_opens,
                'track_clicks' => $this->track_clicks,
                'auto_text' => $this->auto_text,
                'auto_html' => $this->auto_html,
                'inline_css' => $this->inline_css,
                'url_strip_qs' => $this->url_strip_qs,
                'preserve_recipients' => $this->preserve_recipients,
                'view_content_link' => $this->view_content_link,
                'bcc_address' => $this->bcc_address,
                'tracking_domain' => $this->tracking_domain,
                'signing_domain' => $this->signing_domain,
                'return_path_domain' => $this->return_path_domain,
                'merge' => $this->merge,
                'merge_language' => 'mailchimp',
    );
    $async = false;
    $ip_pool = 'Main Pool';
  
    $mandrill->messages->send($message, $async, $ip_pool);
    return true;
    }
     catch(Mandrill_Error $e) {
        return false;
    }
     }        
    
}

