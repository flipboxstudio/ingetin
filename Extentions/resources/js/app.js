var Vue = require('vue');
var moment = require('moment');

Vue.use(require('vue-resource'));

Vue.filter('ucfirst', function (value) {
  value += ''
    var first = value.charAt(0)
      .toUpperCase()
    return first + value.substr(1)
});

Vue.filter('parse_date', function (value) {
  return moment(value).format('DD MMMM YYYY, H:mm:ss');
});

new Vue({
  el: '#app',

  data: function () {
    return {
      projects: [],
      timesheets: [],
      login: false,
      email: null,
      password: null,
      token: null,
      openTimeSheet: false,
    }
  },

  http: {
    root: 'http://192.168.0.19/api/v1',
  },

  created: function () {
    this.checkCredentials();

    if (this.login !== false) {
      this.fetchTasks();
      this.fetchTimesheets();
    }

    setTimeout(function () {
      componentHandler.upgradeDom();
    }, 100);
  },

  methods: {
    toggleTimesheet: function () {
      this.openTimeSheet = !this.openTimeSheet;

      setTimeout(function () {
        componentHandler.upgradeDom();
      }, 100);
    },

    checkCredentials: function () {
      var token = localStorage.getItem('ingetin.token');

      if (token !== null) {
        this.setToken(token);

        var resource = this.$resource('me');

        resource.get({}).then(function (response) {
          //
        }, function () {
          this.clearToken()
        });
      }
    },

    setToken(token) {
      this.token = token;
      this.login = true;
      localStorage.setItem('ingetin.token', token);
      Vue.http.headers.common['Authorization'] = 'Bearer '+this.token;
    },

    clearToken() {
      this.token = null;
      this.login = false;
      localStorage.removeItem('ingetin.token');
      Vue.http.headers.common['Authorization'] = '';
    },

    showSnackBar: function (message) {
      var data = {
        message: message,
        timeout: 2000,
      };

      document.querySelector('#snackbar').MaterialSnackbar.showSnackbar(data);
    },

    fetchTimesheets: function () {
      this.$resource('timesheet/list').get({}).then(function (response) {
        this.timesheets = response.data.data;
        this.showSnackBar('All timesheets has been fetched.');

        setTimeout(function () {
          componentHandler.upgradeDom();
        }, 100);
      }.bind(this));
    },

    fetchTasks: function () {
      this.$resource('project/list').get({}).then(function (response) {
        this.projects = response.data;
        this.showSnackBar('All tasks has been fetched.');

        setTimeout(function () {
          componentHandler.upgradeDom();
        }, 100);
      }.bind(this));
    },

    start: function (task) {
      this.$resource('task/start/{id}').update({id: task.id}, {}).then(function (response) {
        task.state = 'ongoing';
        this.showSnackBar('Task "'+task.name+'" has been started.');

        setTimeout(function () {
          componentHandler.upgradeDom();
        }, 100);
      }.bind(this));
    },

    changed: function (task, event) {
      task.precent = event.target.value;
    },

    update: function (task, event) {
      this.$resource('task/update/{id}').update({id: task.id}, {progress: task.precent}).then(function (response) {
        this.showSnackBar('Task "'+task.name+'" has been updated. Current progress is '+task.precent+'%.');

        setTimeout(function () {
          componentHandler.upgradeDom();
        }, 100);
      }.bind(this));
    },

    finish: function (task, event) {
      this.$resource('task/finish/{id}').update({id: task.id}, {}).then(function (response) {
        task.state = 'finish';
        this.showSnackBar('Task "'+task.name+'" has been finished.');

        setTimeout(function () {
          componentHandler.upgradeDom();
        }, 100);
      }.bind(this));
    },

    authenticate: function (email, password) {
      this.$resource('login').save({}, {email: email, password: password}).then(function (response) {
        this.setToken(response.data.data.api_token);

        this.fetchTasks();
      }.bind(this), function (response) {
        this.showSnackBar('Wrong credentials.');
      }.bind(this));
    },
  }
})
