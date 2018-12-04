<?php
get_init();

function needs_login(){
    $user = new User();
    if(!$user->isLoggedIn()) {
        Session::flash('deniedIndex', 'Please log in first');
        Redirect::to('/login');
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

function view_programs(){
    $db = DB::getInstance();

    $query = $db->query("SELECT * FROM program");

    if(!$query->count()){
        return null;
    }

    return $query->results();
}

function create_new() {

        if(input::exists()){
            $db = DB::getInstance();
            if(token::check(input::get('token'))) {
                $validate = new validate();
                $validation = $validate->check($_POST, array(
                                'prn_apps' => array(
                                    'required' => true
                                ),
                                'prfun_agency' => array(
                                    'required' => true
                                ),
                                'prsurvey' => array(
                                    'required' => true,
                                    'min' => 3
                                )
                            ));

                            if ($validation->passed()) {
                                try{
                                    $insert_pro = $db->insert('program', array(
                                        'prn_apps' => input::get('prn_apps'),
                                        'prfun_agency' => input::get('prfun_agency'),
                                        'prsurvey' => input::get('prsurvey'),
                                        'prdescription' => input::get('prdescription'),
                                        'prcost' => input::get('prcost'),
                                        'prlocation' => input::get('prlocation'),
                                        'prelegibility' => input::get('preligibility'),
                                        'prdeadline' => input::get('prdeadline'),
                                        'prstartdate' => input::get('prstartdate'),
                                        'prawardamount' => input::get('prawardamount'),
                                    ));

                                } catch(Exeception $e){
                                    die($e->getMessage());
                                }
                                Redirect::to('/admin-new-program');

                            } else {
                                $validationError = Display::FlashMessages($validation->errors(),'error');
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

function get_program($id){
    $db = DB::getInstance();

    $qry = $db->get('program', array(
        'prid', '=', $id
    ));

    return ($qry->count()) ? $qry->first() : null;
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
                                    $update = $db->update('program', 'prid', $pid, array(
                                        'prn_apps' => input::get('prn_apps'),
                                        'prfun_agency' => input::get('prfun_agency'),
                                        'prsurvey' => input::get('prsurvey'),
                                        'prdescription' => input::get('prdescription'),
                                        'prcost' => input::get('prcost'),
                                        'prlocation' => input::get('prlocation'),
                                        'prelegibility' => input::get('preligibility'),
                                        'prdeadline' => input::get('prdeadline'),
                                        'prstartdate' => input::get('prstartdate'),
                                        'prawardamount' => input::get('prawardamount'),
                                    ));

                                } catch(Exeception $e){
                                    die($e->getMessage());
                                }
                                Redirect::to('/admin-edit-program?pid='.$pid);

                            } else {
                                $validationError = Display::FlashMessages($validation->errors(),'error');
                            }
                    }
            }

}

?>