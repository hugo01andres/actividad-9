use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\LoginAlert;
use Illuminate\Support\Facades\Mail;

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // El usuario ha iniciado sesión correctamente
        $user = Auth::user();

        // Envía el correo electrónico de alerta de inicio de sesión
        Mail::to($user->email)->send(new LoginAlert($user));

        return redirect()->intended('/dashboard');
    }

    // Si el inicio de sesión falla, redirige de nuevo al formulario de inicio de sesión
    return redirect()->back()->withErrors([
        'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
    ]);
}
