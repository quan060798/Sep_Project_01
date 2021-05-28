
<!DOCTYPE html> 
<html>
<head>
	<title>Staff Main Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<center> 
		<table>
			<tr>
				<td style="text-align: center;"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJs-9vUlbFLFKrhJpV2NNvKRUuZedoWALEf0dbAiK46nMv_aV8EG6ms4cyZoUXyGxmkcE&usqp=CAU" alt="Customer Logo" style="width: 150px; height: 150px;"></td>
				<td style="text-align: center;"><img src="/images/Rider_Logo.png" alt="Rider Logo" style="width: 175px; height: 100px;"></td>
				<td style="text-align: center;"><img src="https://cdn2.iconfinder.com/data/icons/web-solid/32/user-512.png" alt="Rider Logo" style="width: 100px; height: 100px;"></td>
			</tr>
			<tr>
				<td style="text-align: center;"><button onclick="location.href='{{ route('ManageAccount.selectProfileType', $data1->Staff_ID) }}'" style="color: white; text-decoration: none;">CUSTOMER</a></button></td>
				<td style="text-align: center;"><button onclick="location.href='{{ route('ManageAccount.selectProfileTypeR', $data1->Staff_ID) }}'" style="color: white; text-decoration: none;">RIDER</a></button></td>
			</tr>
		</table>
	</center>
</body>
</html>
