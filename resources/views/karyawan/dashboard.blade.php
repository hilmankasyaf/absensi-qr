<!-- resources/views/karyawan/dashboard.blade.php -->
<h1>Welcome, {{ Auth::user()->name }}</h1>
<p>Your QR Code:</p>
<img src="{{ route('karyawan.qrcode') }}" alt="QR Code">
<a href="{{ route('karyawan.qrcode.download') }}">Download QR Code</a>
<nav>
    <ul>
        <li><a href="#">Scan for Absensi</a></li>
        <li><a href="#">Izin dan Cuti</a></li>
        <li><a href="{{ route('logout') }}">Logout</a></li>
    </ul>
</nav>
<video id="preview" width="100%"></video>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
        alert('QR Code content: ' + content);
        $.ajax({
            url: "{{ route('karyawan.scan') }}",
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                nip: content
            },
            success: function(response) {
                alert('Absensi berhasil disimpan');
            },
            error: function(error) {
                alert('Terjadi kesalahan, coba lagi');
            }
        });
    });
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
</script>