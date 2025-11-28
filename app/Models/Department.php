<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Department extends Model
{
    protected $fillable = [
        'id',
        'nama_department',
        'description',
        'jabatan',
        'aksi',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($department) {
            // Delete all positions related to this department
            foreach ($department->positions as $position) {
                $position->delete();
            }

            // Set department_id to null for all employees related to this department
            foreach ($department->employees as $employee) {
                $employee->department_id = null;
                $employee->save();
            }
        });
    }

    public static function createTable()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });
    }

    public static function dropTable()
    {
        Schema::dropIfExists('departments');
    }

}