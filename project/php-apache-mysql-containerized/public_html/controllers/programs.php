<?php
get_init();

function needs_login(){
    $user = new User();
    if(!$user->isLoggedIn()) {
        Session::flash('deniedIndex', 'Please log in first');
        Redirect::to('/login');
      }
}

function view_programs(){
    $db = DB::getInstance();

    $query = $db->query("SELECT * FROM Program");

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
                                'prfund_agency' => array(
                                    'required' => true
                                ),
                                'prsurvey' => array(
                                    'required' => true,
                                    'min' => 3
                                )
                            ));

                            if ($validation->passed()) {
                                try{
                                    $insert_pro = $db->insert('Program', array(
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
                                Redirect::to('/new_program');

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

    $qry = $db->get('Program', array(
        'prid', '=', $id
    ));

    if(!$qry->count()){
        return null;
    }

    return $qry->first();
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