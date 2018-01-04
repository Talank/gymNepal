<!DOCTYPE html>
<html>
<head>
    <title>
        Checking
    </title>
</head>
<body>
    <ul>
    	@foreach($tasks as $task)
         	<li><a href='{{$task->id}}'>{{$task->body}}</a></li>
         @endforeach
    </ul>
</body>
</html>