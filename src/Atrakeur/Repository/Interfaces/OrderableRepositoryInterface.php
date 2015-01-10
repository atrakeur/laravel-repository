<?php namespace Atrakeur\Repository\Interfaces;

/**
 * Interface for a relationnable repository
 *
 * A relation repository is a repository that can query related models
 */
interface OrderableRepositoryInterface {

	/**
	 * Order data by given field in ascending order
	 * @param  string $field the fieldName
	 * @return this        	return this instance
	 */
	public function orderByAsc($field);

	/**
	 * Order data by given field in descending order
	 * @param  string $field the fieldName
	 * @return this        	return this instance
	 */
	public function orderByDesc($field);

}