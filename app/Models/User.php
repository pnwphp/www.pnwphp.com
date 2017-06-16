<?php

namespace App\Models;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ultraware\Roles\Traits\HasRoleAndPermission;
use Ultraware\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Authenticatable implements HasRoleAndPermissionContract
{
    use Notifiable, HasRoleAndPermission, SendsPasswordResetEmails;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function speaker()
    {
        return $this->hasOne('App\Models\Speaker', 'user_id', 'id');
    }

    public function sponsors()
    {
        return $this->belongsToMany('App\Models\Sponsor');
    }

    public function save(array $options = [])
    {
        $savePassword = $this->password;
        if (!$this->password) {
            $this->password = \Hash::make(time());
        }
        parent::save();
        if (!$savePassword) {
            \Log::debug("User->save() no password, send email to ".$this->email);
            $this->broker()->sendResetLink(['email' => $this->email]);
            parent::save();
        }
    }
}
