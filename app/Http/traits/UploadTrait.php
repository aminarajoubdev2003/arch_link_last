<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;


trait UploadTrait{

    /*public function upload_images( $images, $path ){
        $imageUrls = [];
        $filePath = $path;

        foreach ($images as $image){
        $originalName = $image->getClientOriginalName(); // اسم الملف الأصلي

        $path = $filePath . $originalName;

        if (Storage::disk('public')->exists($path)) {
            // إذا كان الملف موجود مسبقًا
            $imageUrls[] = [
                'images' => $path
            ];
        } else {
            // إذا لم يكن موجودًا، ارفعه
            $imagePath = $image->storeAs($filePath, $originalName, 'public');
            $imageUrls[] = [
                'images' => $imagePath
            ];
        }
        return $imageUrls;
    }
    }*/
    public function upload_file( $image , $filePath ){

        $originalName = $image->getClientOriginalName(); // اسم الملف الأصلي

        $path = $filePath . $originalName;

        if (Storage::disk('public')->exists($path)) {
            // إذا كان الملف موجود مسبقًا
            $url = $path;
        } else {
            // إذا لم يكن موجودًا، ارفعه
            $url = $image->storeAs($filePath, $originalName, 'public');
        }
        return $url;
    }

        public function upload_files(array $files, $filePath)
{
    $uploadedFiles = [];

    foreach ($files as $file) {
        $originalName = $file->getClientOriginalName(); // اسم الملف الأصلي
        $path = $filePath . $originalName;

        if (Storage::disk('public')->exists($path)) {
            // إذا كان الملف موجود مسبقًا
            $url = $path;
        } else {
            // إذا لم يكن موجودًا، ارفعه
            $url = $file->storeAs($filePath, $originalName, 'public');
        }

        $uploadedFiles[] = $url;
    }

    return $uploadedFiles; // مصفوفة تحتوي مسارات الملفات المرفوعة
}


   /* public function upload_images( $images, $path){
        $imageUrls = [];

        $filePath = $path;


        foreach ($images as $file) {

            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();


            $file->move(public_path($filePath), $fileName);


            $imagePath = $filePath .'/'. $fileName;
            $imageUrls[] = [
                'images' => $imagePath
            ];
        }
        return $imageUrls;
    }*/

    /*public function upload_file( $file, $path){
        $imageUrls = [];

        $filePath = $path;


        foreach ($images as $file) {

            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();


            $file->move(public_path($filePath), $fileName);


            $url = $filePath .'/'. $fileName;
            $imageUrls[] = [
                'images' => url($imagePath)
            ];
        }
        return $url;
    }*/

}
