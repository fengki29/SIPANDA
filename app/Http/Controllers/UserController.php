<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Menampilkan daftar user.
     */
    public function index(Request $request)
    {
        $query = User::query();

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER ROLE
        |--------------------------------------------------------------------------
        */

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        /*
        |--------------------------------------------------------------------------
        | DATA USER
        |--------------------------------------------------------------------------
        */

        $users = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

        $totalUser = User::count();

        $totalAdmin = User::where('role', 'admin')->count();

        $totalPetugas = User::where('role', 'petugas')->count();

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view('users.index', compact(
            'users',
            'totalUser',
            'totalAdmin',
            'totalPetugas'
        ));
    }

    /**
     * Form tambah user.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Menyimpan user baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

            'role' => [
                'required',
                Rule::in([
                    'admin',
                    'petugas',
                ]),
            ],

            'avatar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | UPLOAD AVATAR
        |--------------------------------------------------------------------------
        */

        $avatarPath = null;

        if ($request->hasFile('avatar')) {
            $avatarPath = $request
                ->file('avatar')
                ->store('avatars', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | CREATE USER
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make(
                $validated['password']
            ),
            'role' => $validated['role'],
            'avatar' => $avatarPath,
        ]);

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User berhasil ditambahkan.'
            );
    }

    /**
     * Menampilkan detail user.
     */
    public function show(User $user)
    {
        return view(
            'users.show',
            compact('user')
        );
    }

    /**
     * Form edit user.
     */
    public function edit(User $user)
    {
        return view(
            'users.edit',
            compact('user')
        );
    }

    /**
     * Update user.
     */
    public function update(
        Request $request,
        User $user
    ) {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique(
                    'users',
                    'email'
                )->ignore($user->id),
            ],

            'role' => [
                'required',
                Rule::in([
                    'admin',
                    'petugas',
                ]),
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],

            'avatar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'remove_avatar' => [
                'nullable',
                'boolean',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | CEGAH ADMIN MENGHILANGKAN AKSES DIRI SENDIRI
        |--------------------------------------------------------------------------
        |
        | Jika user sedang login adalah admin, jangan izinkan dirinya
        | sendiri diubah menjadi petugas.
        |
        */

        if (
            $user->id === auth()->id()
            && $user->role === 'admin'
            && $validated['role'] !== 'admin'
        ) {
            return back()
                ->withErrors([
                    'role' =>
                        'Akun admin yang sedang digunakan tidak dapat diubah menjadi petugas.'
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | CEGAH ADMIN TERAKHIR DIUBAH MENJADI PETUGAS
        |--------------------------------------------------------------------------
        */

        if (
            $user->role === 'admin'
            && $validated['role'] !== 'admin'
        ) {
            $jumlahAdmin = User::where('role', 'admin')->count();

            if ($jumlahAdmin <= 1) {
                return back()
                    ->withErrors([
                        'role' =>
                            'Admin terakhir tidak dapat diubah menjadi petugas. Sistem harus memiliki minimal satu admin.'
                    ])
                    ->withInput();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | DATA DASAR
        |--------------------------------------------------------------------------
        */

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ];

        /*
        |--------------------------------------------------------------------------
        | PASSWORD
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make(
                $validated['password']
            );
        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS AVATAR LAMA
        |--------------------------------------------------------------------------
        */

        if (
            !empty($validated['remove_avatar'])
            && $user->avatar
        ) {
            Storage::disk('public')->delete(
                $user->avatar
            );

            $data['avatar'] = null;
        }

        /*
        |--------------------------------------------------------------------------
        | UPLOAD AVATAR BARU
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('avatar')) {

            if ($user->avatar) {
                Storage::disk('public')->delete(
                    $user->avatar
                );
            }

            $data['avatar'] = $request
                ->file('avatar')
                ->store('avatars', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE USER
        |--------------------------------------------------------------------------
        */

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'Data user berhasil diperbarui.'
            );
    }

    /**
     * Menghapus user.
     */
    public function destroy(User $user)
    {
        /*
        |--------------------------------------------------------------------------
        | CEGAH HAPUS AKUN SENDIRI
        |--------------------------------------------------------------------------
        */

        if ($user->id === auth()->id()) {
            return back()
                ->withErrors([
                    'user' =>
                        'Anda tidak dapat menghapus akun yang sedang digunakan.'
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | CEGAH HAPUS ADMIN TERAKHIR
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'admin') {

            $jumlahAdmin = User::where('role', 'admin')->count();

            if ($jumlahAdmin <= 1) {
                return back()
                    ->withErrors([
                        'user' =>
                            'Admin terakhir tidak dapat dihapus. Sistem harus memiliki minimal satu admin.'
                    ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS AVATAR
        |--------------------------------------------------------------------------
        */

        if ($user->avatar) {
            Storage::disk('public')->delete(
                $user->avatar
            );
        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS USER
        |--------------------------------------------------------------------------
        */

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User berhasil dihapus.'
            );
    }
}