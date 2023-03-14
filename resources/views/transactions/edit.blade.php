@extends('layouts.app', ['title' => 'Edit Transaksi'])

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Edit Transaksi</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('transactions.update', $transaction->uuid) }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Pembeli</label>
                    <div class="col-6">
                        <input type="text" name="customer_name" value="{{ old('customer_name', $transaction->customer_name) }}" class="form-control @error('customer_name') is-invalid @enderror">
                        @error('customer_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Kegiatan</label>
                    <div class="col-6">
                        <select name="activity_id" class="form-select" aria-label="Default select example">
                            <option disabled selected>----pilih jenis barang----</option>
                            @foreach ($activities as $activity)
                                <option value="{{ $activity->id }}">{{ $activity->activity_name }}</option>
                            @endforeach
                        </select>
                        <div class="form-text"><i>Pilih kembali <b>Nama Kegiatan</b> yang akan dimasukan</i></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <div class="col-6">
                        <select name="item_id" class="form-select" aria-label="Default select example">
                            <option disabled selected>----pilih jenis barang----</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                            @endforeach
                        </select>
                        <div class="form-text"><i>Pilih kembali <b>Nama Barang y</b>ang akan dimasukan</i></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Barang</label>
                    <div class="col-6">
                        <input type="number" name="quantity" value="{{ old('quantity', $transaction->quantity) }}" class="form-control @error('quantity') is-invalid @enderror">
                        @error('quantity')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
