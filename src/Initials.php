<?php

namespace Davidpiesse\NovaAvatars;

use Identicon\Identicon as yIdenticon;
use Laravel\Nova\Fields\Avatar;

class Initials extends Avatar
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
            $return = \Avatar::create($resource{$attribute})->toBase64();
            return $return->encoded;
        };

        $this->preview($callback)->thumbnail($callback);
    }
}
