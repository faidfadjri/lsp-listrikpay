<div class="w-full bg-white p-8 rounded-lg shadow-md flex flex-col">
  <h2 class="text-2xl font-semibold text-center text-gray-600"><strong>ListrikPay</strong></h2>
  <p class="text-center text-gray-500 mb-4">Buat akun baru untuk melanjutkan</p>

  @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
  @endif

  <div x-data="{ show: false, message: '', type: 'success' }"
      x-on:notify.window="show = true; message = $event.detail.message; type = $event.detail.type;
                          setTimeout(() => show = false, 4000);"
      x-show="show"
      x-transition
      class="fixed top-4 right-4 max-w-xs w-full border-l-4 p-4 rounded shadow z-50"
      :class="type === 'success' ? 'bg-green-100 border-green-400 text-green-700' : 'bg-red-100 border-red-400 text-red-700'"
      style="display: none;"
  >
      <p x-text="message"></p>
  </div>

  <form wire:submit.prevent="register" class="w-full space-y-5">
    @csrf

    <!-- Name -->
    <div>
      <label for="name" class="block mb-1 text-sm text-gray-600">
        Nama Lengkap <span class="text-red-500">*</span>
      </label>
      <input
        type="text"
        id="name"
        wire:model.defer="name"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      />
      @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Email -->
    <div>
      <label for="email" class="block mb-1 text-sm text-gray-600">
        Email <span class="text-red-500">*</span>
      </label>
      <input
        type="email"
        id="email"
        wire:model.defer="email"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      />
      @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Username -->
    <div>
      <label for="username" class="block mb-1 text-sm text-gray-600">
        Username <span class="text-red-500">*</span>
      </label>
      <input
        type="username"
        id="username"
        wire:model.defer="username"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      />
      @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Phone Number -->
    <div>
      <label for="phone_number" class="block mb-1 text-sm text-gray-600">
        No. Telp <span class="text-red-500">*</span>
      </label>
      <input
        type="phone_number"
        id="phone_number"
        wire:model.defer="phone_number"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      />
      @error('phone_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Tarif -->
    <div>
      <label for="tarif" class="block mb-1 text-sm text-gray-600">
        Tarif Listrik <span class="text-red-500">*</span>
      </label>
      <select
        id="tarif"
        wire:model.defer="tarif_id"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      >
        <option value="">Pilih Daya</option>
        @foreach($tarifs as $tarif)
          <option value="{{ $tarif->tarif_id }}">{{ $tarif->power }} VA</option>
        @endforeach
      </select>
      @error('tarif_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Meter Number -->
    <div>
      <label for="meter_number" class="block mb-1 text-sm text-gray-600">
        No. Meteran <span class="text-red-500">*</span>
      </label>
      <input
        type="meter_number"
        id="meter_number"
        wire:model.defer="meter_number"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      />
      @error('meter_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Address -->
    <div>
      <label for="address" class="block mb-1 text-sm text-gray-600">
        Alamat <span class="text-red-500">*</span>
      </label>
      <textarea
        id="address"
        wire:model.defer="address"
        required
        rows="3"
        placeholder="Masukkan alamat lengkap Anda"
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300 resize-none"
      ></textarea>
      @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Password -->
    <div>
      <label for="password" class="block mb-1 text-sm text-gray-600">
        Password <span class="text-red-500">*</span>
      </label>
      <input
        type="password"
        id="password"
        wire:model.defer="password"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      />
      @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Confirm Password -->
    <div>
      <label for="password_confirmation" class="block mb-1 text-sm text-gray-600">
        Konfirmasi Password <span class="text-red-500">*</span>
      </label>
      <input
        type="password"
        id="password_confirmation"
        wire:model.defer="password_confirmation"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      />
    </div>

    <!-- Role (opsional, kalau user bisa pilih role sendiri) -->
    {{-- 
    <div>
      <label for="role" class="block mb-1 text-sm text-gray-600">
        Role <span class="text-red-500">*</span>
      </label>
      <select
        id="role"
        wire:model.defer="role"
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      >
        <option value="">Pilih Role</option>
        <option value="1">Admin</option>
        <option value="2">Pengguna</option>
      </select>
      @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    --}}

    <!-- Submit -->
    <div>
      <button
        type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200"
      >
        Daftar
      </button>
    </div>
  </form>

  <p class="text-sm text-center text-gray-500 mt-4">
    Sudah punya akun?
    <a href="/login" class="text-blue-600 hover:underline">Login sekarang</a>
  </p>
</div>