<div class="w-full bg-white p-8 rounded-lg shadow-md">
  <h2 class="text-2xl font-semibold text-center text-gray-600"><strong>ListrikPay</strong></h2>
  <p class="text-center text-gray-500 mb-4">Silakan login untuk melanjutkan</p>
  <form action="/login" method="POST" class="space-y-5">
    @csrf
     <div>
       <label for="username" class="block mb-1 text-sm text-gray-600">Username</label>
       <input
         type="text"
         id="username"
         name="username"
         required
         class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
       />
     </div>

     <div>
       <label for="password" class="block mb-1 text-sm text-gray-600">Password</label>
       <input
         type="password"
         id="password"
         name="password"
         required
         class="w-full px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300"
       />
     </div>

     <!-- Submit Button -->
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
    <a href="/register" class="text-blue-600 hover:underline">Daftar sekarang</a>
  </p>
</div>
