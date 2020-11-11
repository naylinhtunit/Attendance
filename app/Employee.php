<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
    /**
     *  @OA\Schema(
     *        @OA\Property( property="id",type="integer", example = 1),
     *        @OA\Property( property="email",type="string", example = "hello@isme.com"),
     *        @OA\Property( property="password",type="string", example = "password"),
     *        @OA\Property( property="deleted_at",type="string", example = "2020-06-25 07:06:53"),
     *        @OA\Property( property="created_at",type="string", example = "2020-06-25 07:06:53"),
     *        @OA\Property( property="updated_at",type="string", example = "2020-06-25 07:06:53"),
     *  ),    
     * 
     */
class Employee extends Authenticatable
{

    protected $table = 'employees';
    protected $guard = 'employee';

    use HasApiTokens,Notifiable;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'department_id',
        'role_id',
        'name',
        'email',
        'password',
        'phone',
        'address',
        'join_date',
        'resign_date',
        'gender',
        'salary',
        'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function attendance(){
        return $this->hasMany(Attendance::class, 'employee_id');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function common(){
        return $this->belongsTo(CommonCategory::class, 'gender');
    }
    
    public static function boot() {
        parent::boot();

        static::deleting(function($del) {
             $del->attendance()->delete();
        });
    }
}

    /**
     *  @OA\Schema(
     *        schema="EmployeeLogin",
     *        @OA\Property(property="email",ref="#/components/schemas/Employee/properties/email"),
     *        @OA\Property(property="password",ref="#/components/schemas/Employee/properties/password"),
     *  ), 
     *  @OA\Schema(
     *        schema="RequestPasswordReset",
     *        @OA\Property(property="email",ref="#/components/schemas/Employee/properties/email"),
     *  ), 
     *  @OA\Schema(
     *        schema="ResetPassword",
     *        @OA\Property(property="token",ref="#/components/schemas/PasswordReset/properties/token"),
     *        @OA\Property(property="email",ref="#/components/schemas/Employee/properties/email"),
     *        @OA\Property(property="password",ref="#/components/schemas/Employee/properties/password"),
     *        @OA\Property(property="confirm_password",ref="#/components/schemas/Employee/properties/password"),
     *  ),
     */

