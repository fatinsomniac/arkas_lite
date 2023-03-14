@extends('layouts.app', ['title' => 'Kegiatan'])

@section('layouts.content')
    <div class="card">
        <div class="card-header">
            <h5>Tambah Kegiatan</h5>
        </div>

        @include('components.alert')
        
        <div class="card-body">
            <form action="{{ route('activities.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="activity_code" class="form-label">Kode Kegiatan</label>
                    <div class="col-6">
                        <input type="text" name="activity_code" class="form-control @error('activity_code') is-invalid @enderror">
                        <div class="form-text"><i>Kode kegiatan di input berurutan, Contoh : 1.0.0</i></div>
                        @error('activity_code')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="activity_name" class="form-label">Nama Kegiatan</label>
                    <div class="col-6">
                        <input type="text" name="activity_name" class="form-control @error('activity_name') is-invalid @enderror">
                        @error('activity_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <hr>
            <h3>
                DAFTAR KEGIATAN
            </h3>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Kegiatan</th>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                @foreach ($activities as $index => $activity)
                    <tbody>
                        <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $activity->activity_code }}</td>
                        <td>{{ $activity->activity_name }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('activities.edit', $activity->uuid) }}" class="btn btn-success me-2">Edit</a> 
                                <form action="{{ route('activities.destroy', $activity->uuid) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection