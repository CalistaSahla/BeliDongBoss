<h2>Laporan Data User</h2>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Last Login</th>
    </tr>
    @foreach($users as $u)
    <tr>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>{{ $u->last_login_at }}</td>
    </tr>
    @endforeach
</table>
