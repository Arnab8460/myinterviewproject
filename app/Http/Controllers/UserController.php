<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Test;
use App\Models\Section;
use FFMpeg\FFMpeg;
use Illuminate\support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\Validation\Rule;
use Intervention\Image\Facades\Image;
use FFMpeg\Format\Video\X264;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //1 No Question function
    public function importcsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);
        $file = fopen($request->file('csv_file')->getRealPath(), 'r');
        $header = fgetcsv($file); 
        while ($row = fgetcsv($file)) {
            Test::create([
                'name' => $row[0],
                'email' => $row[1],
                'mobile_no' => $row[2],
            ]);
        }
        fclose($file);
    
        return response()->json(['message' => 'CSV file imported successfully'], 200);
    }
    


   //2 No Question function

    public function uploadview(){
        return view('upload');
    }
    public function uploadmedia(Request $request)
    {
       
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,mp4,mov,avi|max:102400', // 100MB max for videos
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $path = 'upload/media/';

        if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
            $image = Image::make($file);
            if ($file->getSize() > (5 * 1024 * 1024)) {
                $image->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode($extension, 70); 
            }
           
            Storage::put($path . $fileName, (string)$image);
        } 
        
        elseif (in_array($extension, ['mp4', 'mov', 'avi'])) {
            $ffmpeg = FFMpeg::create();
            $video = $ffmpeg->open($file->getRealPath());
            $format = new X264();
            $format->setKiloBitrate(500); 
            $video->save($format, storage_path("app/{$path}" . $fileName));
        } 
        else {
            return response()->json(['message' => 'Invalid file type'], 400);
        }

        return response()->json(['message' => 'File uploaded successfully', 'file_path' => $path . $fileName], 200);
    }


   //3 No Question function 

    public function getsectionaniaml()
    {
        $sections = Section::with(['enclosures', 'animals'])->get();

        $response = [
            'total_count' => $sections->count(),
            'result' => $sections->map(function ($section) {
                return [
                    'section_id' => $section->id,
                    'section_name' => $section->name,
                    'enclosure_count' => $section->enclosures->count(),
                    'animal_list' => $section->animals->map(function ($animal) {
                        return [
                            'animal_id' => $animal->id,
                            'animal_name' => $animal->name,
                        ];
                    }),
                ];
            }),
        ];

        return response()->json($response, 200);
    }


   //4 No Question function
   public function passes($attribute, $values){
    if(strlen($values)<5 || strlen($values)>100 ){
        return false;
    }
    if(!preg_match("/^[a-zA-Z][a-zA-Z-']{3,98}[a-zA-Z]$/", $values)){
        return false;
    }
    if(preg_match("/[\s'-]{2,}",values)){
        return false;
    }
    return true;
   }
   
}
