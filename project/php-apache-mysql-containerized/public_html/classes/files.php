<?php

class files {

  private $__errors = null; // Nullified
  private $__uploader; // The variable that will hold the instance of the uploader class
  private $__results; // Results after the upload
  private $__fileName;
  private $__target;

  public function __construct($folderTarget) {
    include('../extraClasses/PHPuploader/class.uploader.php');
    $this->__uploader = new Uploader();
    $this->__target = $folderTarget;
  }

  /* Initialize the upload function with the uplaoder Class */
  public function uploadFile($fileInformation, $fileTitle) {

    $data = $this->__uploader->upload($fileInformation/*$_FILES['files']*/, array(
        'limit' => 4, //Maximum Limit of files. {null, Number}
        'maxSize' => 50, //Maximum Size of files {null, Number(in MB's)}
        'extensions' => array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx'), //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
        'required' => false, //Minimum one file is required for upload {Boolean}
        'uploadDir' => $this->__target, //Upload directory {String}
        'title' => $fileTitle, /* Try MD5 and uniqid */ /*array('auto', 10),*/ //New file name {null, String, Array} *please read documentation in README.md
        'removeFiles' => true, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
        'replace' => true, //Replace the file if it already exists {Boolean}
        'perms' => null, //Uploaded file permisions {null, Number}
        'onCheck' => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
        'onError' => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
        'onSuccess' => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
        'onUpload' => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
        'onComplete' => null, //A callback function name to be called when upload is complete | ($file) | Callback
        'onRemove' => 'onFilesRemoveCallback' //A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
    ));

    $this->__fileName = $fileTitle;

    if($data['isComplete']) {
      $this->__results = $data['data'];
    }

    if($data['hasErrors']) {
      $this->__errors = $data['errors'];
    }

  }

  // /* Save the name on the database */
  // public function save() {
  //   // Save info here using DB class
  // }

  /* Return if the function contains any errors */
  public function errors() {
    if($this->__errors == null) {
      return false;
    }
    return $this->__errors;
  }

  /* Return the results of the upload function */
  public function results(){
    return print_r($this->__results);
  }

}


 ?>
