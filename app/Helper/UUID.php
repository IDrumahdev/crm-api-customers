<?php

namespace App\Helper;

use Ramsey\Uuid\Uuid as Generator;

trait UUID
{
    /**
    * Auto Create UUID
    *
    * @return void
    */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                $model->id = str_replace('-', '', Generator::uuid4()->toString());
            } catch (\Exception $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}
