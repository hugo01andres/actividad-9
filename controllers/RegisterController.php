use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

protected function create(array $data)
{
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);

   
    Mail::to($user->email)->send(new WelcomeMail($user));

    return $user;
}
