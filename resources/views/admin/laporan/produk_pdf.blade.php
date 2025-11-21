<h2 style="text-align:center; margin-bottom: 10px;">Laporan Data Produk</h2>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Kondisi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Nama Toko</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $p->name }}</td>
            <td>{{ $p->category }}</td>
            <td>{{ $p->condition }}</td>
            <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
            <td>{{ $p->stock }}</td>
            <td>{{ $p->seller->storeName ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
