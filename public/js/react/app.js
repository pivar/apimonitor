(function(App) {

	ReactDOM.render(
		(
			<div>
				<App.Views.Monitor url="/api/getHelpMonitors" pollInterval={40000}/>
			</div>
		),
		document.getElementById('content')
	);

})(App);
