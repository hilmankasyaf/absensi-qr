<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('karyawan.dashboard');
    }

    public function qrcode()
    {
        $user = Auth::user();
        // Generate QR code for NIP
        $qrcode = QrCode::size(200)->generate($user->nip); // Asumsikan NIP disimpan di model User
        return view('karyawan.dashboard', compact('qrcode'));
    }

    public function qrcodeDownload()
    {
        $user = Auth::user();
        $filename = 'qrcode_' . $user->nip . '.png';
        $filePath = public_path($filename);
        // Generate QR code and save it to public path
        QrCode::size(200)->format('png')->generate($user->nip, $filePath);

        // Return file download response
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function scan(Request $request)
    {
        $request->validate([
            'nip' => 'required|string', // Validasi NIP
        ]);

        $nip = $request->input('nip');
        // Logika untuk menyimpan absensi
        // Misalnya, Anda bisa menyimpan data absensi ke database di sini

        return response()->json(['success' => true]);
    }
}