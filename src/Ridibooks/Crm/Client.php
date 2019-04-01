<?php
declare(strict_types=1);

namespace Ridibooks\Crm;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Ridibooks\Crm\Notification\Payload\ApnsPush;
use Ridibooks\Crm\Notification\Payload\Email;
use Ridibooks\Crm\Notification\Payload\GcmPush;
use Ridibooks\Crm\Notification\Payload\NotificationCenterMessage;
use Ridibooks\Crm\Status\Response\QueueStatusResponse;

/**
 *
 * CRM API 클라이언트.
 *
 * http://api.dev.ridi.io/crm/crm.html
 *
 */
class Client
{

    /** @var Client */
    private $client;

    /**
     * @param array $config
     * @see GuzzleClient
     */
    public function __construct(array $config = [])
    {
        if (!array_key_exists('base_uri', $config)) {
            $config['base_uri'] = 'https://crm-api.ridibooks.com';
        }

        $this->client = new GuzzleClient($config);
    }

    /**
     * @param array $config
     * @return Client
     */
    public static function createWithDefaultRetry(array $config = []): self
    {
        if (!array_key_exists('handler', $config)) {
            $handler = HandlerStack::create();
            $config['handler'] = $handler;
        }
        $config['handler']->push(self::getDefaultRetryMiddleware());
        $config['http_errors'] = true;

        return new self($config);
    }

    /**
     * 5xx 에러가 발생했을때 재시도 합니다.
     * @param int $max_retry_count 최대 재시도 횟수
     * @param int $retry_delay 재시도 사이 간격(단위: ms)
     * @return callable retry 미들웨어
     */
    public static function getDefaultRetryMiddleware(int $max_retry_count = 3, int $retry_delay = 1000): callable
    {
        return Middleware::retry(
            function (
                int $retries,
                ?Request $request,
                ?Response $response,
                $reason
            ) use ($max_retry_count): bool {
                $is_exception_occurred = ($reason !== null) || ($response->getStatusCode() >= 500);
                $can_retry = $retries < $max_retry_count;

                return $is_exception_occurred && $can_retry;
            },
            function () use ($retry_delay) {
                return $retry_delay;
            }
        );
    }

    /**
     * @param NotificationCenterMessage $message
     * @return PromiseInterface
     */
    public function sendNotificationCenterMessageAsync(NotificationCenterMessage $message): PromiseInterface
    {
        $promise = $this->client->requestAsync('POST', '/v1/notification/center/', [
            'json' => $message,
        ]);

        return $promise;
    }

    /**
     * @param NotificationCenterMessage $message
     * @return Response
     */
    public function sendNotificationCenterMessage(NotificationCenterMessage $message): Response
    {
        $promise = $this->sendNotificationCenterMessageAsync($message);

        return $promise->wait();
    }

    /**
     * @param NotificationCenterMessage $message
     * @return Response
     */
    public function updateNotificationCenterMessage(NotificationCenterMessage $message): Response
    {
        $promise = $this->client.requestAsync('PUT', '/v1/notification/center/', [
            'json' => $message,
        ]);

        return $promise->wait();
    }

    /**
     * @param string $id
     * @return Response
     */
    public function withdrawNotificationCenterMessage(string $id): Response
    {
        $promise = $this->client->requestAsync('DELETE', "/v1/notification/center/$id");

        return $promise->wait();
    }

    /**
     * @param Email $email
     * @return PromiseInterface
     */
    public function sendEmailAsync(Email $email): PromiseInterface
    {
        $promise = $this->client->requestAsync('POST', '/v1/notification/email/', [
            'json' => $email,
        ]);

        return $promise;
    }

    /**
     * @param Email $email
     * @return Response
     */
    public function sendEmail(Email $email): Response
    {
        $promise = $this->sendEmailAsync($email);

        return $promise->wait();
    }

    /**
     * @param ApnsPush $push
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendApnsPushAsync(ApnsPush $push): PromiseInterface
    {
        $promise = $this->client->requestAsync('POST', '/v1/notification/push/apns/', [
            'verify' => false,
            'json' => $push,
        ]);

        return $promise;
    }

    /**
     * @param ApnsPush $push
     * @return Response
     */
    public function sendApnsPush(ApnsPush $push): Response
    {
        $promise = $this->sendApnsPushAsync($push);

        return $promise->wait();
    }

    /**
     * @param GcmPush $push
     * @return PromiseInterface
     */
    public function sendGcmPushAsync(GcmPush $push): PromiseInterface
    {
        $promise = $this->client->requestAsync('POST', '/v1/notification/push/gcm/', [
            'json' => $push,
        ]);

        return $promise;
    }

    /**
     * @param GcmPush $push
     * @return Response
     */
    public function sendGcmPush(GcmPush $push): Response
    {
        $promise = $this->sendGcmPushAsync($push);

        return $promise->wait();
    }

    /**
     * @return PromiseInterface
     */
    public function getQueueStatusAsync(): PromiseInterface
    {
        $promise = $this->client->requestAsync('GET', '/v1/status/');

        return $promise;
    }

    /**
     * @return QueueStatusResponse
     */
    public function getQueueStatus(): QueueStatusResponse
    {
        $promise = $this->getQueueStatusAsync();
        /** @var Response $response */
        $response = $promise->wait();
        $response = new QueueStatusResponse(
            $response->getStatusCode(),
            $response->getHeaders(),
            $response->getBody(),
            $response->getProtocolVersion(),
            $response->getReasonPhrase()
        );
        return $response;
    }
}
