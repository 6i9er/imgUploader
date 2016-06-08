<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;


use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Images;
use Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Image;
use File;


class ImgUploaderController extends Controller
{
    
    public function getList(Request $request)
    {
    	$msg='';
    	if(isset($request->msg)){
    		$msg=$request->msg;	
    	}

    	
    	$images = Images::orderBy('image_order', 'ASC')->paginate(10);

    	
        return view("api/imguploader/index" , ['msg' => $msg , 'images' => $images ]);
       //return response()->json("Hello World");
    }


    public function getList1(Request $request)
    {
    	$msg='';
    	if(isset($request->msg)){
    		$msg=$request->msg;	
    	}

    	
    	$images = Images::orderBy('image_order', 'ASC')->get();

    	
        return view("api/imguploader/index1" , ['msg' => $msg , 'images' => $images ]);
       //return response()->json("Hello World");
    }

    /*
		Normal Add Image Uplader

    */


    public function getAdd(Request $request)
    {
    	$msg='';
        $url=  $request->url();
		$cat = new Images ;
    	$action=   $url.'/../saveimage';
        return view("api/imguploader/add" , ['action' => $action , 'msg' => $msg ] );
       //return response()->json("Hello World");
    }


    public function postSaveimage(Request $request)
    {
        

	     $files = $request->file('images');
	      // Making counting of uploaded images
	      $file_count = count($files);
	      $uploaded=0;
	      $msg='ssss';
	      //echo $file_count;
	      // start count how many uploaded
	      if($file_count > 0){
	         
	          foreach($files as $file) {
	            $rules = array('file' => 'required|image'); 
	            $validator = Validator::make(array('file'=> $file), $rules);
	            if($validator->passes()){
	             

	              $destinationPath = public_path().'/uploads/';
	              
	              $extension = $file->getClientOriginalExtension(); // getting image extension
	              $image_name=explode('.', $file->getClientOriginalName());
	              $fileName =$image_name[0].'_'. time().'.'.$extension; // renameing image
	              $file->move($destinationPath, $fileName); // uploading file to given path
	            
	            
	                $uploadImage=  new Images;
	                $uploadImage->path=$fileName;
	                $uploadImage->save();
	                if($uploadImage){
	                  $uploaded++;
	                }

	            }


	          }

	          if($uploaded > 0){
	          	$msg = $uploaded . ' Images Uploaded Successfully ';
	          }else{
	          	$msg = 'No Image Uploaded';
	          }



	      }else{
	      	$msg = 'plaese Select Images';
	      }

			$all_images = Images::orderBy('image_order', 'ASC')->paginate(10);
        	return view("api/imguploader/index" , ['msg' => $msg , 'images' => $all_images ]);
			
    }




    /*

		Add By Ajax  Drag & Drop
		
    */

	public function getAddjquery(Request $request)
    {
        $url=  $request->url();
		$cat = new Images ;
    	$action=   $url.'/../saveimageajax';
        return view("api/imguploader/addjquery" , ['action' => $action , 'msg' => '' ]);
       //return response()->json("Hello World");
    }



    public function postSaveimageajax(Request $request)
    {

    	//return response()->json("aaaaaaaaaa");
    			$msg='';
    				$logo = $request->file('file');
    				if(count($logo) > 1){
    					$msg='Sorry just one image';
    				}
    				else{
    					$rules = array('file' => 'required|image'); 
	                    $validator = Validator::make(array('file'=> $logo), $rules);
	                    if($validator->passes()){
	                      
	                      $logosPath =  public_path().'/uploads/';                      
	                      $extension = $logo->getClientOriginalExtension(); // getting image extension
	                      $image_name=explode('.', $logo->getClientOriginalName());
	                      $fileName =$image_name[0].'_'. time().'.'.$extension; // renameing image
	                      $logo->move($logosPath, $fileName); // uploading file to given path
	                     	$uploadImage=  new Images;
			                $uploadImage->path=$fileName;
			                $uploadImage->save();
			                $msg='image uploaded';
			                
	                      //$logo='';
	                    }	
    				}

                    	
        

	     /*if($_SERVER['REQUEST_METHOD'] == "POST"){
	     	$destinationPath = public_path().'/uploads/';
			if(move_uploaded_file($_FILES['file']['tmp_name'], $destinationPath.$_FILES['file']['name'])){
				//echo($_POST['index']);
			}
			exit;
		}*/
		return response()->json('/imgUploader/public/api/upload/list?msg='.$msg);
			//return view('api/imguploader/index', [ 'msg' => "sssssssssssss"]);

    }

    /* 
		Delete Image
    */

	public function getDeleteimg($id , Request $request)
    {
        $url=  $request->url();
        $msg='';
		$image =  Images::where('image_id' , $id)->get();
		if(count($image) > 0){
			$imagePath =  public_path().'/uploads/';
			File::delete($imagePath . $image[0]->path);
			$delImage =  Images::where('image_id' , $id);
			$delImage->delete();

			$msg='image Deleted Successfully';
		}
		else{
			$msg='Sorry This image Doesnt Exist';
		}
/*    	$action=   $url.'/../saveimageajax';*/
        return redirect("api/upload/list?msg=".$msg);
       
    }


    public function postArrange(Request $request)
    {

        $arrange = $_POST['ID'];
        $counter = 1;
        //return $arrange[5];
        for( $i =0 ; $i < count($arrange); $i++ ){
        	$img=Images::find($arrange[$i]);
        	$img->image_order = $counter;
        	$img->save();
        	$counter++;
        }
        return "Success";
       //return response()->json("Hello World");
    }

}
