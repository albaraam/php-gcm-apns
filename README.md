# albaraam/php-gcm-apns

A PHP Library for sending messages to devices (Android & IOS) through GCM and Apns (respectively).


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```json
composer require albaraam/php-gcm-apns "~1.0.0"
```

or add

```json
"albaraam/php-gcm-apns": "~1.0.0"
```

to the `require` section of your composer.json.


Usage
------------

```php

use albaraam\gcmapns\Message;
use albaraam\gcmapns\Client;

// Message creation
$message = new Message("Title","Body");

// Common attributes for both ios and android
$message
	->setTitle("Title")
	->setBody("Body")
	->setSound("sound.mp3")
	->setData(['foo'=>'bar']);

// Android specific attributes
$message->android
	->setTo("ids")
	->setIcon("icon")
	->setCollapseKey("collapse_key")
	->setColor("#333");

// IOS specific attributes
$message->ios
	->setTo("ids")
	->setSound("sound_ios.mp3") // custom sound for ios
	->setBadge(3);

// Client
$client = new Client("google_api_key","path/to/pem/file",Client::IOS_IOS_ENVIRONMENT_SANDBOX);

// configure client
$client->setIosPassphrase("passphrase");
...

// Send message
$client->send($message);

```


Usage: Advanced Example
-----------------------

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
	->setBadge(3)
	->setActionLocKey("");

$client = new Client("google_api_key","path/to/pem/file",Client::IOS_IOS_ENVIRONMENT_SANDBOX);
$client->setIosPassphrase("passphrase");

$client->sendAndroid($message)) // send for android devices only
$client->sendIOS($message)) // send for ios devices only
// $client->send($message)) // send for both ios & android devices

```