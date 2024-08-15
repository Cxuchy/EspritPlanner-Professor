<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$subject}}</title>
</head>



<body>
    <h1>Your final planning is ready for you !</h1>

    <table>
        <tr>
          <th>Date</th>
          <th>Hour</th>
          <th>Location</th>
        </tr>

        @foreach ($planning as $plan)
        <tr>
            <td>{{$plan->datepassage}}</td>
            <td>{{$plan->heurepassage}}:00</td>
            <td>Esprit El Ghazela</td>
          </tr>
        @endforeach

      </table>

</body>
</html>




<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
</style>
