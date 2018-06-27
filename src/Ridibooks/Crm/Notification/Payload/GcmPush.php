<?php
declare(strict_types=1);

namespace Ridibooks\Crm\Notification\Payload;

use Ridibooks\Crm\Notification\Identifier;

class GcmPush implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $u_id;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $message;
    /**
     * @var string
     */
    protected $url;
    /**
     * @var null|Identifier
     */
    protected $identifier;
    /**
     * @var null|string
     */
    protected $image_url;
    /**
     * @var bool
     */
    protected $force_silent;

    /**
     * GCM 페이로드 생성자.
     *
     * @param string $u_id 수신자의 로그인 아이디
     * @param string $title 알림 제목
     * @param string $message 푸시 알림 본문
     * @param string $url 알림을 눌렀을 때 이동할 주소
     * @param string|null $image_url 알림에 포함할 이미지 주소
     * @param Identifier|null $identifier 알림 고유 ID
     * @param bool $force_silent 강제 무음 설정 여부
     */
    public function __construct(
        string $u_id,
        string $title,
        string $message,
        string $url,
        string $image_url = null,
        Identifier $identifier = null,
        bool $force_silent = false
    ) {
        $this->u_id = $u_id;
        $this->title = $title;
        $this->message = $message;
        $this->url = $url;
        $this->image_url = $image_url;
        $this->identifier = $identifier;
        $this->force_silent = $force_silent;
    }

    public function jsonSerialize()
    {
        $json = [
            'u_id' => $this->u_id,
            'title' => $this->title,
            'message' => $this->message,
            'url' => $this->url,
            'force_silent' => $this->force_silent,
        ];

        if ($this->image_url !== null) {
            $json['image_url'] = $this->image_url;
        }
        if ($this->identifier !== null) {
            $json['identifier'] = $this->identifier;
        }

        return $json;
    }
}
