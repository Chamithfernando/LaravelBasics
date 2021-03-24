<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


//this model intreat with database


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avater',
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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*

    #getting wrong when trying to mearge User and User controller into one place.

    public static function updalodAvater($image)
    {
        # code...
        # Getting the orginal name of the file
        $fileName =$request->image->getClientOriginalName();

           
        //Calling delete old image function
        $this->deleteOldImage();



        #Storing the file
        $request -> image->storeAs('images',$fileName,'public');
        #Updating the User that related to this averter
                    // User :: find(1)->update(['avater' => $fileName]);

        $this->update(['avater' => $fileName]);
    }


    protected function deleteOldImage(){

        if ($this-> avater) {
            # code...
            Storage::delete('/public/images/'.$this->avater);
        }
    }

     



    //Acessor and mutator is example of this 


    //Mutator
    //Mutate change the behavior of the attribute that we difine

   
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    //Accessor
    //accessor transforms an Eloquent attribute value when it is accessed
    public function getNameAttribute($name)
    {
        return ucfirst($value);
    }

    */
}
