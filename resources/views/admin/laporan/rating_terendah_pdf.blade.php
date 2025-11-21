<h2 style="text-align:center; margin-bottom: 10px;">Laporan Rating Terendah</h2>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Rating</th>
            <th>Komentar</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ratings as $r)
        <tr>
            <td>{{ $r->product->name ?? '-' }}</td>
            <td>{{ $r->rating }}</td>
            <td>{{ $r->comment }}</td>
            <td>{{ $r->created_at->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
