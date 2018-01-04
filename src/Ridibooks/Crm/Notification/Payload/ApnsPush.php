<?php
declare(strict_types=1);

namespace Ridibooks\Crm\Notification\Payload;

use Ridibooks\Crm\Notification\Identifier;

class ApnsPush implements \JsonSerializable
{
    private $u_id;
    private $message;
    private $url;
    private $identifier;

    /**
     * APNS 페이로드 생성자.
     *
     * @param string $u_id 수신자의 로그인 아이디
     * @param string $message 푸시 알림 본문
     * @param string $url 알림을 눌렀을 때 이동할 주소
     * @param Identifier|null $identifier 알림 고유 ID
     */
    public function __construct(string $u_id, string $message, string $url, Identifier $identifier = null)
    {
        $this->u_id = $u_id;
        $this->message = $message;
        $this->url = $url;
        $this->identifier = $identifier;
    }

    public function jsonSerialize()
    {
        $json =  [
            'u_id' => $this->u_id,
            'message' => $this->message,
            'url' => $this->url,
        ];

        if ($this->identifier !== null) {
            $json['type'] = $this->identifier->message_type;
            $json['id'] = $this->identifier->message_id;
            $json['tag'] = $this->identifier->tag;
        }

        return $json;
    }
}
