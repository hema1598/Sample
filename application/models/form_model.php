<?php

class form_model extends CI_Model{

   

function saverec($firstname, $lastname, $street_addres, $street_add, $city, $state_name, $zip, $dob, $gender,$hobbies, $phone, $email, $profilePic, $pdffile){
    
    $query="insert into register values('','$firstname','$lastname','$street_addres', '$street_add' , '$city', '$state_name', '$zip', '$dob', '$gender', '$hobbies', '$phone', '$email', '$profilePic',' $pdffile')";
    $this->db->query($query);
}

function disrecords(){
    $this->db->order_by("firstname", "desc");
    $query = $this->db->query("select * from register");
    return $query->result();
}

function deleterec($id){
    $this->db->query("delete from register WHERE id='".$id."'");
}

function displayrecordsById($id)
	{
	$query=$this->db->query("select * from register where id='".$id."'");
	return $query->result();
    }
    
function update_records($firstname,$lastname,$street_addres,$street_add,$city,$state_name,$zip,$dob,$gender,$hobbies,$phone,$email,$profilePic,$pdffile,$id)
{
	$query=$this->db->query("update register SET firstname='$firstname',lastname='$lastname',street_addres='$street_addres',street_add='$street_add',city='$city',state_name='$state_name',zip='$zip',dob='$dob',gender='$gender', hobbies= '$hobbies', phone='$phone',email='$email', profilePic='$profilePic', pdffile='$pdffile' where id='$id' ");
}
}

