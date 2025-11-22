<!DOCTYPE html>
<html>
<body>
    <h2>Pendaftaran Penjual Baru</h2>

    <p>Ada penjual baru yang mendaftar. Berikut detailnya:</p>

    <p><strong>Nama Toko:</strong> {{ $seller->store_name }}</p>
    <p><strong>PIC:</strong> {{ $seller->pic_name }}</p>
    <p><strong>Email:</strong> {{ $seller->email }}</p>
    <p><strong>Telepon:</strong> {{ $seller->phone }}</p>
    <p><strong>Alamat:</strong> {{ $seller->address }}</p>

    <br>
    <p>Silakan lakukan verifikasi di dashboard admin.</p>
</body>
</html>
