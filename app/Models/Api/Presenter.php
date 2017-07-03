<?php

namespace App\Models\Api;

class Presenter {
	/**
	 * @var int
	 */
	public $id;

	/**
	 * @var string
	 */
	public $fullname;

	/**
	 * Mention name only
	 * @var string
	 */
	public $twitter;

	/**
	 * URL
	 * @var string
	 */
	public $picture;

	/**
	 * Some HTML OK
	 * @var string
	 */
	public $bio;

	/**
	 * @var string
	 */
	public $jobtitle;

	/**
	 * @var string
	 */
	public $organization;

	/**
	 * @var string
	 */
	public $interests;
}