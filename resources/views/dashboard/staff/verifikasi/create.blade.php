<form action="{{ route('pendaftaran.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="p-8 lg:p-10 space-y-8">

```
@csrf

{{-- Form --}}
<form action="{{ route('student.store') }}" method="POST"
    class="p-8 lg:p-10 space-y-8 bg-white rounded-2xl shadow-sm">

    @csrf

    {{-- Error Validation --}}
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-xl p-4">
            <h4 class="text-red-600 font-semibold mb-2">
                Terdapat kesalahan:
            </h4>
            <ul class="list-disc list-inside text-sm text-red-500">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Username --}}
        <div class="space-y-1">
            <label
                class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">
                Username
            </label>

            <input
                type="text"
                name="username"
                value="{{ old('username') }}"
                placeholder="Masukkan username"
                class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-green-500 focus:bg-white outline-none transition text-sm">
        </div>

        {{-- Email --}}
        <div class="space-y-1">
            <label
                class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">
                Email
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Masukkan email"
                class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-green-500 focus:bg-white outline-none transition text-sm">
        </div>

        {{-- Groups --}}
        <div class="space-y-1">
            <label
                class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">
                Groups
            </label>

            <input
                type="text"
                name="groups"
                value="{{ old('groups') }}"
                placeholder="Masukkan group"
                class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-green-500 focus:bg-white outline-none transition text-sm">
        </div>

        {{-- Faculties --}}
        <div class="space-y-1">
            <label
                class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">
                Faculties
            </label>

            <input
                type="text"
                name="faculties"
                value="{{ old('faculties') }}"
                placeholder="Masukkan fakultas"
                class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-green-500 focus:bg-white outline-none transition text-sm">
        </div>

        {{-- Batch --}}
        <div class="space-y-1">
            <label
                class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">
                Batch
            </label>

            <input
                type="text"
                name="bacth"
                value="{{ old('bacth') }}"
                placeholder="Masukkan batch"
                class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-green-500 focus:bg-white outline-none transition text-sm">
        </div>

        {{-- Location --}}
        <div class="space-y-1">
            <label
                class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">
                Location
            </label>

            <input
                type="text"
                name="locations"
                value="{{ old('locations') }}"
                placeholder="Masukkan lokasi"
                class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-green-500 focus:bg-white outline-none transition text-sm">
        </div>

    </div>

    {{-- Status --}}
    <div class="space-y-1">
        <label
            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">
            Status
        </label>

        <select
            name="status"
            class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-green-500 focus:bg-white outline-none transition text-sm appearance-none">

            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                Aktif
            </option>

            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                Tidak Aktif
            </option>

        </select>
    </div>

    {{-- Footer --}}
    <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-100">

        <a href="{{ route('student.index') }}"
            class="px-6 py-2.5 text-xs font-bold text-gray-400 uppercase tracking-widest hover:text-gray-600 transition-colors">
            Kembali
        </a>

        <button
            type="submit"
            class="px-8 py-2.5 bg-green-600 text-white rounded-lg text-xs font-bold uppercase tracking-widest hover:bg-green-700 shadow-lg shadow-green-200 transition-all">
            Simpan Data
        </button>

    </div>

</form>

<script>
function up(input, target) {
    if (input.files.length > 0) {
        document.getElementById(target).innerHTML =
            input.files[0].name;
    }
}
</script>
