<?php
namespace Ridibooks\CRM\Library\Mailgun;

use Mailgun\Mailgun;

class MailgunHelper
{
	const DOMAIN = "ridibooks.com";

	/**
	 * @param $campaign_id
	 * @return array
	 */
	public static function getCampaignStatDetail($campaign_id)
	{
		$client = new Mailgun(\CRMConfig::$MAILGUN_API_KEY);

		$stats = $client->get(self::DOMAIN . "/campaigns/$campaign_id/stats");
		$clicks = $client->get(self::DOMAIN . "/campaigns/$campaign_id/clicks", ['groupby' => 'link']);

		$result = ['stats' => $stats->http_response_body, 'clicks' => $clicks->http_response_body];

		return $result;
	}

	/**
	 * @param int $count
	 * @return mixed
	 */
	public static function getCampaignsStatSummary($count)
	{
		$client = new Mailgun(\CRMConfig::$MAILGUN_API_KEY);
		$data = $client->get(self::DOMAIN . "/campaigns", ['limit' => $count]);

		return $data->http_response_body->items;
	}

	/**
	 * @param array $postData
	 */
	public static function registerMailgunCampaign($postData)
	{
		$mg = new Mailgun(\CRMConfig::$MAILGUN_API_KEY);
		$mg->post(self::DOMAIN . "/campaigns", $postData);
	}

	/**
	 * @param $from
	 * @param $to
	 * @param $title
	 * @param $content
	 * @param null $recipient_vars
	 * @param null $cc
	 * @param null $bcc
	 * @return \stdClass
	 * @throws \Mailgun\Messages\Exceptions\MissingRequiredMIMEParameters
	 */
	public static function sendMail($from, $to, $title, $content, $recipient_vars = null, $cc = null, $bcc = null)
	{
		$mg = new Mailgun(\CRMConfig::$MAILGUN_API_KEY);
		$message = [
			'from' => $from,
			'to' => implode(',', $to),
			'subject' => $title,
			'html' => $content
		];
		if ($cc) {
			$message['cc'] = $cc;
		}
		if ($bcc) {
			$message['bcc'] = $bcc;
		}
		if ($recipient_vars) {
			$message['recipient-variables'] = json_encode($recipient_vars);
		}

		return $mg->sendMessage(self::DOMAIN, $message);
	}

	/**
	 * @param $from
	 * @param array $recipients
	 * @param $title
	 * @param $content
	 * @param $campaign_id
	 * @param $recipient_vars
	 * @param \DateTime $delivery_time
	 * @return \stdClass
	 * @throws \Mailgun\Messages\Exceptions\MissingRequiredMIMEParameters
	 */
	public static function sendCampaign(
		$from,
		$recipients,
		$title,
		$content,
		$campaign_id,
		$recipient_vars,
		$delivery_time = null
	) {
		$mg = new Mailgun(\CRMConfig::$MAILGUN_API_KEY);
		$to = implode(',', $recipients);
		$message = [
			'from' => $from,
			'to' => $to,
			'subject' => $title,
			'html' => $content,
			'o:campaign' => $campaign_id,
			'recipient-variables' => json_encode($recipient_vars)
		];
		if ($delivery_time) {
			$message['o:deliverytime'] = $delivery_time->format(\DateTime::RFC2822);
		}

		return $mg->sendMessage(self::DOMAIN, $message);
	}
}
