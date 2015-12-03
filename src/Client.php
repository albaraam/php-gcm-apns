<?php

namespace albaraam\gmcapns;

/**
* Client
*/
class Client extends AnotherClass
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

	private $ios_timeout;

	private $ios_retry_times;

	private $ios_retry_interval;

	private $ios_socket_select_timeout;

	private $_android_client = null;

	private $_ios_client = null;

	
	function __construct($google_api_key = "", $ios_pem_file = null, $ios_passphrase = "")
	{
		$this->google_api_key = $google_api_key;
		$this->ios_pem_file = $ios_pem_file;
		$this->ios_passphrase = $ios_passphrase;
	}

	public function send(Message $message)
	{
		// TODO: send
	}

	public function sendAndroid(Message $message)
	{
		
	}

	public function sendIOS(Message $message)
	{
		
	}

	private function getAndroidClient()
	{
		if($this->_android_client == null){
			$this->_android_client = new GCMClient($this->google_api_key);
		}
		return $this->_android_client;
	}

	private function getIOSClient()
	{
		if($this->_ios_client == null) {
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
	 * @param string $google_api_key
	 */
	public function setGoogleApiKey($google_api_key)
	{
		$this->google_api_key = $google_api_key;
	}

	/**
	 * @return mixed
	 */
	public function getIosEnvironment()
	{
		return $this->ios_environment;
	}

	/**
	 * @param mixed $ios_environment
	 */
	public function setIosEnvironment($ios_environment)
	{
		$this->ios_environment = $ios_environment;
	}

	/**
	 * @return null
	 */
	public function getIosPemFile()
	{
		return $this->ios_pem_file;
	}

	/**
	 * @param null $ios_pem_file
	 */
	public function setIosPemFile($ios_pem_file)
	{
		$this->ios_pem_file = $ios_pem_file;
	}

	/**
	 * @return string
	 */
	public function getIosPassphrase()
	{
		return $this->ios_passphrase;
	}

	/**
	 * @param string $ios_passphrase
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
	}

	/**
	 * @return mixed
	 */
	public function getIosTimeout()
	{
		return $this->ios_timeout;
	}

	/**
	 * @param mixed $ios_timeout
	 */
	public function setIosTimeout($ios_timeout)
	{
		$this->ios_timeout = $ios_timeout;
	}

	/**
	 * @return mixed
	 */
	public function getIosRetryTimes()
	{
		return $this->ios_retry_times;
	}

	/**
	 * @param mixed $ios_retry_times
	 */
	public function setIosRetryTimes($ios_retry_times)
	{
		$this->ios_retry_times = $ios_retry_times;
	}

	/**
	 * @return mixed
	 */
	public function getIosRetryInterval()
	{
		return $this->ios_retry_interval;
	}

	/**
	 * @param mixed $ios_retry_interval
	 */
	public function setIosRetryInterval($ios_retry_interval)
	{
		$this->ios_retry_interval = $ios_retry_interval;
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
	}


}