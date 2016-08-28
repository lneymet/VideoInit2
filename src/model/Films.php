<?php

namespace VideoInit\model;

class Films {

	private $sIdFilm;
	private $sCodeTypeFilm;
	private $sTitreFilm;
	private $sAnneeFilm;
	private $sRefImage;
	private $sResume;


	public function __construct($sIdFilm, $sCodeTypeFilm, $sTitreFilm, $sAnneeFilm, $sRefImage, $sResume){
		$this->sIdFilm = $sIdFilm;
		$this->sCodeTypeFilm = $sCodeTypeFilm;
		$this->sTitreFilm = $sTitreFilm;
		$this->sAnneeFilm = $sAnneeFilm;
		$this->sRefImage = $sRefImage;
		$this->sResume = $sResume;	
	}
	
	
	
	public function getIdFilm() {
		return $this->sIdFilm;
	}
	public function setIdFilm($sIdFilm) {
		$this->sIdFilm = $sIdFilm;
		return $this;
	}
	
	public function getCodeTypeFilm() {
		return $this->sCodeTypeFilm;
	}
	public function setCodeTypeFilm($sCodeTypeFilm) {
		$this->sCodeTypeFilm = $sCodeTypeFilm;
		return $this;
	}
	public function getTitreFilm() {
		return $this->sTitreFilm;
	}
	public function setTitreFilm($sTitreFilm) {
		$this->sTitreFilm = $sTitreFilm;
		return $this;
	}
	public function getAnneeFilm() {
		return $this->sAnneeFilm;
	}
	public function setAnneeFilm($sAnneeFilm) {
		$this->sAnneeFilm = $sAnneeFilm;
		return $this;
	}
	public function getRefImage() {
		return $this->sRefImage;
	}
	public function setRefImage($aRefImage) {
		$this->sRefImage = $aRefImage;
		return $this;
	}
	public function getResume() {
		return $this->sResume;
	}
	public function setResume($sResume) {
		$this->sResume = $sResume;
		return $this;
	}
	






}