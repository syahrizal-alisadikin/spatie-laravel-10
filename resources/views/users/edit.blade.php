<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('User Edit') }}
       </h2>
   </x-slot>

   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid  gap-4">
               <div class="">
                  <div class="flex flex-wrap mx-3 mb-6">
                     <div class="w-3/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                           Name
                       </label>
                        <input value="{{ old('name',$user->name) }}" name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500  @error('name') is-invalid @enderror" id="grid-last-name" type="text" placeholder="User Name">
                        @error('name')
                        <span class="invalid-feedback" style="color: red"  role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="flex flex-wrap mx-3 mb-6">
                     <div class="w-3/4 px-3">
                         <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                             Email
                         </label>
                         <input value="{{ old('email',$user->email) }}" name="email" class="@error('email') is-invalid @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="email" placeholder="User Email">
                         @error('email')
                         <span class="invalid-feedback" style="color: red"  role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                         @enderror
                     </div>
                  </div>

                  <div class="flex flex-wrap mx-3 mb-6">
                     <div class="w-3/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                           Roles
                        </label>
                        <select name="roles" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name">
                          <option value="">Pilih Role</option>
                           @foreach ($roles as $item)
                             <option value="{{ $item->name }}" {{ old('roles') == $item->name ? 'selected' : '' }} {{ $user->roles->contains($item->id) ? 'selected' : '' }}>{{ $item->name }}</option> 
                          @endforeach
                        </select>
                     </div>
                  </div>
                 

                  <div class="flex flex-wrap mx-3 mb-6">
                     <div class="w-full px-3">
                         <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                             Save User
                         </button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
        
         
      </div>
   </div>
 
</x-app-layout>
