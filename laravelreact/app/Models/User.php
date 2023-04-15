<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon;
use Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = "id_user";
    public $timestamps = false;
    protected $fillable = [
        'nama_user', 'email', 'password','jenis_kelamin','tanggal_lahir','foto_user','telp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    static function tambah_user($nama_user,$email,$password,$jenis_kelamin,$tanggal_lahir,$foto_user,$telp){
        User::create([
            "nama_user" => $nama_user,
            "email" => $email,
            "password" => bcrypt($password),
            "jenis_kelamin" => $jenis_kelamin,
            "tanggal_lahir" => Carbon::parse($tanggal_lahir),
            "foto_user" => $foto_user,
            "telp" => $telp,
        ]);
    }

    static function login_user($email,$password,$posisi=""){
        $credential = [
                "email" => $email,
                "password" =>$password,
            ];
        
        //dd($credential);
        return Auth::attempt($credential,true);
    }

     static function list_user(){
        $data = User::all();
        return $data;
    }

    static function detail_user($id_user){
        $data = User::where("id_user",$id_user)->first();
        return $data;
    }

    static function ubah_password($id_user,$password){
        $data = User::where("id_user",$id_user)->first();
        $data->password = bcrypt($password);
        $data->save();
    }
}
