<?php 
get_init();

if(input::exists()) {
    check_login();
}

function isLogged(){
  $user = new User();
  if($user->isLoggedIn()){
      return True;
  }
  return False;
}

function check_login(){
        if(token::check(input::get('token'))) {
      
          $validate = new Validate();
      
          $validation = $validate->check($_POST, array(
      
            'email' => array(
              'required' => true,
            ),
      
            'pwd' => array(
              'required' => true,
            )
      
          ));
      
          if($validation->passed()) {
            $user = new User();
            $login = $user->login(input::get('email'), input::get('pwd'));
      
            if($login){
              Session::flash('log', "You have logged in!");
              Redirect::to('/');
            }
            else{
                echo "<div class='alert alert-danger fade in block-inner'>
                  <button type='button' class='close' data-dismiss='alert'>×</button>
                  <i class='icon-cancel-circle'></i>
                   Check you data!
                  </div>";
            }
          }
            else{
              foreach ($validation->errors() as $error) {
                echo $error;
                echo "<br>";
              }
            }
        }
}

?>