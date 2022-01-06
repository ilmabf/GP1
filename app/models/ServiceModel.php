<?php


class ServiceModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }


    function addEquipment($itemID,$name, $price,  $dateAcquired)
    {   
        $columns = array('Name', 'Price', 'Date_Acquired','Item_Id)');
        $param = array(':name', ':price', ':date',':itemID');
        $values = array($name, $price,  $dateAcquired,$item_id);
        
        if ( $this->db->select ('count', "item", "WHERE Item_Id = :itemID;",':itemID',$itemID) >0 ){
            
            $result=$this->db->select("Total, Free", "item", "WHERE ItemID = :itemID;",':itemID',$itemID);
            $total  = $result[0]['Total'];
            $free  = $result[0]['Free'];
            $total++;
            $free++;
            $column1=array('Total','Free');

            $param1=array(':total',':free');
            $val1=array($total,$free);

            $result1 = $this->db->update("item", $column1, $param1, $val1, ':itemID', $itemID,"WHERE (Item_Id = :itemID);");          
            $result = $this->db->insert("equipment", $columns, $param, $values);
            if ($result == "Success") {
            return true;
        } else print_r($result);
        }
        else{
            $column1=array('Item_Id','Name','Total','Free');
            $param1=array(':item_id',':name',':total',':free');
            $val1=array($item_id,$name,1,1);

            $result1=$this->db->insert("item",$column1,$param1,$val1);
            $result = $this->db->insert("equipment", $columns, $param, $values);
            if ($result == "Success") {
            return true;
            } else print_r($result);
        }          
    }
    public function getItemDetails()
    {
        $result = $this->db->select("*", "item", "Null");
        return $result;
    }
    public function getEquipmentDetails()
    {

        $result = $this->db->select("*" , "equipment", "WHERE Availability = 1 ;");
        return $result;
    }
    public function getTeamDetails()
    {

        $result = $this->db->select("STL_ID" , "service_team_leader", "WHERE 1;");
        return $result;
    }

    function equipmentEdit($eid,$value)
    {
        $column='Team';
        $param=':team';

        $item_id_result = $this->db->select("Item_Id,Team", "equipment", "WHERE Equipment_ID = :eid;",':eid',$eid);
        $item_id = $item_id_result[0]['Item_Id'];
        $current_team = $item_id_result[0]['Team'];
        
        if($current_team != NULL && $value == NULL){
            $result = $this->db->select("Free", "item", "WHERE Item_Id = :item_id;",':item_id',$item_id);
            $free  = $result[0]['Free'];
            $free++;
            $result1 = $this->db->update("item", 'Free', ':free', $free, ':item_id', $item_id,"WHERE (Item_Id = :item_id);");

            $result = $this->db->update("equipment", $column, $param, $value, ':eid', $eid,"WHERE (Equipment_ID = :eid);");

            if ($result == "Success") {
                return true;
            } else print_r($result);

        }else if($current_team == NULL && $value != NULL){
            $result = $this->db->select("Free", "item", "WHERE Item_Id = :item_id;",':item_id',$item_id);
            $free  = $result[0]['Free'];
            $free--;
            $result1 = $this->db->update("item", 'Free', ':free', $free, ':item_id', $item_id,"WHERE (Item_Id = :item_id);");

            $result = $this->db->update("equipment", $column, $param, $value, ':eid', $eid,"WHERE (Equipment_ID = :eid);");

            if ($result == "Success") {
                return true;
            } else print_r($result);

        }else if(($current_team != NULL && $value != NULL) || ($current_team == NULL && $value == NULL)){
            $result = $this->db->update("equipment", $column, $param, $value, ':eid', $eid,"WHERE (Equipment_ID = :eid);");

            if ($result == "Success") {
                return true;
            } else print_r($result);

        }
    }
    function equipmentDelete($eid)

    {   
        $item_id_result = $this->db->select("Item_Id,Team", "equipment", "WHERE Equipment_ID = :eid;",':eid',$eid);
        $item_id = $item_id_result[0]['Item_Id'];
        $current_team = $item_id_result[0]['Team'];

        if($current_team != NULL){
            $result = $this->db->select("Total", "item", "WHERE Item_Id = :item_id;",':item_id',$item_id);
            $total  = $result[0]['Total'];
      
            $total--;

            $result1 = $this->db->update("item", "Total", ':total', $total, ':item_id', $item_id,"WHERE (Item_Id = :item_id);");   
            $result = $this->db->update("equipment","Availability", ':availability', 0, ':eid', $eid,"WHERE (Equipment_ID = :eid);");
        
            if ($result == "Success") {
                return true;
            } else print_r($result);

        }else if($current_team == NULL){
            $result = $this->db->select("Total, Free", "item", "WHERE Item_Id = :item_id;",':item_id',$item_id);
            $total  = $result[0]['Total'];
            $free  = $result[0]['Free'];
        
            $total--;
            $free--;

            $column1 = array('Total','Free');
            $param1 = array(':total',':free');
            $val1 =array($total,$free);
    
            $result1 = $this->db->update("item", $column1, $param1, $val1, ':item_id', $item_id,"WHERE (Item_Id = :item_id);");   
            $result = $this->db->update("equipment","Availability", ':availability', 0, ':eid', $eid,"WHERE (Equipment_ID = :eid);");
      
            if ($result == "Success") {
                return true;
            } else print_r($result);
        }       
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

    function getWashPackage()
    {
        $result = $this->db->select("*", "wash_package", "Null");
        return $result;
    }

    function editService($washPackgeID, $description)
    {
        $column = "Description";
        $param = ":desc";
        $value = $description;
        $result = $this->db->update("wash_package", $column, $param, $value, ':washpackageid', $washPackgeID, "WHERE (Wash_Package_ID = :washpackageid);");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function deleteService($washPackgeID)
    {
        $result = $this->db->delete("wash_package", "WHERE ( Wash_Package_ID = :washpackageid);", ':washpackageid', $washPackgeID);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function addVehicle($name, $array)
    {
        $columns = array('Wash_Package_ID', 'Vehicle_Type');
        $param = array(':packageid', ':vehicleType');
        $i = 0; 
        for ($i = 0; $i < sizeof($array); $i++) {
            $washpackages[$i] = $array[$i]['Wash_Package_ID'];
            $result = $this->db->insert("wash_package_vehicle_category", $columns, $param, array($washpackages[$i], $name));
            if ($result != "Success") {
                print_r($result);
            }
        }
        return true;
    }

    function getVehicle()
    {
        $result = $this->db->select("DISTINCT Vehicle_Type", "wash_package_vehicle_category", "Null");
        return $result;
    }

    function deleteVehicle($vehicleName)
    {
        $result = $this->db->delete("wash_package_vehicle_category", "WHERE ( Vehicle_Type = :vehicleType);", ':vehicleType', $vehicleName);
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }

    function getServicePrice(){
        $result = $this->db->select("*", "wash_package_vehicle_category", "Null");
        return $result;
    }

    function insertPrice($washPackageID, $vehicleName, $price){
        $column = "Price";
        $param = ":price";
        $value = $price;
        $result = $this->db->update("wash_package_vehicle_category", $column, $param, $value, array(':washPackage', ':vehicleType'), array($washPackageID, $vehicleName), "WHERE (Wash_Package_ID = :washPackage AND Vehicle_Type = :vehicleType);");
        if ($result == "Success") {
            return true;
        } else print_r($result);
    }
}
