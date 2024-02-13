<button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

<aside id="separator-sidebar" class="fixed rounded-2xl left-2 w-64 h-screen border border-gray-200 transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-white rounded-2xl">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('users.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <span class="ms-3">{{ __('layout.Usuarios') }}</span>
                </a>
            </li>
            <li class="border-t border-gray-200">
                <a href="{{ route('types.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <span class="flex-1 ms-3 whitespace-nowrap">{{ __('layout.Tipos') }}</span>
                </a>
            </li>
            <li class="border-t border-gray-200">
                <a href="/types/?model=term" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <span class="flex-1 ms-3 whitespace-nowrap pl-5">{{ __('layout.Términos') }}</span>
                </a>
            </li>
            <li class="border-b border-gray-200">
                <a href="/types/?model=user" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <span class="flex-1 ms-3 whitespace-nowrap pl-5">{{ __('layout.Usuarios') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('terms.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <span class="flex-1 ms-3 whitespace-nowrap">{{ __('layout.Términos') }}</span>
                </a>
            </li>
            <li class="border-t border-gray-200">
                <a href="{{ route('terms.index', ['user_terms' => true]) }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <span class="flex-1 ms-3 whitespace-nowrap pl-5">{{ __('layout.Propios') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('terms.index', ['other_terms' => true]) }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <span class="flex-1 ms-3 whitespace-nowrap pl-5">{{ __('layout.Otros') }}</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
