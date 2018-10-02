# Ridibooks CRM API PHP SDK

[![Packagist](https://img.shields.io/packagist/v/ridibooks/crm.svg)](https://packagist.org/packages/ridibooks/crm)
[![travis ci](https://travis-ci.org/ridi/crm-php.svg?branch=master)](https://travis-ci.org/ridi/crm-php)

## Introduction
CRM API PHP SDK provide client of CRM API Server used in RIDI.  
This library uses [guzzlehttp/guzzle](https://github.com/guzzle/guzzle) as HTTP Client

## Install
```sh
composer require ridibooks/crm
```

## Usage
To send a message with CRM API server

```php
use Ridibooks\Crm\Client;
use Ridibooks\Crm\Notification\Identifier;
use Ridibooks\Crm\Notification\ImageType;
use Ridibooks\Crm\Notification\MessageType;
use Ridibooks\Crm\Notification\Payload\ApnsPush;
use Ridibooks\Crm\Notification\Payload\Email;
use Ridibooks\Crm\Notification\Payload\GcmPush;
use Ridibooks\Crm\Notification\Payload\NotificationCenterMessage;
use Ridibooks\Crm\Notification\Tag;

$client = new Client();
$client_with_retry_handler = Client::createWithDefaultRetry();

$identifier = new Identifier(MessageType::CMS, 'campaign-id', [Tag::CMS]);
$landing_url = 'https://ridibooks.com';
$user_id = 'u_id';
$message = '십오야 최대 4만 포인트 증정!';
$icon = 'https://active.ridibooks.com/ridibooks_noti_icon/icon_noti_15ya.png';

$expire_at = ((new \DateTime())->getTimestamp() + 3600) * 1000;
$notification_center_message = new NotificationCenterMessage(
    [$user_id],
    $identifier,
    $message,
    $icon,
    ImageType::ICON,
    $landing_url,
    $expire_at
);
$client->sendNotificationCenterMessage($notification_center_message);

$force_silent = true;
$apns_push = new ApnsPush($user_id, $message, $landing_url, $identifier, $force_silent);
$response = $client->sendApnsPush($apns_push);
echo $response->getStatusCode();

$title = '최대 4만원 포인트 혜택';
$gcm_push = new GcmPush($user_id, $title, $message, $landing_url, $icon, $identifier, $force_silent);
$response = $client->sendGcmPush($gcm_push);
echo $response->getStatusCode();

$from = '리디북스 <no-reply@ridibooks.com>';
$to = 'to@example.com';

$subject = '최대 4만원 포인트 혜택';
$html = '<h1>%recipient.greeting%</h1><p>hello world</p>';
$cc = 'cc@example.com';
$bcc = 'bcc@exmaple.com';
$recipient_variables = [
    'to@example.com' => ['greeting' => '안녕하세요'],
    'cc@example.com' => ['greeting' => 'hello'],
    'bcc@example.com' => ['greeting' => 'guten tag'],
];
$email = new Email($from, [$to], $subject, $html, $identifier, $recipient_variables, [$cc], [$bcc]);
$response = $client->sendEmail($email);
echo $response->getStatusCode();

$response = $client->getQueueStatus();
echo $response->getQueueStatus();
echo implode(',', $response->getNameOfQueues());
```

### CRM API SDK release steps

1. Create `release/{version}` branch.
1. Update `RELEASES.md`.
1. Commit & push all the changes and make a pull request.
1. After PR, tag a new release in github. This will release a new version in Packagist.
