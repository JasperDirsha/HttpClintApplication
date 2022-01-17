<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>HTTP Client App</title>
</head>
<body>
<main>
    <form action="HttpClient.php" method="post">
        <h1>HTTP Client App</h1>
		<div>
            <label for="username">Method:</label>
            <select name="method">
				<option value="OPTIONS">OPTIONS</option>
				<option value="POST">POST</option>
				<option value="GET">GET</option>
			</select>
        </div>
        <div>
            <label for="username">Url:</label>
            <input placeholder="Enter the url" type="text" name="url"/>
        </div>
        <div>
            <label for="email">Headers:</label>
            <textarea placeholder='{"key":"value", "key":"value"}' rows="5" name="headers"></textarea></div>
        </div>
        <div>
            <label for="password">Params:</label>
            <textarea placeholder='{"key":"value", "key":"value"}' rows="5" name="params"></textarea></div>
        </div>
        <button type="submit">Submit</button>
    </form>
</main>
</body>
</html>