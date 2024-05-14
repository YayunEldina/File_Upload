<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload(){
        return view('file-upload');
    }

    public function prosesfileUpload(Request $request){
        //dump($request->berkas);
        //dump($request->file('file'));
        //return "Pemrosesan file upload di sini";
        $request->validate([
            'berkas'=>'required|file|image|max:500',]);
            //$namaFile = $request->berkas->getClientOriginalName();
            $extfile = $request->berkas->getClientOriginalName();
            $namaFile = 'web-'.time().".".$extfile;

            $path = $request->berkas->move('gambar', $namaFile);
            $path = str_replace("\\","//", $path);
            echo "Variabel path berisi $path <br>";

            $partBaru = asset('gambar/'.$namaFile);
            echo "proses upload berhasil, file berada di: $path";
            echo "<br>";
            echo "Tampilan link:<a href='$partBaru'>$partBaru</a>";
    }
}

//     public function prosesfileUpload(Request $request){
//         // dump($request->berkas);
//         //dump($request->file('file'));
//         //return "Pemrosesan file upload di sini";
//         if($request->hasFile('berkas'))
//         {
//             echo "path(): ".$request->berkas->path();
//             echo "<br>";
//             echo "extension(): ".$request->berkas->extension();
//             echo "<br>";
//             echo "getClientOriginalExtension();" .
//                 $request->berkas->getClientOriginalExtension();
//             echo "<br>";
//             echo "getMimeType(): ".$request->berkas->getMimeType();
//             echo "<br>";
//             echo "getClientOriginalName(): ".
//                 $request->berkas->getClientOriginalName();
//             echo "<br>";
//             echo "getSize(): ".$request->berkas->getSize();
//         }
//         else
//         {
//             echo "Tidak ada berkas yang di upload";
//         }
//     }
// }
