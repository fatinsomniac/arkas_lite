@extends('layouts.app', ['title' => 'Edit Kegiatan'])

@section('layouts.content')
    <div class="card">
        <div class="card-header">
            <h5>Edit Kegiatan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('activities.update', $activity->uuid) }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="activity_code" class="form-label">Kode Kegiatan</label>
                    <div class="col-6">
                        <input type="text" name="activity_code" value="{{ old('activity_code', $activity->activity_code) }}" class="form-control @error('activity_code') is-invalid @enderror">
                        <div class="form-text"><i>Kode kegiatan di input berurutan, Contoh : 1.0.0</i></div>
                        @error('activity_code')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="activity_name" class="form-label">Nama Kegiatan</label>
                    <div class="col-6">
                        <input type="text" name="activity_name" value="{{ old('activity_name', $activity->activity_name) }}" class="form-control @error('activity_name') is-invalid @enderror">
                        @error('activity_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection