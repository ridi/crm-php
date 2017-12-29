<?php
declare(strict_types=1);

namespace Ridibooks\Crm\Notification\Payload;

class ApnsPush implements \JsonSerializable
{
    private $u_id;
    private $message;
    private $url;
    private $push_id;

    /**
     * APNS 페이로드 생성자.
     *
     * @param string $u_id 수신자의 로그인 아이디
     * @param string $message 푸시 알림 본문
     * @param string $url 알림을 눌렀을 때 이동할 주소
     * @param string|null $push_id {@see MessageType}:ID:{@see Tag} 형태의 푸시 캠페인 ID
     */
    public function __construct(string $u_id, string $message, string $url, string $push_id = null)
    {
        $this->u_id = $u_id;
        $this->message = $message;
        $this->url = $url;
        $this->push_id = $push_id;
    }

    public function jsonSerialize()
    {
        $json =  [
            'u_id' => $this->u_id,
            'message' => $this->message,
            'url' => $this->url,
        ];

        if ($this->push_id !== null) {
            $json['push_id'] = $this->push_id;
        }

        return $json;
    }
}
