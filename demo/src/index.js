import Echo from 'laravel-echo'

window.io = require('socket.io-client');
window.Echo = new Echo({
  broadcaster: 'socket.io',
  namespace:'',
  host: window.location.hostname + ':6001',
  bearerToken:'33333333'
}); 

window.Echo.channel('test-event')
  .listen('ExampleEvent', (e) => {
        console.log(e);
  });

window.Echo.private(`user.1`)
    .listen('ExampleEvent', (e) => {
        console.log('private',e);
    });

// setInterval(function () {
//   console.log(1);
//   window.Echo.connector.socket.emit('EVENT_NAME', 'message', {'data':'33333'});
// }, 5000);