<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Todo;
class Timeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $today = Carbon::now();
        $id =(int)explode('/', $request->getPathInfo())[2];
        $data = Todo::findorfail($id);
        $date = $data->date;
        if($date > $today){
            return $next($request);
        }else{
            return redirect('/todo');
        }
        
    
    }
}
