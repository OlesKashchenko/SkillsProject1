<?


class RatesClient
{

	public $service = "";
	public $method = "";
	public $param = "";
	public $result = "";
	public $urn = "flash";

	private $url = "https://esb.alfabank.kiev.ua:8243/services/";
	private $login = "alfabank_website";
	private $password = "1w3f7iDn1yFEM";
	private $CrossRate = 0;


	public function __construct($service)
	{
		$this->service = $service;
		if ($service) {
			$this->url .= $service ."/";
		}
	} // end __construct

	public function setUrn($urn)
	{
		$this->urn = $urn;
	} // end setUrn

	public function call($method, $param = "")
	{
		if (is_array($param)) {
			$this->param = "?". http_build_query($param);
		}

		$this->method = $method;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url . $this->method . $this->param);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, $this->login .":". $this->password);

		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			$result = "Curl error: ". curl_error($ch);
		}

		curl_close($ch);

		return $this->result = $result;
	} // end call

	public function callXml($method, $xml)
	{
		$this->method = $method;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url . $this->method);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 35);
		curl_setopt($ch, CURLOPT_HTTPHEADER,
			array(
				'Content-Type: text/xml',
				'SOAPAction: "urn:'. $this->urn.'"'
			)
		);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml");

		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			$result = "Curl error: ". curl_error($ch);
		}

		curl_close($ch);

		return $this->result = $result;
	} // end callXml

	public function getCurrencyListFullParse()
	{
		$returnVal = preg_match_all('#<datas[0-9]{1,2}:currencyId>(.+)<\/datas[0-9]{1,2}:currencyId>#U', $this->result, $matches);
		$idsArray = $matches[1];

		$returnVal = preg_match_all('#<datas[0-9]{1,2}:name>(.+)<\/datas[0-9]{1,2}:name>#U', $this->result, $matches);
		$namesArray = $matches[1];

		$returnVal = preg_match_all('#<datas[0-9]{1,2}:currencyCode>(.+)<\/datas[0-9]{1,2}:currencyCode>#U', $this->result, $matches);
		$codeArray = $matches[1];

		$response = null;
		foreach ($idsArray as $key => $row) {
			$response[$key]['id'] = $row;
			$response[$key]['name'] = $namesArray[$key];
			$response[$key]['code'] = $codeArray[$key];
		}

		return $response;
	} // end getCurrencyListFullParse

	public function getCurrencyRateParse()
	{
		$returnVal = preg_match_all('#<datas[0-9]{1,2}:rate>(.+)<\/datas[0-9]{1,2}:rate>#U', $this->result, $matches);
		$response = $matches[1][0];

		return $response;
	} // end getCurrencyRateParse

	public function getCardCrossRateParse()
	{
		$returnVal = preg_match_all('#<datas[0-9]{1,2}:crossRate>(.+)<\/datas[0-9]{1,2}:crossRate>#U', $this->result, $matches);
		$temp = explode(".", $matches[1][0]);
		$real = $temp[0] ? : 0;
		$this->CrossRate = $real .".". $temp[1];

		return $this->CrossRate;
	} // end getCardCrossRateParse
}
