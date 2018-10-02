<?php
declare(strict_types=1);

namespace Ridibooks\Crm\Status\Response;

use GuzzleHttp\Psr7\Response;

class QueueStatusResponse extends Response
{
    /** @var string */
    private $queue_status;
    /** @var array */
    private $queue_sizes;

    /**
     * @param int $status
     * @param array $headers
     * @param null $body
     * @param string $version
     * @param string|null $reason
     * @throws \Exception
     */
    public function __construct(
        int $status = 200,
        array $headers = [],
        $body = null,
        string $version = '1.1',
        string $reason = null
    ) {
        parent::__construct($status, $headers, $body, $version, $reason);

        if ($this->getStatusCode() === 200) {
            $result = json_decode($this->getBody()->getContents(), true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Cannot parse response of queue status API');
            }
            $this->queue_status = $result['status'];
            $this->queue_sizes = $result['queue_sizes'];
        }
    }

    /**
     * @return string[]
     */
    public function getNameOfQueues(): array
    {
        return array_keys($this->queue_sizes);
    }

    /**
     * @return string
     */
    public function getQueueStatus(): string
    {
        return $this->queue_status;
    }

    /**
     * @param string $queue_name
     * @return int
     */
    public function getQueueSize(string $queue_name): int
    {
        return $this->queue_sizes[$queue_name];
    }
}
