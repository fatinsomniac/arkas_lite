@extends('layouts.app', ['title' => 'Barang'])

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tambah Barang</h5>
        </div>

        @include('components.alert')
        
        <div class="card-body">
            <form action="{{ route('items.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <div class="col-6">
                        <input type="text" name="item_code" class="form-control @error('item_code') is-invalid @enderror">
                        @error('item_code')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <div class="col-6">
                        <input type="text" name="item_name" class="form-control @error('item_name') is-invalid @enderror">
                        @error('item_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Barang</label>
                    <div class="col-6">
                        <select name="item_category" class="form-select" aria-label="Default select example">
                            <option disabled selected>----pilih jenis barang----</option>
                            <option value="Barang">Barang</option>
                            <option value="Jasa">Jasa</option>
                        </select>
                        @error('item_category')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <div class="col-6">
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror">
                        @error('price')
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
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                @foreach ($items as $index => $item)
                    <tbody>
                        <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $item->item_code }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->item_category }}</td>
                        <td>Rp. {{ number_format($item->price, 2, ',', '.') }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('items.edit', $item->uuid) }}" class="btn btn-success me-2">Edit</a> 
                                <form action="{{ route('items.destroy', $item->uuid) }}" method="post">
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