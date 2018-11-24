
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
	Thống kê lợi nhuận

	<form action="{{route('manager.report.profit')}}">
  Nhập ngày tháng năm muốn xem lợi nhuận <br><br>
  <input type="date" name="day"><br><br>
  <input type="submit" value="Xem lợi nhuận"><br>
 
	</form>
	 @if(isset($profits) && count($profits) > 0)
	

			<table>
		  <tr>
		    <th>Ngày</th>
		    <th>Lợi nhuận</th> 
		    
		  </tr>
		  
		   @foreach($profits as $profit)
		   <tr>
			 <td>{{$profit->date}} </td>
			
 			@foreach($revenues as $revenue)
 			@if($profit->date == $revenue->date)

 				<td>{{$revenue->sum - $profit->profit}}</td>
 			@endif
			  

			@endforeach
			</tr>
			@endforeach
		  
		
		  
			  	

			
		  
		  
		</table>
		
		
	@else
		{{__('messages.no-report-found')}}
	@endif
	


	
</body>
</html>