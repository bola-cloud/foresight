<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Google_Service_Drive;
use Google_Client;


class UploadController extends Controller
{

    public function store(Request $request)
    {
        $img = $request->video;
        $img_name = $img->getClientOriginalName();
        // dd($data);
        // $name=$request->file('video')->getClientOriginalName();
        Storage::disk('google')->put($img_name,  file_get_contents($img) );
        return redirect()->back();
        // Storage::disk('google')->allFiles();
        // Storage::disk('google')->put('test.txt', 'Hello World');
    }

    
    // public function storeVideo(Request $request)
    // {
    //     dd('gg');
    //     // Initialize the Google Client with the credentials
    //     $client = new Google_Client();
    //     $client->setAuthConfig(storage_path('app/client_secret.json'));
    //     $client->addScope(Google_Service_Drive::DRIVE);

    //     // Create the Google Drive service
    //     $service = new Google_Service_Drive($client);

    //     // Set the file metadata
    //     $fileMetadata = new \Google_Service_Drive_DriveFile(array(
    //         'name' => 'video.mp4', // Change the name as per your requirement
    //     ));

    //     // Set the path to the video file
    //     $videoPath = $request->file('video')->getRealPath();

    //     // Upload the video file to Google Drive
    //     $file = $service->files->create($fileMetadata, array(
    //         'data' => file_get_contents($videoPath),
    //         'mimeType' => 'video/mp4',
    //         'uploadType' => 'multipart',
    //         'fields' => 'id',
    //     ));

    //     // Print the file ID of the uploaded video
    //     echo 'Video ID: ' . $file->id;
    // }

    public function index()
    {
        return view('upload');
    }
}
