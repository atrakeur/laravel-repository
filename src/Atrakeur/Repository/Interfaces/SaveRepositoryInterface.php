<?php namespace Atrakeur\Repository\Interfaces;

/**
 * Interface for a saveable repository
 *
 * A saveable repository is a repository that can save his models
 */
interface SaveRepositoryInterface {

	/**
	 * Save corresponding data object
	 *
	 * The verrification of the data object is up to the repository
	 * 
	 * @param  mixed $data the data to save
	 * @return void
	 */
	public function save($data);

}