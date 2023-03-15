@extends('layouts.app', ['title' => 'Edit Barang'])

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Edit Barang</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('items.update', $item->uuid) }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <div class="col-6">
                        <input type="text" name="item_code" value="{{ old('item_code', $item->item_code) }}" class="form-control @error('item_code') is-invalid @enderror">
                        @error('item_code')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <div class="col-6">
                        <input type="text" name="item_name" value="{{ old('item_name', $item->item_name) }}" class="form-control @error('item_name') is-invalid @enderror">
                        @error('item_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Barang</label>
                    <div class="col-6">
                        <select name="item_category" class="form-select" aria-label="Default select example">
                            <option value="Barang" {{ $item->item_category == 'Barang' ? 'selected' : '' }}>Barang</option>
                            <option value="Jasa" {{ $item->item_category == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                        </select>
                        <div class="form-text"><i>Pilih kembali <b>Jenis Barang</b> yang akan dimasukan</i></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <div class="col-6">
                        <input type="number" name="price" value="{{ old('price', $item->price) }}" class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection