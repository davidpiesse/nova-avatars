<?php

namespace Davidpiesse\NovaAvatars;

use Laravel\Nova\Fields\Avatar;

class Laravolt extends Avatar
{
    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|null  $attribute
     * @param  mixed|null  $resolveCallback
     * @return void
     */
    public function __construct($name = 'Avatar', $attribute = 'email', $resolveCallback = null)
    {
        parent::__construct($name, $attribute ?? 'email', $resolveCallback);

        $this->exceptOnForms();

        $this->withMeta(['indexName' => '']);
    }

    /**
     * Resolve the given attribute from the given resource.
     *
     * @param  mixed  $resource
     * @param  string  $attribute
     * @return mixed
     */
    protected function resolveAttribute($resource, $attribute)
    {
        $callback = function () use ($resource, $attribute) {
            return \Laravolt\Avatar\Facade::create($resource->{$attribute})->setDimension(300)->toBase64()->encoded;
        };

        $this->preview($callback)->thumbnail($callback);
    }
}
