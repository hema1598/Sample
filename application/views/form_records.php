<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>assets/script.js" ></script>
<head>
<title>Display Records</title>
</head>
<body>
<?php //echo header("Content-Type: image/jpeg");?>
<div>
<div class="left_align"><h1>Registration Form</h1></div>
<div id="reg-list">
  <!-- <input class="search" placeholder="Search" />
  <button class="sort" data-sort="name">Sort</button> -->
   <table  id="myTable" text-align="center" width="100%" border="1" cellspacing="5" cellpadding="5">
<thead>
   <tr style="background:#CCC">
    <th>Sr No</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Street Address</th>
    <th>Street Address1</th>
    <th>City</th>
    <th>State Name</th>
    <th>zip</th>
    <th>Date of Birth</th>
    <th>Gender</th>
    <th>Hobbies</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Images</th>
    <th>Application Pdf</th>
    <th>Update</th>
    <th>Delete</th>
    <th>Insert</th>
   </tr></thead>
   <tbody class="list">
  <?php
  $i=1;
  foreach($data as $row)
  {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td class='name'>".$row->firstname."</td>";
  echo "<td>".$row->lastname."</td>";
  echo "<td>".$row->street_addres."</td>";
  echo "<td>".$row->street_add."</td>";
  echo "<td class='city'>".$row->city."</td>";
  echo "<td>".$row->state_name."</td>";
  echo "<td>".$row->zip."</td>";
  echo "<td>".$row->dob."</td>";
  echo "<td>".$row->gender."</td>";
  echo "<td>".$row->hobbies."</td>";
  echo "<td>".$row->phone."</td>";
  echo "<td>".$row->email."</td>";
  echo '<td><img width="75px" height="75px" src="data:image/jpeg;base64,'.base64_encode($row->profilePic).'" /></td>';
  echo "<td>".$row->pdffile."</td>";
  echo "<td><a href='updatedata?id=".$row->id."'>Update</a></td>";
  echo "<td><a href='deldata?id=".$row->id."'>Delete</a></td>";
  echo "<td><a href='/codeigniter/form/savedata'>Insert</a></td>";
  echo "</tr>";
  $i++;
  }
  ?></tbody>
  </table>
</div>
</body>
</html>