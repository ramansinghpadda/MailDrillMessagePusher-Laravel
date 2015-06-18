# ManDrillMessagePusher-Laravel
ManDrillMessagePusher is the Laravel 5 service class developed to send mails from Laravel application to reciepents using ManDrill API .


First of all you need to update your composer.json  "mandrill/mandrill": "1.0.*", and run composer update command.

Create MAN_DRILL_API_KEY in confifuration file or .env file and set your mandrill API Key.


then you can simply copy paste ManDrillMessagePusher into services folder under laravel 5 app.

example of usage


$newmail= new ManDrillMessagePusher("mails.default",['message'=>'custome message']);
      $newmail->to=[
                [ 'email' => 'mailtorspadda@gmail.com',
                'name' => 'Raman Singh',
                'type' => 'to']
        ];
        $newmail->from_email='testaccount@gmail.com';
        $newmail->from_name='Test user';
        $newmail->subject="GREAT TEST";
        $newmail->push();


##  mails.default is the template path under resources/views/mails/default.blade.php
