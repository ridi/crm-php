<?php
declare(strict_types=1);

namespace Ridibooks\Crm\Notification;

class PushId
{
    /**
     * @var string {@see MessageType}
     */
    private $message_type;

    /**
     * @var string
     */
    private $message_id;

    /**
     * @var string {@see Tag}
     */
    private $tag;

    /**
     * @param string $message_type {@see MessageType}
     * @param string $message_id
     * @param string $tag {@see Tag}
     */
    public function __construct(string $message_type, string $message_id, string $tag)
    {
        $this->message_type = $message_type;
        $this->message_id = $message_id;
        $this->tag = $tag;
    }

    /**
     * @param string $serialized {$see MessageType}:message_id:{$see Tag} 형태로 인코딩된 푸시 ID
     * @return PushId
     */
    public static function createFromString(string $serialized)
    {
        $triple = explode(":", $serialized);

        return new self($triple[0], $triple[1], $triple[2]);
    }

    /**
     * @return string {$see MessageType}:message_id:{$see Tag} 형태로 인코딩된 푸시 ID
     */
    public function __toString(): string
    {
        return implode(":", [$this->message_type, $this->message_id, $this->tag]);
    }
}
