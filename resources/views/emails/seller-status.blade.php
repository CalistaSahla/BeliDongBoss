<!DOCTYPE html>
<html>
<body>

@if ($status === 'approved')

    <h2>Pengajuan Anda Disetujui 🎉</h2>

    <p>Selamat, pendaftaran Anda sebagai penjual di <strong>BeliDongBos</strong> telah disetujui.</p>

    <p><strong>Email Login:</strong> {{ $seller->email }}</p>
    <p><strong>Password Baru:</strong> {{ $password }}</p>

    <p>Silakan login dan mulai mengelola produk Anda.</p>

@else

    <h2>Pengajuan Ditolak ❌</h2>

    <p>Maaf, pengajuan Anda sebagai penjual tidak dapat kami setujui.</p>

    <p><strong>Alasan Penolakan:</strong></p>
    <p>{{ $reason }}</p>

@endif

<br>
<p>Terima kasih.</p>

</body>
</html>
