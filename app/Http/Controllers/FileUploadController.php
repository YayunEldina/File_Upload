<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload(){
        return view('file-upload');
    }

    public function prosesfileUpload(Request $request){
        
        $request->validate([
            'nama_gambar' => 'required',
            'berkas'=>'required|file|image|max:500',]);
            $extension = $request->berkas->getClientOriginalExtension();
            // $extfile = $request->berkas->getClientOriginalName();
            $namaFile = $request->nama_gambar.'.'.$extension;

            $path = $request->berkas->move('gambar', $namaFile);
            $path = str_replace("\\","//", $path);
            // echo "Variabel path berisi $path <br>";

            $pathBaru = asset('gambar/'.$namaFile);
            echo "Gambar berhasil di upload ke:<a href='$pathBaru'>$namaFile</a>";
            echo "<br>";
            echo "<img src='$pathBaru' alt='$namaFile' style='max-width: 500px;
            height: auto;'>";
    }
}

