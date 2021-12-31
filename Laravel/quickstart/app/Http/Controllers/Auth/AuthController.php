<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Contracts\Services\Auth\AuthServiceInterface;
  
class AuthController extends Controller
{   

    /**
     * Create a new controller instance.
     * @param AuthServiceInterface $authServiceInterface
     * @return void
     */
    public function __construct(AuthServiceInterface $authServiceInterface)
    {
        $this->authInterface = $authServiceInterface;
    }
    /**
     * login page
     * @return url
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    /**
     * registration user
     * @return url
     */
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * login check
     * @param Request $request 
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
  
        return redirect("login")->withErrors('Oppes! You have entered invalid credentials');
    }
      
    /**
     * Registration check
     * @param Request $request 
     * @return redirect to dashboard
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * dashboard page 
     * @return redirect to dashboard
     * @return redirect to login
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * create user
     * @param array $data
     * @return boolean
     */
    public function create(array $data)
    {
        return $this->authInterface->create($data); 
    }
    
    /**
     * logout user
     * @return redirect to login
     */
    public function logout() {
        Session::flush();
        Auth::logout();  
        return Redirect('login');
    }
}