@section('page_title')
{{$title}}
@endsection
<x-layout>
  <x-card class=" p-10 rounded max-w-lg mx-auto mt-4">
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Create a Listing
                        </h2>
                        <p class="mb-4">Post a Listing To Hire.  </p>
                    </header>

                    <form method="POST" action="/listings" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label
                                for="company"
                                class="inline-block text-lg mb-2"
                                >Company Name</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="company"
                                placeholder="Your Company Name"
                                value = "{{old('company')}}"
                            />
                            @error('company')
                                <p class="text-red-500 text-xm mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >Job Title</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                placeholder="Example: Senior Laravel Developer"
                                value = "{{old('title')}}"
                            />
                            @error('title')
                                <p class="text-red-500 text-xm mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="location"
                                class="inline-block text-lg mb-2"
                                >Job Location</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="location"
                                placeholder="Example: Remote, Boston MA, etc"
                                value = "{{old('location')}}"
                            />
                            @error('location')
                                <p class="text-red-500 text-xm mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Contact Email</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                placeholder="Example: Company.contact@gmail.com"
                                name="email"
                                value = "{{old('email')}}"
                            />
                            
                            @error('email')
                                <p class="text-red-500 text-xm mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="website"
                                class="inline-block text-lg mb-2"
                            >
                                Website/Application URL
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="website"
                                placeholder="Example: www.wadifa.ma"
                                value = "{{old('website')}}"
                            />
                            @error('website')
                                <p class="text-red-500 text-xm mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="tags" class="inline-block text-lg mb-2">
                                Tags (Comma Separated)
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="tags"
                                placeholder="Example: Laravel, Backend, Postgres, etc"
                                value = "{{old('tags')}}"
                            />
                            
                            @error('tags')
                                <p class="text-red-500 text-xm mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="logo" class="inline-block text-lg mb-2">
                                Company Logo
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="logo"
                            />
                        </div>

                        <div class="mb-6">
                            <label
                                for="description"
                                class="inline-block text-lg mb-2"
                            >
                                Job Description
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                rows="10"
                                placeholder="Include tasks, requirements, salary, etc"
                            >{{old('company')}}</textarea>
                            
                            @error('description')
                                <p class="text-red-500 text-xm mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <div class="mb-3"><i style="font-size:16px">We Will Help You To Find The Profile You Want In 7Days with Premium</i></div>
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Create a Listing
                            </button>

                            <a href="/listings" class="text-black ml-4"> Back To Listings</a>
                        </div>
                    </form>
  </x-card>
</x-layout>