<form method="POST" action="{{ route('superadmin.addUser') }}" class="space-y-4">
    @csrf
    <div>
        <label class="block text-sm font-medium">Nama</label>
        <input type="text" name="name" class="border rounded w-full p-2" required>
    </div>
    <div>
        <label class="block text-sm font-medium">Email</label>
        <input type="email" name="email" class="border rounded w-full p-2" required>
    </div>
    <div>
        <label class="block text-sm font-medium">Password</label>
        <input type="password" name="password" class="border rounded w-full p-2" required>
    </div>
    <div>
        <label class="block text-sm font-medium">Role</label>
        <select name="role" x-model="role" class="border rounded w-full p-2" required>
            <option value="admin-divisi">Admin Divisi</option>
            <option value="superadmin">Super Admin</option>
        </select>
    </div>
    <div x-show="role === 'admin-divisi'">
        <label class="block text-sm font-medium">Divisi</label>
        <select name="divisi_id" class="border rounded w-full p-2">
            @foreach($divisis as $divisi)
                <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah User</button>
</form>
