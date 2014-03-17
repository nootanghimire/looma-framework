<?php
class baseapp{
	public function abstraction($load){
		return new $load();
	}
}