<!-- Vue.js Include -->
<script src="<?= base_url() ?>js/vuejs/vue.dev.js"></script>
<script src="<?= base_url() ?>js/vuejs/vuex.js"></script>
<script src="<?= base_url() ?>js/vuejs/vue-resource.js"></script>
<script src="<?= base_url() ?>js/vuejs/moment.js"></script>
<script src="<?= base_url() ?>js/vuejs/moment-timezone.js"></script>
<script src="<?= base_url() ?>js/vuejs/datepicker.js"></script>
<!-- <script src="< ?= base_url() ?>js/vuejs/lodash.js"></script> -->
<script src="<?= base_url() ?>js/jquery.min.js"></script>
<script src="<?= base_url() ?>js/vuejs/jqueryui.js"></script>
<!-- <script src="<?= base_url() ?>js/vuejs/touchpunch.js"></script> -->
<link href="<?= base_url() ?>css/datepicker.css" rel="stylesheet">
<!-- Setup Vuex Store -->
<script type="text/javascript">
	Vue.use(Vuex);
	window.store = new Vuex.Store({

		// The main information state
		state: {
			notifications: [],
			account: {
				menuActive: false,
			},
		},

		// Used for monitoring mutations to the store
		mutations: {

			// Add a new notification
			addNotificationMutation: function (state, item) {
				state.notifications.push(item);
			},

			// Remove a notification item
			removeNotificationMutation: function(state, index) {
				state.notifications.splice(index, 1);
			},
			
			// Set the account menu status
			setAccountMenuStatusMutation: function(state, status) {
				state.account.menuActive = status;
			},

		},

		// The actions you will dispatch, also contains the logical part
		actions: {

			// Will add a new notification to the system
			addNotification: function( store, item ) {

				// Define the variables (doing it like this to support IE11)
				var dispatch = store.dispatch;
				var commit = store.commit;
				var state = store.state;

				// Commit the notification mutation
				commit('addNotificationMutation', {
					type: item[1],
					message: item[0],
					stamp: moment().utc().unix() + 5,
				});
			},
			
			// Set account menu status
			setAccountMenuStatus: function(store, status) {

				// Define the variables (doing it like this to support IE11)
				var dispatch = store.dispatch;
				var commit = store.commit;
				var state = store.state;

				// Commit the account menu change mutation
				commit('setAccountMenuStatusMutation', status);

			},

			// Logical Tick
			logicalTick: function( store ) {

				// Define the variables (doing it like this to support IE11)
				var dispatch = store.dispatch;
				var commit = store.commit;
				var state = store.state;

				// Check and clear notifications that are too old
				var now = moment().utc().unix();
				for (var i = 0; i < state.notifications.length; i++) {
					if (state.notifications[i].stamp < now) {
						commit('removeNotificationMutation', i);
					}
				}
			}

		},
	});

	// Run a constant logical loop
	window.store.interval = setInterval(function() {
		window.store.dispatch('logicalTick');
	}, 1000*5);
</script>