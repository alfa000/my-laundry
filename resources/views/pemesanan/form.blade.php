@extends('layouts.app')

@section('title', 'Pemesanan')

@push('styles')
<style>
    .jenis-cuci{
        background: #fff;
        padding: 10px;
        margin-bottom: 20px;
        transition: all .3s ease;
        box-shadow: 0 1px 5px rgb(0 0 0 / 18%);
        border-radius: 15px;
    }
    .jenis-cuci:hover{
        box-shadow: 0 1px 5px #89c2ff;
    }
</style>
@endpush

@section('content')
<div class="container p-5" style="min-height: calc(100vh - 106px)">
    <h2 class="mb-5">Pemesanan</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ $pemesanan->status_cuci == 'diproses' ? route('pemesanan.update.status', $pemesanan->no_pemesanan) : route('pemesanan.update', $pemesanan->no_pemesanan) }}">
        @csrf
        @method('PUT')

        <input type="hidden" name="id_pelanggan" value="{{ $pemesanan->id_user }}">
        <div class="form-group row justify-content-between">
            <label for="tgl_pesanan" class="col-sm-2 col-form-label">Tanggal Masuk</label>

            <div class="col-md-9">
                <input id="tgl_pesanan" type="date" class="form-control{{ $errors->has('tgl_pesanan') ? ' is-invalid' : '' }}" name="tgl_pesanan" value="{{ date('Y-m-d') }}" required readonly>

                @if ($errors->has('tgl_pesanan'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tgl_pesanan') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row justify-content-between">
            <label for="nama" class="col-sm-2 col-form-label">Pelanggan</label>

            <div class="col-md-9">
                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $pemesanan->pelanggan->nama }}" required readonly>
            </div>
        </div>

        <div class="form-group row justify-content-between">
            <label for="jenis_cuci" class="col-sm-2 col-form-label">Jenis Cuci</label>

            <div class="col-md-9">
                @foreach ($jenis_cucis as $jenis_cuci)
                <div class="form-check form-check-inline jenis-cuci">
                    <input class="form-check-input" type="radio" name="kode_jenis_cuci" id="{{ $jenis_cuci->kode_jenis_cuci }}" value="{{ $jenis_cuci->kode_jenis_cuci }}" data-hari="{{$jenis_cuci->hari}}" data-harga="{{ $jenis_cuci->harga }}" @checked($pemesanan->kode_jenis_cuci == $jenis_cuci->kode_jenis_cuci)>
                    <label class="form-check-label ml-2" for="{{ $jenis_cuci->kode_jenis_cuci }}">
                        <div class="text-primary font-weight-bold">
                            {{ $jenis_cuci->nama }}
                        </div>
                        Rp {{ number_format($jenis_cuci->harga, 0, ',', '.') }} <br>
                        {{ $jenis_cuci->hari }} Hari
                    </label>
                </div>
                @endforeach

                @if ($errors->has('jenis_cuci'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('jenis_cuci') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row justify-content-between">
            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>

            <div class="col-md-9">
                <input id="jumlah" type="number" class="form-control{{ $errors->has('jumlah') ? ' is-invalid' : '' }}" name="jumlah" value="{{ $pemesanan->jumlah }}" required autofocus {{ $pemesanan->status_cuci == 'diproses' ? 'readonly' : '' }}>

                @if ($errors->has('jumlah'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('jumlah') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row justify-content-between">
            <label for="tgl_pengambilan" class="col-sm-2 col-form-label">Tanggal Pengambilan</label>

            <div class="col-md-9">
                <input id="tgl_pengambilan" type="date" class="form-control{{ $errors->has('tgl_pengambilan') ? ' is-invalid' : '' }}" name="tgl_pengambilan" value="{{ $pemesanan->tgl_pengambilan }}" required readonly>

                @if ($errors->has('tgl_pengambilan'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tgl_pengambilan') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row justify-content-between">
            <label for="total_bayar" class="col-sm-2 col-form-label">Total Bayar</label>

            <div class="col-md-9">
                <input id="total_bayar" type="number" class="form-control" name="total_bayar" value="" required readonly>
            </div>
        </div>

        <div class="form-group row justify-content-between">
            <label for="jenis_cuci" class="col-sm-2 col-form-label">Bayar Sekarang</label>

            <div class="col-md-9">
                <div class="form-check form-check-inline ">
                    <input class="form-check-input" type="radio" id="ya" value="true" name="status_pembayaran" checked>
                    <label class="form-check-label" for="ya">
                        Ya
                    </label>
                </div>
                <div class="form-check form-check-inline ">
                    <input class="form-check-input" type="radio" id="tidak" value="false" name="status_pembayaran">
                    <label class="form-check-label" for="tidak">
                        Tidak
                    </label>
                </div>

                @if ($errors->has('jenis_cuci'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('jenis_cuci') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="bayar">
            <div class="form-group row justify-content-between">
                <label class="col-sm-2 col-form-label">Jumlah Bayar</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" id="jumlah_bayar" name="jumlah_bayar" required>
                </div>
            </div>

            <div class="form-group row justify-content-between">
                <label class="col-sm-2 col-form-label">Kembalian</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" id="kembalian" name="kembalian" required readonly>
                </div>
            </div>
        </div>

        <div class="form-group row justify-content-between">
            <label for="total_bayar" class="col-sm-2 col-form-label">Keterangan</label>

            <div class="col-md-9">
                <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control">{{ $pemesanan->keterangan }}</textarea>
            </div>
        </div>

        <div class="form-group row justify-content-between">
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>

    </form>
</div>
@endsection

@push('scripts')
<script>
    $('input[name="kode_jenis_cuci"], #jumlah').bind('click keyup', function () {
        harga = $('input[name="kode_jenis_cuci"]:checked').attr('data-harga')
        hari = $('input[name="kode_jenis_cuci"]:checked').attr('data-hari')
        jumlah = $('#jumlah').val()

        const date = new Date();
        date.setDate(date.getDate() + hari);

        @if ($pemesanan->status_cuci != 'diproses')
            $('#tgl_pengambilan').val(date.toISOString().substr(0, 10))
        @endif
        $('#total_bayar').val(harga*jumlah)
        $('#jumlah_bayar').attr('min', $('#total_bayar').val());
    });
    $('#jumlah').keyup();

    $('input[name="status_pembayaran"]').click(function () {
        if ($(this).is(':checked') && $(this).val() == 'true') {
            $('.bayar').show();
            $('.bayar input').prop('required', true);
        }else{
            $('.bayar').hide();
            $('.bayar input').prop('required', false);
        }
    });

    $('input[name="jumlah_bayar"]').keyup(function () {
        kembalian = $(this).val() - $('#total_bayar').val();
        if (kembalian >= 0) {
            $('#kembalian').val(kembalian);
        }
    });
</script>
@endpush
