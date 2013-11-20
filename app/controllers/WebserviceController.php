<?php

class WebserviceController extends BaseController {

	public function divein()
	{
		return View::make('education.divein');
	}

	public function demosignin()
	{
		return View::make('education.demosignin');
	}

}