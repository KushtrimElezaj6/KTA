
<x-layouts.app>
    @if (Session::has('message'))
        {{ Session::get('message') }}
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif


    
    <div class="flex flex-col gap-6 items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mt-4 text-left shadow-lg bg-gray-200">
            <h1 class="text-3xl font-bold mb-[8px] md:mb-6 font-serif tracking-wider text-blue-700"> CREATE A TASK </h1>
    <form class="bg-gray-100 flex justify-center w-full " action="{{ route('animals.index') }}">

        

        <div class="w-[400px] flex flex-row gap-2 justify-around ">
            <input type="search" id="default-search" name="search"
            class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg w-full focus:ring-blue-500
            block p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search Mockups, Logos..." required>
                
            <button type="submit"
                class="text-white p-1 font-serif tracking-wider bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-4 py-2">
                Search</button>
        </div>
           
            
    </form>


        <table class="w-screen mx-10  table-auto flex flex-col ">
            <thead class="w-full px-10 ">
                <tr class=" w-full flex flex-row justify-around tracking-widest bg-sky-800 text-white font-serif p-2">
                    <th class="justify-center items-center flex w-full">
                        <span >name</span>
                    </th>
                    <th class="justify-center items-center flex  w-full">
                        <span>description</span>
                    </th>
                    <th class="justify-center items-center flex w-full ">
                        <span >birthday</span>
                    </th>
                    <th class="justify-center items-center flex w-full ">
                        <span >Edit</span>
                    </th>

                    <th class="justify-center items-center flex w-full ">
                        <span >Delete</span>
                    </th>
                </tr>
            </thead>
    
    <tbody class=" w-full px-10 ">
        @foreach ($animals as $animal)
            <tr class="border-4 border-gray w-full flex flex-row justify-around items-center">
                <td class="justify-center  h-14 w-full items-center text-center flex">{{ $animal['name'] }}</td>
                <td class="justify-center  h-14 w-full items-center text-center flex">{{ $animal['birthday'] }}</td>
                <td class="justify-center  w-full items-center text-center flex">{{ $animal['description'] }}</td>
               


                <td class="justify-center w-full flex items-center"><a href="todo/edit/{{ $animal['id'] }}"
                        class="text-white bg-blue-800 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
                                 mb-2 
                                focus:outline-none">
                        Edit</a>
                    </a>
                </td>

                <td class="justify-center  w-full items-center flex">
                    <form action="/animal/{{ $animal['id'] }}" method="POST" class="flex justify-center items-center">

                        @csrf
                        @method('DELETE')

                        <button class="bg-red-500 hover:bg-red-700 text-white  py-2 px-4 rounded-lg">
                            Delete
                        </button>
                </form>



                </td>
            </tr>
        @endforeach
    </tbody>


        </div>

        
       
    </div>

     </table>
    {{ $animals->links() }}
    </div>
    </tbody>
    </table>
    </div>
</x-layouts.app>
