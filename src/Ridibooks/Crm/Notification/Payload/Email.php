<?php
declare(strict_types=1);

namespace Ridibooks\Crm\Notification\Payload;

use Ridibooks\Crm\Notification\Identifier;

class Email implements \JsonSerializable
{
    /**
     * @var string
     */
    private $from;
    /**
     * @var array
     */
    private $to;
    /**
     * @var string
     */
    private $subject;
    /**
     * @var string
     */
    private $html;
    /**
     * @var Identifier
     */
    private $identifier;
    /**
     * @var array|null
     */
    private $recipient_variables;
    /**
     * @var array|null
     */
    private $cc;
    /**
     * @var array|null
     */
    private $bcc;

    /**
     * 이메일 페이로드 생성자.
     *
     * 이메일 주소는 [RFC 822 6조 1항](https://tools.ietf.org/html/rfc822#section-6.1)을 따릅니다.
     *
     * @param string $from 보내는 사람
     * @param array $to 받는 사람
     * @param string $subject 제목
     * @param string $html HTML 형식의 이메일 본문. 템플릿 변수를 포함할 수 있습니다.
     * @param array|null $recipient_variables
     *  수신자별로 지정된 템플릿 변수. 수신자들에게 수신자 목록을 숨겨야 한다면 반드시 설정되어야 합니다.
     *  [Mailgun 문서](https://documentation.mailgun.com/en/latest/user_manual.html#batch-sending)를 참고하세요.
     * @param Identifier $identifier 알림 고유 ID
     * @param array|null $cc 참조
     * @param array|null $bcc 숨은 참조
     */
    public function __construct(
        string $from,
        array $to,
        string $subject,
        string $html,
        Identifier $identifier = null,
        array $recipient_variables = null,
        array $cc = null,
        array $bcc = null
    ) {
        $this->from = $from;
        $this->to = $to;
        $this->subject = $subject;
        $this->html = $html;
        $this->identifier = $identifier;
        $this->recipient_variables = $recipient_variables;
        $this->cc = $cc;
        $this->bcc = $bcc;
    }

    public function jsonSerialize()
    {
        $json = [
            'from' => $this->from,
            'to' => $this->to,
            'subject' => $this->subject,
            'html' => $this->html,
        ];

        if ($this->identifier !== null) {
            $json['identifier'] = $this->identifier;
        }
        if ($this->recipient_variables !== null) {
            $json['recipient_variables'] = (object) $this->recipient_variables;
        }
        if ($this->cc !== null) {
            $json['cc'] = $this->cc;
        }
        if ($this->bcc !== null) {
            $json['bcc'] = $this->bcc;
        }

        return $json;
    }
}
