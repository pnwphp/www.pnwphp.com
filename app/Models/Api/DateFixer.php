<?php
namespace App\Models\Api;


trait DateFixer {
	/**
	 * Dates are not currently stored with talks.  This method maps days to dates until the date is added to the DB
	 * @return string Y-m-d format
	 */
	public function getDate() {
		if($this->day == 'Wednesday') {
			return '2017-09-06';
		}
		if(in_array($this->day, ['Thursday', 'Thursday Room 111', 'Thursday Room 178'])) {
			return '2017-09-07';
		}
		if($this->day == 'Friday') {
			return '2017-09-08';
		}
		if($this->day == 'Saturday') {
			return '2017-09-09';
		}
		if($this->day == 'Sunday') {
			return '2017-09-10';
		}
		return '2000-01-01';
	}
}