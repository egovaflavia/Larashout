<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait Uuids{
    /**
     * Boot functuin from laravel
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model)
        {
            if (empty($model->{$model->getKeyName})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    /**
     * get the value indicating wheter the IDs are incementing
     *
     * @return void
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * get the auto-incement key type
     *
     * @return void
     */
    public function getKeyType()
    {
        return 'string';
    }
}
?>
