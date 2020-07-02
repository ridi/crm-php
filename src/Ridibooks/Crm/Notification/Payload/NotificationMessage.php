<?php
declare(strict_types=1);

namespace Ridibooks\Crm\Notification\Payload;

use Ridibooks\Crm\Notification\Identifier;

class NotificationMessage implements \JsonSerializable
{
    /**
     * @var array|int[]
     */
    private $u_idxes;
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
     * @var string
     */
    private $deeplink_url;

    /**
     * 알림센터 메시지 페이로드 생성자.
     *
     * ($type, $id)의 쌍이 알림의 고유 식별자가 됩니다.
     * 따라서 ($type, $id) 쌍이 같은 알림을 두 번 보내면 overwrite가 일어나기 때문에 주의해야 합니다.
     * $id에는 해당 $type내 고유한 식별자를 입력하는것이 좋습니다.
     * ex) [$type: coupon, $id: 쿠폰번호]
     *
     * @param int[] $u_idxes 수신자 u_idx 목록
     * @param Identifier $identifier 메시지 고유 ID
     * @param string $message 메시지 본문
     * @param string $image_url 메시지에 포함될 이미지 주소
     * @param string $image_type 이미지 유형 ({@see ImageType})
     * @param string $landing_url 메시지를 눌렀을 때 이동할 주소
     * @param int $expire_at 메시지가 만료될 유닉스 시간 * 1000 (밀리초)
     * @param string $deeplink_url 안드로이드 앱에서 메시지를 눌렀을 때 이동할 주소
     */
    public function __construct(
        array $u_idxes,
        Identifier $identifier,
        string $message,
        string $image_url,
        string $image_type,
        string $landing_url,
        int $expire_at,
        string $deeplink_url = null
    ) {
        $this->u_idxes = $u_idxes;
        $this->identifier = $identifier;
        $this->message = $message;
        $this->image_url = $image_url;
        $this->image_type = $image_type;
        $this->landing_url = $landing_url;
        $this->expire_at = $expire_at;
        $this->deeplink_url = $deeplink_url;
    }

    public function jsonSerialize()
    {
        return [
            'u_idxes' => $this->u_idxes,
            'identifier' => $this->identifier,
            'message' => $this->message,
            'image_url' => $this->image_url,
            'image_type' => $this->image_type,
            'landing_url' => $this->landing_url,
            'expire_at' => $this->expire_at,
            'deeplink_url' => $this->deeplink_url
        ];
    }
}
