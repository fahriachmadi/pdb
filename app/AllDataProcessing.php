<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllDataProcessing extends Model
{
    protected $table = 'all_year_processing_for_ml';
    protected $fillable = ['passengers'];
    public $timestamps = false;
}
