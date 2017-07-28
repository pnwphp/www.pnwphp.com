<?php
namespace App\Models\Api;

use App\Http\Controllers\Controller;

/**
 * @property-read int $day
 */
trait DateFixer {
	/**
	 * Dates are not currently stored with talks.  This method maps days to dates until the date is added to the DB
	 * @return string Y-m-d format
	 */
	public function getDate() {
		$controller = new Controller();
		$days = $controller->days;
		if($days[$this->day] == 'Wednesday') {
			return '2017-09-06';
		}
		if(in_array($days[$this->day], ['Thursday', 'Thursday Room 111', 'Thursday Room 178'])) {
			return '2017-09-07';
		}
		if($days[$this->day] == 'Friday') {
			return '2017-09-08';
		}
		if($days[$this->day] == 'Saturday') {
			return '2017-09-09';
		}
		if($days[$this->day] == 'Sunday') {
			return '2017-09-10';
		}
		return '2000-01-01';
	}
}