<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class LibraryAuth {
  public function handle(Request $request, Closure $next, ...$roles) {
    $token = $request->bearerToken();
    if (!$token) return response()->json(['error'=>['code'=>'UNAUTHENTICATED','message'=>'Autenticación requerida']],401);
    [$body,$sig] = array_pad(explode('.', $token, 2),2,null);
    $expected = hash_hmac('sha256', (string)$body, env('JWT_SECRET','change-me'));
    if (!$body || !$sig || !hash_equals($expected,$sig)) return response()->json(['error'=>['code'=>'UNAUTHENTICATED','message'=>'Token inválido']],401);
    $claims = json_decode(base64_decode($body), true);
    if (!$claims || ($claims['exp'] ?? 0) < time()) return response()->json(['error'=>['code'=>'UNAUTHENTICATED','message'=>'Token expirado']],401);
    $request->attributes->set('claims',$claims);
    return $next($request);
  }
}
