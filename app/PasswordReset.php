<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

    /**
     *  @OA\Schema(
     *        @OA\Property( property="id",type="integer", example = 1),
     *        @OA\Property( property="email",type="string", example = "hello@isme.com"),
     *        @OA\Property( property="token",type="string", example = "Get token from Email"),
     *        @OA\Property( property="deleted_at",type="string", example = "2020-06-25 07:06:53"),
     *        @OA\Property( property="created_at",type="string", example = "2020-06-25 07:06:53"),
     *  ),    
     * 
     */
class PasswordReset extends Model
{
    use HasApiTokens;
    protected $fillable = [
        'email',
        'token',
    ];
    protected $table = 'password_resets';
}
