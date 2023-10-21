<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestUser;
use App\Models\Divisiones;
use App\Models\Rol;
use App\Models\Unidades;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function create()
    {
        $this->middleware('auth');
        $roles = Rol::get();
        $divisiones = Divisiones::get()->except(1);

        return view('auth.register', compact('roles', 'divisiones'));
        // return view('auth.register')->with("roles", $roles);
    }

    /**
     * Store a newly created outlet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(RequestUser $data)
    {
        $divi = 1;
        $uni = 1;

        if ($data['division']) {
            $divi = $data['division'];
        }
        if ($data['unidad']) {
            $uni = $data['unidad'];
        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'rol_id'    => $data['rol_id'],
            'div_id'    => $divi + 1,
            'uni_id'    => $uni,
        ]);

        // return view('auth.register')->with('mensaje', 'success');
        return redirect()->route('register.index')->with('mensaje', 'Usuario creado correctamente');
    }

    /**
     * Store a newly created outlet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function update(RequestUser $data)
    {
        // dd($data);
        $usuario = User::find($data->id_user);

        $divi = 1;
        $uni = 1;

        if ($data->division) {
            $divi = $data->division;
        }
        if ($data->unidad) {
            $uni = $data->unidad;
        }
        $usuario->name = $data->name;
        $usuario->email = $data->email;
        $usuario->rol_id = $data->rol_id;
        $usuario->div_id = $divi;
        $usuario->uni_id = $uni;
        if($data->password){
            $usuario->password = $data->password;
        }

        $usuario->save();

        // return view('auth.register')->with('mensaje', 'success');
        return redirect()->route('register.index')->with('mensaje', 'Usuario creado correctamente');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        return User::dataTable();
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'rol_id' => ['required', 'max:10'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function index()
    {
        $this->authorize('manage_outlet');

        $user = User::get();

        return view('auth.index', compact('user'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function show(Int $id)
    {
        $this->authorize('manage_outlet');

        $user = User::where('users.id', $id)
            ->join('roles', 'rol_id', 'roles.id')
            ->join('divisiones', 'div_id', 'divisiones.id')
            ->join('unidades', 'uni_id', 'unidades.id')
            ->select('users.id as userId', 'users.*', 'roles.*', 'divisiones.nombre AS divi', 'unidades.nombre AS uni')
            ->first();
        $divisiones = Divisiones::get()->except(1);
// dd($user);
        return view('auth.show', compact('user', 'divisiones'));
    }

      /**
     * Show the form for editing the specified outlet.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\View\View
     */
    public function edit(Int $users)
    {
        $this->authorize('manage_outlet');

        $users = User::findOrFail($users);
        $roles = Rol::get();
        $divisiones = Divisiones::get()->except(1);
        $unidades = Unidades::get()->except(1);

        return view('auth.edit', compact('users', 'divisiones', 'roles', 'unidades'));
    }

    /**
     * Remove the specified outlet from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Routing\Redirector
     */
    public function eliminar(Request $request)
    {
        $user = User::find($request->id)->delete();


        // if ($request->get('outlet_id') == $outlet->id && $outlet->delete()) {
            return redirect()->route('register.index');
        // }

        // return back();
    }
    
}
