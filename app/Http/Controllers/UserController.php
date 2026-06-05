<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:user.index')->only('index');
        $this->middleware('can:user.create')->only('create', 'store');
        $this->middleware('can:user.destroy')->only('destroy');
        $this->middleware('can:user.show')->only('show');
        $this->middleware('can:user.edit')->only('edit', 'update');
    }


    public function index()
    {
        $users = User::all();
        $i = 0;
        return view('pages.user.index', compact('users', 'i'));
    }
    public function create()
    {
        $codigo = User::count() + 1;
        $roles = Role::all();
        return view('pages.user.create', compact('codigo', 'roles'));
    }

    public function store(Request $request)
    {
        request()->validate(User::$rules);
        $mytime = Carbon::now('America/Lima');
        $user = new User();
        $user->codi_usuario = $request->codi_usuario;
        $user->nombres = strtoupper($request->nombres);
        $user->ape_paterno = strtoupper($request->ape_paterno);
        $user->ape_materno = strtoupper($request->ape_materno);
        $user->usuario = $request->usuario;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->fecha_creacion = $mytime->toDateString();
        $user->estado = 1;
        if ($request->hasFile('imagen')) {
            $nombreimg = $user->codi_usuario . "-" . $request->file('imagen')->getClientOriginalName();
            $ruta = storage_path() . '\app/public/img/usuario/' . $nombreimg;
            Image::make($request->file('imagen'))->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ruta);
        } else {
            $nombreimg = "default.png";
        }
        $user->imagen = $nombreimg;

        $user->save();
        $user->roles()->sync($request->rol);
        return redirect()->route('user.index')
            ->with('success', 'Usuario Agregado Correctamente.');
    }
    public function update(Request $request, User $user)
    {
        $id = $user->id_usuario;
        $requ = \Validator::make($request->all(), [
            'usuario' => [
                'required',
                'max:50',
                Rule::unique('tf_usuarios', 'usuario')->ignore($id, 'id_usuario')
            ],
            'password' => 'nullable',
            'nombres' => 'required|max:50',
            'ape_paterno' => 'required|max:50',
            'ape_materno' => 'required|max:50',
            'email' => 'nullable|email|max:50',
            'imagen' => 'nullable'
        ]);
        if ($requ->fails()) {
            return Redirect::back()->with('error_code', 5)->withErrors($requ->errors())->withInput();
        } else {
            $user->nombres = strtoupper($request->nombres);
            $user->ape_paterno = strtoupper($request->ape_paterno);
            $user->ape_materno = strtoupper($request->ape_materno);
            $user->usuario = $request->usuario;
            $user->email = $request->email;
            if ($request->password == "") {
            } else {
                $user->password = bcrypt($request->password);
            }
            if ($request->hasFile('imagen')) {
                if ($user->imagen != 'default.png') {
                    Storage::delete('public/img/usuario' . $user->imagen);
                }
                $nombreimg = $user->codi_usuario . "-" . $request->file('imagen')->getClientOriginalName();
                $ruta = storage_path() . '\app\public\img\usuario/' . $nombreimg;
                Image::make($request->file('imagen'))->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($ruta);
            } else {
                $nombreimg = $user->imagen;
            }
            $user->imagen = $nombreimg;
            $user->save();
            $user->roles()->sync($request->rol);
            return redirect()->route('user.index')->with('success', 'Usuario Modificado Correctamente!');
        }
    }
    public function destroy(Request $request)
    {
        $mytime = Carbon::now('America/Lima');
        $user = User::findOrFail($request->id_usuario_2);
        if ($user->estado == "1") {
            $user->estado = '0';
            $user->fecha_cese = $mytime->toDateString();
            $user->save();
            return redirect()->back()->with('success', 'Usuario Desactivado Correctamente!');
        }else{
            $user->estado = '1';
            $user->fecha_cese = null;
            $user->save();
            return redirect()->back()->with('success', 'Usuario Activo Correctamente!');
        }
    }

    public function show(User $user)
    {
        return view('pages.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('pages.user.edit', compact('user', 'roles'));
    }
}
