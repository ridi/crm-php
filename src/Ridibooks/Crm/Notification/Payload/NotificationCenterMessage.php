<?php
declare(strict_types=1);

namespace Ridibooks\Crm\Notification\Payload;

use Ridibooks\Crm\Notification\Identifier;

class NotificationCenterMessage implements \JsonSerializable
{
    /**
     * @var array|string[]
     */
    private $u_ids;
    /**
     * @var Identifier
     */
    private $identifier;
    /**
     * @var string
     */
    private $message;
    /**
     * @var string
     */
    private $image_url;
    /**
     * @var string
     */
    private $image_type;
    /**
     * @var string
     */
    private $landing_url;
    /**
     * @var int
     */
    private $expire_at;

    /**
     * 알림센터 메시지 페이로드 생성자.
     *
     * ($type, $id)의 쌍이 알림의 고유 식별자가 됩니다.
     * 따라서 ($type, $id) 쌍이 같은 알림을 두 번 보내면 overwrite가 일어나기 때문에 주의해야 합니다.
     * $id에는 해당 $type내 고유한 식별자를 입력하는것이 좋습니다.
     * ex) [$type: coupon, $id: 쿠폰번호]
     *
     * @param string[] $u_ids 수신자 로그인 아이디 목록
     * @param Identifier $identifier 메시지 고유 ID
     * @param string $message 메시지 본문
     * @param string $image_url 메시지에 포함될 이미지 주소
     * @param string $image_type 이미지 유형 ({@see ImageType})
     * @param string $landing_url 메시지를 눌렀을 때 이동할 주소
     * @param int $expire_at 메시지가 만료될 유닉스 시간 * 1000 (밀리초)
     */
    public function __construct(
        array $u_ids,
        Identifier $identifier,
        string $message,
        string $image_url,
        string $image_type,
        string $landing_url,
        int $expire_at
    ) {
        $this->u_ids = $u_ids;
        $this->identifier = $identifier;
        $this->message = $message;
        $this->image_url = $image_url;
        $this->image_type = $image_type;
        $this->landing_url = $landing_url;
        $this->expire_at = $expire_at;
    }

    public function jsonSerialize()
    {
        return [
            'u_ids' => $this->u_ids,
            'identifier' => $this->identifier,
            'message' => $this->message,
            'image_url' => $this->image_url,
            'image_type' => $this->image_type,
            'landing_url' => $this->landing_url,
            'expire_at' => $this->expire_at,
        ];
    }
}
