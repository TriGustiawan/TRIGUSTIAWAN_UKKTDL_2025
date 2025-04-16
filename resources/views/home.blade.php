@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Buat Kegiatan
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">KEGIATAN KAMU</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form action="{{ route('simpan')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Kegiatan </label>
                <input type="text" class="form-control" name="kegiatan">
            </div>
            <div class="form-group">
                <label for="">Hari & Tanggal</label>
                <select name="hari" id="" class="form-control">
                   <option value="Senin">Senin</option>
                   <option value="Selasa">Selasa</option>
                   <option value="Rabu">Rabu</option>
                   <option value="Kamis">Kamis</option>
                   <option value="Jumat">Jumat</option>
                   <option value="Sabtu">Sabtu</option>
                   <option value="Minggu">Minggu</option>

                </select>
                <input type="date" class="form-control mt-2" name="tanggal">
            </div>
            <div class="form-group">
                <label for="">Prioritas</label>
                <select name="prioritas" id="" class="form-control">
                    <option value="Biasa">Biasa</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Penting">Penting</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="Belum Selesai">Belum Selesai</option>
                    <option value="Sudah Selesai">Sudah Selesai</option>
                </select>
            </div>

<button class="btn btn-primary mt-3" value="SIMPAN">SIMPAN</button>
        </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
<br><br>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Kegiatan</th>
        <th>Hari & Tanggal</th>
        <th>Prioritas</th>
        <th>Status</th>
        <th>Tombol</th>
      </tr>
    </thead>
    <tbody>
        @foreach ( $datas as $data )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->kegiatan}}</td>
            <td>{{ $data->hari}},{{ $data->tanggal}}</td>
            <td> <p class="@if ($data->prioritas == 'Penting')
                text-primary
                @elseif ($data->prioritas == 'Sedang')
                text-info
            @endif">{{ $data->prioritas}}</p></td>
            <td>
                @if ($data->status == 'Belum Selesai')
                <a class="btn btn-primary" href="{{ route('ubahstat', ['idtudu' => $data->id, 'status' => 'Belum Selesai'])}}">Belum Selesai</a>
                @else
                <a class="btn btn-outline-primary" href="{{ route('ubahstat', ['idtudu' => $data->id, 'status' => 'Belum Selesai'])}}">Belum Selesai</a>
                @endif

                 @if ($data->status == 'Sudah Selesai')
                <a class="btn btn-primary" href="{{ route('ubahstat', ['idtudu' => $data->id, 'status' => 'Sudah Selesai'])}}">Sudah Selesai</a>
                @else
                <a class="btn btn-outline-primary" href="{{ route('ubahstat', ['idtudu' => $data->id, 'status' => 'Sudah Selesai'])}}">Sudah Selesai</a>
                @endif
            </td>
            <td>
                <a class="btn btn-danger" href="{{ route('hapus', [$data->id])}}">HAPUS</a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">
                    EDIT
                  </button>

                  <!-- The Modal -->
                  <div class="modal" id="Modal">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">UBAH KEGIATAN</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                        <form action="{{ route('edit' , $data->id )}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Kegiatan </label>
                                <input type="text" class="form-control" name="kegiatan">
                            </div>
                            <div class="form-group">
                                <label for="">Hari & Tanggal</label>
                                <select name="hari" id="" class="form-control">
                                   <option value="Senin">Senin</option>
                                   <option value="Selasa">Selasa</option>
                                   <option value="Rabu">Rabu</option>
                                   <option value="Kamis">Kamis</option>
                                   <option value="Jumat">Jumat</option>
                                   <option value="Sabtu">Sabtu</option>
                                   <option value="Minggu">Minggu</option>

                                </select>
                                <input type="date" class="form-control mt-2" name="tanggal">
                            </div>
                            <div class="form-group">
                                <label for="">Prioritas</label>
                                <select name="prioritas" id="" class="form-control">
                                    <option value="Biasa">Biasa</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Penting">Penting</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="Belum Selesai">Belum Selesai</option>
                                    <option value="Sudah Selesai">Sudah Selesai</option>
                                </select>
                            </div>
                <button class="btn btn-primary mt-3" value="SIMPAN">SIMPAN</button>
                        </form>
                        </div>
                        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
