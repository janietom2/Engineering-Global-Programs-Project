<?php
get_init();

function needs_login(){
    $user = new User();
    if(!$user->isLoggedIn()) {
        Session::flash('deniedIndex', 'Please log in first');
        Redirect::to('/login');
      }
}

function insert_media(){
    
    if(isset($_FILES['image'])){
        echo "passed img";
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        
        $expensions= array("jpeg","jpg","png", "pdf");
        
        if(in_array($file_ext,$expensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"upload/".$file_name);
        //    echo "Success";
        }else{
           print_r($errors);
           die();
        }
     }

}

function requires_admin(){
    $user = new User();
       if($user->data()->pacceslvl > 3){
        Session::flash('notAdmin', 'Forbiden');
        Redirect::to('/login');
       }
}

function ifAdmin() {
    $user = new User();
    return ($user->data()->pacceslvl < 3) ? true : false;
}

function get_program($id){
    $db = DB::getInstance();

    $qry = $db->get('program', array(
        'prid', '=', $id
    ));

    return ($qry->count()) ? $qry->first() : null;
}

function alreadyApplied($prid, $person) {
    $db = DB::getInstance();

    $qry = $db->query("SELECT * FROM application WHERE pid = $person and prid = $prid");

    return ($qry->count()) ? true : false;
}

function view_applications(){
    $db = DB::getInstance();

    $query = $db->query("SELECT application.apid as apid, application.pid as pid, application.prid as prid, application.apessay as apessay, application.aplinkedin as aplinkedin, application.apcontact as apcontact, application.status as status, person.pfname as pfname, person.plname as plname, person.apgender as apgender, person.applaceofbirth as applaceofbirth, person.apclassification as apclassification, person.pgpa as pgpa, program.prfun_agency as prfun_agency
    FROM application 
    JOIN person ON application.pid = person.pid
    JOIN program ON application.prid = program.prid
    ");

    if(!$query->count()){
        return null;
    }

    return $query->results();

}


function getApplication($id){
    $db = DB::getInstance();

    $qry = $db->query("SELECT application.apid as apid, application.pid as pid, application.prid as prid, application.apessay as apessay, application.aplinkedin as aplinkedin, application.apcontact as apcontact, application.status as status, person.pfname as pfname, person.plname as plname, person.apgender as apgender, person.applaceofbirth as applaceofbirth, person.apclassification as apclassification, person.pgpa as pgpa, program.prfun_agency as prfun_agency
    FROM application 
    JOIN person ON application.pid = person.pid
    JOIN program ON application.prid = program.prid
    WHERE application.apid = $id");

    return ($qry->count()) ? $qry->first() : null;

}

function getMediaFiles($id) {
    $db = DB::getInstance();

    $qry = $db->query("SELECT * FROM media WHERE apid=$id");

    return ($qry->count()) ? $qry->results() : null;
}

function get_student_status($pid) {
    $db = DB::getInstance();

    $qry = $db->query("SELECT * FROM application WHERE pid=$pid");

    return ($qry->count()) ? $qry->results() : null;
}

function get_status($n) {
    if($n == 0) {
        return "Pending";
    }elseif($n == 1){
        return "Approved";
    }else{
        return "Denied";
    }

    return null;
}


function create_new($pid, $prid) {

        if(input::exists()){
            $db = DB::getInstance();
            if(token::check(input::get('token'))) {
                $validate = new validate();
                $validation = $validate->check($_POST, array(

                            ));

                            $errors= array();
                            $file_name = $_FILES['essay']['name'];
                            $file_size =$_FILES['essay']['size'];
                            $file_tmp =$_FILES['essay']['tmp_name'];
                            $file_type=$_FILES['essay']['type'];
                            $file_ext=strtolower(end(explode('.',$_FILES['essay']['name'])));
                            $expensions= array("jpeg","jpg","png","pdf");
                            
                            if(in_array($file_ext,$expensions)=== false){
                                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                            }
                            
                            if($file_size > 2097152){
                                $errors[]='File size must be excately 2 MB';
                            }
                            
                            $newfile_name=uniqid().'.'.$file_ext;

                            if(empty($errors)==true){
                                move_uploaded_file($file_tmp,"./upload/".$newfile_name);
                            }else{
                                print_r($errors);
                                die();
                            }

                            if ($validation->passed()) {
                                try{
                                    $insert_pro = $db->insert('application', array(
                                        'pid' => $pid,
                                        'prid' => $prid,
                                        'apessay' => $newfile_name,
                                        'aplinkedin' => input::get('aplinkedin'),
                                        'apcontact' => input::get('apcontact'),
                                    ));

                                } catch(Exeception $e){
                                    die($e->getMessage());
                                }

                                $lastId = $db->last("apid");

                                for($i = 0; $i < 3; $i++) {
                                    $errors= array();
                                    $file_name = $_FILES['images']['name'][$i];
                                    $file_size =$_FILES['images']['size'][$i];
                                    $file_tmp =$_FILES['images']['tmp_name'][$i];
                                    $file_type=$_FILES['images']['type'][$i];
                                    $file_ext=strtolower(end(explode('.',$_FILES['images']['name'][$i])));
                                    $expensions= array("jpeg","jpg","png","pdf");
                                    
                                    if(in_array($file_ext,$expensions)=== false){
                                        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                                    }
                                    
                                    if($file_size > 2097152){
                                        $errors[]='File size must be excately 2 MB';
                                    }
                                    
                                    $newfile_name=uniqid().'.'.$file_ext;
        
                                    if(empty($errors)==true){
                                        move_uploaded_file($file_tmp,"./upload/".$newfile_name);
                                        try{
                                            $insert_pro = $db->insert('media', array(
                                                'pid' => $pid,
                                                'apid' => $lastId,
                                                'mfile' => $newfile_name,
                                            ));
        
                                        } catch(Exeception $e){
                                            die($e->getMessage());
                                        }
                                        
                                    }else{
                                        print_r($errors);
                                        die();
                                    }
                                }


                                Redirect::to('/new_application?pid='.$prid.'');

                            } else {
                                $validationError = Display::FlashMessages($validation->errors(),'error');
                                // echo "error";
                            }
                    }
            }
        

}



function program_id(){
    $pid = input::get('pid');

    if(!is_numeric($pid)) {
        Redirect::to('/programs');
    }

    return $pid;
}

function approval_update($pid) {

    if(input::exists()){
        $db = DB::getInstance();
        if(token::check(input::get('token'))) {
            $validate = new validate();
            $validation = $validate->check($_POST, array(

                        ));

                        if ($validation->passed()) {
                            try{
                                $update = $db->update('application', 'apid', $pid, array(
                                    'status' => input::get('statuschange'),
                                    'apreason' => input::get('apreason'),
                                ));

                            } catch(Exeception $e){
                                die($e->getMessage());
                            }
                            Redirect::to('/admin-check-application?pid='.$pid);

                        } else {
                            $validationError = Display::FlashMessages($validation->errors(),'error');
                        }
                }
        }

}


function update_program($pid) {

        if(input::exists()){
            $db = DB::getInstance();
            if(token::check(input::get('token'))) {
                $validate = new validate();
                $validation = $validate->check($_POST, array(

                            ));

                            if ($validation->passed()) {
                                try{
                                    $update = $db->update('Program', 'prid', $pid, array(
                                        'prn_apps' => input::get('prn_apps'),
                                        'prfund_agency' => input::get('prfund_agency'),
                                        'prsurvey' => input::get('prsurvey'),
                                        'prdescription' => input::get('prdescription'),
                                        'prcost' => input::get('prcost'),
                                        'prlocation' => input::get('prlocation'),
                                        'preligibility' => input::get('preligibility'),
                                        'prdateline' => input::get('prdateline'),
                                    ));

                                } catch(Exeception $e){
                                    die($e->getMessage());
                                }
                                Redirect::to('/edit_program?pid='.$pid);

                            } else {
                                $validationError = Display::FlashMessages($validation->errors(),'error');
                            }
                    }
            }

}

?>