<?php

namespace diser;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'id_grupo',
     'id_entidad',
     'id_role',
     'documento',
     'name','apellido',
     'email',
     'password',
     'estado',
 ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //  public function rol()
    // {
    //     return $this->belongsTo('App\Model\Rol');
    // }

    public function isAdmin()
    {
        if ($this->id_role == 1989) {
            return true;
        } else {
            return false;
        }
    }

    public function isUser()
    {
        if ($this->id_role == 4) {
            return true;
        } else {
            return false;
        }
    }

     public function isJurado()
    {
        if ($this->id_role == 1990) {
            return true;
        } else {
            return false;
        }
    }


   
    

}
