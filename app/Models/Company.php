<?php

namespace App\Models;

use App\Models\AttProfile;
use App\Models\Department;
use App\Models\Holiday;
use App\Models\HolidayProfile;
use App\Models\Office;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function offices()
    {
    	return $this ->hasMany(Office::class) ;
    }

    public function departments()
    {
    	return $this ->hasMany(Department::class) ;
    }


    public function positions()
    {
    	return $this ->hasMany(Position::class) ;
    }

    public function holidayProfiles()
    {
    	return $this ->hasMany(HolidayProfile::class) ;
    }

    public function holidays()
    {
    	return $this ->hasMany(Holiday::class) ;
    }

    public function attProfiles()
    {
    	return $this ->hasMany(AttProfile::class) ;
    }

    public function users()
    {
    	return $this ->hasMany(User::class) ;
    }

}
