<?php

class QueryString extends RequestVariables {
	protected function setValue() {
		foreach ($_POST as $key => $value) {
			$this->_values[$key] = $value;
		}
	}
}