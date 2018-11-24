<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
	Thống kê doanh thu

	<form action="{{route('manager.report.revenue')}}">
  Nhập ngày tháng năm muốn xem doanh thu <br><br>
  <input type="date" name="day"><br><br>
  <input type="submit" value="Xem doanh thu"><br>
 
	</form>
	 @if(isset($revenues) && count($revenues) > 0)
	

			<table>
		  <tr>
		    <th>Ngày</th>
		    <th>Doanh thu</th> 
		    
		  </tr>
		  @foreach($revenues as $revenue)
			  	<tr>
		    <td>{{$revenue->date}}</td>
		    <td>{{$revenue->sum}}</td> 
		    
		  </tr>

			@endforeach
		  
		  
		</table>
		
		
	@else
		{{__('messages.no-report-found')}}
	@endif
	


	
</body>
</html>