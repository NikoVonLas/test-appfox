<?php

namespace App\Helpers;

use App\Traits\Models\Subscription\HasSubscribers;

class Reflection {

	/**
     * Get all subscrizable types
     *
     * @param  \App\Models\User  $user
     * @return array[string, ...]
     */
	public static function getSubscrizableTypes() :array {
		$types = [];
		foreach (self::getModelsUsesTrait(HasSubscribers::class) as $model) {
			$types[] = $model::$subscrizableType;
		}

		return array_unique($types);
	}

	/**
     * Get all model classes with some trait
     *
     * @param  \App\Models\User  $user
     * @return array[string, ...]
     */
	public static function getModelsUsesTrait(string $traitName) :array {
		$autoloadFile = base_path() . '/vendor/composer/autoload_classmap.php';
		if (!file_exists($autoloadFile)) {
			throw new \Exception("Error when get all models with \"{$traitName}\" Trait! Run composer first.");
		}
		$classes = include($autoloadFile);
		$models = [];
		foreach ($classes as $class => $file) {
			if (str_starts_with($class, 'App\Models') && in_array($traitName, class_uses($class))) {
				$models[] = $class;
			}

	    }
	    return $models;
	}
}
