<?php

namespace DevcorpIt\ResponseCode\Http\Middleware;
use App\Enum\eResponseCode as ResponseCodeClass;
// use {{    TO SET    }}  as ResponseCodeClass;
//use App\Enum\eResponseCode as ResponseCodeClass;
use Closure;

class ResponseCodeUnicity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$response = ResponseCodeClass::getAll(ResponseCodeClass::class);
        $className = config('response_code.response_code_path');
        $response = $className::getAll($className);
        $base_key = [];
        foreach ($response as $current_key) {
            foreach (array_keys($current_key) as $keys) {
                $base_key[] = $keys;
            };
        }
        foreach ($base_key as $current_key => $current_array) {
            $search_key = array_search($current_array, $base_key);
            if ($current_key != $search_key) {
                //$dup_key = $current_key + 1;
                abort(422, "$base_key[$current_key] : Response code duplication detected.\nPlease use a unique responseCode");
            }
        }

        return $next($request);
    }
}
