<aside class="bg-gray-100">
    <div class="sidebar min-h-screen w-[3.35rem] overflow-hidden border-r hover:w-56 hover:bg-white hover:shadow-lg">
      <div class="flex h-screen flex-col justify-between pt-2 pb-6">
        <div>
          <div class="w-max p-2.5">
            <img src="{{asset('img/logo.png')}}" class="w-9">
          </div>
          <ul class="mt-6 space-y-2 tracking-wide">
            <li class="min-w-max">
              <a href="/" aria-label="dashboard" class="relative flex items-center space-x-4 {{ request()->route()->named('dashboard') ? 'bg-gradient-to-r from-sky-600 to-cyan-400 text-white' : 'text-gray-600' }}  px-4 py-3 ">
                <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                  <path d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z" class="fill-current {{ request()->route()->named('dashboard') ? 'text-cyan-200 group-hover:text-cyan-300' : 'text-cyan-400 dark:fill-slate-600' }}"></path>
                  <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z" class="fill-current {{ request()->route()->named('dashboard') ? 'text-cyan-200 group-hover:text-cyan-300' : 'text-gray-300 group-hover:text-cyan-300' }}"></path>
                  <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z" class="fill-current {{ request()->route()->named('dashboard') ? 'group-hover:text-sky-300' : 'text-gray-600 group-hover:text-cyan-600' }} "></path>
                </svg>
                <span class="{{ request()->route()->named('dashboard') ? '-mr-1 font-medium' : 'group-hover:text-gray-700' }}">Dashboard</span>
              </a>
            </li>
            <li class="min-w-max">
              <a href="{{ route('students.index') }}" class="group flex items-center space-x-4 rounded-md px-4 py-3 {{ request()->routeIs('students.*') ? 'bg-gradient-to-r from-sky-600 to-cyan-400 text-white' : 'text-gray-600' }}">
                <svg fill="currentColor" class="h-5 w-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" class="fill-current {{ request()->routeIs('students.*') ? 'text-cyan-200 group-hover:text-cyan-300' : 'text-gray-600 group-hover:text-cyan-300' }}" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
                <span class="{{ request()->routeIs('students.*') ? '-mr-1 font-medium' : 'group-hover:text-gray-700' }}">Students</span>
              </a>
            </li>
            <li class="min-w-max">
              <a href="{{ route('classes.index') }}" class="group flex items-center space-x-4 rounded-md px-4 py-3 {{ request()->routeIs('classes.*') ? 'bg-gradient-to-r from-sky-600 to-cyan-400 text-white' : 'text-gray-600' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path class="fill-current {{ request()->routeIs('classes.*') ? 'group-hover:text-sky-300' : 'text-gray-600 group-hover:text-cyan-600' }}" d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                  <path class="fill-current {{ request()->routeIs('classes.*') ? 'text-cyan-200 group-hover:text-cyan-300' : 'text-gray-300 group-hover:text-cyan-300' }}" d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                </svg>
                <span class="{{ request()->routeIs('classes.*') ? '-mr-1 font-medium' : 'group-hover:text-gray-700' }}">Class</span>
              </a>
            </li>
            <li class="min-w-max">
              <a href="{{ route('teachers.index') }}" class="bg group flex items-center space-x-4 rounded-md px-4 py-3  {{ request()->routeIs('teachers.*') ? 'bg-gradient-to-r from-sky-600 to-cyan-400 text-white' : 'text-gray-600' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path class="fill-current {{ request()->routeIs('teachers.*') ? 'text-cyan-200 group-hover:text-cyan-300' : 'text-gray-600 group-hover:text-cyan-300' }}" fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" clip-rule="evenodd" />
                </svg>
                <span class="{{ request()->routeIs('teachers.*') ? '-mr-1 font-medium' : 'group-hover:text-gray-700' }}">Teachers</span>
              </a>
            </li>
            <li class="min-w-max">
              <a href="{{ route('violations.index') }}" class="bg group flex items-center space-x-4 rounded-md px-4 py-3  {{ request()->routeIs('violations.*') ? 'bg-gradient-to-r from-sky-600 to-cyan-400 text-white' : 'text-gray-600' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path class="fill-current {{ request()->routeIs('violations.*') ? 'text-cyan-200 group-hover:text-cyan-300' : 'text-gray-300 group-hover:text-cyan-300' }}" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                  <path class="fill-current {{ request()->routeIs('violations.*') ? 'group-hover:text-sky-300' : 'text-gray-600 group-hover:text-cyan-600' }}" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                </svg>
                <span class="{{ request()->routeIs('violations.*') ? '-mr-1 font-medium' : 'group-hover:text-gray-700' }}">Violations</span>
              </a>
            </li>
            <li class="min-w-max">
              <a href="{{ route('reports.index') }}" class="bg group flex items-center space-x-4 rounded-md px-4 py-3  {{ request()->routeIs('reports.*') ? 'bg-gradient-to-r from-sky-600 to-cyan-400 text-white' : 'text-gray-600' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path class="fill-current {{ request()->routeIs('reports.*') ? 'text-cyan-200 group-hover:text-cyan-300' : 'text-gray-600 group-hover:text-cyan-300' }}" fill-rule="evenodd" d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" clip-rule="evenodd" />
                </svg>
                <span class="{{ request()->routeIs('reports.*') ? '-mr-1 font-medium' : 'group-hover:text-gray-700' }}">Reports</span>
              </a>
            </li>
            {{-- <li class="min-w-max">
              <a href="/admin/login" class="group flex items-center space-x-4 rounded-md px-4 py-3 {{ request()->routeIs('/admin/login') ? 'bg-gradient-to-r from-sky-600 to-cyan-400 text-white' : 'text-gray-600' }}">
                <svg fill="currentColor" class="h-5 w-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" class="fill-current {{ request()->routeIs('/admin/login') ? 'text-cyan-200 group-hover:text-cyan-300' : 'text-gray-600 group-hover:text-cyan-300' }}" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                </svg>
                <span class="{{ request()->routeIs('/admin/login') ? '-mr-1 font-medium' : 'group-hover:text-gray-700' }}">Sign in</span>
              </a>
            </li> --}}
          </ul>
        </div>
        <div class="w-max -mb-3">
          <a href="#" class="group flex items-center space-x-4 rounded-md px-4 py-3 {{ request()->routeIs('#') ? 'bg-gradient-to-r from-sky-600 to-cyan-400 text-white' : 'text-gray-600' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ request()->routeIs('#') ? 'text-cyan-200 group-hover:text-cyan-300' : 'group-hover:fill-cyan-600' }}" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
            </svg>
            <span class="{{ request()->routeIs('#') ? '-mr-1 font-medium' : 'group-hover:text-gray-700' }}">Settings</span>
          </a>
        </div>
      </div>
    </div>
  </aside>