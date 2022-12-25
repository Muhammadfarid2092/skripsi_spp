<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $idLogin = Auth::id();
        $data = DB::table('users')->where('id', '<>', $idLogin)->get();
        return view('dashboard.user.user', compact(['data']));
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nip_nis' => ['required', 'numeric', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string', 'regex:(siswa|guru|admin)'],
            'kelas' => ['string', 'between:1,3', 'nullable'],
            'jenis_kelamin' => ['required', 'string', 'regex:(Perempuan|Laki-laki)']
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'nip_nis' => $request->nip_nis,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        if ($user) {
            return redirect()
                ->route('user.index')
                ->with([
                    'success' => 'User berhasil dibuat'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'User gagal dibuat'
                ]);
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.user.edit', compact(['user']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nip_nis' => ['required', 'numeric'],
            'role' => ['required', 'string', 'regex:(siswa|guru|admin)'],
            'kelas' => ['string', 'between:1,3', 'nullable'],
            'jenis_kelamin' => ['required', 'string', 'regex:(Perempuan|Laki-laki)']
        ]);

        $user = User::findOrFail($id);

        if (!is_null($request->password)) {
            $user->update([
                'nama' => $request->nama,
                'nip_nis' => $request->nip_nis,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'kelas' => $request->kelas,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);
        } else {
            $user->update([
                'nama' => $request->nama,
                'nip_nis' => $request->nip_nis,
                'role' => $request->role,
                'kelas' => $request->kelas,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);
        }

        if ($user) {
            return redirect()
                ->route('user.index')
                ->with([
                    'success' => 'User berhasil diubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'User gagal diubah'
                ]);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        if ($user) {
            return redirect()
                ->route('user.index')
                ->with([
                    'success' => 'User berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('user.index')
                ->with([
                    'error' => 'User gagal dihapus'
                ]);
        }
    }
}
