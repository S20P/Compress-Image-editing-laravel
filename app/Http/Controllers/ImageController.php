<?php
  
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
class ImageController extends Controller
{
  

    /*
    * @Author: Satish parmar
    * @ purpose: Image size compress in php
    * @params:
    * source_url,
    * destination_url,
    * quality,
    */
   
   
    /*
    Laravel – Create Custom Helper With Example
    --------------------------------------------------------------------------------------
    1. Create helpers.php File
         Go to App directory and create a new file new helpers.php like this app/helpers.php.

    2. Add File Path In composer.json File
       "autoload": {
                "classmap": [
                        ...
                        ],
                "psr-4": {
                    "App\\": "app/"
                },
                "files": [
                    "app/helpers.php"
                ]
            },

     3 In this final step, go to command prompt and type the given command:
       composer dump-autoload   
       -------------------------------------------------------------------------------------
    */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resizeImage()
    {
        return view('resizeImage');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resizeImagePost(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('image');
        $upload_imagename = time().'.'.$image->getClientOriginalExtension();
        $upload_url = public_path('/images').'/'.$upload_imagename;
        // compress_image() is a helper called function.
        $filename = compress_image($_FILES["image"]["tmp_name"], $upload_url, 40);
        return back()
            ->with('success','Image Upload successful');
    }



//@Author: Satish parmar end Code




    public function imageoptimizer(Request $request)
    {
          
        $directory = public_path("/without-compress-images");
        $images = glob($directory . "/*");

        foreach($images as $image)
        {
            $pathinfo = pathinfo($image);
            $upload_imagename = $pathinfo['filename'].'.'.$pathinfo['extension'];
            $upload_url = public_path('/with-compressed-images').'/'.$upload_imagename;;
            // compress_image() is a helper called function.
           $filename = $this->compress_image_script($image, $upload_url, 40);
        }

        echo "Success!";
    }

   public  function compress_image_script($source_url, $destination_url, $quality) {
        $info = getimagesize($source_url);



    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);
    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);
   	    	elseif ($info['mime'] == 'image/png') 
                    $image = imagecreatefrompng($source_url);
                   
                    
            imagejpeg($image, $destination_url, $quality);
                 
        
		return $destination_url;
	}








   
}