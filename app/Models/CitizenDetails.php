<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenDetails extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'citizen_details';

     // Set the primary key to 'user_id'
    protected $primaryKey = 'citizen_id';

    // Set the incrementing property to false because 'user_id' is not auto-incrementing
    public $incrementing = false;

    // Set the key type to 'string' since 'user_id' is a string
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'citizen_id',
        'firstname',
        'middle_name',
        'lastname',
        'suffix',
        'address',
        'date_of_birth',
        'gender',
        'citizen_status',
        'blood_type',
        'height',
        'weight',
        'allergies',
        'condition',
        'medication',
        'emergency_contact_name',
        'emergency_contact_no',
    ];

    public function histories()
{
    return $this->hasMany(CitizenHistory::class, 'citizen_id');
}

    public function getAgeAttribute()
    {
        return \Carbon\Carbon::parse($this->date_of_birth)->age;
    }

    // Add an accessor for the gender attribute
    public function getGenderAttribute($value)
    {
        if ($value == 'M') {
            return 'Male';
        } elseif ($value == 'F') {
            return 'Female';
        }

        return $value; // return as is if neither 'M' nor 'F'
    }

 public function services()
{
    return $this->belongsToMany(Services::class, 'citizen_service', 'citizen_id', 'service_id');
}


    public function servicesAvailed()
    {
        return $this->belongsToMany(Services::class, 'citizen_service', 'citizen_id', 'service_id', );
    }
    public function diagnostics()
    {
        return $this->hasMany(Diagnostic::class, 'citizen_id'); // Foreign key is citizen_id in the diagnostics table
    }
}
