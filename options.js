// Saves options to chrome.storage.sync.
function save_options() {
  var server = document.getElementById('server').value;
  chrome.storage.sync.set({
    server: server,
  }, function() {
    // Update status to let user know options were saved.
    var status = document.getElementById('status');
    status.textContent = 'Options saved.';
    setTimeout(function() {
      status.textContent = '';
    }, 750);
  });
}

// Restores select box and checkbox state using the preferences
// stored in chrome.storage.
function restore_options() {
  console.log('xxxx');
  chrome.storage.sync.get({
    server: 'http://192.168.0.19/api/v1',
  }, function(items) {
    console.log(items);
    document.getElementById('status').textContent = items.server;
    document.getElementById('server').value = items.server;
  });
}
document.addEventListener('DOMContentLoaded', restore_options);
document.getElementById('save').addEventListener('click', save_options);
