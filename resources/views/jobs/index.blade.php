<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Junior Positions</title>
</head>
<body>
    
    <ul>
        @foreach($jobs as $job)
            <li>{{ $job->title }}</li>
        @endforeach
    </ul>

</body>
</html>
