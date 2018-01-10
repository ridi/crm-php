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
     * @var string[] {@see Tag}
     */
    public $tags;

    /**
     * @param string $message_type {@see MessageType}
     * @param string $campaign_id
     * @param string[] $tags {@see Tag}
     */
    public function __construct(string $message_type, string $campaign_id, array $tags)
    {
        $this->message_type = $message_type;
        $this->campaign_id = $campaign_id;
        $this->tags = $tags;
    }

    /**
     * @param string $serialized {$see MessageType}:campaign_id:{$see Tag} 형태로 인코딩된 푸시 ID
     * @return Identifier
     */
    public static function createFromString(string $serialized)
    {
        $triple = explode(":", $serialized);
        $tags = explode(',', $triple[2]);

        return new self($triple[0], $triple[1], $tags);
    }

    /**
     * @return string {$see MessageType}:campaign_id:{$see Tag} 형태로 인코딩된 푸시 ID
     */
    public function __toString(): string
    {
        $tags = implode(',', $this->tags);

        return implode(":", [$this->message_type, $this->campaign_id, $tags]);
    }
}
