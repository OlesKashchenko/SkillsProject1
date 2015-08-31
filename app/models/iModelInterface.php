<?php

interface iModelInterface
{
	public function getSlug();
	public function getUrl();
	public function getUri();
	public function getDate();
	public function scopeActive($query);
	public function scopeByCatalog($query, $idCatalog);
	public function scopeDesc($query);
}