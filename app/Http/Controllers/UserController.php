<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\User\uploadAvatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{


    function uploadAvatar(Request $request){

       


        //Checking the file
        if ($request->hasFile('image')) {

          //  User::uploadAvatar($request->image);

            
            # Getting the orginal name of the file
            $fileName =$request->image->getClientOriginalName();

           
            //Calling delete old image function
            $this->deleteOldImage();



            #Storing the file
            $request -> image->storeAs('images',$fileName,'public');
            #Updating the User that related to this averter
                        // User :: find(1)->update(['avater' => $fileName]);

            auth()->user()->update(['avater' => $fileName]);
           


        }

          
        return redirect()->back();

    }

   

    //developing deleteOld image function
    protected function deleteOldImage(){

        if (auth()->user()->avater) {
            # code...
            Storage::delete('/public/images/'.auth()->user()->avater);
        }
    }






    public function index()
    {

        //


        //Row Sql query for crud operation;



        //


        //insert query
        /*
        DB::insert('insert into users (name, email,password) values (?, ?, ?)', [
             'vimal','vimalfdo@gmail.com','vim123']);
        return view('home');

       */

        // select query

        /*
        $users = DB::select('select * from users');
        return $users;

        */


        //Update Query

        /*
        $Updated = DB::update(
            'update users set name = ? where id = ?',
            ['Saman','1']
        );

        $users = DB::select('select * from users');
        return $users;
        */

        //Delete Query 
        /*
        $delete = DB::delete('delete from users where id =3');
        $users = DB::select('select * from users');
        return $users;
        */


        //Adding a new User

        /*

        $user = new User();
        $user ->name = 'Sumanapala';
        $user ->email = 'Sumanapala@gmail.com';
        $user ->password = bcrypt('Sumanapala123');
        $user ->save();

        
        */

        //Update record by given id

        /*
        User :: where('id',5)-> update(['name' => 'chamithFernanado']);
        $user = User::all();
        return $user;

        */

        //another method pf delete query
        //Model provide safty feature when ever you are fetching result from database. password are hidden on model User calss

        /*
        $user = User::all();
        return $user;


        */

        // Deleting by Id using another method
        /*
        User :: where('id',4)->delete();
        
        
        */

        $data = [
            'name' => 'Thanuka Prasad',
            'email'=> 'Thanuka@gmail.com',
            'password' =>'ThanukaFernanado',
        ];

        //User:: create($data);

        return view('home');


        
    }
}
