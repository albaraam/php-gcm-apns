<?php

namespace albaraam\gcmapns;

use albaraam\gcm\GCMClient;
use albaraam\gcm\GCMMessage;
use albaraam\gcm\GCMNotification;

/**
* Client
*/
class Client
{
	const IOS_ENVIRONMENT_SANDBOX = 0;
	const IOS_ENVIRONMENT_PRODUCTION = 1;


	private $google_api_key;

	private $ios_environment;

	private $ios_pem_file;

	private $ios_passphrase;

	private $ios_provider_certificate_passphrase;

	private $ios_root_certification_authority;

	private $ios_write_interval;

	private $ios_connect_timeout;

	private $ios_connect_retry_times;

	private $ios_connect_retry_interval;

	private $ios_socket_select_timeout;

	private $ios_logger;

	/*
	 * @var GCMClient
	 * */
	private $_android_client = null;

	private $_ios_client = null;

	
	function __construct($google_api_key, $ios_pem_file, $ios_environment)
	{
		$this->google_api_key = $google_api_key;
		$this->ios_pem_file = $ios_pem_file;
		$this->ios_environment = $ios_environment;
	}

	public function send(Message $message)
	{
		if($this->getAndroidClient()) $this->sendAndroid($message);
		if($this->getIOSClient()) $this->sendIOS($message);
	}

	public function sendAndroid(Message $message)
	{
		// payload notification
		$notification = new GCMNotification($message->android->getTitle(),$message->android->getBody());
		$notification->setBodyLocKey($message->android->getBodyLocKey());
		$notification->setBodyLocArgs($message->android->getBodyLocArgs());
		$notification->setClickAction($message->android->getClickAction());
		$notification->setColor($message->android->getColor());
		$notification->setIcon($message->android->getIcon());
		$notification->setSound($message->android->getSound());
		$notification->setTag($message->android->getTag());
		$notification->setTitleLocKey($message->android->getTitleLocKey());
		$notification->setTitleLocArgs($message->android->getTitleLocArgs());

		// registration ids
		$_message = new GCMMessage($notification,$message->android->getTo());
		// options
		$_message->setCollapseKey($message->android->getCollapseKey());
		$_message->setDelayWhileIdle($message->android->getDelayWhileIdle());
		$_message->setDryRun($message->android->isDryRun());
		$_message->setRestrictedPackageName($message->android->getRestrictedPackageName());
		$_message->setTimeToLive($message->android->getTimeToLive());
		// payload data
		$_message->setData($message->android->getData());

		return $this->getAndroidClient()->send($_message);
	}

	public function sendIOS(Message $message)
	{
		// Prepare message
		$_message = new \ApnsPHP_Message();
		foreach ($message->ios->getTo() as $token) {
			$_message->addRecipient($token);
		}
		$_message->setText($message->ios->getBody());
		$_message->setBadge($message->ios->getBadge());
		$_message->setSound($message->ios->getSound());
		$_message->setContentAvailable($message->ios->isContentAvailable());
		$_message->setCategory($message->ios->getCategory());
		// Connection
		$this->getIOSClient()->connect();
		$this->getIOSClient()->add($_message);
		$this->getIOSClient()->send();
		$this->getIOSClient()->disconnect();
	}

	private function getAndroidClient()
	{
		if($this->_android_client == null){
			if($this->google_api_key == "") return null;
			$this->_android_client = new GCMClient($this->google_api_key);
		}
		return $this->_android_client;
	}

	private function getIOSClient()
	{
		if($this->_ios_client == null) {
			if($this->ios_environment == "" || $this->ios_pem_file == ""
				|| $this->ios_environment == null || $this->ios_pem_file == null){
				return null;
			}
			$this->_ios_client = new \ApnsPHP_Push(
					$this->ios_environment == self::IOS_ENVIRONMENT_PRODUCTION
							? \ApnsPHP_Push::ENVIRONMENT_PRODUCTION
							: \ApnsPHP_Push::ENVIRONMENT_SANDBOX,
					$this->ios_pem_file
			);
		}
		return $this->_ios_client;
	}

	/*********************************************** Getters & Setters ***********************************************/

	/**
	 * @return string
	 */
	public function getGoogleApiKey()
	{
		return $this->google_api_key;
	}

	/**
	 * @return mixed
	 */
	public function getIosEnvironment()
	{
		return $this->ios_environment;
	}

	/**
	 * @return string
	 */
	public function getIosPemFile()
	{
		return $this->ios_pem_file;
	}

	/**
	 * @return string
	 */
	public function getIosPassphrase()
	{
		return $this->ios_passphrase;
	}

	/**
	 * @return string
	 */
	public function setIosPassphrase($ios_passphrase)
	{
		$this->ios_passphrase = $ios_passphrase;
	}

	/**
	 * @return mixed
	 */
	public function getIosProviderCertificatePassphrase()
	{
		return $this->ios_provider_certificate_passphrase;
	}

	/**
	 * @param mixed $ios_provider_certificate_passphrase
	 */
	public function setIosProviderCertificatePassphrase($ios_provider_certificate_passphrase)
	{
		$this->ios_provider_certificate_passphrase = $ios_provider_certificate_passphrase;
		$this->getIOSClient()->setProviderCertificatePassphrase($ios_provider_certificate_passphrase);
	}

	/**
	 * @return mixed
	 */
	public function getIosRootCertificationAuthority()
	{
		return $this->ios_root_certification_authority;
	}

	/**
	 * @param mixed $ios_root_certification_authority
	 */
	public function setIosRootCertificationAuthority($ios_root_certification_authority)
	{
		$this->ios_root_certification_authority = $ios_root_certification_authority;
		$this->getIOSClient()->setRootCertificationAuthority($ios_root_certification_authority);
	}

	/**
	 * @return mixed
	 */
	public function getIosWriteInterval()
	{
		return $this->ios_write_interval;
	}

	/**
	 * @param mixed $ios_write_interval
	 */
	public function setIosWriteInterval($ios_write_interval)
	{
		$this->ios_write_interval = $ios_write_interval;
		$this->getIOSClient()->setWriteInterval($ios_write_interval);
	}

	/**
	 * @return mixed
	 */
	public function getIosConnectTimeout()
	{
		return $this->ios_connect_timeout;
	}

	/**
	 * @param mixed $ios_connect_timeout
	 */
	public function setIosConnectTimeout($ios_connect_timeout)
	{
		$this->ios_connect_timeout = $ios_connect_timeout;
		$this->getIOSClient()->setConnectTimeout($ios_connect_timeout);
	}

	/**
	 * @return mixed
	 */
	public function getIosConnectRetryTimes()
	{
		return $this->ios_connect_retry_times;
	}

	/**
	 * @param mixed $ios_connect_retry_times
	 */
	public function setIosConnectRetryTimes($ios_connect_retry_times)
	{
		$this->ios_connect_retry_times = $ios_connect_retry_times;
		$this->getIOSClient()->setConnectRetryTimes($ios_connect_retry_times);
	}

	/**
	 * @return mixed
	 */
	public function getIosConnectRetryInterval()
	{
		return $this->ios_connect_retry_interval;
	}

	/**
	 * @param mixed $ios_connect_retry_interval
	 */
	public function setIosConnectRetryInterval($ios_connect_retry_interval)
	{
		$this->ios_connect_retry_interval = $ios_connect_retry_interval;
		$this->getIOSClient()->setConnectRetryInterval($ios_connect_retry_interval);
	}

	/**
	 * @return mixed
	 */
	public function getIosSocketSelectTimeout()
	{
		return $this->ios_socket_select_timeout;
	}

	/**
	 * @param mixed $ios_socket_select_timeout
	 */
	public function setIosSocketSelectTimeout($ios_socket_select_timeout)
	{
		$this->ios_socket_select_timeout = $ios_socket_select_timeout;
		$this->getIOSClient()->setSocketSelectTimeout($ios_socket_select_timeout);
	}

	/**
	 * @return mixed
	 */
	public function getIosLogger()
	{
		return $this->ios_logger;
	}

	/**
	 * @param mixed $ios_logger
	 */
	public function setIosLogger(\ApnsPHP_Log_Interface $ios_logger)
	{
		$this->ios_logger = $ios_logger;
		$this->getIOSClient()->setLogger($ios_logger);
	}


}