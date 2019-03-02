<?php
/**
 * webtrees: online genealogy
 * Copyright (C) 2019 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
declare(strict_types=1);

namespace Fisharebest\Webtrees\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Fisharebest\Webtrees\Auth;
use Fisharebest\Webtrees\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Middleware to activate sessions.
 */
class UseSession implements MiddlewareInterface
{
    /**
     * @param Request $request
     * @param Closure $next
     *
     * @return Response
     * @throws Throwable
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Sessions
        Session::start();

        // Update the last-login time no more than once a minute.
        $next_session_update = Carbon::createFromTimestamp((int) Session::get('session_time_updates'))->addMinute();
        if ($next_session_update < Carbon::now()) {
            $timestamp_now = Carbon::now()->timestamp;

            if (Session::get('masquerade') === null) {
                Auth::user()->setPreference('sessiontime', (string) $timestamp_now);
            }
            Session::put('session_time_updates', $timestamp_now);
        }

        return $next($request);
    }
}
