<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    // ... other attributes and methods

    /**
     * Define a one-to-many relationship with RequestItem model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requestItems()
    {
        return $this->hasMany(RequestItem::class);
    }

    /**
     * Define a one-to-many relationship with Transaction model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
