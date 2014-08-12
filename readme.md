# Laravel repository

## Goals

Provide a common interface for a repository implementation using laravel framework.
The goal here is to abstract Eloquent models by using standard php objects (stdClass and arrays). This way, you can switch later to another data source such as MongoDB without touching your models.
This package enable you to write your own repository with only a few lines.
This package handle fetching Eloquent data, and converting them to plain PHP objects. More data providers will be added later as they are needed. 

## Installation

### Import the package

To install, simply add the following line to your composer .json and run composer update:

```json
"atrakeur/repository": "dev-master"
```

Then add the following service provider to your app.php:

```php
'Atrakeur\Repository\RepositoryServiceProvider',
```

### Create your first repository

A basic repository definition look like that:

```php
<?php

use \Atrakeur\Repository\Eloquent\EloquentConverter;
use \Atrakeur\Repository\Eloquent\AbstractEloquentRepository;

class CategoryRepository extends AbstractEloquentRepository {

	public function __construct(Category $model, EloquentConverter $converter) 
	{
		parent::__construct($model, $converter);
	}

}
```

Here, we extends AbstractEloquentRepository because we are using Eloquent as a underlying data provider. The goal here is to enable you to switch the data provider but still keeping the same external interface to keep your controllers and views as-is;
When you'll have to switch to another provider, all you'll have to do is to change AbstractEloquentRepository to something else like AbstractMongoRepository and all your controllers will work.

### Contributing

For now, this package only support Eloquent models, but by using standard php objects, this package is ready to support any other provider that php itself support.
Of course, I'll be glad to help in implenting such data providers. And I'll really appreciate that your contribute back anything you do on that subject.
Each Repository type is usually made of two class: The AbstractRepository, that contains primitives for fetching data, and the Converter, that is used to convert objects returned by your repository to standard php objects.
To contribute, just write your own Repository type then submit a pull request. Please make sure it doesn't have side effects. Please keep it as simple as possible by the way.

