@extends('layouts.app', ['title' => 'Transaksi'])

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Transaksi</h5>
        </div>

        @include('components.alert')

        <div class="card-body">
            <form action="{{ route('transactions.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Pembeli</label>
                    <div class="col-6">
                        <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror">
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
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Barang</label>
                    <div class="col-6">
                        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror">
                        @error('quantity')
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
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                @foreach ($transactions as $index => $transaction)
                    <tbody>
                        <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $transaction->customer_name }}</td>
                        <td>{{ $transaction->activity->activity_name }}</td>
                        <td>{{ $transaction->item->item_name }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>Rp. {{ number_format($transaction->total_price, 2, ',', '.') }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('transactions.edit', $transaction->uuid) }}" class="btn btn-success me-2">Edit</a> 
                                <form action="{{ route('transactions.destroy', $transaction->uuid) }}" method="post">
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
