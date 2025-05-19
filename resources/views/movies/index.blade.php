<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Index</title>
</head>

<body>
    <ul>
        <?php foreach ($menu as $key => $value): ?>
        <li><a href="<?php $value; ?>"><?php echo $key; ?></a></li>
        <?php endforeach; ?>
    </ul>
    {{ dd($config) }}
    <h1>{{ $titlePage }} </h1>
    {{-- {{ dd($movies) }} --}}

</body>

</html>
