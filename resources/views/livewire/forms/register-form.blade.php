<div class="w-full bg-white p-8 rounded-lg shadow-md overflow-y-auto">
  <h2 class="text-2xl font-semibold text-center text-gray-600"><strong>ListrikPay</strong></h2>
  <p class="text-center text-gray-500 mb-4">Buat akun baru untuk melanjutkan</p>

  <form wire:submit.prevent="register" class="space-y-5">
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

    <!-- Username -->
    <div>
      <label for="username" class="block mb-1 text-sm text-gray-600">Username</label>
      <input
        type="text"
        id="username"
        wire:model.defer="username"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      />
      @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Nomor Telepon -->
    <div>
      <label for="phone_number" class="block mb-1 text-sm text-gray-600">Nomor Telepon</label>
      <input
        type="text"
        id="phone_number"
        wire:model.defer="phone_number"
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      />
      @error('phone_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Alamat -->
    <div>
      <label for="address" class="block mb-1 text-sm text-gray-600">Alamat</label>
      <textarea
        id="address"
        wire:model.defer="address"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      ></textarea>
      @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Tarif -->
    <div>
      <label for="tarif" class="block mb-1 text-sm text-gray-600">Tarif Listrik (Daya)</label>
      <select
        id="tarif"
        wire:model.defer="tarif_id"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      >
        <option value="">Pilih Daya</option>
        @foreach($tarifs as $tarif)
          <option value="{{ $tarif->id }}">{{ $tarif->power }} VA</option>
        @endforeach
      </select>
      @error('tarif_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Nomor Meter -->
    <div>
      <label for="meter_number" class="block mb-1 text-sm text-gray-600">Nomor Meter</label>
      <input
        type="text"
        id="meter_number"
        wire:model.defer="meter_number"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      />
      @error('meter_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
      @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

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