<?php

/**
 * Array defining default converters to use for each interface
 * These converters are bind using laravel's IoC
 * To force a type of converter for one repository, please override the constructor using strong type
 */
return array(

	'Atrakeur\Repository\Eloquent\EloquentConverter' => 'Atrakeur\Repository\Eloquent\Converters\EloquentToObjectConverter'

);
