<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Mddleware শুধুমাত্র login নিয়ে কাজ করে। আর্থাত login করার পরে কি করতে চাই তা Mddleware য়ের মাধ্যমে বলে দিতে হবে

        // 1. প্রথমে check করবে user logged in আছে কি-না না থাকে login য়ে পাঠিয়ে দাও
        if (!Auth::check()) {
            return redirect()->route('login')->with('toastr_error', 'You are not authenticated.');
        }

        // 2. User-এর role নেওয়া
        $userRole = Auth::user()->role;

        // 3. যদি role মিলে তাহলে next request আনুযায়ী middleware/call চালু হবে
        if ($userRole === $role) {
            return $next($request);

        }

        // উধাহরনঃ
        // এবং সেই role অনুযায়ী ইচ্ছামতো কাজ করা যাবে
        if ($userRole === 'admin') {
            return redirect()->route('admin.dashboard');
        }
         elseif ($userRole === 'vendor') {
            return redirect()->route('vendor.dashboard');
        }
        elseif ($userRole === 'user') {
            return redirect()->route('user.dashboard');
            // return redirect()->route('homepage.index');
        }

        // 4. যদি কোন role match না হয় তাহলে login য়ে পাঠাও
        else {
            // return redirect()->route('login');
            return redirect()->route('homepage.index')->with('toastr_error', 'your access is denied');
        }
    }
}
