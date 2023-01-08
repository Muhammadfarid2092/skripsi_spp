@extends('layouts.master_homepage')

@section('main')
  <div class="card">
    <div class="card-body">
      <div class="card-content">
        <h3 class="text-center">Contact</h3>
        <div class="d-flex justify-content-center align-items-center my-4">
          <img src="{{ asset('images/profile-pictures.jpg') }}" alt="Profile Picture" class="img-fluid"
            style="max-width: 150px;">
        </div>
        <div style="padding: 0 8rem;">
          <div class="table-responsive">
            <table class="table table-bordered mb-0">
              <tbody class="px-5">
                <tr>
                  <td class="text-bold-500" style="width: 50%;">Nama</td>
                  <td style="width: 50%;">Muhammad Farid Hafizhuddin</td>
                </tr>
                <tr>
                  <td class="text-bold-500">NIM</td>
                  <td>18106050022</td>
                </tr>
                <tr>
                  <td class="text-bold-500">Prodi</td>
                  <td>Teknik Informatika</td>
                </tr>
                <tr>
                  <td class="text-bold-500">Universitas</td>
                  <td>Universitas Islam Negeri Sunan Kalijaga</td>
                </tr>
                <tr>
                  <td class="text-bold-500">Email Pribadi</td>
                  <td>muhfarid2092@gmail.com</td>
                </tr>
                <tr>
                  <td class="text-bold-500">Email Universitas</td>
                  <td>18106050045@student.uin-suka.ac.id</td>
                </tr>
                <tr>
                  <td class="text-bold-500">Alamat</td>
                  <td>Madusari, Wonosari, Wonosari, Gunungkidul, D.I.Yogyakarta</td>
                </tr>
                <tr>
                  <td class="text-bold-500">No. Telp</td>
                  <td>082226412020</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
