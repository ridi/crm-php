<?php
declare(strict_types=1);

namespace Ridibooks\Crm\Notification\Payload;

use Ridibooks\Crm\Notification\Identifier;

class BulkApnsPush implements \JsonSerializable
{
    /**
     * @var string[]
     */
    private $u_ids;
    /**
     * @var string
     */
    private $message;
    /**
     * @var string
     */
    private $url;
    /**
     * @var Identifier|null
     */
    private $identifier;
    /**
     * @var bool
     */
    private $force_silent;

    /**
     * APNS 페이로드 생성자.
     *
     * @param string[] $u_ids 수신자의 로그인 아이디 배열
     * @param string $message 푸시 알림 본문
     * @param string $url 알림을 눌렀을 때 이동할 주소
     * @param Identifier|null $identifier 알림 고유 ID
     * @param bool $force_silent 강제 무음 설정 여부
     */
    public function __construct(
        array $u_ids,
        string $message,
        string $url,
        Identifier $identifier = null,
        bool $force_silent = false
    ) {
        $this->u_ids = $u_ids;
        $this->message = $message;
        $this->url = $url;
        $this->identifier = $identifier;
        $this->force_silent = $force_silent;
    }

    public function jsonSerialize()
    {
        $json =  [
            'u_ids' => $this->u_ids,
            'message' => $this->message,
            'url' => $this->url,
            'force_silent' => $this->force_silent,
        ];

        if ($this->identifier !== null) {
            $json['identifier'] = $this->identifier;
        }

        return $json;
    }
}
