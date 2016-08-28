<?php


namespace VideoInit\model;

class TypeFilm {

	private $sCodeFilm;
	private $sLibelle;


	public function __construct($sCodeFilm, $sLibelle){
		$this->sCodeFilm = $sCodeFilm;
		$this->sLibelle = $sLibelle;
	}


	public function getCodeFilm(){
		return $this->sCodeFilm;
	}

	public function getLibelle(){
		return $this->sLibelle;
	}



}