(function(App) {

	App.Views.Monitor = React.createClass({
		loadUsersFromServer: function() {
			this.setState({loading: true});
			$.ajax({
				url: this.props.url,
				dataType: 'json',
				cache: false,
				success: function(data) {
					if (typeof data.error !== 'undefined') {
						this.setState({error: data.error});
					} else {
						this.setState({data: data, ajaxError: null});
					}
				}.bind(this),
				error: function(xhr, status, err) {
					this.setState({ajaxError: err.toString()});
					console.error(this.props.url, status, err.toString());
				}.bind(this),
				complete: function() {
					this.setState({loading: false});
					setTimeout(this.loadUsersFromServer, this.props.pollInterval);
				}.bind(this)
			});
		},
		getInitialState: function() {
			return {
				loading: false,
				error: null,
				ajaxError: null,
				data: []
			};
		},
		componentDidMount: function() {
			this.loadUsersFromServer();
		},
		render: function() {
			var loading;
			if (this.state.loading) {
				loading = <div className="box-loading"><i className="fa fa-spinner fa-spin"></i></div>
			}
			if (this.state.ajaxError) {
				loading = <div className="box-ajax-error"><i className="fa fa-exclamation-triangle" title={this.state.ajaxError}></i></div>
			}

			if (this.state.error) {
				return (
					<div className="monitor-status box box-has-error">
						{loading}
						<App.Views.Error type={this.state.error.type} data={this.state.error.data} />
					</div>
				);
			}

			var mailboxes = null;
			if (typeof this.state.data.map !== 'undefined') {
				mailboxes = this.state.data.map(function(mailbox) {
					return (
						<div class="status-green border-color" >
						<span className="name">{mailbox.api}</span>
						<span className="component-status">{mailbox.status =='KO' ? <i className="fa fa-exclamation-triangle" title='Something wrong with API'></i> : mailbox.status}</span>
						</div>
					);
				});
			}
			return (
				<div className="component-inner-container status-green">
					{loading}
					<div className="component-inner-container border-color">
						{mailboxes}
					</div>
				</div>
			);
		}
	});

	// App.Views.Monitor.Hour = React.createClass({
	// 	render: function() {
	// 		var users = this.props.users.map(function(user) {
	// 			return (
	// 				<App.Views.Monitor.User key={user.id} user={user} />
	// 			);
	// 		});
	// 		return (
	// 			<li className={'monitor-hour monitor-hour-' + this.props.hour + ' total-' + (this.props.users.length > 4 ? 'multiple' : this.props.users.length)}>
	// 				{users}
	// 			</li>
	// 		);
	// 	}
	// });

	// App.Views.Monitor.User = React.createClass({
	// 	render: function() {
	// 		return (
	// 				<div className="monitor-user-info">
	// 					<span className="monitor-user-name">{this.props.user.api}</span>
	// 					<span className="monitor-user-local-time">Status: {this.props.user.status}</span>
	// 				</div>
	// 		);
	// 	}
	// });

})(App);
