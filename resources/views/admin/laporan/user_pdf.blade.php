<h2 style="text-align:center; margin-bottom: 10px;">Laporan Data User</h2>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Terakhir Login</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $u)
        <tr>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->last_login_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
