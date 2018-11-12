<?php


class Scheme {

  public static function userListByRank($neededRank, $rank = 0, $equality = '='){

      $db = DB::getInstance();

      $dash_users = array();
      $i          = 0;

      if($neededRank) {
        $fetchUsers = $db->get('dash_users', array(
          'rank', $equality, $rank
        ));

        foreach ($fetchUsers->results() as $fetchUser) {
          $dash_users[$i]['name'] = $fetchUser->name." ".$fetchUser->lastname;
          $dash_users[$i]['id'] = $fetchUser->id;
          $i++;
        }

        return json_encode($dash_users);

      }else{
        $fetchUsers = $db->query("SELECT * FROM dash_users");

        foreach ($fetchUsers->results() as $fetchUser) {
          $dash_users[$i]['name'] = $fetchUser->name." ".$fetchUser->lastname;
          $dash_users[$i]['id'] = $fetchUser->id;
          $i++;
        }

        //return json_encode($dash_users);
        return json_encode($dash_users);
      }

      return false;

  }


}


 ?>
