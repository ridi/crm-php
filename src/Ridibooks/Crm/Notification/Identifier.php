<?php
declare(strict_types=1);

namespace Ridibooks\Crm\Notification;

class Identifier
{
    /**
     * @var string {@see MessageType}
     */
    public $message_type;

    /**
     * @var string
     */
    public $campaign_id;

    /**
     * @var string {@see Tag}
     */
    public $tag;

    /**
     * @param string $message_type {@see MessageType}
     * @param string $tag {@see Tag}
     * @param string $campaign_id
     */
    public function __construct(string $message_type, string $campaign_id, string $tag)
    {
        $this->message_type = $message_type;
        $this->tag = $tag;
        $this->campaign_id = $campaign_id;
    }

    /**
     * @param string $serialized {$see MessageType}:campaign_id:{$see Tag} 형태로 인코딩된 푸시 ID
     * @return Identifier
     */
    public static function createFromString(string $serialized)
    {
        $triple = explode(":", $serialized);

        return new self($triple[0], $triple[1], $triple[2]);
    }

    /**
     * @return string {$see MessageType}:campaign_id:{$see Tag} 형태로 인코딩된 푸시 ID
     */
    public function __toString(): string
    {
        return implode(":", [$this->message_type, $this->campaign_id, $this->tag);
    }
}
