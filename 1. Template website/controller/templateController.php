<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\resources\views\template;
use DB;
   $con=mysqli_connect("localhost","root","","laravel_db")or die('couldnot connect');

class templateController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function register(Request $req)
    {
    	$full_name=$req->input('full_name');
    	$email_address=$req->input('email_address');
    	$password1=$req->input('password1');
    	$password2=$req->input('password2');
    	$data = array('full_name'=>$full_name,'email_address'=>$email_address ,'password1'=>$password1, 'password2'=>$password2 );
    	$checkregister=DB::table('registration')->insert($data);

        if(count($checkregister) > 0)
        {
            echo "Registration has been successfully done...";
        }
        else
        {
            echo "problem for Registration..";
        }

    }
     

    public function login(Request $req)
    {
        $email_address=$req->input('email_address');
        $password1=$req->input('password1');
        $data = array('email_address'=>$email_address,'password1'=>$password1 );
        $checklogin=DB::select('select email_address from login  where email_address=? and password1=?', [$email_address, $password1]);

        if(count($checklogin) > 0)
        {
            echo "you are successfully logged in";
        }
        else
            echo "please enter correct password or email";

    }


    public function contact(Request $req)
    {
        $name=$req->input('name');
        $email_address=$req->input('email_address');
        $phone=$req->input('phone');
        $message=$req->input('message');
        $data = array('name'=>$name,'email_address'=>$email_address ,'phone'=>$phone, 'message'=>$message );
        $checkcontact=DB::table('contact')->insert($data);

        if(count($checkcontact) > 0)
        {
            echo "thank you for your comments...";
        }
        else
        {
            echo "problem for Registration..";
        }

    }

}
?>
<html>
<form action="" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
<button type="submit" name="submit" value="submit" class="btn btn-primary submit">BACK</button>
</form>
</html>
