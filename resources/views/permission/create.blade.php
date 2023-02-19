<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Permission Tambah') }}
       </h2>
   </x-slot>

   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <form action="{{ route('permission.store') }}" method="POST">
            @csrf
            <div class="grid  gap-4">
               <div class="">
                  <div class="flex flex-wrap mx-3 mb-6">
                     <div class="w-3/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                           Permission
                       </label>
                        <input value="{{ old('name') }}" name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500  @error('name') is-invalid @enderror" id="grid-last-name" type="text" placeholder="Permission Name">
                        @error('name')
                        <span class="invalid-feedback" style="color: red"  role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  

                  

                  <div class="flex flex-wrap mx-3 mb-6">
                     <div class="w-full px-3">
                         <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                             Save Permission
                         </button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
        
         
      </div>
   </div>
 
</x-app-layout>
