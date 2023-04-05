<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Database\Factories\FormFactory;

class FormModel extends Model
{
    use HasFactory;

    protected $table = 'forms';
    protected $id = 'number';
    protected $name = 'string';
    protected $appeal = 'string';

    public $timestamps = false;

    /**
     * Создать новый экземпляр фабрики для модели.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return FormFactory::new();
    }
}