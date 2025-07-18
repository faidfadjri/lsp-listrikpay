@php
    $active = $active ?? ''; // default jika tidak dikirim dari controller
    $menuItems = [
        ['label' => 'Dashboard', 'href' => '/', 'icon' => 'home', 'key' => 'dashboard'],
        ['label' => 'Tagihan', 'href' => '/tagihan', 'icon' => 'tagihan', 'key' => 'tagihan'],
        ['label' => 'Penggunaan', 'href' => '/penggunaan', 'icon' => 'penggunaan', 'key' => 'penggunaan'],
        ['label' => 'Keluar', 'href' => '/logout', 'icon' => 'logout', 'key' => 'logout'],
    ];
@endphp

<div x-data="{ open: true }" class="flex">
    <aside :class="open ? 'w-64' : 'w-20'"
        class="bg-white shadow-lg h-screen transition-all duration-300 ease-in-out fixed md:relative z-40">
        
        <!-- Header -->
        <div class="p-4 border-b border-gray-300 flex items-center"
            :class="{ 'justify-between': open, 'justify-center': !open }">
            <div class="text-gray-600 font-bold text-xl" x-show="open">ListrikPay</div>
            <button @click="open = !open" class="hidden md:block">
                <template x-if="open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                </template>
                <template x-if="!open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 5.25h16.5m-16.5 6.75h16.5m-16.5 6.75h16.5" />
                    </svg>
                </template>
            </button>
        </div>

        <!-- Menu -->
        <nav class="p-4 space-y-2 text-sm">
            @foreach ($menuItems as $item)
                <a href="{{ $item['href'] }}"
                    class="items-center gap-2 py-2 rounded transition 
                        {{ $active === $item['key'] ? 'bg-gray-700 text-white font-semibold' : 'hover:bg-blue-100 text-gray-700' }}"
                    :class="{
                        'flex items-center justify-center': !open,
                        'flex items-center px-4': open,
                    }">

                    {{-- Icon --}}
                    @switch($item['icon'])
                        @case('home')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 9.75L12 4l9 5.75M4.5 10.5v7.75a.75.75 0 00.75.75H9v-4.5a1.5 1.5 0 013 0v4.5h3.75a.75.75 0 00.75-.75V10.5" />
                            </svg>
                            @break
                        @case('tagihan')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 8.25v-1.5A2.25 2.25 0 0017.25 4.5h-10.5A2.25 2.25 0 004.5 6.75v10.5A2.25 2.25 0 006.75 19.5h10.5a2.25 2.25 0 002.25-2.25v-1.5M15 12H9" />
                            </svg>
                            @break
                        @case('penggunaan')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5l-9 15.75h15.75L10.5 4.5z" />
                            </svg>
                            @break
                        @case('logout')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                            </svg>

                            @break
                    @endswitch

                    <span x-show="open" x-transition>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>
    </aside>
</div>