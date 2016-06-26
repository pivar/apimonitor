<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>API Monitoring board</title>

	<link rel="stylesheet" href="{{ url('css/style.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.2/react.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.2/react-dom.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
	<div class="layout-content status status-index starter">
	<div class="components-container one-column border-color">

		<div class="container">
        <div class="page-status status-none">
          <span class="status font-large">
             API status check
          </span>
          <span class="last-updated-stamp  font-small">Refreshed <var number="">every 4</var> seconds</span>
        </div>

        <div class="components-section font-regular">
    <div class="components-container one-column">
  <div id ="content" class="component-container border-color"></div>

    </div>

  </div>
	</div>
	</div>
	<script src="{{ url('js/bootstrap.js') }}"></script>
	<script type="text/babel" src="{{ url('js/react/error.js') }}"></script>
	<script type="text/babel" src="{{ url('js/react/monitor.js') }}"></script>
	<script type="text/babel" src="{{ url('js/react/app.js') }}"></script>
</body>
</html>
