<?php
class apps extends baseapp {

	protected $apps_data;
	public function __construct(){
		$this->apps_data = $this->abstraction('apps_info');
	}
	public function index(){
		$ret['file1']['template_file'] = "list_apps";
		$ret['file1']['data']['apps'] = $this->apps_data->getAppsList();
		return $ret;
	}	

	public function show_app($app_id){
		if(!is_numeric($app_id)){
			throw new Exception("Id must be numeric!");
		}
		$ret['file1']['template_file'] = "app";
		$ret['file1']['data']['app'] = $this->apps_data->getAppInfo($app_id);
		return $ret;

	}
}