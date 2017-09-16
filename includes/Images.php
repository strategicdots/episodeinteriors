<?php require_once('initialize.php');

class Images extends DatabaseObject {
    protected static $table_name="images";
    public $filename;
    public $type;
    public $size;
    public $itemID;
    public $coverImage;
    public $parentDir;
    public $errors = [];
    private $temp_path;

    protected $upload_errors    = [
        UPLOAD_ERR_OK 			=> "No errors.",
        UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
        UPLOAD_ERR_NO_FILE 		=> "No image file uploaded.",
        UPLOAD_ERR_NO_TMP_DIR   => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE   => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
    ];

    public function targetPath() {
        return adminImagePath($this->parentDir, $this->filename);
    } 
    public function attach_file($file) {

        if(!$file || empty($file) || !is_array($file)) {
            // CASE 1: nothing uploaded or wrong argument usage
            $this->errors[] = "No file was uploaded.";
            return false;

        } elseif($file['error'] != 0) {
            // CASE 2: image upload error
            $this->errors[] = $this->upload_errors[$file['error']];
            return false;
        } else {
            // CASE 3: upload success
            $this->temp_path  = $file['tmp_name'];
            $this->filename   = basename($file['name']);
            $this->type       = $file['type'];
            $this->size       = $file['size'];
            return true;

        }
    }   
    public function save() {
        if(isset($this->id)) {
            $this->update();
        } else {
            if(!empty($this->errors)) { return false; }

            if(empty($this->filename) || empty($this->temp_path)) {
                $this->errors[] = "The file location was not available.";
                return false;
            }

            // check if file exists
            if(file_exists($this->targetPath())) {
                $this->errors[] = "The image file {$this->filename} already exists. Please choose another image file";
                return false;
            }

            if(move_uploaded_file($this->temp_path, $this->targetPath())) {
                unset($this->temp_path);
                return true;
            } else {
                // File was not moved.
                $this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
                return false;
            }
        }
    }
    public function destroy() {
        // First remove the database entry
        if($this->delete()) {
            // then remove the file
            // Note that even though the database entry is gone, this object 
            // is still around (which lets us use $this->image_path()).
            $target_path = SITE_ROOT.DS.'public'.DS.$this->image_path();
            return unlink($target_path) ? true : false;
        } else {
            // database delete failed
            return false;
        }
    }

}