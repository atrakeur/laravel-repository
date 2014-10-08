<?php namespace Atrakeur\Repository\Eloquent\Converters;

use \stdClass;
use \Exception;
use \Illuminate\Database\Eloquent\Model as Eloquent;
use \Illuminate\Database\Eloquent\Collection;
use \Illuminate\Pagination\Paginator;
use \Atrakeur\Repository\Eloquent\EloquentConverter;

/**
 * Basically does nothing. Convert an Eloquent model to an Eloquent model (simply return it)
 * 
 * Usefull when you just want to return the eloquent model without any transformation
 *
 * Be warned that doing it break the repository principe because the repository will leak the Eloquent dependency into your controllers
 * However, sometimes, it's better to do it to avoid too much changes (for example porting an application to the pattern)
 */
class EloquentToEloquentConverter implements EloquentConverter {

	public function convert($models)
	{
		return $models;
	}

	public function import($object, $model)
	{
		return $object;
	}

}