<h2 style="text-align:center; margin-bottom: 10px;">Laporan Data Seller</h2>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Nama Toko</th>
            <th>PIC</th>
            <th>HP</th>
            <th>Email</th>
            <th>Kota</th>
            <th>Provinsi</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sellers as $s)
        <tr>
            <td>{{ $s->storeName }}</td>
            <td>{{ $s->picName }}</td>
            <td>{{ $s->picPhone }}</td>
            <td>{{ $s->picEmail }}</td>
            <td>{{ $s->picCity }}</td>
            <td>{{ $s->picProvince }}</td>
            <td>{{ $s->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
