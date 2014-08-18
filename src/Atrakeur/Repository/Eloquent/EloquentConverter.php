<?php namespace Atrakeur\Repository\Eloquent;

/**
 * Convert an Eloquent model to something else
 */
interface EloquentConverter {

	public function convert($models);

}