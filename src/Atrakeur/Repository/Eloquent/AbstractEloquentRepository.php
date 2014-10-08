<?php namespace Atrakeur\Repository\Eloquent;

use \Atrakeur\Repository\Eloquent\EloquentConverter;
use \Illuminate\Database\Eloquent\Model as Eloquent;

use \Atrakeur\Repository\Interfaces\BasicRepositoryInterface;
use \Atrakeur\Repository\Interfaces\RelationRepositoryInterface;
use \Atrakeur\Repository\Interfaces\SaveRepositoryInterface;

abstract class AbstractEloquentRepository 
	implements BasicRepositoryInterface, RelationRepositoryInterface, SaveRepositoryInterface {

	protected $model;
	protected $query;

	public function __construct(Eloquent $model, EloquentConverter $converter)
	{
		$this->model     = $model;
		$this->converter = $converter;
		$this->resetScope();
	}

	protected function boot()
	{
	}

	public function resetScope()
	{
		$this->query = $this->model;
		$this->boot();
		return $this;
	}

	public function with(Array $array)
	{
		$this->query = $this->query->with($array);
		return $this;
	}

	public function byField($field, $value)
	{
		$this->query = $this->query->where($field, '=', $value);
		return $this;
	}

	public function byId($ident)
	{
		$this->query = $this->query->where('id', '=', $ident);
		return $this;
	}

	public function paginate($itemCount)
	{
		$data = $this->query->paginate($itemCount);
		$this->resetScope();
		return $this->converter->convert($data);
	}

	public function getOne()
	{
		$data = $this->query->first();
		$this->resetScope();
		return $this->converter->convert($data);
	}

	public function getMany()
	{
		$data = $this->query->get();
		$this->resetScope();
		return $this->converter->convert($data);
	}

	public function save($data, $model = null)
	{
		if ($model == null)
		{
			$model = $this->model;
		}

		$dataModel = $this->converter->import($data, $model);
		$dataModel->save();	
	}

}