
<x-layouts.app>



    @if (Session::has('message'))
    <div class="flex flex-row-reverse justify-end mt-10 ">
        <div class="bg-white rounded-lg shadow-lg p-6 mx-auto animate-slide-up border border-green-300">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                <div class="text-green-500 text-2xl">{{ Session::get('message') }}</div>
            </div>
        </div>
    </div>
@endif

@if ($errors->has('update_id'))
    <div class="flex flex-row-reverse justify-end mt-10 ">
        <div class="bg-white rounded-lg shadow-lg p-6 mx-auto animate-slide-up borders border-red-300">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                <div class="text-red-500">{{ $errors->first('update_id') }}</div>
            </div>
        </div>
    </div>
@endif


    <div class="flex flex-col w-full justify-center items-center mb-8">
    <h1 class="mt-10 font-serif text-5xl"> Edit your task </h1>
    </div>
   
    <form action="{{ route('animals.update' , ['animal'=> $animal-id])}}" method="POST" >
        @csrf
        @method('PATCH')
        <div class="flex flex-col w-full justify-center items-center gap-4 mb-14">
            <div  class="flex flex-col w-1/4 gap-1">

                <label for="first_name" class="block  text-sm font-medium text-gray-900">Name</label>
                <input type="string" name="name" value="{{ old('name', $animal['name']) }}" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                    placeholder="Title" required>
            </div>

            <div  class="flex flex-col w-1/4 gap-1">
                <label for="birthday" class="block text-sm font-medium text-gray-900">birthday</label>
                <input type="date" name="birthday" value="{{ old('birthday', $aimal['birthday']) }}" id="birthday"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                    placeholder="birthday" required>
            </div>

            <div  class="flex flex-col w-1/4 gap-1">
                <label for="description" class="block text-sm font-medium text-gray-900">Description</label>
                <input type="text" name="description" value="{{ old('description', $aimal['description']) }}" id="description"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                    placeholder="description" required>
            </div>

        
    
        <div class="flex flex-col w-1/4 gap-4">
            <div class="w-full justify-between gap-4 flex flex-row" >
        <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4  focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center">
        UPDATE TASK
           </button>
    

        </div>
     </div>
    </div>  

   </form>

      
       



</x-layouts.app>