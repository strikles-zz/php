<?php

add_filter("gform_pre_submission_filter", "add_barcode");
function add_barcode($form) {

	//print_r($_POST); die();

	$totaal = 0;

	foreach($form['fields'] as $field) {
		if ($field['type'] == 'product') {
			$totaal = $_POST['input_' . $field['id'] . '_3'];
		}
	}

	foreach($form['fields'] as $field) {
		if ($field['inputName'] == 'barcode') {
			$barcodes = [];
			for ($i = 0; $i < $totaal; $i++) {
				$barcodes[] = generate_barcode();
			}
			$_POST['input_' . $field['id']] = implode(',', $barcodes);
		}
	}

	return $form;
}

function generate_barcode() {
	return substr(number_format(time() * rand(), 0, '', ''), 0, 10);
}