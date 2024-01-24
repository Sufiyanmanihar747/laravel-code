<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuids
{
    protected function uuid($model)
    {
        if (empty($model->{$model->getKeyName()}))
        {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        }
        return $model->id;
    }

   /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

   /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
