<?php

namespace App\Models\Api;


class Event {
	/**
	 * @var int
	 */
	public $id;

	/**
	 * @var string
	 */
	public $title;

	/**
	 * Some HTML OK
	 * @var string
	 */
	public $abstract;

	/**
	 * @var string
	 */
	public $type;

	/**
	 * @var Presenter[]
	 */
	public $presenter = [];

	/**
	 * @var string
	 */
	public $category;

	/**
	 * @var string
	 */
	public $session_type;

	/**
	 * @var string
	 */
	public $experience_level;

	/**
	 * @var string
	 */
	public $room;

	/**
	 * @var string
	 */
	public $date;

	/**
	 * @var string
	 */
	public $start;

	/**
	 * @var string
	 */
	public $end;

	/**
	 * @return string
	 */
	public function __toString() : string {
		return "{$this->start} " . trim($this->title) . " ({$this->room})";
	}
}
