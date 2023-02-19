<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Permission') }}
       </h2>
   </x-slot>

   @if (session()->has('success'))
   <div class="pt-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class=" p-3 text-white font-bold bg-green-600 rounded">
            {{ session()->get('success') }}
        </div>
      </div>
   </div>
         
   @endif
   <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="mb-8">
            <a href="{{ route('permission.create') }}" class="bg-green-500 hover:bg-green-700 text-white  font-bold py-2 px-4 rounded">Tambah Permission</a>
         </div>
         <div class="bg-white">
            <table class="table-auto w-full">
               <thead>
                  <tr>
                     <th class="border py-4 px-6">No</th>
                     <th class="border py-4 px-6">Permission</th>
                     <th class="border py-4 px-6">Action</th>

                  </tr>
               </thead>
               <tbody>
                  @forelse ($permissions as $item)
                      <tr class="text-center">
                        <td class="border px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="border px-6 py-4" >{{ $item->name }}</td>
                      
                        <td class="border px-6 py-4" >
                           <a href="{{ route('permission.edit',$item->id) }}" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-1 px-4 inline-block rounded">Edit</a>
                           <form action="{{ route('permission.destroy',$item->id) }}" method="POST" class="inline-block">
                           {!! method_field('delete') . csrf_field() !!}
                           <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 mx-2 rounded inline-block" >Hapus</button>
                           </form>
                       </td>
                      </tr>
                  @empty
                      <tr >
                        <td colspan="5" class="text-center font-bold">Tidak ada data</td>
                      </tr>
                  @endforelse
               </tbody>
            </table>
         </div>
         <div class="text-center mt-5">
            {{ $permissions->links() }}
        </div>
      </div>
   </div>
 
</x-app-layout>
