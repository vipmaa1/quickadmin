<?php
namespace Laraveldaily\Quickadmin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Crud extends Model
{
    protected $fillable = [
        'position',
        'is_crud',
        'icon',
        'name',
        'title',
        'parent_id',
        'roles'
    ];

    /**
     * Convert name to ucfirst() and camelCase
     *
     * @param $input
     */
    public function setNameAttribute($input)
    {
        $this->attributes['name'] = ucfirst(Str::camel($input));
    }

    /**
     * Get children links
     * @return mixed
     */
    public function children()
    {
        return $this->hasMany('Laraveldaily\Quickadmin\Models\Crud', 'parent_id', 'id')->orderBy('position');
    }
}