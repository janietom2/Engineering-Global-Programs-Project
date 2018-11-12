<?php 

 class Page { 

    // private $_db,
    //         $_data;
    

    // public function __construct() {
    //     $this->_db = DB::getInstance();
    // }

    // public function getData($id) {
    //     $data = $this->_db->get('monitor_posts', array(
    //         'id', '=', $id
    //     ));

    //     if(count($data)) {
    //         $this->_data = $data->first();
    //         return true;
    //     }

    //     return false;
    // }

    // public function title() {
    //     return $this->data()->title;
    // }

    // public function content() {
    //     return $this->data()->content;
    // }

    // public function menu() {
    //     return $this->data()->menu;
    // }

    // public function rank() {
    //     return $this->data()->rank;
    // }

    // public function data() {
    //     return $this->_data;
    // }


    /* Get color from pages */
    public static function getRankColor($userRank) {

        // Instance for the menu color
        $choosenColor;

         switch ($userRank) {
           case 3:
             $choosenColor = "#4eb0d3"; //Blue
             break;  

           case 2:
             $choosenColor = "#b368d8"; //Purple
             break;  

           case 1:
             $choosenColor = "#4ed395"; //Green
             break;

           case 0:
             $choosenColor = "#bababa"; //Gray
             break;       
           
           default:
             $choosenColor = "#D65C4F"; //Red (Default)
             break;
         }

        return $choosenColor;
    }

}

 ?>