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
                   inner join toy_type      on toy.toy_type = toy_type.toy_type_id
                   inner join manufacturer
                   ON toy.man_id = manufacturer.man_id WHERE toy_name
		           LIKE  '%$name%' limit $s,$l";
		return $this->query($str_query);
    }
    
    function viewCategory(){
        $string="select * from toy_type";
        return $this->query($string);
    }
    
    function getDetails($id){
        $string="select toy_id,
                   image,
                   toy_name,
                   toy.toy_type,
                   year_made,
                   price,
                   man_name
                   from toy
                   inner join toy_type      on toy.toy_type = toy_type.toy_type_id
                   inner join manufacturer
                   ON toy.man_id = manufacturer.man_id
                   where g.Grocery_id=?";
        $s = $this->prepare($string);
        $s->bind_param('i', $id);
        $s->execute();
        return $s->get_result();
    }
}
?>