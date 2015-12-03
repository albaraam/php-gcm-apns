# albaraam/php-gcm-apns

A PHP Library for sending messages to devices (Android & IOS) through GCM and Apns (respectively).


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

add

```json
"albaraam/php-gcm-apns": "dev-master"
```

to the `require` section of your composer.json.


Usage
------------

```php

use albaraam\gcmapns\Message;
use albaraam\gcmapns\Client;

$message = new Message("Title","Body");

$message
	->setTitle("Title")
	->setBody("Body")
	->setPriority(5) // 5 or 10
	->setContentAvailable(true)
	->setDryRun(false)
	->setClickAction("") // same as Category
	->setCategory("") // same as ClickAction
	->setTitleLocKey("")
	->setTitleLocArgs("")
	->setBodyLocKey("")
	->setBodyLocArgs("")
	->setSound("sound.mp3")
	->setData(['foo'=>'bar']);


$message->android
	->setTo("ids")
	->setIcon("icon")
	->setCollapseKey(true)
	->setDelayWhileIdle(true)
	->setTimeToLive(3600)
	->setRestrictedPackageName("")
	->setTag("")
	->setColor("#333");

$message->ios
	->setTo("ids")
	->setLaunchImage("")
	->setBadge(3);

$client = new Client("google_api_key","path/to/pem/file","passphrase");
$client->setIOSEnvironment(Client::IOS_ENVIRONMENT_SANDBOX);



$client->

$notification = new GCMNotification("Title","Body");
$notification
	->setIcon("noti")
	->setSound("water.mp3");
.....

$message = new GCMMessage($notification, "ids"); // "ids" field can contain a array/single registration token or a topic key
$message
	->setData(['foo'=>'bar', 'baz'=>[1,2,3]])
	->setCollapseKey("collapse-key-1");
.....

$gcm = new GCMClient("YOUR_API_KEY"); 
$response = $gcm->send($message);

var_dump($response);

```