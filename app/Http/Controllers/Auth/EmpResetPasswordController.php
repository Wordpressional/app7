<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
//Auth Facade
use Illuminate\Support\Facades\Auth;
use App\Notifications\EmpResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use App\user;
use App\Shop\Employees\Repositories\EmployeeRepository;
use App\Shop\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Support\Facades\Hash;


class EmpResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
   use Notifiable;


    /**
     * Where to redirect users after reset password.
     *
     * @var string
     */
    protected $redirectTo = '/';
    private $employeeRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->middleware('guest');
        $this->redirectTo = route('admin.dashboard');
        $this->employeeRepo = $employeeRepository;
    }

    //Shows form to request password reset
    public function showempResetForm(Request $request, $token = null)
    {
        
        return view('auth.passwords.empreset', [
            
            'token' => $token, 
            'email' => $request->email
        ]);
    }

    protected function resetPassword(Request $request)
	{
	
	$user = User::where('email', $request->email)->first();

    $user->password = $request->password;

    $user->save();

    $employee = $this->employeeRepo->findByEmail($request->email);

        $employee->password = Hash::make($request->password);
            $employee->save();
        

    //Auth::login($user, true);
    	return redirect()->route('admin.dashboard');
	}

     

     //returns Password broker of seller
    public function broker()
    {
        return app('auth.password')->broker('users');
    }

    //returns authentication guard of seller
    protected function guard()
    {
        return Auth::guard('employee');
    }
}
