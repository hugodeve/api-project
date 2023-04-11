<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class Client extends Model
{
    use HasApiTokens, HasFactory, Notifiable;   
    protected $table = 'clients';
    protected $fillable = [
        'cpf',
        'name',
        'birthdate',
        'gender',
        'address',
        'state',
        'city',
    ];
    protected $guardaded = ['id'];

     // Mutator to set the birthdate attribute in the correct format
     public function setBirthdateAttribute($value)
     {
         $this->attributes['birthdate'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
     }

}
