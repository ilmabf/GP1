<?php


class ServiceModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function addEquipment($item_id,$name, $price,  $dateAcquired)
    {
        $columns = array('Name', 'Price', 'Date_Acquired','Item_Id');
        $param = array(':name', ':price', ':date',':item_id');
        $values = array($name, $price,  $dateAcquired,$item_id);

        /*if($this->db->select("Item_Id", "item", "WHERE (Item_Id=:item_id);")>0){
            //$result1=$this->db->update();
        }
        else{
            $result1=$this->db->insert("item",'Item_Id',':item_id',$item_id);
            if ($result1 == "Success") {
                return true;
            } else print_r($result1);
        }*/
        $result1=$this->db->insert("item",'Item_Id',':item_id',$item_id);     
        $result = $this->db->insert("equipment", $columns, $param, $values);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }
    
    public function getEquipmentDetails()
    {
        $result = $this->db->select(("Equipment_ID, Name, Date_Acquired, Price, Team") , "equipment", "WHERE (Availability =1);");
        return $result;
    }
  
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
