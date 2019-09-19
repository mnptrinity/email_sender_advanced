<?php
#lets first init the config
###########################
####### init Config #######
###########################

#api key and domain (from mailgun.com panel)
$secretkey='6bbbe45b19ce4afacb6a5cae512ad76b-2ae2c6f3-ffb7d119';
//source domain (you can add your own domain at mailgun panel and use it)
$domain = "sandbox7d8e072ac135473cbf3f734154a2cafc.mailgun.org";

# email options 
$Option['FROM_MAIL']="tech@servitor.in";
$Option['FROM_NAME']="";//any name you want it to appear
$Option['TO_MAIL']="mohansasireka@gmail.com";
$Option['TO_NAME']="Mohan";
$Option['SUBJECT']="message title";
$Option['BODY_TEXT']="here is plain text message";// if html is not supported then use text message instead
$Option['BODY_HTML']="<b style='color:red'>here is html message</b>";


###########################
### Calling mailGun API ###
###########################

# Include the Autoloader
require 'vendor/autoload.php';

# Instantiate the client with option to disable ssl verfication.
$client = new \GuzzleHttp\Client([
    'verify' => false,
]);

# pass the client to Guzzle Adapter
$adapter = new \Http\Adapter\Guzzle6\Client($client);

# pass the Adapter to mailgun object
$mailgun = new \Mailgun\Mailgun($secretkey, $adapter);



# Make the call to the client.
$result = $mailgun->sendMessage($domain, array(
    'from'    => $Option['FROM_NAME'].$nam." <".$Option['FROM_MAIL'].">",
    'to'      => $Option['TO_NAME']." <".$Option['TO_MAIL'].">",
    'subject' => $Option['SUBJECT'],
    'text'    => $Option['BODY_TEXT'],
    'html'    => $Option['BODY_HTML'],
));
# result will return as object //lets test it
var_dump($result);