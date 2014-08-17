<?php namespace Atrakeur\Repository\Interfaces;

/**
 * Interface for every basic repository
 *
 * A basic repository is a repository that has standard query capability
 */
interface BasicRepositoryInterface {

	/**
	 * Reset internal query filter
	 * @return void
	 */
	public function resetScope();

	/**
	 * Filter by field and value
	 * @param  string 		$field field name
	 * @param  mixed  		$value field value to match
	 * @return this         return this instance
	 */
	public function byField($field, $value);

	/**
	 * Filter by ident value (ie: the id field)
	 * @param  mixed  		$value ident value to match
	 * @return this         return this instance
	 */
	public function byId($ident);

	/**
	 * Return all results, paginated using page GET parameter
	 * @param  int    $itemCount number of items per page
	 * @return Mixed 			 data objects
	 */
	public function paginate($itemCount);

	/**
	 * Return one result (usually the first found)
	 * @return Mixed 			data objects
	 */
	public function getOne();

	/**
	 * Return many results (usually in the order found)
	 * @return Mixed  			data objects
	 */
	public function getMany();

}