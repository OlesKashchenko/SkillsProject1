<?php

class SibelClient
{

	// constant fields
	private $baseUrl = 'https://esb.alfabank.kiev.ua:8243/services/';
	private $username = 'alfabank_website';
	private $password = '1w3f7iDn1yFEM';

	// variable fields
	private $segmentUrl = '';
	private $action = '';
	private $xml = '';
	private $flatResult = null;
	private $lastName = '';
	private $firstName = '';
	private $middleName = '';
	private $inn = '';
	private $passport = '';
	private $dob = '';
	private $phone = '';
	private $project = '';
	private $description = '';
	private $comment = '';
	private $createdDate = '';
	private $division = '';


	public function getFlatResult()
	{
		return $this->flatResult;
	}

	public function setFlatResult($flatResult)
	{
		$this->flatResult = $flatResult;
	}

	public function getXml()
	{
		return $this->xml;
	}

	public function dumpXml()
	{
		return htmlentities($this->xml);
	}

	public function getLastName()
	{
		return $this->lastName;
	}

	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}

	public function getFirstName()
	{
		return $this->firstName;
	}

	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}

	public function getMiddleName()
	{
		return $this->middleName;
	}

	public function setMiddleName($middleName)
	{
		$this->middleName = $middleName;
	}

	public function getInn()
	{
		return $this->inn;
	}

	public function setInn($inn)
	{
		$this->inn = $inn;
	}

	public function getPassport()
	{
		return $this->passport;
	}

	public function setPassport($passport)
	{
		$this->passport = $passport;
	}

	public function getDob()
	{
		return $this->dob;
	}

	public function setDob($dob)
	{
		$this->dob = $dob;
	}

	public function getPhone()
	{
		return $this->phone;
	}

	public function setPhone($phone)
	{
		$this->phone = '+38'. str_replace(
				array('(', ')', ' ', '-', '+38'),
				array('','', '', '', ''),
				$phone
			);
	}

	public function getProject()
	{
		return $this->project;
	}

	public function setProject($project)
	{
		$this->project = $project;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getComment()
	{
		return $this->comment;
	}

	public function setComment($comment)
	{
		$this->comment = $comment;
	}

	public function getCreatedDate()
	{
		return $this->createdDate;
	}

	public function setCreatedDate($createdDate)
	{
		$this->createdDate = $createdDate;
	}

	public function getDivision()
	{
		return $this->division;
	}

	public function setDivision($division)
	{
		$this->division = $division;
	}


	public function __construct()
	{

	} // end __construct

	/*
	 * Send application in short format (credit card / transfer / deposit)
	 */
	public function registerShortApplication()
	{
		$this->segmentUrl = 'Application.ApplicationHttpsSoap11Endpoint';
		$this->action = 'urn:registerApplicationShort';

		$this->formHeader();

		$this->xml .= '<sab:registerApplicationShort>';
		$this->xml .= '<sab:LastName>'. $this->lastName .'</sab:LastName>';
		$this->xml .= '<sab:FirstName>'. $this->firstName .'</sab:FirstName>';
		$this->xml .= '<sab:MiddleName>'. $this->middleName .'</sab:MiddleName>';
		$this->xml .= '<sab:INN>'. $this->inn .'</sab:INN>';
		$this->xml .= '<sab:Passport>'. $this->passport .'</sab:Passport>';
		$this->xml .= '<sab:DOB>'. $this->dob .'</sab:DOB>';
		$this->xml .= '<sab:Phone>'. $this->phone .'</sab:Phone>';
		$this->xml .= '<sab:Project>'. $this->project .'</sab:Project>';
		$this->xml .= '<sab:Description>' . $this->description . '</sab:Description>';
		$this->xml .= '<sab:Comment>'. $this->comment .'</sab:Comment>';
		$this->xml .= '<sab:CreateDate>' . $this->createdDate . '</sab:CreateDate>';
		$this->xml .= '<sab:Division>'. $this->division .'</sab:Division>';
		$this->xml .= '</sab:registerApplicationShort>';

		$this->formFooter();

		$this->doRequest();

		return $this->getOrderCode();
	} // end registerShortApplication

	public function formHeader()
	{
		$this->xml = '<soapenv:Envelope xmlns:sab="http://sab/" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">';
		$this->xml .= '<soapenv:Header>';
		$this->xml .= '<wsse:Security soapenv:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">';
		$this->xml .= '<wsse:UsernameToken>';
		$this->xml .= '<wsse:Username>'. $this->username .'</wsse:Username>';
		$this->xml .= '<wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">'. $this->password .'</wsse:Password>';
		$this->xml .= '</wsse:UsernameToken>';
		$this->xml .= '</wsse:Security>';
		$this->xml .= '</soapenv:Header>';
		$this->xml .= '<soapenv:Body>';
	} // end formHeader

	public function formFooter()
	{
		$this->xml .= '</soapenv:Body>';
		$this->xml .= '</soapenv:Envelope>';
	} // end formFooter

	public function doRequest()
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->baseUrl . $this->segmentUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 35);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: text/xml',
				'SOAPAction: "'. $this->action .'"'
			)
		);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "$this->xml");

		$this->flatResult = curl_exec($ch);
		curl_close($ch);
	} // end doRequest

	public function getOrderCode()
	{
		if (!$this->flatResult) {
			return false;
		}

		preg_match('/\<sab\:actionid\>(.*)\<\/sab\:actionid\>/i', $this->flatResult, $matches);
		preg_match('/\<faultstring\>(.*)\<\/faultstring\>/i', $this->flatResult, $matchesError);
		$code = (isset($matches[1]) && $matches[1]) ? $matches[1] : $matchesError[1];
		if (!$code) {
			return $this->flatResult;
		}

		return $code;
	} // end getOrderCode
}
