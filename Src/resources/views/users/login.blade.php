<x-layout>
  <div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Log-in
            </h2>
            <p class="mb-4">Log Into Your Account</p>
        </header>

        <form action="/users/authenticate" method="post">
          @csrf
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input
                    type="email"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{old('email')}}"
                />
                <!-- Error Example -->
                @error('email')
                  <p class="text-red-600  text-xm mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="password"
                    class="inline-block text-lg mb-2">
                    Password
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password"
                />
            </div>


            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Log-In
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Not A Member?
                    <a href="/register" class="text-laravel"
                        >Register</a
                    >
                </p>
            </div>
        </form>
    </div>
  </div>
</x-layout>