app/Http/Middleware/StudentSession.php
namespace App\Http\Middleware;

use Closure;

class StudentSession
{
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('studentLogin')) {
            return redirect()->route('studentLogin'); // редирект на страницу логина студента
        }
        return $next($request);
    }
}
