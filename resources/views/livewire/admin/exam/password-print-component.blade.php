<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: black;
  color: white;
}
table#customers {
    font-weight: bold;
}
h1 {
    font-weight: bold;
    font-size: 30px;
    text-align: center;
}
tr {
    text-align: center;
}
h1 {
    font-weight: bold;
    font-size: 30px;
    text-align: center;
    font-family: system-ui;
}
</style>
</head>
<body>


<h1>Exam/{{$exam_title->name_exam}}</h1>

<table id="customers">
  <tr>
    <th>key</th>
    <th>Password</th>
    <th>select</th>
  </tr>

    @foreach ($passwords as $key=> $password )
    <tr>
      <td>{{ $key+1 }}</td>
          <td>
      {{$password}}
            </td>

                      <td> <input type="radio" name="colors" id="red" disabled>  </td>

    </tr>
  @endforeach



</table>
<script>
 function print(url) {
    printWindow.print();
};
</script>
</body>
</html>


