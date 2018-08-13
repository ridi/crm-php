<?php
namespace Ridibooks\Tests\Crm;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Ridibooks\Crm\Client as CrmClient;
use Ridibooks\Crm\Notification\Payload\Email;

class RetryHandlerTest extends TestCase
{
    /**
     * @param $mocks
     * @param $expected
     * @dataProvider dataProvider
     */
    public static function testRetryMiddleware($mocks, $expected)
    {
        $mock = new MockHandler($mocks);
        $stack = HandlerStack::create($mock);
        $client = CrmClient::createWithDefaultRetry(['handler' => $stack]);
        $email = new Email('test', ['test@ridi.com'], 'test_title', 'test');
        try {
            $response = $client->sendEmail($email);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
        }
        self::assertEquals($expected, $response->getStatusCode());
    }

    public function dataProvider()
    {
        $response_503 = new Response(503);
        $response_400 = new Response(400);
        $response_401 = new Response(401);
        $response_403 = new Response(403);
        $response_200 = new Response(200);
        $server_exception = new ServerException(
            'Server Error',
            new Request('POST', '/v1/notification/email/'),
            $response_503
        );
        return [
            '200 OK' => [[$response_200], 200],
            '400 Bad Request' => [
                [
                    $response_400,
                ],
                400
            ],
            '401 Bad Request' => [
                [
                    $response_401,
                ],
                401
            ],
            '403 Bad Request' => [
                [
                    $response_403,
                ],
                403
            ],
            '503 Server Error' => [
                [
                    $server_exception,
                    $server_exception,
                    $server_exception,
                    $server_exception,
                ],
                503
            ],
            '503 with retry success' => [
                [
                    $server_exception,
                    $server_exception,
                    $server_exception,
                    $response_200,
                ],
                200
            ],
        ];
    }
}
