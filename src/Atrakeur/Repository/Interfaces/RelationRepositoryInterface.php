<?php namespace Atrakeur\Repository\Interfaces;

/**
 * Interface for a relationnable repository
 *
 * A relation repository is a repository that can query related models
 */
interface RelationRepositoryInterface {

	/**
	 * Select linked data objects to get
	 * @param  Array  		$array attributes
	 * @return this        	return this instance
	 */
	public function with(Array $array);

}