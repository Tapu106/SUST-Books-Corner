<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class up extends Model
{
	protected $fillable = ['course_id','department','semester','type','file','extension'];

    protected $table = 'files_table';
}
