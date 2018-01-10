Version 0.2.0 (2018-01-10)
==========================

- 알림 발송과 관련된 상수 클래스와 API 클라이언트를 제공합니다.

  ```php
  use Ridibooks\Crm\Client;
  use Ridibooks\Crm\Notification\Identifier;
  use Ridibooks\Crm\Notification\MessageType;
  use Ridibooks\Crm\Notification\Payload\ApnsPush;
  use Ridibooks\Crm\Notification\Tag;

  $identifier = new Identifier(MessageType::CMS, '5735', [Tag::CMS]);
  $payload = new ApnsPush(
      'limeburst',
      '지금 PAPER PRO 사전 예약하고 특별 혜택 받으세요!',
      'https://paper.ridibooks.com/Reservation',
      $identifier
  );

  $client = new Client();
  $res = $client->sendApnsPush($payload);
  ```
  
  [CRM API 스펙 문서](http://api.dev.ridi.io/crm/crm.html)를 참고해 주세요.

Version 0.1.0 (2017-11-13)
==========================

- 다음 두 상수 타입을 제공합니다:
  - `Ridibooks\Bi\Crm\RegularCoupon\RegularComicRentCouponConstant`
  - `Ridibooks\Bi\Notification\DarTypeConst`
