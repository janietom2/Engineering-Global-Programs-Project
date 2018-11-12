<?php
get_init();
$db = DB::getInstance();

if(input::exists()){
	if(token::check(input::get('token'))) {
		$validate = new validate();
        
        $validation = $validate->check($_POST, array(
                        'pfname' => array(
                            'required' => true
                        ),
                        'plname' => array(
                            'required' => true
                        ),
                        'ppwd' => array(
                            'required' => true,
                            'min' => 3
                        )
                    ));

                    if ($validation->passed()) {
                        $salt = Hash::salt(32);
                        $user = new User();
                        try{
                            $user->create(array(
                                'pfname' => input::get('pfname'),
                                'plname' => input::get('plname'),
                                'pmname' => input::get('pmname'),
                                'pemail' => input::get('pemail'),
                                'pacceslvl' => 1,
                                'ppwd' => Hash::make(input::get('ppwd'), $salt),
                                'salt' => $salt
                            ));


                        } catch(Exeception $e){
                            die($e->getMessage());
                        }

                        Session::flash('success', 'User has been created!');
                        Redirect::to('/createuser');

                    } else {
                        $validationError = Display::FlashMessages($validation->errors(),'error');
                    }
            }
    }
?>

<html>
<form action="/createuser" method="POST">

<label for="">pfname</label><br>
<input type="text" name="pfname"><br>

<label for="">plname</label><br>
<input type="text" name="plname"><br>

<label for="">pmname</label><br>
<input type="text" name="pmname"><br>

<label for="">pemail</label><br>
<input type="text" name="pemail"><br>

<label for="">pwd</label><br>
<input type="password" name="ppwd"><br>

<input type="hidden" name="token" value=<?php echo Token::generate();?>>
<input type="submit" value="create">

</form>

</html>