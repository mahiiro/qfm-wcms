<?php
	function newEditableArea() {
		global $Wcms;

		// Check if the newEditableArea area is already exists, if not, create it
		if (empty($Wcms->get('blocks','newEditableArea'))) {
			$Wcms->set('blocks','newEditableArea', 'content', 'Your content here.');
		}

		// Fetch the value of the newEditableArea from database
		$value = $Wcms->get('blocks','newEditableArea','content');

		// If value is empty, let's put something in it by default
		if (empty($value)) {
			$value = 'Empty content';
		}
		if ($Wcms->loggedIn) {
			// If logged in, return block in editable mode
			return $Wcms->block('newEditableArea');
		}

		// If not logged in, return block in non-editable mode
		return $value;
	}
?>