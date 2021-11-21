<?php


class ServiceModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function addEquipment($item_id,$name, $price,  $dateAcquired)
    {
        
        if ( $this->db->select ('count', "item", "WHERE Item_Id = :item_id;",':item_id',$item_id) >0 ){
            
            print_r("exist");
            $total=$this->db->select("Total", "item", "WHERE Item_Id = ':item_id';",':item_id',$item_id);
            $free=$this->db->select("Free", "item", "WHERE (Item_Id=':item_id');");
            echo $total;
            echo $free;

           /* $totalInt=(int)$total;
            $freeInt=(int)$free;
            $totalInt++;
            $freeInt++;
            $total=strval($totalInt);
            $free=strval($freeInt);

           // print_r($totalInt);
           // print_r($freeInt);

            /*$column1=array('Total','Free');
            $param1=array(':total',':free');
            $val1=array($total,$free);

            $result1 = $this->db->update("item", $column1, $param1, $val1, ':item_id', $item_id,"WHERE (Item_Id = :item_id);");
              if ($result1 == "Success") {
                return true;
            } else print_r($result1);*/
        }
        else{
            /*$column1=array('Item_Id','Total','Free');
            $param1=array(':item_id',':total',':free');
            $val1=array($item_id,1,1);
            $result1=$this->db->insert("item",$column1,$param1,$val1);
            if ($result1 == "Success") {
                return true;
            } else print_r($result1);*/
        }

        /*$columns = array('Name', 'Price', 'Date_Acquired','Item_Id');
        $param = array(':name', ':price', ':date',':item_id');
        $values = array($name, $price,  $dateAcquired,$item_id);
        $result = $this->db->insert("equipment", $columns, $param, $values);

        if ($result == "Success") {
            return true;
        } else print_r($result);*/
    }
    public function getEquipmentItemDetails()
    {
        $result = $this->db->select("*" , "item","WHERE 1");
        return $result;
    }
    public function getEquipmentDetails($item_id)
    {
        //$result = $this->db->select("Equipment_ID, Name, Date_Acquired, Price, Team" , "equipment", "WHERE Availability =1;");
        $result = $this->db->select("*" , "equipment", "WHERE Availability =1 AND Item_Id=':item_id';");
        return $result;
    }
    /*public function getFreeEquipmentDetails($item_id)
    {
        $result = $this->db->select("*" , "equipment", "WHERE (Availability =1) AND Item_Id=':item_id' AND (Team = NULL);");
        return $result;
    }*/
    function equipmentEdit($eid,$value)
    {
        $column='Team';
        $param=':team';
   
       $result = $this->db->update("equipment", $column, $param, $value, ':eid', $eid,"WHERE (Equipment_ID = :eid);");
        if ($result == "Success") {
            return true;
        } else print_r($result);

    }
    function equipmentDelete($eid)
    {
       
        $result = $this->db->update("equipment","Availability", ':availability', 0, ':eid', $eid,"WHERE (Equipment_ID = :eid);");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    // <------------------------------------- Service ------------------------------->

    function addService($name, $description)
    {
        $columns = array('Name', 'Description');
        $param = array(':name', ':desc');
        $values = array($name, $description);
        $result = $this->db->insert("wash_package", $columns, $param, $values);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function getWashPackage(){
        $result = $this->db->select("*", "wash_package", "Null");
        return $result;
    }

    function editService($washPackgeID, $description)
    {
        $column = "Description";
        $param = ":desc";
        $value = $description;
        $result = $this->db->update("wash_package", $column, $param, $value, ':washpackageid', $washPackgeID,"WHERE (Wash_Package_ID = :washpackageid);");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function deleteService($washPackgeID)
    {
        $result = $this->db->delete("wash_package", "WHERE ( Wash_Package_ID = :washpackageid);", ':washpackageid',$washPackgeID);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }
}
