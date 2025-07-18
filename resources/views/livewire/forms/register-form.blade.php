<div class="w-full bg-white p-8 rounded-lg shadow-md">
  <h2 class="text-2xl font-semibold text-center text-gray-600"><strong>ListrikPay</strong></h2>
  <p class="text-center text-gray-500 mb-4">Buat akun baru untuk melanjutkan</p>

  <form wire:submit.prevent="register" class="space-y-5">
    @csrf

    <!-- Name -->
    <div>
      <label for="name" class="block mb-1 text-sm text-gray-600">Nama Lengkap</label>
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
      <label for="email" class="block mb-1 text-sm text-gray-600">Email</label>
      <input
        type="email"
        id="email"
        wire:model.defer="email"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      />
      @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Password -->
    <div>
      <label for="password" class="block mb-1 text-sm text-gray-600">Password</label>
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
      <label for="password_confirmation" class="block mb-1 text-sm text-gray-600">Konfirmasi Password</label>
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
      <label for="role" class="block mb-1 text-sm text-gray-600">Role</label>
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