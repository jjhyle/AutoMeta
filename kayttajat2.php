<?php

	if(isset($_POST['querystr'])){

		$conn = new mysqli('localhost', 'admin', 'Q2werty1234', 'autometa');
		$results = array('error' => false, 'data' => '');
		$querystr = $_POST['querystr'];

		if(empty($querystr)){
			$results['error'] = true;
		}else{
			$sql = "SELECT * FROM kayttajat WHERE name LIKE '%$querystr%'";
			$sqlquery = $conn->query($sql);

			if($sqlquery->num_rows > 0){
				while($ldata = $sqlquery->fetch_assoc()){
					$results['data'] .= "
						<li class='list-gpfrm-list' data-fullname='".$ldata['   ']." ".$ldata['sirname']."'>".$ldata['name']." ".$ldata['sirname']."</li>
					";
				}
			}
			else{
				$results['data'] = "
					<li class='list-gpfrm-list'>No found data matches Records</li>
				";
			}
		}
		echo json_encode($results);
	}
?>