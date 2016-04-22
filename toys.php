<?php
include_once ("adb.php");
class toys extends adb{
    
    function showToys($s,$l){
        $string="select toy_id,
                   image,
                   toy_name,
                   toy_type.toy_type,
                   year_made,
                   price,
                   quantity,
                   man_name
                   from toy
                   inner join toy_type      on toy.toy_type = toy_type.toy_type_id
                   inner join manufacturer
                   ON toy.man_id = manufacturer.man_id
                   limit $s, $l";
        return $this->query($string);
    }
    
    function countToy(){
        $string = "select distinct toy_id
                   from toy
                   inner join toy_type on toy.toy_type = toy_type.toy_type_id
                   inner join manufacturer
                   ON toy.man_id = manufacturer.man_id
                       order by toy.toy_id asc";
        $r = $this->query($string);
        $num = mysqli_num_rows($r);
        return $num;
    }
    
    function searchByName($name,$s,$l){
		$str_query="select toy_id,
                   image,
                   toy_name,
                   toy.toy_type,
                   year_made,
                   price,
                   man_name
                   from toy
                   inner join toy_type on toy.toy_type = toy_type.toy_type_id
                   inner join manufacturer
                   ON toy.man_id = manufacturer.man_id WHERE toy_name
		           LIKE  '%$name%' limit $s,$l";
		return $this->query($str_query);
    }
    
    function countSearchByName($name){
		$str_query="select 
                   count(toy_id)
                   from toy
                   inner join toy_type on toy.toy_type = toy_type.toy_type_id
                   inner join manufacturer
                   ON toy.man_id = manufacturer.man_id WHERE toy_name
		           LIKE '%$name%'";
		 $r = $this->query($str_query);
        $num = mysqli_num_rows($r);
        return $num;
    }
    
    function searchCategory($cat){
        $string="select image,
                toy_name,
                toy.toy_type,
                year_made,
                price,
                quantity,
                man_name
                from toy
                inner join toy_type
                on toy.toy_type=toy_type.toy_type_id
                inner join manufacturer
                on toy.man_id=manufacturer.man_id
                where toy_type.toy_type like '%$cat%'";
        return $this->query($string);
    }
    
    function getDetails($id){
        $string="select toy_id,
                   image,
                   toy_name,
                   toy.toy_type,
                   year_made,
                   price,
                   quantity,
                   man_name
                   from toy
                   inner join toy_type on toy.toy_type = toy_type.toy_type_id
                   inner join manufacturer
                   ON toy.man_id = manufacturer.man_id
                   where toy_id=?";
        $s = $this->prepare($string);
        $s->bind_param('i', $id);
        $s->execute();
        return $s->get_result();
    }
    
    function all_dolls($start, $end){
        $str_query="SELECT image, toy_name, toy.toy_name, year_made, price, man_name FROM toy inner join toy_type on toy.toy_type=toy_type.toy_type_id INNER JOIN manufacturer on toy.man_id=manufacturer.man_id where toy_type.toy_type_id=1 limit $start,$end";
        return $this->query($str_query);
    }
    
    function count_doll(){
        $str_query="select distinct toy_id from toy inner join toy_type on toy.toy_type=toy_type.toy_type_id INNER JOIN manufacturer on toy.man_id=manufacturer.man_id where toy_type.toy_type='Doll'";
        $res = $this->query($str_query);
        $num_rows = mysqli_num_rows($res);
        return $num_rows;
    }
    
    function all_trans($start, $end){
        $str_query="SELECT image, toy_name, toy.toy_name, year_made, price, man_name FROM toy inner join toy_type on toy.toy_type=toy_type.toy_type_id INNER JOIN manufacturer on toy.man_id=manufacturer.man_id where toy_type.toy_type_id=2 limit $start,$end";
        return $this->query($str_query);
    }
    
    function count_trans(){
        $str_query="select distinct toy_id from toy inner join toy_type on toy.toy_type=toy_type.toy_type_id INNER JOIN manufacturer on toy.man_id=manufacturer.man_id where toy_type.toy_type='Transportation'";
        $res = $this->query($str_query);
        $num_rows = mysqli_num_rows($res);
        return $num_rows;
    }
    
    function all_music($start, $end){
        $str_query="SELECT image, toy_name, toy.toy_name, year_made, price, man_name FROM toy inner join toy_type on toy.toy_type=toy_type.toy_type_id INNER JOIN manufacturer on toy.man_id=manufacturer.man_id where toy_type.toy_type_id=3 limit $start,$end";
        return $this->query($str_query);
    }
    
    function count_music(){
        $str_query="select distinct toy_id from toy inner join toy_type on toy.toy_type=toy_type.toy_type_id INNER JOIN manufacturer on toy.man_id=manufacturer.man_id where toy_type.toy_type='Music'";
        $res = $this->query($str_query);
        $num_rows = mysqli_num_rows($res);
        return $num_rows;
    }
    
    function all_puz($start, $end){
        $str_query="SELECT image, toy_name, toy.toy_name, year_made, price, man_name FROM toy inner join toy_type on toy.toy_type=toy_type.toy_type_id INNER JOIN manufacturer on toy.man_id=manufacturer.man_id where toy_type.toy_type_id=4 limit $start,$end";
        return $this->query($str_query);
    }
    
    function count_puz(){
        $str_query="select distinct toy_id from toy inner join toy_type on toy.toy_type=toy_type.toy_type_id INNER JOIN manufacturer on toy.man_id=manufacturer.man_id where toy_type.toy_type='Puzzle/Games'";
        $res = $this->query($str_query);
        $num_rows = mysqli_num_rows($res);
        return $num_rows;
    }
    
    function all_out($start, $end){
        $str_query="SELECT image, toy_name, toy.toy_name, year_made, price, man_name FROM toy inner join toy_type on toy.toy_type=toy_type.toy_type_id INNER JOIN manufacturer on toy.man_id=manufacturer.man_id where toy_type.toy_type_id=5 limit $start,$end";
        return $this->query($str_query);
    }
    
    function count_out(){
        $str_query="select distinct toy_id from toy inner join toy_type on toy.toy_type=toy_type.toy_type_id INNER JOIN manufacturer on toy.man_id=manufacturer.man_id where toy_type.toy_type='Outdoor Play'";
        $res = $this->query($str_query);
        $num_rows = mysqli_num_rows($res);
        return $num_rows;
    }
    
    function all_air($start, $end){
        $str_query="SELECT image, toy_name, toy.toy_name, year_made, price, man_name FROM toy inner join toy_type on toy.toy_type=toy_type.toy_type_id INNER JOIN manufacturer on toy.man_id=manufacturer.man_id where toy_type.toy_type_id=6 limit $start,$end";
        return $this->query($str_query);
    }
    
    function count_air(){
        $str_query="select distinct toy_id from toy inner join toy_type on toy.toy_type=toy_type.toy_type_id INNER JOIN manufacturer on toy.man_id=manufacturer.man_id where toy_type.toy_type='Aircraft'";
        $res = $this->query($str_query);
        $num_rows = mysqli_num_rows($res);
        return $num_rows;
    }
    
    function all_mani($start, $end){
        $str_query="SELECT image, toy_name, toy.toy_name, year_made, price, man_name FROM toy inner join toy_type on toy.toy_type=toy_type.toy_type_id INNER JOIN manufacturer on toy.man_id=manufacturer.man_id where toy_type.toy_type_id=7 limit $start,$end";
        return $this->query($str_query);
    }
    
    function count_mani(){
        $str_query="select distinct toy_id from toy inner join toy_type on toy.toy_type=toy_type.toy_type_id INNER JOIN manufacturer on toy.man_id=manufacturer.man_id where toy_type.toy_type='Manipulative'";
        $res = $this->query($str_query);
        $num_rows = mysqli_num_rows($res);
        return $num_rows;
    }
}
?>