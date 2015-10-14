<?php

class Calendar {

	public $table, $year, $month;



	public function __construct($year = 0, $month = 0) {

		if (!$year) {
			$this->year = date('Y');
		} else {
			$this->year = $year;
		}

		if (!$month) {
			$this->month = date('m');
		} else {
			$this->month = $month;
		}

	}

	public function createTable() {

		$defaults = [];

		$openingstijden = get_field('standaard_openingstijden', 'options')[0];

		foreach ($openingstijden as $openingstijd) {
			$defaults[] = $openingstijd[0];
		}

		//print_r($defaults); die();

		$rules = [];

		$uitzonderingen = get_field('uitzondering');

		//print_r($uitzonderingen); //die();

		foreach ($uitzonderingen as $uitzondering) {
			$start = strtotime($uitzondering['start_datum']);
			$eind =  $uitzondering['eind_datum'] != '' ? strtotime($uitzondering['eind_datum']) : strtotime($uitzondering['start_datum']);

			$huidig = $start;
			while($huidig <= $eind) {

				$rule = [
					'type' => $uitzondering['type'],
					'titel' => $uitzondering['titel']
				];

				if ($uitzondering['aangepaste_openingstijd']) {
					$rule['aangepaste_openingstijd'] = $uitzondering['aangepaste_openingstijd'];
				}

				if ($uitzondering['aangepaste_sluitingstijd']) {
					$rule['aangepaste_sluitingstijd'] = $uitzondering['aangepaste_sluitingstijd'];
				}

				$rules[$huidig] = $rule;
				$huidig += (24 * 60 * 60);

			}
		}

		//print_r($rules); die();

		$this->table = new CalendarTable($this->year, $this->month, $rules, $defaults);
		$this->table->render();

		return $this->table->html;
	}

}



class CalendarTable {

	public $html = '',
		$number_of_rows = 6,
		$number_of_cols = 7,
		$month,
		$year,
		$days = [],
		$rules = [];

	public function __construct($year, $month, $rules, $defaults) {
		$this->html = '';
		$this->month = $month;
		$this->year = $year;
		$this->rules = $rules;
		$this->defaults = $defaults;

		$this->_constructDays();
	}

	public function render() {
		$this->_tableOpen();

		$this->_tableHeader();

		$column_counter = 0;
		foreach ($this->days as $day) {
			if ($column_counter % 7 == 0) {
				$this->_rowOpen();
			}

			$this->_generateCell( $day, $this->month == (int) date('m', $day) );

			$column_counter++;

			if ($column_counter % 7 == 0) {
				$this->_rowOpen();
			}

		}

		$this->_tableClose();
	}

	private function _generateCell($timestamp, $is_in_current_month = true) {

		$open = '10:00';
		$close = '17:00';

		$dagnummer = date('N', $timestamp);

		$open = $this->defaults[$dagnummer - 1]['open'];
		$close = $this->defaults[$dagnummer - 1]['sluit'];

		$rule = isset($this->rules[$timestamp]) ? $this->rules[$timestamp] : false;

		$titel = ($rule && isset($rule['titel']) ) ? $rule['titel'] : '';

		$class = 'normal';

		//print_r($rule);

		if ($rule && $rule['type'] == 'gesloten') {
			$class = 'closed';
		}

		if ($rule && $rule['type'] == 'aangepaste_tijden') {
			$class = 'changed';
			$open = $rule['aangepaste_openingstijd'];
			$close = $rule['aangepaste_sluitingstijd'];
		}

		if (!$is_in_current_month) {
			$class = 'inactive';
		}

		error_log('>>> Je rule '.$timestamp.' - '.json_encode($class).' '.json_encode($this->rules[$timestamp]));

		$this->html .=
			'<td class="' . $class . '">
				<div class="td-wrap">
					<em class="day">' . date('j', $timestamp) . '</em>';

		if ($class != 'closed' && $class != 'inactive') {
			$this->html .= '<span class="title">' . $titel . '</span><br>';
			$this->html .= '<span class="times">' . $open . ' - ' . $close . '</span>';
		}

		$this->html .= '
				</div>
			</td>';
	}

	private function _constructDays() {
		// eerst bepalen op welke dag de 1ste van de maand valt: (1 is maandag)
		$first_day_of_month = strtotime($this->year . '-' . str_pad($this->month, 2, '0', STR_PAD_LEFT) . '-01');
		$first_day_number_of_month = date( 'N', $first_day_of_month );
		$number_of_days_in_previous_month = $first_day_number_of_month - 1;

		//echo $first_day_of_month;

		$start_time_stamp = $first_day_of_month - (24 * 60 * 60 * $number_of_days_in_previous_month);

		$cell_counter = 0;
		$laatse_dag_verwerkt = false;
		$timestamp = $start_time_stamp;

		while (++$cell_counter) {
			//echo $cell_counter;
			$this->days[] = $timestamp;
			$timestamp += (24 * 60 * 60);

			// stoppen zodra we de laatste rij gevuld hebben met dagen van de volgende maand (let ook even op december)
			if ( ( ( date('m', $timestamp) > $this->month || ( date('m', $timestamp) == 1 && $this->month == 12) ) && $cell_counter % 7 == 0 ) || $cell_counter > 50 ) {
				break;
			}

		}

		//print_r($this->days); echo date('d-m-y', $this->days[count($this->days) - 1]);
		//echo 'first day of month ' . $this->year . '-' . str_pad($this->month, 2, '0', STR_PAD_LEFT) . '-01';
		//echo $first_day_of_month;
	}

	private function _tableOpen() {
		$this->html .= '<table class="table">';
	}

	private function _tableClose() {
		$this->html .= '</table>';
	}

	private function _rowOpen() {
		$this->html .= '<tr>';
	}

	private function _rowClose() {
		$this->html .= '</tr>';
	}

	private function _tableHeader() {
		$dagen = ['Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za', 'Zo'];

		$this->html .= '<thead><tr>';

		foreach ($dagen as $dag) {
			$this->html .= '<th>' . $dag . '</th>';
		}

		$this->html .= '</tr></thead>';
	}

}