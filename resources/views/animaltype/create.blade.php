
<x-layouts.app>

  <form action="{{route('animaltype.store')}}" method="POST">
    @csrf
    <div class=" float-left gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">NAME</label>
            <input type="string" name="name" value="{{ old('name') }}" id="first_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5"
                placeholder="name" required>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center">CREATE
            Anima type </button>
</form>
</x-layouts.app>