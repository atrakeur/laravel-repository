<?php namespace Atrakeur\Repository\Eloquent\Converters;

use \stdClass;
use \Exception;
use \Illuminate\Database\Eloquent\Model as Eloquent;
use \Illuminate\Database\Eloquent\Collection;
use \Illuminate\Pagination\Paginator;
use \Atrakeur\Repository\Eloquent\EloquentConverter;

/**
 * Convert an Eloquent model to an stdClass object and array
 */
class EloquentToObjectConverter implements EloquentConverter {

	private function paginatorToObject(Paginator $models)
	{
		$data = new stdClass();
		$src  = $models->toArray();

		foreach ($src as $key => $value) {
			if ($key == 'data')
			{
				$data->$key = $this->convert(new Collection($models->getItems()));
			}
			else
			{
				$data->$key = $value;	
			}
		}

		$data->links = $models->links();

		return $data;
	}

	private function eloquentToObject(Eloquent $models)
	{
		$data = new stdClass();
		foreach ($models->toArray() as $key => $value) 
		{
			$camelKey = camel_case($key);
			if (isset($models->$camelKey)) 
			{
				$data->$camelKey = $this->convert($models->$camelKey);
			}
			
			$data->$key = $this->convert($models->$key);
		}
		return $data;
	}

	private function collectionToObject(Collection $models)
	{
		$data = array();
		foreach ($models as $key => $value) {
			$data[$key] = $this->convert($value);
		}
		return $data;
	}

	public function convert($models)
	{
		if ($models instanceof Paginator)
		{
			return $this->paginatorToObject($models);
		}
		if ($models instanceof Eloquent)
		{
			return $this->eloquentToObject($models);
		}
		if ($models instanceof Collection)
		{
			return $this->collectionToObject($models);
		}

		return $models;
	}

	public function import($object, $model)
	{
		$data = $model->newInstance();

		foreach($object AS $key => $value)
		{
			$data->$key = $value;
		}

		return $data;
	}

}