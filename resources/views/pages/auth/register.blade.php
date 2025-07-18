@extends('layouts.app')

@section('content')
<div class="h-full w-full flex items-center justify-center bg-gradient-to-br from-sky-100 to-blue-200 px-5">
    <div class="flex w-full h-[80vh] bg-white rounded-xl overflow-hidden shadow-lg -translate-y-8 p-3">
        <div class="flex-2 bg-gradient-to-br from-blue-700 to-sky-400 relative text-white p-10 flex flex-col justify-center rounded-xl">
            <div class="grid grid-cols-3 mb-6 w-20 h-10 absolute top-5 left-5">
                @for ($index = 0; $index < 9; $index++)
                    <div class="w-2 h-2 bg-white rounded-full shadow-lg mb-4 animate-pulse"></div>
                @endfor
            </div>
            <h2 class="text-4xl font-bold mb-2">ListrikPay</h2>
            <p class="text-lg mb-4">Sistem Informasi Listrik Pintar</p>

            <ul class="space-y-3 text-md">
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 108 8 8 8 0 00-8-8zm1 11H9v-2h2zm0-4H9V5h2z"/></svg>
                    Daftar Tagihan Listrik
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 108 8 8 8 0 00-8-8zm1 11H9v-2h2zm0-4H9V5h2z"/></svg>
                    Penggunaan Listrik
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 108 8 8 8 0 00-8-8zm1 11H9v-2h2zm0-4H9V5h2z"/></svg>
                    Pembayaran Listrik Mudah
                </li>
            </ul>
        </div>

        <div class="flex-1 p-10 flex flex-col overflow-y-auto items-center justify-center bg-white">
            @livewire('forms.register-form')
        </div>

    </div>
</div>
@endsection