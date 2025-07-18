<div class="w-full bg-white p-8 rounded-lg shadow-md">
  <h2 class="text-2xl font-semibold text-center text-gray-600"><strong>ListrikPay</strong></h2>
  <p class="text-center text-gray-500 mb-4">Silakan login untuk melanjutkan</p>

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

  <form wire:submit.prevent="login" class="space-y-5">
    <div>
      <label for="username" class="block mb-1 text-sm text-gray-600">Username</label>
      <input
        type="text"
        id="username"
        wire:model.lazy="username"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      />
    </div>

    <div>
      <label for="password" class="block mb-1 text-sm text-gray-600">Password</label>
      <input
        type="password"
        id="password"
        wire:model.lazy="password"
        required
        class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
      />
    </div>

    <div>
      <button
        type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200"
      >
        Login
      </button>
    </div>
  </form>

  <p class="text-sm text-center text-gray-500 mt-4">
    Belum punya akun?
    <a href="/daftar" class="text-blue-600 hover:underline">Daftar sekarang</a>
  </p>
</div>