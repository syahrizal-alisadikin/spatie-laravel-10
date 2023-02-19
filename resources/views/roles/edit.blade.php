<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Roles Edit') }}
       </h2>
   </x-slot>

   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <form action="{{ route('role.update',$role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid  gap-4">
               <div class="">
                  <div class="flex flex-wrap mx-3 mb-6">
                     <div class="w-3/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                           Roles
                       </label>
                        <input value="{{ old('name',$role->name) }}" name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500  @error('name') is-invalid @enderror" id="grid-last-name" type="text" placeholder="Roles Name">
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
                             Permission
                         </label>
                         <div class="flex flex-wrap mb-3">
                         @foreach ($permissions as $permission)

                            <div class="w-1/6 mx-2">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}"  @if($role->permissions->contains($permission)) checked @endif id="check-{{ $permission->id }}">
                                <label class="form-check-label" for="check-{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                     </div>
                  </div>

                  

                  <div class="flex flex-wrap mx-3 mb-6">
                     <div class="w-full px-3">
                         <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                             Save Roles
                         </button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
        
         
      </div>
   </div>
 
</x-app-layout>
