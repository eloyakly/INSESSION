<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        // 1. Validación Integral (Formato, Requeridos y Unicidad)
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:50',
            'email'    => 'required|email|unique:usuarios,correo', // Valida duplicados de una vez
            'password' => 'required|min:8|confirmed', // 'confirmed' pide un campo password_confirmation
        ], [
            'email.unique' => 'Este correo ya está registrado en InSession.',
            'email.email'  => 'El formato del correo no es válido.',
            'password.min' => 'La contraseña es muy corta (mínimo 8 caracteres).'
        ]);

        // Si la validación falla, devolvemos los errores exactos
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Errores de validación',
                'errors'  => $validator->errors()
            ], 422);
        }

        try {
            // 2. Creación del Usuario
            $usuario = new Usuario();
            $usuario->nombre = $request->input('name');
            $usuario->correo = $request->input('email');
            $usuario->clave  = Hash::make($request->input('password'));        
            $usuario->save();

            return response()->json([
                'message' => '¡Usuario registrado correctamente en InSession!'
            ], 201); // 201 es el código estándar para "Creado"

        } catch (\Illuminate\Database\QueryException $e) {
            // 3. Error de Base de Datos (Conexión, tabla inexistente, etc.)
            return response()->json([
                'message' => 'Error de servidor: No se pudo conectar con la base de datos.'
            ], 500);
        } catch (\Exception $e) {
            // 4. Cualquier otro error inesperado
            return response()->json([
                'message' => 'Ocurrió un error inesperado. Inténtalo de nuevo.'
            ], 500);
        }
    }

    public function login(Request $request){
        // 1. Validación de formato
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'El correo es obligatorio para entrar a InSession.',
            'email.email'    => 'Introduce un formato de correo válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $correo = $request->input('email');
            $clave  = $request->input('password');

            // 2. Intentar autenticar
            // Nota: 'password' es el nombre que Laravel busca por defecto para validar el Hash
            if (Auth::attempt(['correo' => $correo, 'password' => $clave])) {
                
                $request->session()->regenerate(); // Seguridad contra fijación de sesiones
                $usuario = Auth::user();

                return response()->json([
                    'message' => '¡Sesión iniciada!',
                    'user'    => [
                        'nombre' => $usuario->nombre,
                        'nivel'  => $usuario->nivel,
                        'foto'   => $usuario->foto
                    ]
                ], 200);
            }

            // 3. Error de credenciales (Mensaje genérico por seguridad)
            return response()->json([
                'message' => 'El correo o la contraseña son incorrectos.'
            ], 401);

        } catch (\Exception $e) {
            // Registro del error real en los logs para que tú puedas revisarlo
            Log::error("Error en login: " . $e->getMessage());

            return response()->json([
                'message' => 'Error interno en el servidor de autenticación.'
            ], 500);
        }
    }



    public function verPerfil(Request $request) {
        // Auth::user() solo funciona si antes hiciste login con Auth::attempt()
        $usuario = Auth::user();
        
        return response()->json([
            'nombre' => $usuario->nombre,
            'email'  => $usuario->correo,
            'nivel'  => $usuario->nivel,
            'foto'   => $usuario->foto
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->withHeaders([
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma'        => 'no-cache',
                'Expires'       => 'Thu, 01 Jan 1970 00:00:00 GMT',
            ]);
    }
}
