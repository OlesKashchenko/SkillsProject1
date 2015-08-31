<?php

class MailClient
{

	private $emailsTo;
	private $emailFrom;
	private $emailFromTitle;
	private $subject;
	private $body;
	private $format = 'text/html';


	public function getEmailsTo()
	{
		return $this->emailsTo;
	}

	public function setEmailsTo($emails)
	{
		$this->emailsTo = $emails;
	}

	public function getEmailFrom()
	{
		return $this->emailFrom;
	}

	public function setEmailFrom($email)
	{
		$this->emailFrom = $email;
	}

	public function getEmailFromTitle()
	{
		return $this->emailFromTitle;
	}

	public function setEmailFromTitle($title)
	{
		$this->emailFromTitle = $title;
	}

	public function getSubject()
	{
		return $this->subject;
	}

	public function setSubject($subject)
	{
		$this->subject = $subject;
	}

	public function getBody()
	{
		return $this->body;
	}

	public function setBody($body)
	{
		$this->body = $body;
	}

	public function getFormat()
	{
		return $this->format;
	}

	public function setFormat($format)
	{
		$this->format = $format;
	}

	public function send()
	{
		foreach ($this->getEmailsTo() as $email) {
				Mail::send(array(), array(), function($message) use ($email) {
					$message
						->to($email)
						->from($this->getEmailFrom(), $this->getEmailFromTitle())
						->subject($this->getSubject())
						->setBody($this->getBody(), $this->getFormat());
				}
			);
		}
	} // end send
}
