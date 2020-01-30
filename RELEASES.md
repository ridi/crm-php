Version 2.0.0 (2020-01-30)
==========================
- Ridibooks\Crm\Client::getQueueStatusAsync 제거
- Ridibooks\Crm\Client::getQueueStatus 제거
- Ridibooks\Crm\Status::QueueStatusType 제거
- Ridibooks\Crm\Status\Response::QueueStatusResponse 제거

Version 1.0.0 (2018-10-29)
==========================
- PHP 7.0 지원 중단
- 재시도 핸들러가 동작하지 않는 버그 수정

Version 0.5.0 (2018-10-02)
==========================
- CRM API 서버 큐 상태 확인 API 추가

Version 0.4.4 (2018-08-13)
==========================
- 테스트 케이스 추가, 재시도 핸들러 버그 픽스

Version 0.4.3 (2018-08-01)
==========================
- 기본 재시도 핸들러를 사용할 수 있는 `createWithDefaultRetry`가 추가되었습니다.

Version 0.4.2 (2018-07-31)
==========================
- 기다무 `MessageType`, `Tag`가 추가되었습니다.

Version 0.4.1 (2018-06-27)
==========================
- 앱푸시 대량발송을 위한 `BulkPayload`가 기존 앱푸시 페이로드를 상속합니다.. 

Version 0.4.0 (2018-06-26)
==========================
- 앱푸시 대량발송을 위한 `BulkPayload`(`BulkGcmPush`, `BulkApnsPush`)가 추가되었습니다. 

Version 0.3.2 (2018-04-04)
==========================
- `Tag::createFromBid` 함수가 추가되었습니다.

Version 0.3.0 (2018-01-23)
==========================

- `Ridibooks\Crm\Client`와 `GuzzleHttp\Client`의 생성자가 서로 호환됩니다.
- APNS 무음 푸시 페이로드를 만들 수 있습니다. 알림 페이로드 생성자를 참고하세요.

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
