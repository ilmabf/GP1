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
        
        if ( $this->db->select ('count', "item", "WHERE Item_Id = :item_id;",':item_id',$item_id) >0 ){
            
            $result=$this->db->select("Total, Free", "item", "WHERE Item_Id = :item_id;",':item_id',$item_id);
            $total  = $result[0]['Total'];
            $free  = $result[0]['Free'];
            $total++;
            $free++;

            $column1=array('Total','Free');
            $param1=array(':total',':free');
            $val1=array($total,$free);

            $result1 = $this->db->update("item", $column1, $param1, $val1, ':item_id', $item_id,"WHERE (Item_Id = :item_id);");          
              if ($result1 == "Success") {
                return true;
            } else print_r($result1);

            $result = $this->db->insert("equipment", $columns, $param, $values);
            if ($result == "Success") {
            return true;
        } else print_r($result);
        }
        else{
            $column1=array('Item_Id','Total','Free');
            $param1=array(':item_id',':total',':free');
            $val1=array($item_id,1,1);

            $result1=$this->db->insert("item",$column1,$param1,$val1);
            if ($result1 == "Success") {
                return true;
            } else print_r($result1);

            $result = $this->db->insert("equipment", $columns, $param, $values);
            if ($result == "Success") {
            return true;
            } else print_r($result);
        }          
    }
    public function getEquipmentItemDetails()
    {
        $result = $this->db->select("*" , "item","WHERE 1");
        return $result;
    }
    public function getAllEquipmentDetails($item_id)
    {
        $result = $this->db->select("*" , "equipment", "WHERE Availability =1 AND Item_Id=':item_id';");
        return $result;
    }
    public function getFreeEquipmentDetails($item_id)
    {
        $result = $this->db->select("*" , "equipment", "WHERE (Availability =1) AND Item_Id=':item_id' AND (Team = NULL);");
        return $result;
    }
    function equipmentEdit($eid,$value)
    {
        $column='Team';
        $param=':team';

        $item_id_result = $this->db->select("Item_Id", "equipment", "WHERE Equipment_ID = :eid;",':eid',$eid);
        $item_id = $item_id_result[0]['Item_Id'];
        $result = $this->db->select("Free", "item", "WHERE Item_Id = :item_id;",':item_id',$item_id);
        $free  = $result[0]['Free'];
        $free--;
       $result = $this->db->update("equipment", $column, $param, $value, ':eid', $eid,"WHERE (Equipment_ID = :eid);");
        if ($result == "Success") {
            return true;
        } else print_r($result);

    }
    function equipmentDelete($eid)
    {   
        $item_id_result = $this->db->select("Item_Id", "equipment", "WHERE Equipment_ID = :eid;",':eid',$eid);
        $item_id = $item_id_result[0]['Item_Id'];
        $result = $this->db->select("Total, Free", "item", "WHERE Item_Id = :item_id;",':item_id',$item_id);
        $total  = $result[0]['Total'];
        $free  = $result[0]['Free'];
        $total--;
        $free--;

        $column1 = array('Total','Free');
        $param1 = array(':total',':free');
        $val1 =array($total,$free);

        $result1 = $this->db->update("item", $column1, $param1, $val1, ':item_id', $item_id,"WHERE (Item_Id = :item_id);");          
        if ($result1 == "Success") {
            return true;
        } else print_r($result1);

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
